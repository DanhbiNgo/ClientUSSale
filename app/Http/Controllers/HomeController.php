<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\sanpham;
use App\Models\loai;
use App\Models\hinhsp;
use App\Models\giohang;
use App\Models\donhang;
use App\Models\chitietdonhang;
use Carbon\Carbon;
use App\Models\diachi;
use App\Models\chat;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       # $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sanpham = sanpham::all();
        $loai = loai::all();
        $sanpl = DB::select("SELECT * FROM sanpham Order By sp_ma DESC limit 6");
        $hinhanhsanpham=hinhsp::all();
        return view('home',['sanpham'=>$sanpham,'loai'=>$loai,'hinhanhsanpham'=>$hinhanhsanpham,'sanpl'=>$sanpl]);
    }
    public function facebookRedirect(){
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook(){
        $user = Socialite::driver('facebook')->user();
        $this->_regis($user);
        return redirect()->route('home');
    }
    public function GoogleRedirect(){
        return Socialite::driver('google')->redirect();
    }
    public function loginWithGoogle(){
         $user = Socialite::driver('google')->user();
        $this->_regis($user);
        return redirect()->route('home');
    }

    protected function _regis($data){
        $user = User::where('email','=',$data->email)->first();
        $name = User::where('name','=',$data->name)->first();
        $select = DB::select('SELECT * FROM users WHERE id=(SELECT MAX(id) FROM users)');
        $i = 0;
        if($select == null){
            $i = 1;
        }else{
        foreach ($select as $key) 
            $i = $key->id + 1  ;
         }
        if(!$user){
            $user = new User();
            $user->id = $i;
            $user->name = $data->name;
            $user->password = bcrypt('user@123');
            $user->email = $data->email;
            $user->provider_user_id = $data->id;
            $user->active = 1;
            $user->save();
        }
        Auth::login($user);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }


    public function sploai($id){
       $select = sanpham::where('l_ma','=',$id)->paginate(8);
       $selectloai = DB::select('SELECT * FROM loai WHERE l_ma =?',[$id]);
        $hinhanhsanpham=hinhsp::all();
        $loai = loai::all();
        $hinhanhsanpham=hinhsp::all();
       return view('sanpham',['select'=>$select,'loai'=>$loai,'hinhanhsanpham'=>$hinhanhsanpham,'selectloai'=>$selectloai]);
    }
    public function ctsp($id){
        $select = sanpham::where('sp_ma','=',$id)->get();
        $selectloai = DB::select('SELECT * FROM loai WHERE l_ma =?',[$select[0]->l_ma]);
        $hinhanhsanpham=hinhsp::all();
        $loai = loai::all();
       return view('chitietsp',['select'=>$select,'loai'=>$loai,'hinhanhsanpham'=>$hinhanhsanpham,'selectloai'=>$selectloai]);

    }
    public function addcart($id){
        $id_user = Auth::id();
        if($id_user == null){
            abort();
        }else{
         $giohang = DB::select('SELECT * FROM giohang WHERE gh_ma=(SELECT MAX(gh_ma) FROM giohang)');
        
        
        $i = 0;
        if($giohang == null){
            $i = 1;
        }else{
        foreach ($giohang as $key) 
            $i = $key->gh_ma + 1  ;
         }
        $select = DB::select('
            SELECT * FROM giohang where sp_ma =? and id_user = ?',[$id,$id_user]
            );
        if($select == null){
            $giohang = new giohang();
            $giohang->gh_ma = $i;
            $giohang->sp_ma = $id;
            $giohang->soluong = 1;
            $giohang->id_user = $id_user;
            $giohang->save();
        }else{
              DB::select('update giohang set
                    soluong = ?
                    where sp_ma = ?',
                    [
                        $select[0]->soluong + 1,
                        $id
                    ]);
        }
    }
    
    }

    public function showcart(){
        $giohang = giohang::all();
        $sanpham = sanpham::all();
        $hinhanh = hinhsp::all();
        return view('showcart',['giohang'=>$giohang,'sanpham'=>$sanpham,'hinhanh'=>$hinhanh]);
    }
    public function deletecart($id){
        giohang::where('gh_ma',$id)->delete();
    }
    public function multicart($id,$sl){
         $id_user = Auth::id();
        if($id_user == null){
            abort();
        }else{
         $giohang = DB::select('SELECT * FROM giohang WHERE gh_ma=(SELECT MAX(gh_ma) FROM giohang)');
        
        
        $i = 0;
        if($giohang == null){
            $i = 1;
        }else{
        foreach ($giohang as $key) 
            $i = $key->gh_ma + 1  ;
         }
        $select = DB::select('
            SELECT * FROM giohang where sp_ma =? and id_user = ?',[$id,$id_user]
            );
        $sp = sanpham::where('sp_ma',$id)->get();
        if($sp[0]->sp_soluong == 0){
            $msg = "201";
      return response()->json(array('msg'=> $msg), 200);
        }
        if($select == null){
            $giohang = new giohang();
            $giohang->gh_ma = $i;
            $giohang->sp_ma = $id;
            $giohang->soluong = $sl;
            $giohang->id_user = $id_user;
            $giohang->save();
        }else {
            $slt = $select[0]->soluong +$sl;
            if(($select[0]->soluong +$sl) > $sp[0]->sp_soluong){
                $slt = $sp[0]->sp_soluong;         
            }
              DB::select('update giohang set
                    soluong = ?
                    where sp_ma = ?',
                    [
                        $slt,
                        $id
                    ]);
              if($slt == $sp[0]->sp_soluong){
                $msg = "201";
      return response()->json(array('msg'=> $msg), 200);
              }
            }
        }
    }
    public function swdathang(){
         $id = Auth::id();
        $giohang = giohang::all();
        $user = user::where('id',$id)->get();
        $sanpham = sanpham::all();
        $hinhanh = hinhsp::all();
        $loai = loai::all();
        $diachi = DB::select('SELECT * FROM diachi where user_ma =?',[$id]);
        $diachisw = diachi::all();
        if($diachi == null){
            return redirect()->route('ttkh');
        }else{
           return view('dathang',['giohang'=>$giohang,'sanpham'=>$sanpham,'hinhanh'=>$hinhanh,'loai'=>$loai,'user'=>$user,'diachi'=>$diachi]);
        }
    }


    public function TTKH(){
            $id = Auth::id();
            if($id == null){
                return redirect()->route('login');
            }else{
            $user = user::where('id',$id)->get();
        $sanpham = sanpham::all();
        $hinhanh = hinhsp::all();
        $loai = loai::all();
        #$donhang = donhang::where('user_ma',$id)->get();
        $donhang = DB::select("SELECT * FROM donhang where user_ma =?  Order By dh_ma DESC",[$id]);
        $chitietdonhang = chitietdonhang::all();
        return view('donhang',['sanpham'=>$sanpham,'hinhanh'=>$hinhanh,'loai'=>$loai,'user'=>$user,'donhang'=>$donhang,'chitietdonhang'=>$chitietdonhang]);
    }



    }
    public function dathangajax(){
         $id = Auth::id();
        $giohang =  DB::select('SELECT * FROM giohang where id_user =?',[$id]);
        $user = user::where('id',$id)->get();
        $sanpham = sanpham::all();
        $hinhanh = hinhsp::all();
        $total = 0;
        foreach($giohang as $gh){
            $sp = sanpham::where('sp_ma',$gh->sp_ma)->first();
            $tong = $sp->sp_giaban * $gh->soluong;
            $total += $tong;

        }
        $loai = loai::all();
        $diachi =  DB::select('SELECT * FROM diachi where user_ma =?',[$id]);
        return view('showdh',['giohang'=>$giohang,'sanpham'=>$sanpham,'hinhanh'=>$hinhanh,'loai'=>$loai,'user'=>$user,'diachi'=>$diachi,'total'=>$total]);
    }
    public function multiajax($id,$sl){
        $id_user = Auth::id();
        if($id_user == null){
            abort();
        }else{
         $giohang = DB::select('SELECT * FROM giohang WHERE gh_ma=(SELECT MAX(gh_ma) FROM giohang)');
        
        
        $i = 0;
        if($giohang == null){
            $i = 1;
        }else{
        foreach ($giohang as $key) 
            $i = $key->gh_ma + 1  ;
         }
        $select = DB::select('
            SELECT * FROM giohang where sp_ma =? and id_user = ?',[$id,$id_user]
            );
        $sp = sanpham::where('sp_ma',$id)->get();
        if($select == null){
            $giohang = new giohang();
            $giohang->gh_ma = $i;
            $giohang->sp_ma = $id;
            $giohang->soluong = $sl;
            $giohang->id_user = $id_user;
            $giohang->save();
        }else {
            $slt = $select[0]->soluong +$sl;
            if($sl > $sp[0]->sp_soluong){
                $slt = $sp[0]->sp_soluong;         
            }else{
                $slt = $sl;
            }
              DB::select('update giohang set
                    soluong = ?
                    where sp_ma = ?',
                    [
                        $slt,
                        $id
                    ]);
              if($slt == $sp[0]->sp_soluong){
                $msg = "201";
      return response()->json(array('msg'=> $msg), 200);
              }
            }
        }
    }


    public function adddonhang(Request $request){
        $id_user = Auth::id();
        $slgh = giohang::where('id_user',$id_user)->get();
        DB::select('update users set phone =? where id = ?',[$request->phone,$id_user]);
        $iddonhang = DB::table('donhang')->get();
         $i = 0;
        if($iddonhang == ""){
            $i = 1;
        }else{
        foreach ($iddonhang as $key) 
            $i = $key->dh_ma + 1  ;
         }
         $total = 0;
         foreach($slgh as $slsp){
             $sp = sanpham::where('sp_ma',$slsp->sp_ma)->first();
            $tong = $sp->sp_giaban * $slsp->soluong;
            $total += $tong;
         }
        $donhang = new donhang();
        $donhang->dh_ma = $i;
        $donhang->user_ma = $id_user;
        $donhang->dh_trangthai = 0;
        $donhang->dh_thanhtien = $total;
        $donhang->dh_diachigiaohang = $request->diachisl;
        $donhang->dh_thoigiandathang =Carbon::now();
        $donhang->save();

         


        foreach($slgh as $slsp){
            $idctdh = DB::table('chitietdonhang')->get();
            $j = 0;
         if($idctdh == ""){
            $j = 1;
        }else{
        foreach ($idctdh as $key) 
            $j = $key->id + 1  ;
         }
            $sp = sanpham::where('sp_ma',$slsp->sp_ma)->first();
            $chitietdonhang = new chitietdonhang();
            $chitietdonhang->id = $j;
            $chitietdonhang->sp_ma = $slsp->sp_ma;
            $chitietdonhang->dh_ma = $i;
            $chitietdonhang->ctdh_soluong = $slsp->soluong;
            $chitietdonhang->ctdh_giagoc = $sp->sp_giagoc*$slsp->soluong;
            $chitietdonhang->ctdh_dongia = $sp->sp_giaban*$slsp->soluong;
            $chitietdonhang->save();
        }
        DB::select('DELETE from giohang where id_user =?',[$id_user]);

            return redirect()->route('ttkh');

    }
    public function diachi(){
        $id = Auth::id();
            if($id == null){
                return redirect()->route('login');
            }else{
            $user = user::where('id',$id)->get();
        $sanpham = sanpham::all();
        $hinhanh = hinhsp::all();
        $loai = loai::all();
        $donhang = donhang::where('user_ma',$id)->get();
        $diachi = diachi::all();
        $chitietdonhang = chitietdonhang::all();
        return view('diachi',['sanpham'=>$sanpham,'hinhanh'=>$hinhanh,'loai'=>$loai,'user'=>$user,'donhang'=>$donhang,'chitietdonhang'=>$chitietdonhang,'diachi'=>$diachi]);
        }
    }
    public function address(Request $request){
                $diachi = new diachi();
                $iddiachi = DB::table('diachi')->get();
         $i = 0;
        if($iddiachi == ""){
            $i = 1;
        }else{
        foreach ($iddiachi as $key) 
            $i = $key->id + 1  ;
         }
         $diachi->id = $i;
         $diachi->name = $request->tenuser;
         $diachi->address = $request->tp ."/".$request->address;
         $diachi->user_ma = Auth::id();

         $diachi->save();
         DB::select('UPDATE users SET phone = ? where id = ?',[$request->phone,Auth::id()]);
         return redirect()->route('swdathang');
    }   
    public function huydon($id){
        DB::select('DELETE FROM chitietdonhang where dh_ma = ?',[$id]);
        DB::select('DELETE FROM donhang where dh_ma =?',[$id]);
        return redirect()->route('ttkh');

    }

    public function logincontroller(Request $request){
                $user = User::where('name','=',$request->Email)->first();

                if($user == null){
                     return redirect('login')->with('notice','Tài Không Khoản tồn tại!');
                }
            if($user->password == md5($request->password)){
                Auth::login($user);
                return redirect()->route('home');
        }else{

            return redirect('login')->with('notice','Tài Khoản không chính xác!');
        }
    }
    public function registeraccount(Request $request)
    {
        $userad = new User();
        $user = DB::select('SELECT * FROM users');
        $checkmail = User::where('email','=',$request->email)->first();
        $checkname = User::where('name','=',$request->name)->first();
        if ($request->password == "") {
              return redirect('register')->with('notice2','mật khẩu trống!');
        }
        if ($checkmail != null) {
              return redirect('register')->with('notice1','Email đã tồn tại!');
        }
        if ($checkname != null) {
              return redirect('register')->with('notice','Tài Khoản đã tồn tại!');
        }
        
        $i = 0;
        if($user == null){
            $i = 1;
        }else{
        foreach ($user as $key) 
            $i = $key->id + 1  ;
         }

         $userad->id = $i;
         $userad->name = $request->name;
         $userad->email = $request->email;
         $userad->password = md5($request->password);
         $userad->save();
         $users = User::where('name','=',$request->name)->first();
         Auth::login($users);
         return redirect()->route('home');

    }
    public function postchat(Request $request){
        $data = $request->chat;
        $user_id = Auth::id();
        $chat = new chat();
        $chatid = DB::select('SELECT * FROM chat');
        $i = 0;
        if($chatid == null){
            $i = 1;
        }else{
        foreach ($chatid as $key) 
            $i = $key->id + 1  ;
         }
        $chat->id = $i;
        $chat->user_ma = $user_id;
        $chat->ad_ma = null;
        $chat->mes = $data;
        $chat->trangthai = 0;
        $chat->save();
    }
    public function showchat(){
        $user_id = Auth::id();
        $chat = chat::where('user_ma','=',$user_id)->get();
         DB::select('UPDATE chat SET trangthai =1 where user_ma=? and ad_ma = 1',[$user_id]);
        return view('chat',['chat'=>$chat]);
    }
    public function loadslchat(){
            $user = Auth::id();
            $chat = DB::select('SELECT * From chat where user_ma = ? and ad_ma =1 and trangthai = 0',[$user]);
            $i = 0;
            foreach($chat as $ct){
                $i++;
            }
            echo $i;
    }


    public function showsearch($sp){
       $spsl = sanpham::where('sp_ten', 'LIKE', "%$sp%")->paginate(8);
       $hinhanh = hinhsp::all();
       /*foreach($spsl as $ssp){
        $hinhanh = DB::select('SELECT * from hinhanhsanpham where sp_ma = ?',[$ssp->sp_ma]);

        echo "<div class='e-search'>";
        echo "<a href='{{url(/sp,$ssp->sp_ma)}}'><div><img src='https://localhost/Server/public/".$hinhanh[0]->hinhanh."' width='200px' height='200px'></div>";
        echo "<div>".$ssp->sp_ten."</div></a>";
        echo "</div>";
        */
        return view('shsearch',['spsl'=>$spsl,'hinhanh'=>$hinhanh]);
       }
       public function doimk(){
        $id = Auth::id();
            if($id == null){
                return redirect()->route('login');
            }else{
            $user = user::where('id',$id)->get();
        $sanpham = sanpham::all();
        $hinhanh = hinhsp::all();
        $loai = loai::all();
        $donhang = donhang::where('user_ma',$id)->get();
        $diachi = diachi::all();
        $chitietdonhang = chitietdonhang::all();
        return view('doimk',['sanpham'=>$sanpham,'hinhanh'=>$hinhanh,'loai'=>$loai,'user'=>$user,'donhang'=>$donhang,'chitietdonhang'=>$chitietdonhang,'diachi'=>$diachi]);
       }
   }
    
}
