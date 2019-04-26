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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/index', 'HomeController@index');

Route::get('/home', 'HomeController@index');

Route::get('/Cadastro', 'HomeController@cadastro');
Route::post('/CadastroApply', 'HomeController@cadastroApply');

Route::get('/Detalhes/{id}', 'HomeController@detalhes');
Route::get('/Deletar/{id}', 'HomeController@deletar');

Route::post('/Pesquisar', 'HomeController@pesquisar');

Route::get('/Alterar/{id}', 'HomeController@alterar');

Route::post('updateProfile', 'HomeController@updateProfile');