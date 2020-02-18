<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Minicurso FACAPE

//Listar todos os itens
Route::get('/mcf', ['as' => 'mcf.listar', 'uses' => 'MCFController@index']);

//Listar um item
Route::get('/mcf/{id}', ['as' => 'mcf.listar.um', 'uses' => 'MCFController@show']);

//Gravar um item (nunca colocar o nome salvar. Foi colocado apenas por questão didática)
Route::post('/mcf/salvar', ['as' => 'mcf.gravar', 'uses' => 'MCFController@store']);

//Deletar um item
Route::delete('/mcf/deletar/{id}', ['as' => 'mcf.deletar', 'uses' => 'MCFController@destroy']);

//Editar um item
Route::put('/mcf/editar/{id}', ['as' => 'mcf.gravar', 'uses' => 'MCFController@update']);



//PRODUTO

//Listar todos os itens
Route::get('/produto', ['as' => 'produto.listar', 'uses' => 'ProdutoController@index']);

//Listar um item
Route::get('/produto/{id}', ['as' => 'produto.listar.um', 'uses' => 'ProdutoController@show']);

//Gravar um item (nunca colocar o nome salvar. Foi colocado apenas por questão didática)
Route::post('/produto/salvar', ['as' => 'produto.gravar', 'uses' => 'ProdutoController@store']);

//Deletar um item
Route::delete('/produto/deletar/{id}', ['as' => 'produto.deletar', 'uses' => 'ProdutoController@destroy']);

//Editar um item
Route::put('/produto/Editar/{id}', ['as' => 'produto.gravar', 'uses' => 'ProdutoController@update']);
