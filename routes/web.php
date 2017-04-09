<?php

Route::get('/', 'PageController@index')->name('index');

Route::resource("noticia", 'NoticiaController'); //->middleware('auth') passam a ter controlo de middleware e requer login
Route::resource("categoria", 'CategoriaController');
Route::resource("autor", 'AutorController');
Route::resource("programa_locutor", 'Programa_LocutorController');
Route::resource("locutor", 'LocutorController');
Route::resource("programa", 'ProgramaController');

Auth::routes();

Route::get('/home', 'HomeController@index');
