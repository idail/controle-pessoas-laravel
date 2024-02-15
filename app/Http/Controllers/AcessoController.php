<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadUsuarioRequest;
use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AcessoController extends Controller
{
    public function login(){
        return view("acesso.index");
    }

    public function cadastro(){
        return view("acesso.cadastro");
    }

    public function cadastramento(CadUsuarioRequest $dados)
    {
        $dados->validated();
        
        $usuario = new User();
        $usuario->nome  = $dados->nome_usuario;
        $usuario->email_usuario = $dados->email_usuario;
        $usuario->senha = $dados->senha_usuario;
        $usuario->usuario = $dados->usuario;

        $usuario->save();

        session()->put("nome_usuario",$dados->nome_usuario);
        return view('template.painel_pessoa');
    }

    public function deslogar()
    {
        session()->forget("nome_usuario");
        return view("acesso.index");
    }

    public function autenticar(UsuarioRequest $solicitacao_autenticar)
    {
        if(session()->has("nome_usuario")){
            return view("template.painel_pessoa");
        }else{
            $solicitacao_autenticar->validated();
            
            $recebe_usuario = $solicitacao_autenticar->nome_acesso;
            $recebe_senha = $solicitacao_autenticar->senha_acesso;

            $usuario = User::where("usuario","=",$recebe_usuario)->where("senha","=",$recebe_senha)->first();

            if($usuario)
            {
                session()->put("nome_usuario",$usuario->nome);
                return view("template.painel_pessoa");
            }else{
                session()->flash("dados_errados","Favor verificar os dados para acesso");
                return redirect()->back();
            }
        }
    }

    public function inicio()
    {
        return view("template.painel_pessoa");
    }
}