<?php

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

use App\Produto;
use App\Compra;
use App\User;

Auth::routes();

Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'inicio.index']);


Route::get('/home/produtos/{id}', [
	'uses' => 'HomeController@produto',
	'as' => 'home.produtos']);

Route::get('/produtos', [
	'uses' => 'ProdutoController@index',
	'as' => 'produtos.index']);

Route::get('produtos/editar/{id}', [
	'uses' => 'ProdutoController@editar',
	'as' => 'produtos.editar']);

Route::get('/produtos/deletar/{id}', [
  'uses' => 'ProdutoController@deletar',
  'as' => 'produtos.deletar']);

Route::get('/produtos/adicionar', [
  'uses' => 'ProdutoController@adicionar',
  'as' => 'produtos.adicionar']);

Route::post('/produtos/salvar', [
  'uses' => 'ProdutoController@salvar',
  'as' => 'produtos.salvar']);

Route::put('/produtos/atualizar/{id}', [
  'uses' => 'ProdutoController@atualizar',
  'as' => 'produtos.atualizar']);

Route::get('/addCarrinho/{id}', [
	'uses' => 'HomeController@addCarrinho',
	'as' => 'produto.addCarrinho']);

Route::get('/cancelCarrinho', [
	'uses' => 'HomeController@cancelCarrinho',
	'as' => 'produto.cancelCarrinho']);

Route::get('/itensCarrinho', [
	'uses' => 'HomeController@getCarrinho',
	'as' => 'produto.itensCarrinho']);

Route::get('/postCarrinho', [
	'uses' => 'CarrinhoController@postCarrinho',
	'as' => 'produto.postCarrinho']);

Route::get('/compras', [
  	'uses' => 'CompraController@index',
  	'as' => 'compras.index']);

Route::get('user/edit/{id}', [
	'uses' => 'UserController@edit',
	'as' => 'user.edit']);


Route::post('user/save', [
	'uses' => 'UserController@update',
	'as' => 'user.edit']);
//Auth::routes();
