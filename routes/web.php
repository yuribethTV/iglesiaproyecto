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

//Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/inicio', 'AdminController@index');
Route::get('/inicio', 'IngresosController@index');
Route::get('/', 'Auth\LoginController@login');
Route::get('/user', 'Auth\LoginController@user');
Route::post('/login', 'Auth\LoginController@postLogin');
Route::get('/logout', 'Auth\LoginController@getLogout');
Route::get('/usersecretario', 'Auth\LoginController@usersecretario');

Route::get('/listaingresos', 'IngresosController@index');
Route::get('/crearingresos', 'IngresosController@create');
Route::post('/nuevoingreso', 'IngresosController@store');
Route::get('/modificaringreso/{id}', 'IngresosController@edit');
Route::post('/modificaringreso', 'IngresosController@update');
Route::post('/borraringresos', 'IngresosController@destroy');

Route::get('/listagastos', 'GastosController@listasgastos');
Route::get('/creargastos', 'GastosController@create');
Route::post('/nuevogastos', 'GastosController@store');
Route::get('/modificargastos/{id}', 'GastosController@edit');
Route::post('/modificargastos', 'GastosController@update');
Route::post('/ingresosfecha', 'IngresosController@fecha');
Route::post('/gastosfecha', 'GastosController@fecha');
Route::post('/borrargastos', 'GastosController@destroy');

Route::get('/listaninos', 'NinosController@index');
Route::get('/crearmiembroninos', 'NinosController@create');
Route::post('/nuevomiembroninos', 'NinosController@store');
Route::get('/modificarninos/{id}', 'NinosController@edit');
Route::post('/modificarninos', 'NinosController@update');
Route::post('/borrarninos', 'NinosController@destroy');

Route::get('/listajovenes', 'JovenesController@index');
Route::get('/crearmiembrojovenes', 'JovenesController@create');
Route::post('/nuevomiembrojovenes', 'JovenesController@store');
Route::get('/modificarjovenes/{id}', 'JovenesController@edit');
Route::post('/modificarjovenes', 'JovenesController@update');
Route::post('/borrarjovenes', 'JovenesController@destroy');

Route::get('/listaadultos', 'AdultosController@index');
Route::get('/crearmiembroadultos', 'AdultosController@create');
Route::post('/nuevomiembroadultos', 'AdultosController@store');
Route::get('/modificaradultos/{id}', 'AdultosController@edit');
Route::post('/modificaradultos', 'AdultosController@update');
Route::post('/borraradultos', 'AdultosController@destroy');


Route::get('/listacuentasporpagar', 'CuentasporpagarController@index');
Route::get('/crearcuentasporpagar', 'CuentasporpagarController@create');
Route::post('/nuevacuentasporpagar', 'CuentasporpagarController@store');
Route::get('/cuentasporpagarfecha', 'CuentasporpagarController@fecha');
Route::post('/cuentasporpagarfecha', 'CuentasporpagarController@fecha');
Route::get('/modificarcuentasporpagar/{id}', 'CuentasporpagarController@edit');
Route::post('/modificarcuentasporpagar', 'CuentasporpagarController@update');
Route::post('/borrarcuentasporpagar', 'CuentasporpagarController@destroy');


Route::get('/listacuentasporcobrar', 'CuentasporcobrarController@index');
Route::get('/crearcuentasporcobrar', 'CuentasporcobrarController@create');
Route::post('/nuevacuentasporcobrar', 'CuentasporcobrarController@store');
Route::get('/cuentasporcobrardeudor', 'CuentasporcobrarController@deudor');
Route::post('/cuentasporcobrardeudor', 'CuentasporcobrarController@deudor');
Route::get('/modificarcuentasporcobrar/{id}', 'CuentasporcobrarController@edit');
Route::post('/modificarcuentasporcobrar', 'CuentasporcobrarController@update');
Route::post('/borrarcuentasporcobrar', 'CuentasporcobrarController@destroy');


Route::get('/listamisionvision', 'MisionvisionController@index');

Route::get('/listalogs', 'LogsController@index');


