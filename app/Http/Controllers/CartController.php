<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request ) {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check()) {
            $prod_check = Product::where('id', $product_id)->first();
            
            if($prod_check) {
                if(Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name." Already added to cart"]);
                } else {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name." Added to cart"]);
                }
                
            }
            
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    public function viewCart() {
        $categoryMenus = Category::where('parent_id', 0)->take(3)->get();

        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('cart.view', compact('cartItems','categoryMenus'));

    }

    public function deleteProduct(Request $request) {

        if(Auth::check()) {
            $prod_id = $request->input('prod_id');
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => 'Product deleted']);
            }
        }
        else{
            return response()->json(['status' => 'Log in to Continue']);
        }
        
    }

}
