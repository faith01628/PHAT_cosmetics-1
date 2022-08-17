<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'name' => 'required|unique:products|max:255|min:10',
            'price' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'contents'=> 'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Name cannot be blank', 
            'name.unique' => 'Name must be unique',
            'name.max' => 'Name cannot be longer than 255 characters',
            'name.min' => 'Name cannot be shorter than 10 characters',
            'price.required' => 'Price cannot be blank',
            'category_id.required' => 'Category cannot be blank',
            'brand_id.required' => 'Brand cannot be blank',
            'contents.required' => 'Content cannot be blank'
        ];
    }

}
