<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required||between:5,30',
            'rut'=> 'required|between:8,10',
            'username' => 'required|between:5,10|unique:users,username',
            'email' =>'required|unique:users,email',
            'password' => 'required|between:8,20',
            'password_confirmation' => 'required|same:password',
            'cargo' => 'required|between:3,30'
        ];
    }
}
