<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskClientes;
use App\Http\Controllers\TaskProdutos;
use App\Http\Controllers\TaskPedidos;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//rotas de cliente 

Route::get('/listar-clientes',[TaskClientes::class, 'index']);

Route::get('/cliente-cadastrar',[TaskClientes::class, 'create']);

Route::post('/cliente-store',[TaskClientes::class, 'store']);

Route::get('/cliente-update/{id}',[TaskClientes::class, 'edit']);

Route::post('/update-cliente/{id}',[TaskClientes::class, 'update']);

Route::get('/excluir-cliente/{id}',[TaskClientes::class, 'destroy']);


// rotas de produtos

Route::get('/listar-produtos',[TaskProdutos::class, 'index']);

Route::get('/produto-cadastrar',[TaskProdutos::class, 'create']);

Route::post('/produto-store',[TaskProdutos::class, 'store']);

Route::get('/produto-update/{id}',[TaskProdutos::class, 'edit']);

Route::post('/update-produto/{id}',[TaskProdutos::class, 'update']);

Route::get('/excluir-produto/{id}',[TaskProdutos::class, 'destroy']);

//rotas de pedidos

Route::get('/listar-pedidos',[TaskPedidos::class, 'index']);

Route::get('/pedido-cadastrar',[TaskPedidos::class, 'create']);

Route::post('/pedido-store',[TaskPedidos::class, 'store']);
