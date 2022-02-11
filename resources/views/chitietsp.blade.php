@extends('welcome')

@section('content')

<div class="re-home">
    <a href="{{url('/home')}}">Home</a><span></span>
    <a href="{{url('/sp',$selectloai[0]->l_ma)}}">{{$selectloai[0]->l_ten}}</a><span></span>
    <a>{{$select[0]->sp_ten}}</a>
</div>
<div class="chitietsp">
	<div class="sanpham">
	@foreach($select as $sp)
		 @foreach($hinhanhsanpham as $hinhanhsp)
            @if($hinhanhsp->sp_ma == $sp->sp_ma)
        <div class="img-ct"><img src="http://localhost:8000/Server/public/{{$hinhanhsp->hinhanh}}" width='250' height="250"></div>
        @endif
        @endforeach

        <div class="t-right">
	<div class="sp-ten">{{$selectloai[0]->l_ten}} : {{$sp->sp_ten}}</div>
	<div class="danhgia">
		<div>Đánh giá sản phẩm</div>
		<img src="./images/imgsp/star.png">
		<img src="./images/imgsp/star.png">
		<img src="./images/imgsp/star.png">
		<img src="./images/imgsp/star.png">
		<img src="./images/imgsp/star.png">
	</div>
	<div class="giaban"><span>Giá Bán:</span>
	<div class="sp-giaban" id="giaban">{{$sp->sp_giaban}}</div></div>
	 <div class="input-group">
	 	<span>Số Lượng:</span>
  			<input type="button" value="-" class="button-minus" data-field="quantity" id="bt-">
 			 <input type="number" step="1" max="" value="1" name="quantity" class="quantity-field" id="number">
  				<input type="button" value="+" class="button-plus" data-field="quantity" id="bt+">
  						<div style="color:black">Sản phẩm còn lại:<div class="sp-soluong" id="sl">{{$sp->sp_soluong}}</div>
  					</div>
  					@if($sp->sp_soluong == 0)
			<div style="color:red;">Sản phẩm đã hết hàng</div>

			@endif	
			</div>


			<div class="gr-buy"><button class="buy-now">
				Mua Ngay
			</button>

			<button class="add-to-cart" onclick='multicart({{$sp->sp_ma}})'>
				Thêm Vào Giỏ Hàng
			</button></div>
	</div>
		@endforeach
		<div class="ship">
			<div style="color:black; font-size: 12px;">Tùy chọn giao hàng</div>
			<div class="icon-ship"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
  <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
  <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
<div class="vsit">Hồ Chí Minh, Quận 1, Phường Phạm Ngũ Lão</div>
<div class="chage"><a href="" style="color:white;">THAY ĐỔI</a></div>
</div>
	<div style="margin-left: 5px; margin-top: 15px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg>Giao Hàng Tiêu Chuẩn</div>
<div style ="margin-top:15px; border-bottom:1px solid #202020;padding-bottom: 30px;">
	Thanh toán khi nhận hàng. (Không được đồng kiểm)
</div>
<div style="color:black; font-size: 12px;margin-top:25px;">Đổi trả và Bảo hành</div>
<div style ="margin-top:-10px;">
	<p>7 ngày trả hàng cho Nhà bán hàng</p>
Được trả hàng với lý do "Không vừa ý"
</div>
<div style ="margin-top:20px;">
	Không áp dụng chính sách bảo hành
</div>



		</div>

		
</div>
</div>
<div class="mtsp">
	<div class="motasp" style="font-weight: bold; color:black">Mô tả sản phẩm {{$selectloai[0]->l_ten}}:{{$select[0]->sp_ten}}</div>
	<div class="motact">{{$select[0]->sp_thongtin}}</div>
</div>
<div class="mtsp">
	<div style="margin-top:20px;margin-bottom: 10px; color: black; font-weight:bold;">Nhận xét sản phẩm:</div>
	<div><textarea cols="165" rows="5"></textarea></div>
</div>
@endsection