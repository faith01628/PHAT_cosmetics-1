<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandCreateRequest;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    private $brand;
    
    public function __construct(Brand $brand) {
        $this->brand= $brand;  
    }

    public function index() {
        $brands = $this->brand->latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function create() {
        return view('admin.brand.create');
    }

    public function store(BrandCreateRequest $request) {
        $this->brand->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('brands.index');
    }

    public function edit($id) {
        $brand = $this->brand->find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update($id, BrandCreateRequest $request) {
        $this->brand->find($id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('brands.index');
    }


    public function delete($id) {
        $this->brand->find($id)->delete();
        return redirect()->route('brands.index');

    }
}
