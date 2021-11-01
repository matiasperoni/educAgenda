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

	//especialidade
	Route::get('/especialidade', 'EspecialidadeController@index')->name('especialidade.index');
	Route::get('/especialidade/create', 'EspecialidadeController@create')->name('especialidade.create');
	Route::get('/especialidade/edit/{id}', 'EspecialidadeController@edit')->name('especialidade.edit');
	Route::get('/especialidade/{id}', 'EspecialidadeController@destroy')->name('especialidade.destroy');
	Route::post('/especialidade/store', 'EspecialidadeController@store')->name('especialidade.store');
	Route::post('/especialidade/update/{id}', 'EspecialidadeController@update')->name('especialidade.update');

	//horario
	Route::get('/horario', 'HorarioController@index')->name('horario.index');
	Route::get('/horario/create', 'HorarioController@create')->name('horario.create');
	Route::get('/horario/edit/{id}', 'HorarioController@edit')->name('horario.edit');
	Route::get('/horario/{id}', 'HorarioController@destroy')->name('horario.destroy');
	Route::post('/horario/store', 'HorarioController@store')->name('horario.store');
	Route::post('/horario/update/{id}', 'HorarioController@update')->name('horario.update');

	//aula
	Route::get('/aula', 'AulaController@index')->name('aula.index');
	Route::get('/aula/create', 'AulaController@create')->name('aula.create');
	Route::get('/aula/edit/{id}', 'AulaController@edit')->name('aula.edit');
	Route::get('/aula/{id}', 'AulaController@destroy')->name('aula.destroy');
	Route::post('/aula/store', 'AulaController@store')->name('aula.store');
	Route::post('/aula/update/{id}', 'AulaController@update')->name('aula.update');

	//agendamento
	Route::get('/agendamento', 'AgendamentoController@index')->name('agendamento.index');
	Route::get('/agendamento/create', 'AgendamentoController@create')->name('agendamento.create');
	Route::get('/agendamento/edit/{id}', 'AgendamentoController@edit')->name('agendamento.edit');
	Route::get('/agendamento/{id}', 'AgendamentoController@destroy')->name('agendamento.destroy');
	Route::post('/agendamento/store', 'AgendamentoController@store')->name('agendamento.store');
	Route::post('/agendamento/update/{id}', 'AgendamentoController@update')->name('agendamento.update');

	//pessoa
	Route::get('/pessoa', 'PessoaController@index')->name('pessoa.index');
	Route::get('/pessoa/create', 'PessoaController@create')->name('pessoa.create');
	Route::get('/pessoa/edit/{id}', 'PessoaController@edit')->name('pessoa.edit');
	Route::get('/pessoa/{id}', 'PessoaController@destroy')->name('pessoa.destroy');
	Route::post('/pessoa/store', 'PessoaController@store')->name('pessoa.store');
	Route::post('/pessoa/update/{id}', 'PessoaController@update')->name('pessoa.update');

});

