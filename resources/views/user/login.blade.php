@extends('layouts.client')

@section('title')
    <title>Login Page</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('user/css/home.css') }}">
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('user/js/home.js') }}">
@endsection

@section('content')



    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-2">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form role="form" action="{{ url('user/postLogin') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="input-icons">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="email" placeholder="Email"/>
                            </div>
                            <div class="input-icons">
                                <i class="fa fa-key icon"></i>
                                <input class="input-field" type="text" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <span>
                                        <input type="checkbox" value="1">
                                        Keep me signed in
                                    </span>
                                </label>
                                <a href="" class="popup-forgot txt_color_1 pull-right">Forgot your password?</a>
                            </div>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                        Do not have an account?
                        <a href="{{ asset('user/register') }}" class="txt_color_1 text-uppercase popup-login-dismiss popup-register">Create Account</a>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
                <div class="col-sm-4">
                    <div class="login-form"><!--login form-->
                        <h2>Other logins</h2>
                        <div>
                            Click here to login as admin:
                            <a href="{{ url('/admin') }}" class="txt_color_1 text-uppercase popup-login-dismiss popup-register">Login as Admin</a>
                        </div>
                        <div>
                            Click here to sign in with your Google account:
                            <a href="{{ url('/admin') }}" class="txt_color_1 text-uppercase popup-login-dismiss popup-register">Login as Admin</a>
                        </div>
                    </div><!--/login form-->
				</div>
            </div>
        </div>
    </section><!--/form-->



@endsection
