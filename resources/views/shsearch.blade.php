@foreach($spsl as $sp)
	@foreach($hinhanh as $ha)
	@if($sp->sp_ma == $ha->sp_ma)
	<div class='e-search'>
		<a href="{{url('/ctsp',$sp->sp_ma)}}">
			<div><img src="https://localhost/Server/public/{{$ha->hinhanh}}" width="200px" height="200px"></div>
			<div>{{$sp->sp_ten}}</div>
		</a>
	</div>
	@endif
	@endforeach
@endforeach