<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
           'nikname' => 'required',
           'password'=> 'required'
        
        ];
    }

    public function messages(){
        return [
            'required' => 'Campo Obrigatorio',
            'password.min' => 'o minimo da senha é 8 caracters',
            'password.max' => 'o maximo do senha é 20 caracters',
        ];
    }
}
