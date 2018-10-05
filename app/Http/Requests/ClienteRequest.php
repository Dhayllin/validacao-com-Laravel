<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * ver se o que ele edita está relacionado a ele. assim não permitindo a edição.
     * Rules  e permissions.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            "nome.required"=>'Preencha um nome.',
            "nome.min"=>'Mínimo de 5 caracteres.',
            "nome.max"=>'Máximo de 100 caracteres.',
            "email.required"=>'Preencha um E-mail.',
            "email.max"=>'Mínimo de 255 caracteres.',
            "email.email"=>'Preencher um e-mail válido.',
            "imagem.required"=>"Preencha uma imagem",
            "imagem.mimes"=>"Apenas imagem PNG",
            "email.unique"=>"Esse e-mail já está cadastrado no sistema",
            "numero.num_par" => "Apenas número par"
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'=>'required|min:5|max:100',
            'email'=>'sometimes|required|min:5|max:255|email|unique:users',
            'imagem'=>'required|mimes:png',
            'numero'=> 'num_par'
        ];
    }
}
