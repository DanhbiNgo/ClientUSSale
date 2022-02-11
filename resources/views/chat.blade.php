<div style="float:left;">
		<div class="img-ad"><img src="./images/ASSET-USER-ADMIN.png" width="40px" height="40px"></div>
		<div class="adchat" >
			Bạn Cần Giúp Gì?
		</div>
		</div>
		<div style="clear:left;"></div>
@foreach($chat as $mes)
	@if($mes->user_ma == Auth::id() && $mes->ad_ma == null)
		<div  style="float:right;">	
			<div class="userchat">{{$mes->mes}}
			<span></span></div>
			<div style="font-size:10px;"> {{$mes->created_at}}</div>
		</div>

	@endif
			<div style="clear:right"></div>
		@if($mes->ad_ma == 1 && $mes->user_ma == Auth::id())
		<div style="float:left;">
		<div class="img-ad"><img src="./images/ASSET-USER-ADMIN.png" width="40px" height="40px"></div>
		<div class="adchat" >
			{{$mes->mes}}
		</div>
		<div style="font-size:10px;"> {{$mes->created_at}}</div>
		</div>
		<div style="clear:left;"></div>
		@endif
@endforeach