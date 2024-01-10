@extends('admin.app.login_template')
@section('content')
    <style>
        .loginWrapper {
            float: unset;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        #loginForm {
            float: unset;
        }
    </style>
    <div class="loginWrapper">
        <div id="loginForm">
            <div class="title-nb">
                Đăng nhập vào Admin
            </div>
            <form action="{{ route('admin.auth.login') }}" class="form" method="POST">
                @csrf
                <fieldset>
                    <div class="formRow">
                        <div class="loginInput"><input type="text" name="user_name" placeholder="Tên người dùng" class="validate[required]" id="username"></div>
                        <div class="clear"></div>

                        @error('user_name')
                        {{ $message }}
                        @enderror
                    </div>

                    <div class="formRow">
                        <div class="loginInput"><input type="password" name="password" placeholder="Mật khẩu" class="validate[required]" id="pass"></div>
                        <div class="clear"></div>

                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="q-mk"><a href=""></a><a href="../../quen-mat-khau-shop.html">Quên mật khẩu ?</a></div>
                    <div class="loginControl">
                        <input type="submit" value="Đăng nhập" class="dredB logMeIn">
                        <div class="clear"></div>
                    </div>
                    <div class="ajaxloader"><img src="images/loader.gif" alt="loader"></div>
                    <div id="loginError">
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="clear"></div>
    </div>
@endsection
