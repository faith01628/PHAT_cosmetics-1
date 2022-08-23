<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $sliders = Slider::latest()->get();
        $categories = Category::where('parent_id', 0)->get();
        $brands = Brand::latest()->get();
        $products = Product::latest()->take(6)->get();
        $productRecommend = Product::latest('views_count', 'desc')->take(12)->get();
        $categoryMenus = Category::where('parent_id', 0)->take(3)->get();
        return view('home.home', compact('sliders', 'categories', 'brands', 'products', 'productRecommend', 'categoryMenus'));
    }













    
}
