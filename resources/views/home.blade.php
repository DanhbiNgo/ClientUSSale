@extends('welcome')

@section('content')
<div style="margin-top: -120px;">
    <a href=""><img id='slide' width='100%'; height="667px"></a>
    <div style="text-align:center;margin-top: -30px;">
  <span class="dot" onclick="currentSlide(0)"  onmouseover="stop()">o</span> 
  <span class="dot" onclick="currentSlide(1)" onmouseover="stop()">o</span> 
  <span class="dot" onclick="currentSlide(2)" onmouseover="stop()">o</span> 
    <span class="dot" onclick="currentSlide(3)" onmouseover="stop()">o</span> 
  <span class="dot" onclick="currentSlide(4)" onmouseover="stop()">o</span> 
  <span class="dot" onclick="currentSlide(5)" onmouseover="stop()">o</span>
</div>
<div class="new-pd">
    <div style="position: absolute;
    width: 100%; z-index: 1;">
    <h2><center>Sản Phẩm Mới</center></h2>

        @foreach($sanpl as $spl)
        <div class="loop-pr">
            @foreach($hinhanhsanpham as $hinh)
                @if($hinh->sp_ma == $spl->sp_ma)
                <img src="http://localhost:8000/Server/public/{{$hinh->hinhanh}}" width="250px" height="250px" style="margin-top: 20px;margin-bottom: 40px;">
                @endif
            @endforeach
            <div style="margin-bottom: 10px; color:white;">{{$spl->sp_ten}}</div>
            <a href="{{url('ctsp',$spl->sp_ma)}}"><div class="ctsp" style="color: white;
    border: 1px solid;">Chi tiết</div></a>
        </div>
        @endforeach

</div>
    <img src="./images/imgbanner/c6d522f6.jpg"  width="100%" style="opacity: 1;    margin-top: 8px;">
    

</div>
</div>
<footer>
    <div class="" style="position: relative; bottom: 0; text-align: center; width: 100%; z-index: 1;background: black;">
        <div>Danh</div>
        <div>CopyRight:Danh</div>
        <div>FB:DanhNguyen</div>
        <div>Zalo:DanhNguyen(0706528785)</div>
    </div>
</footer>
<script>
    var i = 0;
    var timer;
    var path= [];
    path[0] = "./images/imgbanner/4kGame.jpg";
path[1] = "./images/imgbanner/All-1620383654.jpg";
path[2] = "./images/imgbanner/MODE-1630657381.jpg";
path[3] = "./images/imgbanner/1616999865.jpg";
path[4] = "./images/imgbanner/X-1620613780.jpg";
path[5] = "./images/imgbanner/1616039837.jpg";

function chageimage(){
    document.getElementById("slide").src = path[i];
    if(i<path.length - 1){
    i++;
}else{
    i = 0;
}
setTimeout("chageimage()",3000);
}

/*function stop(){
    clearTimeout(timer);
}*/
function currentSlide(x){
     document.getElementById("slide").src = path[x];
}
    function run(){
    chageimage();
}
</script>
@endsection
