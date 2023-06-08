<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicoRequest extends FormRequest
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
            
            'title' =>'required|string|min:10|max:100',
            'description' =>'required|string|min:1|max:1000',
            'forum_id'
        ];
    }

    public function messages(){
        return [
            'required' => 'Campo Obrigatorio',
            'title.min' => 'o minimo do titulo é 10 caracters',
            'description.min' => 'o minimo da descrição é 1 caracters',
            'title.max' => 'o maximo do titulo é 100 caracters',
            'description.max' => 'o maximo da descrição é 1000 caracters',
        ];
    }
}
