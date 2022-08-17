<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideCreateRequest extends FormRequest
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
            'name' => 'required|unique:sliders|max:255',
            'description' => 'required',
            'image_path' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name cannot be blank', 
            'name.unique' => 'Name must be unique',
            'name.max' => 'Name cannot be longer than 255 characters',
            'description.required' => 'Description cannot be blank',
            'image_path.required' => 'Image must be inserted',
        ];
    }

}
