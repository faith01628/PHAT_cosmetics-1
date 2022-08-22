<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $carts = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct($cart){
        if($cart){
            $this->carts = $cart->carts;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        }
    }

    public function AddCart($cart, $cart_id){
        $newCart = ['quantity' => 0, 'price' => $cart->price, 'cartInfo' => $cart];
        if($this->carts){
            if (array_key_exists($cart_id, $this->carts)) {
                $newCart = $this->carts[$cart_id];
            }
        }
        $newCart['quantity']++;
        $newCart['price'] = $newCart['quantity'] * $cart->price;
        $this->carts[$cart_id] = $newCart;
        $this->totalPrice += $cart->price;
        $this->totalQuantity++;
    }

    public function DeleteItemCart($cart_id){
        $this->totalQuantity -= $this->carts[$cart_id]['quantity'];
        $this->totalPrice -= $this->carts[$cart_id]['price'];
        unset($this->carts[$cart_id]);
    }

    public function UpdateItemCart($cart_id, $quantity){
        $this->totalQuantity -= $this->carts[$cart_id]['quantity'];
        $this->totalPrice -= $this->carts[$cart_id]['price'];

        $this->carts[$cart_id]['quantity'] = $quantity;
        $this->carts[$cart_id]['price'] = $quantity * $this->carts[$cart_id]['cartInfo']->price;

        $this->totalQuantity += $this->carts[$cart_id]['quantity'];
        $this->totalPrice += $this->carts[$cart_id]['price'];
    }

}
