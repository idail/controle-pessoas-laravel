<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nome_usuario" => "required|min:5|max:50",
            "email_usuario" => "required|email|unique:usuario",
            "usuario" => "required",
            "senha_usuario" => "required",
        ];
    }

    public function messages()
    {
        return [
            "nome_usuario.required" => "Favor preencher o nome do usuário",
            "nome_usuario.min"=> "O nome do usuário precisa ter no minimo 5 caracteres",
            "nome_usuario.max"=> "O nome do usuário precisa ter no maxiumo 50 caracteres",
            "email_usuario.required" => "Favor preencher o e-mail do usuário",
            "email_usuario.email"=> "Favor informar um e-mail valido",
            "email_usuario.unique"=> "Email ja consta cadastrado",
            "usuario.required" => "Favor preencher o usuário",
            "senha_usuario.required" => "Favor preencher a senha do usuário"
        ];
    }
}
