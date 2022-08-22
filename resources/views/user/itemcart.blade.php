@if (Session::has('Cart') != null)

    <div class="select-items">
        <table>
            <tbody>
                @foreach (Session::get('Cart')->carts as $item)
                    <tr>
                        <td class="si-pic"><img src="/user/image/{{ $item['cartInfo']->img }}" width="50%"
                                alt=""></td>
                        <td class="si-text">
                            <div class="product-selected">
                                <p>{{ number_format($item['cartInfo']->price) }}₫
                                    x {{ $item['quantity'] }}</p>
                                <h6>{{ $item['cartInfo']->name }}</h6>
                            </div>
                        </td>
                        <td class="si-close">
                            <i class="glyphicon glyphicon-remove" data-id="{{ $item['cartInfo']->product_id }}"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="select-total">
        <span>total:</span>
        <h5>{{ number_format(Session::get('Cart')->totalPrice) }}₫</h5>
        <input type="number" id="total-quantity-cart" hidden value="{{ Session::get('Cart')->totalquantity }}">
    </div>

@endif
@if (Session::has('Cart') != null)
    <div class="select-button">
        <a href="{{ url('List-Carts') }}" class="primary-btn view-card">VIEW CARD</a>
        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
    </div>
@endif
