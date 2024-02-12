<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function cadastro(){
        return view("pessoas.cadastro");
    }
}