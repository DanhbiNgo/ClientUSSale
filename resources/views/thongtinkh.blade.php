@extends('welcome')

@section('content')

<div class="total-tt">
	<div class="ttkh">
		<div class="img-user"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg><p>{{$user[0]->name}}</p></div>

	<div style="    background: white;
    margin-bottom: 5px;    border: 1px solid;
    border-radius: 10px 0px 0px 10px;"><a href="javascript::" style="text-decoration: none;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
</svg>Tài Khoản của tôi</a></div>
<div style="margin-left: 20px;margin-left: 20px;
    background: wheat;
    padding-top: 5px;
    margin-top: -5px;">
	<div style="margin-bottom: 5px;"><a href="javascript::" style="text-decoration: none;"><span>Hồ Sơ</span></a></div>
	<div style="margin-bottom: 5px;"><a href="{{url('/diachi')}}" style="text-decoration: none;"><span>Địa chỉ</span></a></div>
	<div style="margin-bottom: 5px;"><a href="{{url('doimk')}}" style="text-decoration: none;"><span>Đổi Mật Khẩu</span></a></div>
</div>
<div style="    background: white;margin-top: -5px;    border: 1px solid;
    border-radius: 10px 0px 0px 10px;"><a href="{{url('/TTKH')}}" style="text-decoration: none;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
</svg>Đơn Mua</a></div>
</div>
	
	
	@yield('donhang')
	</div>

</div>
@endsection