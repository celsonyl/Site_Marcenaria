<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!OK
|
*/


Route::get('/',['as'=>'site','uses'=>'site\siteController@index']);
Route::get('/index',['as'=>'site.index','uses'=>'site\siteController@index']);

Route::get('/login',['as'=>'site.login','uses'=>'site\loginController@index']);
Route::post('/login/entrar',['as'=>'site.login.entrar','uses'=>'site\loginController@entrar']);
Route::get('/login/sair',['as'=>'login.sair','uses'=>'site\loginController@sair']);


Route::get('/forgotPassword','Security\ForgotPassword@forgot');
Route::post('/forgotPassword','Security\ForgotPassword@password');
Route::get('/resetPassword/{token?}','Security\ForgotPassword@resetSenha_index');

Route::post('/resetPassword/reset',['as'=>'senha.resetSenha','uses'=>'Security\ForgotPassword@resetSenha']);


Route::get('/cadastro',['as'=>'site.cadastro','uses'=>'site\cadastroController@index']);
Route::post('/cadastro/criar',['as'=>'site.cadastro.criar','uses'=>'site\cadastroController@criar']);

Route::get('/confirmarEmail/{token?}',['as'=>'site.confirmarEmail','uses'=>'site\clienteController@confirmarEmail']);

Route::group(['middleware'=>'auth'],function(){
Route::get('/admin',['as'=>'admin.index','uses'=>'admin\adminController@index']);
Route::post('/admin/cadastrarProduto',['as'=>'admin.produto.cadastrar','uses'=>'admin\produtoController@criar']);
Route::get('/admin/apagarProduto/{id}',['as'=>'admin.produto.apagar','uses'=>'admin\produtoController@apagar']);
Route::get('/admin/editarProduto/{id}',['as'=>'admin.produto.editar','uses'=>'admin\produtoController@editar']);
Route::put('/admin/atualizarProduto/{id}',['as'=>'admin.atualizar','uses'=>'Admin\produtoController@atualizar']);
Route::get('/admin/indexProduto',['as'=>'admin.produto.index','uses'=>'admin\produtoController@index']);



Route::get('/carrinho',['as'=>'carrinho.index','uses'=>'site\carrinhoController@index']);
Route::post('/carrinho/adicionar',['as'=>'carrinho.adicionar','uses'=>'site\carrinhoController@adicionar']);
Route::post('/carrinho/remover',['as'=>'carrinho.remover','uses'=>'site\carrinhoController@remover']);


Route::get('/encomendas',['as'=>'encomenda.index','uses'=>'site\encomendaController@index']);
Route::post('/encomendas/adicionar',['as'=>'encomenda.adicionar','uses'=>'site\encomendaController@adicionar']);
Route::post('/encomendas/remover',['as'=>'encomenda.remover','uses'=>'site\encomendaController@remover']);


});
