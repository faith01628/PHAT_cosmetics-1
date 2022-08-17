<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlideCreateRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteModelTrait;

class SliderAdminController extends Controller
{
    use DeleteModelTrait;
    use StorageImageTrait;
    private $slider;
    public function __construct(Slider $slider) {
        $this->slider = $slider;
        
    }
    
    public function index() {
        $sliders= $this->slider->latest()->paginate(5); 
        return view('admin.slider.index', compact('sliders'));
    }
    
    public function create() {
        return view('admin.slider.create');
    }

    public function store(SlideCreateRequest $request) {
        try {
            $dataInput = [
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if(!empty($dataImageSlider)) {
                $dataInput['image_path'] = $dataImageSlider['file_path'];
                $dataInput['image_name'] = $dataImageSlider['file_name'];
            }
            $this->slider->create($dataInput);
            return redirect()->route('sliders.index');
        } catch (\Exception $exception) {
            Log::error('Error:' . $exception->getMessage() . '----------- Line: ' . $exception->getLine() . '-------------- Code: ' . $exception->getCode());
        }  
    }

    public function edit($id) {
        $slider = $this->slider->find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SlideCreateRequest $request, $id) {
        try {
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if(!empty($dataImageSlider)) {
                $dataUpdate['image_path'] = $dataImageSlider['file_path'];
                $dataUpdate['image_name'] = $dataImageSlider['file_name'];
            }
            $this->slider->find($id)->update($dataUpdate);
            return redirect()->route('sliders.index');
        } catch (\Exception $exception) {
            Log::error('Error:' . $exception->getMessage() . '----------- Line: ' . $exception->getLine());
        }
    }

    public function delete($id) {
        return $this->deleteModelTrait($id, $this->slider);
    }












}
