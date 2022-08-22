@extends('layouts.client')

@section('title')
    <title>Home Page</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('user/css/home.css') }}">
@endsection

@section('js')
    <script src="{{ asset('user/js/home.js') }}"></script>
@endsection

@section('content')
    <section id="slider">
        <!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>x</span>xxxx</h1>
                                    <h2>xxxxxxx</h2>
                                    <p>xxxxxxxxxxxxxxxxxxxxxxx </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="/user/image/3ce.jpg" class="girl img-responsive" alt=""
                                        width="450px" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>100% Responsive Design</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="/eshopper/images/user/girl2.jpg" class="girl img-responsive" alt="" />
                                    <img src="/eshopper/images/user/pricing.png" class="pricing" alt="" />
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free Ecommerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="/eshopper/images/user/girl3.jpg" class="girl img-responsive" alt="" />
                                    <img src="/eshopper/images/user/pricing.png" class="pricing" alt="" />
                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row">

                @include('components.sidebar')

                <div class="col-sm-9 padding-right">

                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">Hot Deal</h2>
                        @foreach ($carts as $prd)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productsinfo">
                                            <img src="/user/image/{{ $prd->img }}" />
                                            <div class="sales-products">
                                                <strong class="off-sales">{{ number_format($prd->price) }}đ</strong>
                                                <span class="sales">{{ number_format($prd->price) }}đ</span>
                                                <span class="on-sales">{{ number_format($prd->price) }}đ</span>
                                            </div>
                                            <div class="">
                                                <strong>{{ $prd->name }}</strong>
                                            </div>
                                            <h2 class="name-sales">
                                                <div>{{ $prd->name }}</div>
                                            </h2>
                                            <div>
                                                <a onclick="AddCart({{ $prd->cart_id }})" class="btn btn-default add-to-cart"
                                                    role="button"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                <span class="gift-sales">{{ $prd->name }}</s>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--features_items-->


                    <div class="category-tab">
                        <!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
                                <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
                                <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
                                <li><a href="#kids" data-toggle="tab">Kids</a></li>
                                <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tshirt">
                                @foreach ($carts as $prd)
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo">
                                                    <img src="/user/image/{{ $prd->img }}" />
                                                    <h2>{{ number_format($prd->price) }}đ</h2>
                                                    <p>{{ $prd->name }}</p>
                                                    <a onclick="AddCart({{ $prd->cart_id }})"
                                                        class="btn btn-default add-to-cart" role="button"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="tab-pane fade" id="blazers">
                                @foreach ($carts as $prd)
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo">
                                                    <img src="/user/image/{{ $prd->img }}" />
                                                    <h2>{{ number_format($prd->price) }}đ</h2>
                                                    <p>{{ $prd->name }}</p>
                                                    <a onclick="AddCart({{ $prd->cart_id }})"
                                                        class="btn btn-default add-to-cart" role="button"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="tab-pane fade" id="sunglass">
                                @foreach ($carts as $prd)
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo">
                                                    <img src="/user/image/{{ $prd->img }}" />
                                                    <h2>{{ number_format($prd->price) }}đ</h2>
                                                    <p>{{ $prd->name }}</p>
                                                    <a onclick="AddCart({{ $prd->cart_id }})"
                                                        class="btn btn-default add-to-cart" role="button"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="tab-pane fade" id="kids">
                                @foreach ($carts as $prd)
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo">
                                                    <img src="/user/image/{{ $prd->img }}" />
                                                    <h2>{{ number_format($prd->price) }}đ</h2>
                                                    <p>{{ $prd->name }}</p>
                                                    <a onclick="AddCart({{ $prd->cart_id }})"
                                                        class="btn btn-default add-to-cart" role="button"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="tab-pane fade" id="poloshirt">
                                @foreach ($carts as $prd)
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo">
                                                    <img src="/user/image/{{ $prd->img }}" />
                                                    <h2>{{ number_format($prd->price) }}đ</h2>
                                                    <p>{{ $prd->name }}</p>
                                                    <a onclick="AddCart({{ $prd->cart_id }})"
                                                        class="btn btn-default add-to-cart" role="button"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--/category-tab-->

                    <div class="recommended_items">
                        <!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    @foreach ($carts as $prd)
                                    <div class="col-sm-2">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo">
                                                    <img src="/user/image/{{ $prd->img }}" />
                                                    <h2>{{ number_format($prd->price) }}đ</h2>
                                                    <p>{{ $prd->name }}</p>
                                                    <a onclick="AddCart({{ $prd->cart_id }})"
                                                        class="btn btn-default add-to-cart" role="button"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                                <div class="item">
                                    @foreach ($carts as $prd)
                                    <div class="col-sm-2">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo">
                                                    <img src="/user/image/{{ $prd->img }}" />
                                                    <h2>{{ number_format($prd->price) }}đ</h2>
                                                    <p>{{ $prd->name }}</p>
                                                    <a onclick="AddCart({{ $prd->cart_id }})"
                                                        class="btn btn-default add-to-cart" role="button"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel"
                                data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>
@endsection
