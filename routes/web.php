<?php
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AcessoController;
use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', InicioController::class)->name('home');
Route::get('/acesso', [AcessoController::class, 'login'])->name('usuarios.login');
Route::get('cadastro', [AcessoController::class, 'cadastro'])->name('usuarios.cadastro');
Route::post('inicio', [AcessoController::class, 'cadastramento'])->name('usuarios.cadastramento');
Route::get("/",[AcessoController::class,"deslogar"])->name("usuarios.deslogar");
Route::post("painel",[AcessoController::class,"autenticar"])->name("usuario.autenticar");
Route::get("painel",[AcessoController::class,"autenticar"])->name("usuario.autenticar");

Route::get("/cadastro_pessoa",[PessoaController::class,"cadastro"])->name("pessoa.cadastro");