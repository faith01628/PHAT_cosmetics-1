<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductShowController extends Controller
{

    public function category($slug, $categoryId) {
        $categories = Category::where('parent_id', 0)->get();
        $brands = Brand::latest()->get();
        $categoryMenus = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::where('category_id', $categoryId)->paginate(6);
        return view('products.category.list', compact('categoryMenus', 'products', 'categories', 'brands'));
    }

    public function brand($slug, $brandId) {
        $categories = Category::where('parent_id', 0)->get();
        $brands = Brand::latest()->get();
        $categoryMenus = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::where('brand_id', $brandId)->paginate(6);
        return view('products.brand.list', compact('categoryMenus', 'products', 'categories', 'brands'));
    }
    

    public function productDetails($id) {
        $products = Product::all();
        $product = Product::where('id', $id)->first();
        $categories = Category::where('parent_id', 0)->get();
        $brands = Brand::latest()->get();
        $categoryMenus = Category::where('parent_id', 0)->take(3)->get();
        $productRecommend = Product::latest('views_count', 'desc')->take(12)->get();
        return view('products.product.productDetails', compact('categoryMenus', 'categories', 'brands', 'productRecommend', 'product', 'products'));
    }  


      
}
