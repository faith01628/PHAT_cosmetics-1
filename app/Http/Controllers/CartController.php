<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $carts = DB::table('carts')->get();
        return view('user.home', compact('carts'));
    }

    public function AddCart(Request $request, $cart_id)
    {
        $cart = DB::table('carts')->where('cart_id', $cart_id)->first();
        if ($cart != null) {
            $oldcart = Session::get('Cart') ? Session::get('Cart') : null;
            $newcart = new Cart($oldcart);
            $newcart->AddCart($cart, $cart_id);

            $request->session()->put('Cart', $newcart);
        }
        return view('user.itemcart');
    }

    public function DeleteItemCart(Request $request, $cart_id)
    {
        $oldcart = Session::get('Cart') ? Session::get('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->DeleteItemCart($cart_id);
        if (Count($newcart->carts) > 0) {
            $request->Session()->put('Cart', $newcart);
        } else {

            $request->Session()->forget('Cart');
        }
        return view('user.itemcart');
    }

    public function ViewListCart()
    {
        return view('user.cart');
    }

    public function DeleteListItemCart(Request $request, $cart_id)
    {
        $oldcart = Session::get('Cart') ? Session::get('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->DeleteItemCart($cart_id);
        if (Count($newcart->carts) > 0) {
            $request->Session()->put('Cart', $newcart);
        } else {

            $request->Session()->forget('Cart');
        }
        return view('user.list-cart');
    }

    public function SaveListItemCart(Request $request, $cart_id, $quantity)
    {
        $oldcart = Session::get('Cart') ? Session::get('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->UpdateItemCart($cart_id, $quantity);
        $request->Session()->put('Cart', $newcart);
        return view('user.list-cart');
    }
}
