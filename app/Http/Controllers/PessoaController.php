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
        $registros_pessoas = Pessoa::orderby("id","asc")->paginate();
        return view("pessoas.listagem_pessoas",["registros"=>$registros_pessoas]);
    }

    public function exibir_edicao($codigo_pessoa)
    {
        $registro_localizado = Pessoa::find($codigo_pessoa);
        return view("pessoas.editar",["pessoa"=>$registro_localizado]);
    }

    public function edita(Request $dados,$codigo_pessoa)
    {
        $registro_localizado = Pessoa::find($codigo_pessoa);

        $registro_localizado->nome = $dados->nome_pessoa;
        $registro_localizado->idade = $dados->idade_pessoa;
        $registro_localizado->cidade = $dados->cidade_pessoa;

        $registro_localizado->save();    
        //return redirect()->route("pessoa.cadastro")->with("sucesso","Pessoa cadastrada com sucesso");    
        return redirect()->route("buscar.pessoas");
    }

    public function exibir_modal_delecao($codigo_pessoa)
    {
        $registros_pessoas = Pessoa::orderby('id', 'asc')->paginate();
        return view('pessoas.listagem_pessoas', ['registros' => $registros_pessoas, 'codigo_recebido' => $codigo_pessoa]);
    }

    public function exclusao_pessoa($codigo_pessoa)
    {
        $registro_localizado = Pessoa::find($codigo_pessoa);
        $registro_localizado->delete();
        return redirect()->route('buscar.pessoas');
    }
}