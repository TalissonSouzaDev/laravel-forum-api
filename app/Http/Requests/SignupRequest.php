<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
           'nikname' => 'required|string|min:2|max:50,unique:users,nikname',
           'email'=> 'required|email|min:2|max:50,unique:users,email',
           'password'=> 'required|min:8|max:20',
           'profile'
        
        ];
    }

    public function messages(){
        return [
            'required' => 'Campo Obrigatorio',
            'nikname.unique' => 'Ops, esse nome ja existir',
            'email.unique' => 'Ops, esse email ja existir',
            'password.min' => 'o minimo da senha é 8 caracters',
            'password.max' => 'o maximo do senha é 20 caracters',
        ];
    }
}
