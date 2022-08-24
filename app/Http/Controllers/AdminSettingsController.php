<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsCreateRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteModelTrait;

class AdminSettingsController extends Controller
{
    use DeleteModelTrait;
    private $setting;
    public function __construct(Setting $setting) {
        $this->setting = $setting;
    }
    
    public function index() {
        $settings = $this->setting->latest()->Paginate(5);
        return view('admin.setting.index', compact('settings'));
    }

    public function create() {
        return view('admin.setting.create');
    }

    public function store(SettingsCreateRequest $request) {
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type
        ]);
        return redirect()->route('settings.index');
    }

    public function edit($id) {
        $setting = $this->setting->find($id);
        return view('admin.setting.edit' , compact('setting'));
    }

    public function update(SettingsCreateRequest $request, $id) {
        $this->setting->find($id)->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value
        ]);
        return redirect()->route('settings.index');
    }

    public function delete($id) {
        return $this->deleteModelTrait($id, $this->setting);
    }

}