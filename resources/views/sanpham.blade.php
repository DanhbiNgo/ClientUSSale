@extends('welcome')

@section('content')
<div class="re-home">
    <a href="{{url('/home')}}">Home</a><span></span>
    <a>{{$selectloai[0]->l_ten}}</a>
</div>
<div class="stick-filter">
    @foreach($select as $sanpham)
    <div class="product">
        @foreach($hinhanhsanpham as $hinhanhsp)
            @if($hinhanhsp->sp_ma == $sanpham->sp_ma)
        <div class="img"><img src="http://localhost:8000/Server/public/{{$hinhanhsp->hinhanh}}" width='250' height="250"></div>
        @endif
        @endforeach
        <div class="content">{{$sanpham->sp_ten}}</div>
        <div class="giasp" style="text-align: center; height: 30px;">{{$sanpham->sp_giaban}}</div>
        <a href="{{url('/ctsp',$sanpham->sp_ma)}}"><div class="ctsp">Chi tiết</div></a>
        <a href="javascript::" onclick="addcart({{$sanpham->sp_ma}})"><div class="ctsp">Thêm Giỏ</div></a>
    </div>

    @endforeach

</div>
    <div>{{$select->links("pagination::bootstrap-4")}}</div>

    <script>
    var gia = document.getElementsByClassName("giasp");
    for(var i = 0 ;i < gia.length; i++){
        var number = gia[i].innerHTML;
 var ngia   = Number(number).toFixed(3).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
var sbgia = ngia.substring(0,ngia.indexOf('.'));
    gia[i].innerHTML =sbgia+" VNĐ";
}
</script>
@endsection