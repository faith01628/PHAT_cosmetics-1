@extends('layouts.client')

@section('title')
    <title>Register Page</title>
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
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                            <form role="form" action="{{ url('user/postRegister') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="input-icons">
                                    <i class="fa fa-user icon"></i>
                                    <input class="form-control input-field" id="txt-name" name="name" type="text" placeholder="Name"/>
                                </div>
                                <div class="input-icons">
                                    <i class="fa fa-envelope icon"></i>
                                    <input class="form-control input-field" id="txt-email" name="email" type="email" placeholder="Email"/>
                                </div>
                                <div class="input-icons">
                                    <i class="fa fa-location-arrow icon"></i>
                                    <input class="form-control input-field" id="txt-address" name="address" type="text" placeholder="Address"/>
                                </div>
                                <div class="input-icons">
                                    <i class="fa fa-key icon"></i>
                                    <input class="form-control input-field" id="txt-password" name="password" type="password" placeholder="Password"/>
                                </div>
                                <div class="input-icons">
                                    <i class="fa fa-key icon"></i>
                                    <input class="form-control input-field" id="txt-confirmpassword" name="confirmpassword" type="password" placeholder="Confirm Password"/>
                                </div>
                                <select class="gender" id="txt-gender" name="gender">
                                    <option>-----Select-----</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <div class="input-icons">
                                    <i class="glyphicon glyphicon-credit-card"></i>
                                    <input class="form-control input-field" id="txt-national_id" name="national_id" type="text" placeholder="National_id">
                                </div>
                                <div class="input-icons">
                                    <i class="fa fa-calendar icon"></i>
                                    <input class="form-control input-field" id="txt-birthday" name="birthday" type="text" placeholder="Birthday">
                                </div>
                                <div class="input-icons">
                                    <i class="fa fa-phone icon"></i>
                                    <input class="form-control input-field" id="txt-phone" name="phone" type="text" placeholder="Phone No.">
                                </div>
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->



@endsection
