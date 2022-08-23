@extends('layouts.client')

@section('title')
    <title>Home page</title>
@endsection

@section('css')
    <link href="{{ asset('home/home.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('home/home.js') }}"></script>
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                @include('components.sidebar')

                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">Features Items</h2>

                        @foreach ($products as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ $product->featured_image_path }}" alt="" />
                                            <h2>$ {{ number_format($product->price) }}</h2>
                                            <p>{{ $product->name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <a href="{{ route('detail.product', $product->id) }}" class="product_details">
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <h2>$ {{ number_format($product->price) }}</h2>
                                                    <p>{{ $product->name }}</p>
                                                    
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                        @endforeach

                        <div class="col-md-12">
                            {{ $products->links() }}
                        </div>


                    </div>
                    <!--features_items-->
                </div>
            </div>
        </div>
    </section>
@endsection
