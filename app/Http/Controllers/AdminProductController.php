<?php

namespace App\Http\Controllers;

use App\Components\Recursive;
use App\Components\brandDisplay;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    private $category;
    private $brand;

    public function __construct(Category $category, Brand $brand){
        $this->category = $category;
        $this->brand = $brand;
    }
    

    public function index() {
        return view('admin.product.index');
    }

    public function create() {
        $htmlOption = $this->getCategory($parentId = ' ');
        $htmlBrand = $this->getBrand();
        return view('admin.product.create', compact('htmlOption', 'htmlBrand'));
    }


    public function getCategory($parentId) {
        $data = $this->category->all;
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parentId);
        return $htmlOption;
    }

    public function getBrand() {
        $brandDisplay = new brandDisplay();
        $htmlBrand = $brandDisplay->brandDisplay();
        return $htmlBrand;
    }








}
