<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('hello');
});*/

//rutas para usuarios
Route::get('/','UsuariosController@index');
Route::post('usuarios','UsuariosController@index');
Route::get('usuarios/crear','UsuariosController@getCrear');
Route::post('usuarios/crear','UsuariosController@postCrear');

Route::get('usuarios/crear/{id}/editar','UsuariosController@getEditar');
Route::post('usuarios/crear/{id}','UsuariosController@postEditar');

Route::post('usuarios/eliminar/{id}','UsuariosController@postEliminar');

//rutas para cargos
Route::get('cargos','CargosController@consultar');
Route::get('cargos/crear','CargosController@getCrear');
Route::post('cargos/crear','CargosController@postCrear');
Route::get('cargos/crear/{id}/editar','CargosController@getEditar');
Route::post('cargos/crear/{id}','CargosController@postEditar');
Route::post('cargos/eliminar/{id}','CargosController@postEliminar');