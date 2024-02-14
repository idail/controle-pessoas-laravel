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
            "nome_usuario" => "required",
            "email_usuario" => "required",
            "usuario" => "required",
            "senha_usuario" => "required",
        ];
    }

    public function messages()
    {
        return [
            "nome_usuario.required" => "Favor preencher o nome do usuário",
            "email_usuario.required" => "Favor preencher o e-mail do usuário",
            "usuario.required" => "Favor preencher o usuário",
            "senha_usuario.required" => "Favor preencher a senha do usuário"
        ];
    }
}
