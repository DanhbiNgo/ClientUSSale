@extends('thongtinkh')

@section('donhang')


<div class="diachi">
	<div class="diachi-top">
	<div>Địa Chỉ Của Tôi</div>
	<div ><button onclick="Hidediachi()">+Thêm Địa Chỉ Mới</button></div>
	</div>
	<div class="diachi2">
	@foreach($user as $us)
		@foreach($diachi as $dc)
			@if($dc->user_ma == $us->id)
			<div class="diachi3">
			<div><span>Họ và Tên</span>{{$dc->name}}</div>
			<div><span>Số Điện Thoại</span>{{$us->phone}}</div>
			<div><span>Địa Chỉ</span>{{$dc->address}}</div>
			<div class="xoadc"><a href="">Xóa</a></div>
			</div>
			@endif
		@endforeach
	@endforeach
	</div>
</div>


<div class="cre-diachi">
	<div class="diachi1">
		<form action="{{url('/address')}}" method="POST"> 
			@csrf
		<div><h3>Địa Chỉ Mới</h3></div>
		<div><input type="text" value="" placeholder="Họ và Tên" name="tenuser"></div>
		<div><input type="text" placeholder="Số điện thoại" name="phone"></div>
		<div><select name="tp">
			<option>TP.Hồ Chí Minh</option>
			<option>Cần Thơ</option>
			<option>Vĩnh Long</option>
			<option>Cà Mau</option>
			<option>Tiền Giang</option>
			<option>Bạc Liêu</option>
			<option>Sóc Trăng</option>
			<option>An Giang</option>
			<option>Bến Tre</option>
			<option>Long An</option>
		</select></div>
		<div><input type="text" placeholder="Địa Chỉ Cụ Thể" name="address"></div>

		<div>
			<input type="submit" name="Hoàn Thành">
		</div>
		<div>
			<a href="javascript::" onclick="Hide()">Trở Lại</a>
		</div>
	</form>
	</div>
</div>
<script type="text/javascript">
	function Hidediachi(){
		document.getElementsByClassName('cre-diachi')[0].style.display="block";
	}
	function Hide(){
		document.getElementsByClassName('cre-diachi')[0].style.display="none";
	}
</script>
@endsection