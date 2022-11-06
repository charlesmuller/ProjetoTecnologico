<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColecaoFormRequest extends FormRequest
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
            'nome' => ['required', 'min:3'] //nome obrigatório e pelo menos 3 caracteres
        ];
    }
    public function messages()
    {
        return [
            'nome.required' => "O nome da coleção é obrigatório!",
            'nome.min' => "O nome da coleção precisa ter pelo menos :min caracteres!"
        ];
    }
}
