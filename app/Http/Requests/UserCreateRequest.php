<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'name' => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name cannot be blank', 
            'name.unique' => 'Name must be unique',
            'name.max' => 'Name cannot be longer than 255 characters',
            'email.required' => 'Email cannot be blank', 
            'email.unique' => 'Email must be unique',
            'email.max' => 'Email cannot be longer than 255 characters',
            'password.required' => 'Password cannot be blank',
            ];
    }
}
