@extends('thongtinkh')
@section('donhang')
	<div class="uppass">
		<div><h3>Đổi Mật Khẩu</h3></div>
		<form action="" method="POST"> 
			@csrf
		<div style="margin-bottom: 5px;"><span style="margin-right: 73px;">Mật khẩu cũ:</span><input type="password" name=""></div>
		<div style="margin-bottom: 5px;"><span style="margin-right: 63px;">Mật khẩu Mới:</span><input type="password" name=""></div>
		<div style="margin-bottom: 5px;"><span style="">Nhập lại Mật khẩu Mới:</span><input type="password" name=""></div>
		<div><center><button style="color: rgb(255, 255, 255);
    cursor: pointer;
    width: 113px;
    background: rgb(51, 181, 229);
    border-color: transparent; cursor: no-drop;">Sửa</button></center></div>
		</form>
	</div>
@endsection