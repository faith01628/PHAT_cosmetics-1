@extends('layouts.client')

@section('title')
    <title>Cart Page</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('user/css/home.css') }}">
@endsection

@section('js')
    <script src="{{ asset('user/js/home.js') }}"></script>
@endsection

@section('content')



    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info" id="list-carts">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Image</td>
                            <td class="p-name">Product Name</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td class="save">Save</td>
                            <td class="delete">Delete</td>
                        </tr>
                    </thead>
                    <tbody>

                        @if (Session::has('Cart') != null)
                            @foreach (Session::get('Cart')->carts as $item)
                                <tr>
                                    <td class="cart_product">
                                        <img src="/user/image/{{ $item['cartInfo']->img }}">
                                    </td>
                                    <td class="cart_description">
                                        <h4>{{ $item['cartInfo']->name }}</h4>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{ number_format($item['cartInfo']->price) }}₫</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="quantity">
                                            <div class="pro-qty cart_quantity_button">
                                                <input class="cart_quantity_input"
                                                    id="quantity-item-{{ $item['cartInfo']->cart_id }}" type="text"
                                                    name="quantity" value="{{ $item['quantity'] }}" size="3">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart_total cart_total_price">
                                        {{ number_format($item['price']) }}₫
                                    </td>
                                    <td class="cart_save cart_quantity_save">
                                        <i class="fa fa-save"
                                            onclick="SaveListItemCart({{ $item['cartInfo']->cart_id }});"></i>
                                    </td>
                                    <td class="cart_delete cart_quantity_delete">
                                        <i class="fa fa-times"
                                            onclick="DeleteListItemCart({{ $item['cartInfo']->cart_id }});"></i>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        @endif


                    </tbody>
                </table>



            </div>
            @if (Session::has('Cart') != null)
                <div class="row">
                    <div class="col-lg-4 offset-lg-8 pull-right">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Subtotal:
                                    <span id="total-quantity-list-show">{{ number_format(Session::get('Cart')->totalquantity) }}</span>
                                </li>
                                <li class="cart-total">Total:
                                    <span id="total-price-list-show">{{ number_format(Session::get('Cart')->totalPrice) }}₫</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </section>
    <!--/#cart_items-->



@endsection
