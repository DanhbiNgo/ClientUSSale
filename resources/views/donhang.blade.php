@extends('thongtinkh')

@section('donhang')
<div class="ttgh">
		<div class="list-dh">
		<div class="all"><a href="javascript::">Tất Cả</a></div>
		<div class="cxn"><a href="javascript::">Chờ Xác Nhận</a></div>
		<div class="clh"><a href="javascript::">Chờ Lấy Hàng</a></div>
		<div class="dg"><a href="javascript::">Đang Giao</a></div>
		<div class="dged"><a href="javascript::">Đã Giao</a></div>
	</div>
<div class="sw-donhang">
 	@foreach($donhang as $dh)
 		@if($dh->user_ma == Auth::id())
 		<div class="ct-donhang">
 			<div class="me-donhang">
 				<div>Tên Sản phẩm</div>
 				<div>Giá Sản phẩm</div>
 				<div>Số lượng</div>
 				<div>Giá</div>
 			</div>
 			@foreach($chitietdonhang as $ctdh)
 				@if($dh->dh_ma == $ctdh->dh_ma)
 				@foreach($sanpham as $sp)
 					@if($ctdh->sp_ma == $sp->sp_ma)
 					<div class="ctdh-donhang">
 					<div>{{$sp->sp_ten}}</div>
 					<div class="giadh">{{$sp->sp_giaban}}</div>
 					<div>{{$ctdh->ctdh_soluong}}</div>
 					<div class="giadh">{{$sp->sp_giaban * $ctdh->ctdh_soluong}}</div>

 				</div>
 					@endif
 				@endforeach
 				@endif
 				


 			@endforeach

 			<div class="tong-dh">
 			<div><div>Tổng Tiền</div>
 				<div class="giadh">{{$dh->dh_thanhtien}}</div>
 			</div>
 		@if($dh->dh_trangthai == 0)
 			<div style="color:red;">Chờ xác nhận</div>
 			<div><a href="{{url('huydon',$dh->dh_ma)}}"><button style="height: 40px;
    margin-top: 10px;
    cursor: pointer;
    width: 100px;
    background: #ee4d2d;
    border: none;
    color: white;">Hủy Đơn</button></a></div>
 			@else
 				<div style="background:limegreen"><button style="color:black; background: limegreen; border:none;">Đã Xác Nhận,Đang Vận Chuyển!</button></div>
 		@endif
 		</div>
 	</div>
 		@endif



 	@endforeach
</div>
<script>
	var gia = document.getElementsByClassName("giadh");
	for(var i = 0 ;i < gia.length; i++){
		var number = gia[i].innerHTML;
 var ngia   = Number(number).toFixed(3).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
var sbgia = ngia.substring(0,ngia.indexOf('.'));
	gia[i].innerHTML =sbgia+" VNĐ";
}


</script>
@endsection
