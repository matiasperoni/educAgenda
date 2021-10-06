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

	//materia
	Route::get('/materia', 'MateriaController@index')->name('materia.index');
	Route::get('/materia/create', 'MateriaController@create')->name('materia.create');
	Route::get('/materia/edit/{id}', 'MateriaController@edit')->name('materia.edit');
	Route::get('/materia/{id}', 'MateriaController@destroy')->name('materia.destroy');
	Route::post('/materia/store', 'MateriaController@store')->name('materia.store');
	Route::post('/materia/update/{id}', 'MateriaController@update')->name('materia.update');


});

