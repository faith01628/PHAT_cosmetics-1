<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> {{ getConfigValuefromSettings('phone_no')}}</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> {{ getconfigValuefromSettings('Email') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ getconfigValuefromSettings('facebook_link') }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ getconfigValuefromSettings('linked_link') }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{ getconfigValuefromSettings('twitter_link') }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ getconfigValuefromSettings('instagram') }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
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
                        <ul class="nav navbar-nav">
                            <li><a href="{{ asset('user/login') }}"><i class="fa fa-lock"></i> Login</a></li>
                            <li><a href="{{ asset('user/register') }}"><i class="fa fa-user"></i> Register</a></li>
                            <li><a href="{{ asset('user/checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a>
                            </li>
                            <li class="cart-shop"><a href="{{ url('List-Carts') }}">
                                    <i class="fa fa-shopping-cart"></i> Cart
                                    @if (Session::has('Cart') != null)
                                        <span id="total-quanty-show">{{ Session::get('Cart')->totalQuanty }}</span>
                                    @else
                                        <span id="total-quanty-show">0</span>
                                    @endif
                                    </a>
                                <div class="cart-hover">
                                    <div id="change-item-cart">
                                        @if (Session::has('Cart') != null)

                                            <div class="select-items">
                                                <table>
                                                    <tbody>
                                                        @foreach (Session::get('Cart')->products as $item)
                                                            <tr>
                                                                <td class="si-pic"><img
                                                                        src="/user/image/{{ $item['productInfo']->img }}"
                                                                        width="50%" alt=""></td>
                                                                <td class="si-text">
                                                                    <div class="product-selected">
                                                                        <p>{{ number_format($item['productInfo']->price) }}₫
                                                                            x {{ $item['quanty'] }}</p>
                                                                        <h6>{{ $item['productInfo']->name }}</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="si-close">
                                                                    <i class="glyphicon glyphicon-remove"
                                                                        data-id="{{ $item['productInfo']->product_id }}"></i>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="select-total">
                                                <span>total:</span>
                                                <h5>{{ number_format(Session::get('Cart')->totalPrice) }}₫</h5>
                                            </div>

                                        @endif
                                        @if (Session::has('Cart') != null)
                                            <div class="select-button">
                                                <a href="{{ url('List-Carts') }}" class="primary-btn view-card">VIEW CARD</a>
                                                <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </li>
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
                    <<!--main-menu-->
                    @include('components.main-menu')
                    <<!--/main-menu-->
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>
<!--/header-->
