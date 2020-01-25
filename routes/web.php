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

// Route::get('/', function () {
//     echo 'hola';
// });

// Route::get('/', ['as' => '/', 'uses' => 'TaskController@index']);
Route::get('/', ['as' => '/', 'uses' => 'CotizacionesController@index']);


// Route::resource('tasks', 'TaskController');

// Auth::routes();

// //Login
Route::get('/ingresar', ['as' => 'ingresar', 'uses' => 'HomeController@index']);
// Route::post('/login', ['as' => 'login', 'uses' => 'HomeController@login']);

// // Cotizaciones
// Route::get('/cotizaciones', ['as' => 'cotizaciones', 'uses' => 'CotizacionesController@index']);
// Route::post('/nuevo_presupuesto', ['as' => 'nuevo_presupuesto', 'uses' => 'CotizacionesController@nuevoPresupuesto']);