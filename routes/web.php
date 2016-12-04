<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Auth routes
  Route::get('/login', 'LoginController@login');// mostra o formulário
  Route::post('/login', 'LoginController@postLogin');
  Route::get('/logout', 'LoginController@logout');

  //Register routes
  Route::get('/register', 'RegistrationController@register');
  Route::post('/register', 'RegistrationController@postRegister');


  Route::get('/admin', 'AdminController@getIndex')->middleware('admin');
  Route::get('/studant/{id}', 'StudantController@getIndex')->middleware('studant');

    Route::resource('temas', 'TemaController');
    Route::resource('coordenacaos', 'CoordenacaoController');
    Route::resource('supervisaos', 'SupervisaoController');
    Route::get('/studant/{id}/actividades', 'ActividadeController@minhas');
    Route::get('/studant/{id}/actividades/{idsupervisao}', 'ActividadeController@getActividades');
    Route::get('/studant/{id}/actividades/{idsupervisao}/nova', 'ActividadeController@create');
    Route::post('/studant/{id}/actividades/{idsupervisao}/nova', 'ActividadeController@store');


  //rotas para envio de e-mail
  Route::get('/basicmail/{idCord}/{idDoc}', 'MailController@basic_mail');
  Route::get('/htmlmail', 'MailController@html_mail');
  Route::get('/attachemail', 'MailController@attachment_email');
  //Route::post('instituicaos/tema/{id}', 'InstituicaoController@posttema');
