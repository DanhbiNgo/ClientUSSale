<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
    <base href="{{asset('')}}">
    <link rel="stylesheet" type="text/css" href="css/mainuser.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="css/ctsp.css">
     <link rel="stylesheet" type="text/css" href="css/TTKH.css">
     <link rel="stylesheet" type="text/css" href="css/dathang.css">
     <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body class="antialiased">
                <div id="app">
<nav>
    <div id="banner"></div>
     <div id="search-click" style="display: none;">
         <div class="logo">
            <a href=""><img src="images/imgbanner/logo.png"></a>
        </div>
        <div class="iput-search">
            <input type="text" name="" onkeyup="search(this)"  class="ssearch" onchange="research(this)">
            <a href="javascript::" class="btn-stop">
            <svg id='icon-s' xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
</a>
<a href="javascript::" class="btn-start"><svg id='icon-m' xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-mic" viewBox="0 0 16 16">
  <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5z"/>
  <path d="M10 8a2 2 0 1 1-4 0V3a2 2 0 1 1 4 0v5zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3z"/>
</svg></a>
        </div>
        <div class="cls-search"><span class="close" onclick="clsearch()">&times;</span></div>
     </div>
<div class="sh-search"></div>
<div class="void">
    <p>Mời bạn nói!</p>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mic" viewBox="0 0 16 16">
  <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5z"/>
  <path d="M10 8a2 2 0 1 1-4 0V3a2 2 0 1 1 4 0v5zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3z"/>
</svg>
    <p class="voice"></p>
</div>
    <div class="menu" id="menu">
        <div class="logo">
            <a href=""><img src="images/imgbanner/logo.png"></a>
        </div>
        <div class="drop-menu">
            <ul>
            <li class="li-1"><a href="#">SẢN PHẨM</a>
                <ul class="drop-one">
                      <div class="row-ls">
                    @foreach($loai as $loaisp)
                    <div class="ls-col">
                    <li class="li-11">
                        <div class="col-s">
                       <a href="{{url('/sp',$loaisp->l_ma)}}">
                        <img src="http://localhost:8000/Server/public/{{$loaisp->hinhanh}}">
                        <center>{{$loaisp->l_ten}}</center>
                       </a>
                         </div>
                    </li>
                    </div>
                    @endforeach
                    </div>
                </ul>
            </li>
            <li class="li-1"><a href="">KHÁM PHÁ</a>
                <ul class="drop-two">
                    <li><a href="">SẢN PHẨM MỚI</a></li>
                    <li><a href="">SỰ KIỆN</a></li>
                    <li><a href="">BLOG</a></li>
                </ul>

            </li>
            <li class="li-1"><a href="">DỊCH VỤ</a>
                <ul class="drop-three">
                    <li><a href="">CHĂM SÓC KHÁCH HÀNG</a></li>
                    <li><a href="">LIÊN HỆ</a></li>
                </ul>
            </li>
            <li class="li-1"><a href="">THÀNH VIÊN</a>
                <ul class="drop-fore">
                    <li><a href="{{url('/TTKH')}}">THÔNG TIN</a>
                    </li>
                    <li><a href="">SẢN PHẨM YÊU THÍCH</a>
                    </li>
                </ul>
            </li>
            </ul>
        </div>
        <div class="search-box">
            <div class="row">
                <div class="col-sm-4"><a href="javascript::" onclick="showsearch()"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>Tìm Kiếm</a>
                </div>
                <div class="col-sm-4"><a href="javascript::" onmouseover="showcart()" id="showhang">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
</svg>Giỏ Hàng</a>
@if (Auth::check())
<div class="showgh" id="showgh">
</div>
@else 
<div></div>
@endif

</div>
@if (Route::has('login'))
                <div class="col-sm-4">
@auth
<a href="{{ url('/TTKH') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{auth::user()->name}}</a>
<a href="{{url('/logout')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5z"/>
</svg></a>
@else
                    <a href="{{url('/login')}}" style="margin-top: -4px;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="1 0 16 13">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
</svg>Đăng Nhập</a>
    @endauth
</div>
            @endif
            </div>
        </div>
    </div>

</nav>
<main style="margin-top:120px;">
    @yield('content')
</main>
<div class="closechat" onclick="closechat()">&times;</div>
@if(Auth::check())
<div class="reqeschat" onload="loadslchat()">
    <div class="resq"></div>
</div>
 @endif
<div class="chatbox" id="chat" >
   <img src="./images/subscribe2.94fa63ee.svg" class="bi bi-envelope" onclick="chatbox()" >
<div class="inerchat">Chat</div>
<div class="box">
    @if(Auth::check())
    <div class="load-chat1" id="out" onload="settime()" onscroll="scrollfc()">
        <div class="load-chat">
            
        </div>
    
    </div>
</div>
<div class="chat">
    <input type="text" name="chat" id="iputchat" autocomplete="off">
      <button class="postchat" onclick="postchat()">Send</button>
      @else
            <div class="CheckDN"><a href="{{url('login')}}">Đăng Nhập</a>/<a href="{{url('register')}}">Đăng Kí</a></div>
    @endif
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script type="text/javascript" src="js/jsuser.js"></script>
<script type="text/javascript" src="js/search.js"></script>
    </body>
<script type="text/javascript" src="js/ctsp.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<script>
document.getElementsByClassName('load-chat1')[0].innerHTML="";
     var loadsl=function loadslchat(){
              $.ajax({
    url:'loadchat',
    type:'GET',

            }).done(function(response){

    $('.resq').html(response);
        });
    }
      setInterval(loadsl,2000);

      const onl = function settime(){

        swc();
      }
     var seol = setInterval(onl,1000);
      function chatbox(){
        var chat = document.getElementsByClassName('chatbox');
        chat[0].style.width='400px';
        chat[0].style.height='300px';

        document.getElementsByClassName('inerchat')[0].style.display='none';
        document.getElementsByClassName('bi bi-envelope')[0].style.display='none';
        document.getElementsByClassName('box')[0].style.display='block';
         document.getElementsByClassName('chat')[0].style.display='block';
         document.getElementsByClassName('closechat')[0].style.display='block';
         document.getElementsByClassName('reqeschat')[0].style.display='none';
         document.getElementsByClassName('load-chat1')[0].innerHTML="<div class='load-chat'></div>";
              $.ajax({
    url:'showchat',
    type:'GET',

            }).done(function(response){

    $('.load-chat').html(response);
        last = document.querySelector('.load-chat').lastElementChild;
        last.scrollIntoView();
        });


      } 


      $(".load-chat1").mouseenter(function(){
        last  = document.querySelector('.load-chat1');

        last.classList.add("active");
});
      $(".load-chat1").mouseleave(function(){
        last  = document.querySelector('.load-chat1');

        last.classList.remove("active");
});
  function scroller(){
       last  = document.querySelector('.load-chat');
       last.scrollTop = last.scrollHeight;
  }
      function swc(){
        var load1 =document.getElementsByClassName('load-chat1')[0].innerHTML;
        if(load1 != ""){
         last1 = document.querySelector('.load-chat1');
             $.ajax({
    url:'showchat',
    type:'GET',

            }).done(function(response){

    $('.load-chat').html(response);
        if(!last1.classList.contains("active")){
            last = document.querySelector('.load-chat').lastElementChild;
        last.scrollIntoView();
        }

        });
        }
      } 
      function closechat(){
        var chat = document.getElementsByClassName('chatbox');
        chat[0].style.width='95px';
        chat[0].style.height='95px';
        document.getElementsByClassName('box')[0].style.display='none';
         document.getElementsByClassName('chat')[0].style.display='none';
         document.getElementsByClassName('closechat')[0].style.display='none';
        document.getElementsByClassName('inerchat')[0].style.display='block';
        document.getElementsByClassName('bi bi-envelope')[0].style.display='block';
          document.getElementsByClassName('reqeschat')[0].style.display='block';
          document.getElementsByClassName('load-chat1')[0].innerHTML='';
      }
  function postchat(){
    var chat = document.getElementById('iputchat').value;
     let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
    url:'postchat',
    type:'POST',
    data:{
          chat:chat,
          _token: _token
          
        },

            }).done(function(response){

    //$('.load-chat').html(response);
    document.getElementById('iputchat').value='';
            //scroller();
            last = document.querySelector('.load-chat').lastElementChild;
        last.scrollIntoView();
            scroller();

        });

        

     }

     function scrollfc(){
       //clearInterval(set);
     }

</script>

</html>
