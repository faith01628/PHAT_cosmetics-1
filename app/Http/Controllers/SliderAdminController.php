<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlideCreateRequest;
use Illuminate\Http\Request;

class SliderAdminController extends Controller
{
    public function index() {
        return view('admin.slider.index');
    }
    
    public function create() {
        return view('admin.slider.create');
    }

    public function store(SlideCreateRequest $request) {
        
        
    }


















}
