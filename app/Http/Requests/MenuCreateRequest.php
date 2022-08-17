<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:menus|max:255',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Name cannot be blank', 
            'name.unique' => 'Name must be unique',
            'name.max' => 'Name cannot be longer than 255 characters',
        ];
    }
}
