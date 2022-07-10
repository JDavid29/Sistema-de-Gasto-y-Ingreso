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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
// nueva descip
//agrega todos las rutas y acciones configuradas automatic
Route::resource('/gastos', 'GastoController');
// agrege una ruta nueva
/*Route::resource('/gastos/{id}/edit', 'GastoController');

Route::resource('/gastos/{id}/update', 'GastoController');
//ELIMINAR DATO DE LA BASE DE DATOS
Route::resource('/gastos/{id}/destroy', 'GastoController');*/


//agrega todos las rutas y acciones configuradas automatic
Route::resource('/ingresos', 'IngresoController');

/*Route::resource('/ingresos/{id}/edit', 'IngresoController');

Route::resource('/ingresos/{id}/update', 'IngresoController');
//ELIMINAR DATO DE LA BASE DE DATOS
Route::resource('/ingresos/{id}/destroy', 'IngresoController');
*/

//RUTA DEL CORREO FORMULARIO Y FUNCION
Route::resource('/correo', 'EmailController');



//CREAMOS LA RUTA LA SOCIALITE CON FACEBOOK
Route::get('/login/facebook','SocialController@redirect');
Route::get('/login/facebook/callback', 'SocialController@callback');



Route::get('/home', 'HomeController@index')->name('home');


