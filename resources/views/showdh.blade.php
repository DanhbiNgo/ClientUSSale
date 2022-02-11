@foreach($giohang as $gh)
	@if($gh->id_user == Auth::user()->id)
<div class="alldathang">
			@foreach($sanpham as $sp)
			@if($sp->sp_ma == $gh->sp_ma)
			@foreach($hinhanh as $ha)
				@if($sp->sp_ma == $ha->sp_ma)
			<div><img src="http://localhost:8000/Server/public/{{$ha->hinhanh}}" width="100px" height="100px"></div>
				@endif
			@endforeach
			<div>{{$sp->sp_ten}}
			</div>
			<div id="giadh" class="giadh">{{$sp->sp_giaban*$gh->soluong}}</div>
			<div class="sp-soluong" id="sl">{{$sp->sp_soluong}}</div>
			@endif
			@endforeach
				<div class="input-group">
  			<input type="button" value="-" class="button-minus1" data-field="quantity" id="bt-" onclick="clicksub({{$gh->sp_ma}})">
 			 <input type="number" step="1" max="" value="{{$gh->soluong}}" name="quantity" class="input-max" id="number" onkeyup="change({{$gh->sp_ma}},this.value)">
  				<input type="button" value="+" class="button-plus1" data-field="quantity" id="bt+" onclick="clickadd({{$gh->sp_ma}})">
			</div>
			<div><span class="deletedh" onclick="deletedh({{$gh->gh_ma}})">&times;</span></div>

		</div>
		@endif
@endforeach
</div>
<div class="muahang">
	<div class="chosedc">
		<form action="{{url('/dathang')}}" method="POST">
			@csrf
	<div class="adres">
		<div>Chọn Địa Chỉ:</div>
	<div><select name="diachisl">
	@foreach($diachi as $dc)
 	<option>{{$dc->address}}</option>
 	@endforeach
	 </select>
	</div>
	<a href="javascript::" style="text-decoration: none;
    color: wheat;
    background: black;
    cursor: pointer;
    border: 1px solid;
    border-radius: 5px;" onclick="Hidediachi()">Thêm mới</a>
	 </div>
	 @foreach($user as $us)
	 	@if($us->id== Auth::id())
	 	<div class="sdt">
	 		<div>Số Điện Thoại:</div>
	 <div><input type="text" name="phone" value="{{$us->phone}}"></div>
	</div>
	 	@endif
	 @endforeach
	<div class="buy">
	<div>Tổng Tiền:</div>
	<div class="giadh">{{$total}}</div>
 		<div><button>Mua Ngay</button></div>
 	</form>
 	</div>

 	</div>
 <div class="cre-diachi" style="top:20%">
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
 <script>
	var gia = document.getElementsByClassName("giadh");
	for(var i = 0 ;i < gia.length; i++){
		var number = gia[i].innerHTML;
 var ngia   = Number(number).toFixed(3).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
var sbgia = ngia.substring(0,ngia.indexOf('.'));
	gia[i].innerHTML =sbgia+" VNĐ";
}
function Hidediachi(){
		document.getElementsByClassName('cre-diachi')[0].style.display="block";
	}
	function Hide(){
		document.getElementsByClassName('cre-diachi')[0].style.display="none";
	}
</script>
<script type="text/javascript" src="js/ctsp.js"></script>