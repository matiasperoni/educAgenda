<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	//Categoria
	Route::get('/categoria', 'CategoriaController@index')->name('categoria.index');
	Route::get('/categoria/create', 'CategoriaController@create')->name('categoria.create');
	Route::get('/categoria/edit/{id}', 'CategoriaController@edit')->name('categoria.edit');
	Route::get('/categoria/{id}', 'CategoriaController@destroy')->name('categoria.destroy');
	Route::post('/categoria/store', 'CategoriaController@store')->name('categoria.store');
	Route::post('/categoria/update/{id}', 'CategoriaController@update')->name('categoria.update');

	//Arquivo
	Route::get('/arquivo', 'ArquivoController@index')->name('arquivo.index');
	Route::get('/arquivo/create', 'ArquivoController@create')->name('arquivo.create');
	Route::get('/arquivo/edit/{id}', 'ArquivoController@edit')->name('arquivo.edit');
	Route::get('/arquivo/{id}', 'ArquivoController@destroy')->name('arquivo.destroy');
	Route::post('/arquivo/store', 'ArquivoController@store')->name('arquivo.store');
	Route::post('/arquivo/update/{id}', 'ArquivoController@update')->name('arquivo.update');
	
	//Materia
	Route::get('/materia', 'MateriaController@index')->name('materia.index');
	Route::get('/materia/create', 'MateriaController@create')->name('materia.create');
	Route::get('/materia/edit/{id}', 'MateriaController@edit')->name('materia.edit');
	Route::get('/materia/{id}', 'MateriaController@destroy')->name('materia.destroy');
	Route::post('/materia/store', 'MateriaController@store')->name('materia.store');
	Route::post('/materia/update/{id}', 'MateriaController@update')->name('materia.update');
	
	//Aula
	Route::get('/aula', 'AulaController@index')->name('aula.index');
	Route::get('/aula/create', 'AulaController@create')->name('aula.create');
	Route::get('/aula/edit/{id}', 'AulaController@edit')->name('aula.edit');
	Route::get('/aula/{id}', 'AulaController@destroy')->name('aula.destroy');
	Route::post('/aula/store', 'AulaController@store')->name('aula.store');
	Route::post('/aula/update/{id}', 'AulaController@update')->name('aula.update');

});

