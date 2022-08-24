@extends('layouts.client')

@section('title')
    <title>Cart Details</title>
@endsection

@section('css')
    <link href="{{ asset('home/home.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('home/home.js') }}"></script>
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
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $cartItem)
                        <tr class="product_data">
                            <td class="cart_product">
                                <a href=""><img src="{{ $cartItem->products->featured_image_path }}" alt="" height="150px"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{ $cartItem->products->name }}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>$ {{ $cartItem->products->price }}</p>
                            </td>
                            <td class="cart_quantity">
                                <input type="hidden" class="prod_id" value="{{ $cartItem->prod_id }}">
                                <div class="input-group text-center mb-3" style="width: 130px">
                                    <button class="input-group-text increment-btn">+</button>
                                    <input class="form-control text-center qty-input" type="text" name="quantity" value="{{ $cartItem->prod_qty }}"
                                        autocomplete="off" size="2">
                                    <button class="input-group-text decrement-btn">-</button>
                                </div>
                                {{-- <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href=""> + </a>
                                    
                                    <a class="cart_quantity_down" href=""> - </a>
                                </div> --}}
                            </td>
                            <td class="cart_total">
                                {{-- <p class="cart_total_price">$59</p> --}}
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                    delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>$59</span></li>
                            <li>Eco Tax <span>$2</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>$61</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#do_action-->

@endsection
