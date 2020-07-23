<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/confirmarEmail/{token?}',['as'=>'site.confirmarEmail','uses'=>'aluno\alunoController@confirmarEmail']);



<<<<<<< HEAD
Route::get('/confirmarEmail/{token?}',['as'=>'site.confirmarEmail','uses'=>'site\clienteController@confirmarEmail']);
=======

Route::group(['middleware'=>'auth'],function(){

Route::get('/admin',['as'=>'admin.index','uses'=>'admin\adminController@index']);

});
>>>>>>> 5b6072be560fe386e0b0a5e176ce270b72b654b0
