<?php

namespace App\Http\Controllers;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function cadastro(){
        return view("pessoas.cadastro");
    }

    public function cadastramento_pessoa(Request $dados)
    {
        $pessoa = new Pessoa();

        $pessoa->nome = $dados->nome_pessoa;
        $pessoa->idade = $dados->idade_pessoa;
        $pessoa->cidade = $dados->cidade_pessoa;

        $pessoa->save();    
        //return redirect()->route("pessoa.cadastro")->with("sucesso","Pessoa cadastrada com sucesso");    
        return redirect()->route("buscar.pessoas");
    }

    public function pessoas()
    {
        $registros_pessoas = pessoa::orderby("id","desc")->paginate();
        return view("pessoas.listagem_pessoas",["registros"=>$registros_pessoas]);
    }

    public function exibir_edicao(pessoa $registro)
    {
        //$verificando = pessoa::find($registro);
        dd($registro);
        //return view("pessoas.editar",["pessoa"=>$registro]);
    }
}