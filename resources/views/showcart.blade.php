@foreach($giohang as $gh)
	@if($gh->id_user == Auth::user()->id)
<div class="allcart">
			@foreach($sanpham as $sp)
			@if($sp->sp_ma == $gh->sp_ma)
			@foreach($hinhanh as $ha)
				@if($sp->sp_ma == $ha->sp_ma)
			<div><img src="http://localhost:8000/Server/public/{{$ha->hinhanh}}" width="100px" height="100px"></div>
				@endif
			@endforeach
			<div>{{$sp->sp_ten}}
				<div id="giagh" class="giagh">{{$sp->sp_giaban}}</div>
			</div>

			@endif
			@endforeach
			<div id="slgh">X{{$gh->soluong}}</div>
			<div><span class="delete" onclick="deletecart({{$gh->gh_ma}})">&times;</span></div>

		</div>
		@endif
@endforeach
 <div class="dathang"><a href="{{url('swdathang')}}">Đặt Hàng</a></div>


<script>
	var gia = document.getElementsByClassName("giagh");
	for(var i = 0 ;i < gia.length; i++){
		var number = gia[i].innerHTML;
 var ngia   = Number(number).toFixed(3).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
var sbgia = ngia.substring(0,ngia.indexOf('.'));
	gia[i].innerHTML =sbgia+" VNĐ";
}
</script>
