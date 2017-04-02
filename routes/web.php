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

/*Route::get('/', function () {
    return view('welcome');
});*/

/* Código antigo...
Route::get('home', ['as' => 'home',
		    		'uses' => 'VeiculoController@home'
		   		   ]);
*/

Route::get('/', 'PageController@index')->name('index');
Route::get('creditos', 'PageController@credito')->name('creditos');

Route::resource("noticia", 'NoticiaController'); //->middleware('auth') passam a ter controlo de middleware e requer login
Route::resource("categoria", 'CategoriaController');
Route::resource("autor", 'AutorController');
Auth::routes();

Route::get('/home', 'HomeController@index');
