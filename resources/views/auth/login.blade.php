@extends('layouts.app')

@section('content')
<div class="header">
        <div class="header-main">
               <h1>Đăng Nhập</h1>
            <div class="header-bottom">
                <div class="header-right w3agile">
                    
                    <div class="header-left-bottom agileinfo">
                        
                     <form action="{{ url('logincontrol') }}" method="post">
                        @csrf
                        <input type="text" id="accout" value="Tên Đăng Nhập" autocomplete="off" name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User name';}"/>
                    <input type="password"  value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}"/>
                        <div class="remember">
                         <span class="checkbox1">
                               <label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Ghi Nhớ</label>
                         </span>
                         <div class="forgot">
                            <h6><a href="#">Quên Mật Khẩu?</a></h6>
                         </div>
                        <div class="clear"> </div>
                        @if(SESSION('notice'))
                            <div style="color:red; text-align: center;">{{session('notice')}}</div>
                        @endif
                      </div>
                       
                        <input type="submit" value="Đăng Nhập">
                    
                    <div>
                        <center><a href="{{ route('register') }}" style="color: white; padding-top: 20px; text-decoration: none;">Bạn chưa có tài khoản?</a></center>
                    </div>
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
