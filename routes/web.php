<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;
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

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');

Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato.request');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato.salvar');

Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login.index');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login.autenticar');

Route::middleware('log.acesso', 'autenticacao:padrao')->prefix('/app')->group(function() {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [\App\Http\Controllers\LoginController::class, 'sair'])->name('app.sair');
    
    //Fornecedores
    Route::get('/fornecedor', [\App\Http\Controllers\FornecedoresController::class, 'index'])->name('app.fornecedor');
    Route::post('/fornecedor/listar', [\App\Http\Controllers\FornecedoresController::class, 'listar'])->name('app.fornecedor.listar.teste');
    Route::get('/fornecedor/listar', [\App\Http\Controllers\FornecedoresController::class, 'listar'])->name('app.fornecedor.listar');
    Route::post('/fornecedor/adicionar', [\App\Http\Controllers\FornecedoresController::class, 'adicionar'])->name('app.fornecedor.adicionar.teste');
    Route::get('/fornecedor/adicionar', [\App\Http\Controllers\FornecedoresController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{message?}', [\App\Http\Controllers\FornecedoresController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', [\App\Http\Controllers\FornecedoresController::class, 'excluir'])->name('app.fornecedor.excluir');
    
    //Produtos
    Route::resource('produto', \App\Http\Controllers\ProdutoController::class);

    //Produtos Detalhes
    Route::resource('produto-detalhe', \App\Http\Controllers\ProdutoDetalheController::class);

    //Clientes-Pedidos-Produtos
    Route::resource('cliente', \App\Http\Controllers\ClienteController::class);
    
    Route::resource('pedido', \App\Http\Controllers\PedidoController::class);

    Route::get('pedido-produto/create/{pedido}', [\App\Http\Controllers\PedidoProdutoController::class, 'create'])->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', [\App\Http\Controllers\PedidoProdutoController::class, 'store'])->name('pedido-produto.store');
    Route::delete('pedido-produto.destroy/{pedidoProduto}', [\App\Http\Controllers\PedidoProdutoController::class, 'destroy'])->name('pedido-produto.destroy');
});

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste');




