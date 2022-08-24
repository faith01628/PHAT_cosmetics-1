<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i>
                                    {{ getConfigValuefromSettings('phone_no') }}</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i>
                                    {{ getconfigValuefromSettings('Email') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ getconfigValuefromSettings('facebook_link') }}" target="_blank"><i
                                        class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ getconfigValuefromSettings('linkedin_link') }}" target="_blank"><i
                                        class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{ getconfigValuefromSettings('twitter_link') }}" target="_blank"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ getconfigValuefromSettings('instagram_link') }}" target="_blank"><i
                                        class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="{{ asset('user/home') }}"><img src="{{ asset('user/image/logo.png') }}" alt=""
                                width="150px" /></a>
                    </div>
                    <div class="btn-group pull-right clearfix">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle vietnam"
                                data-toggle="dropdown">
                                Việt Nam
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">English</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle vietnam"
                                data-toggle="dropdown">
                                VND
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">DOLLAR</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="navbar-nav ml-auto">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">My Profile</a>
                                    <a class="dropdown-item" href="{{ url('cart') }}">My Cart</a>

                                    <a class="dropdown-item" href="{{ URL::to('/logout') }}">
                                        {{ __('Logout') }}

                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <div class="search_box pull-right">
                                <input type="text" placeholder="Search" />
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <!--main-menu-->
                    @include('components.main-menu')
                    <!--/main-menu-->
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>
<!--/header-->
