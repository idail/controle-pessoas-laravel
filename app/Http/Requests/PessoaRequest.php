<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaRequest extends FormRequest
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
            "nome_pessoa" => "required",
            "idade_pessoa" => "required",
            "cidade_pessoa" => "required",
        ];
    }

    public function messages()
    {
        return [
            "nome_pessoa.required" => "Favor preencher o nome da pessoa",
            "idade_pessoa.required" => "Favor preencher a idade da pessoa",
            "cidade_pessoa.required" => "Favor preencher a cidade da pessoa"
        ];
    }
}
