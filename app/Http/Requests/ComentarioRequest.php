<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComentarioRequest extends FormRequest
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
            
            'content' =>'required|string|min:1|max:1000',
            'topico_id'
        ];
    }

    public function messages(){
        return [
            'required' => 'Campo Obrigatorio',
            
            'content.min' => 'o minimo da resposta é 1 caracters',
            'title.max' => 'o maximo do resposta é 100 caracters',
        ];
    }
}
