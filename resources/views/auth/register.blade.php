@extends('layouts.app')

@section('content')
<div class="header">
        <div class="header-main">
               <h1>Đăng Kí Tài Khoản</h1>
            <div class="header-bottom">
                <div class="header-right w3agile">
                    
                    <div class="header-left-bottom agileinfo">
                        
                     <form action="{{ url('resign') }}" method="POST">
                        @csrf
                        <input type="text" id="accout" value="Tên Đăng Nhập" autocomplete="off" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User name';}"/>
                        @if(SESSION('notice'))
                            <div style="color:red; text-align: center;">{{session('notice')}}</div>
                        @endif
                        <input type="text" id='gmail' value="Gmail" autocomplete="off" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Gmail';}"/>
                         @if(SESSION('notice1'))
                            <div style="color:red; text-align: center;">{{session('notice1')}}</div>
                        @endif
                         <h6 style="color:white;">Nhập mật khẩu:</h6>
                    <input type="password" onkeyup="checknull(this)" placeholder="******" value="" name="password" id="password" />
                    @if(SESSION('notice2'))
                            <div style="color:red; text-align: center;">{{session('notice2')}}</div>
                        @endif
                        <div class="remember">
                         <div class="forgot">
                         </div>
                        <div class="clear"> </div>
                      </div>
                       
                        <input type="submit" value="Đăng Kí">
                    
                    <div class="header-left-top">
                        <div class="sign-up"> <h2>or</h2> </div>

                    
                    </div>
                    
                    <div class="header-social wthree">
                            <a href="{{route('login.facebook')}}" class="face"><h5>Facebook</h5></a>
                            <a href="{{route('login.google')}}" class="twitt"><h5>Google</h5></a>
                        </div>
                        </form> 
                        
                </div>
                </div>
              
            </div>
        </div>
</div>
<!--header end here-->
<div class="copyright">
</div>

@endsection
