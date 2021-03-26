<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('profile', 'ProfileController@edit')
            ->name('profile.edit');

Route::put('profile', 'ProfileController@update')
            ->name('profile.update');

Route::resource('users', 'UserController');
Route::resource('ubicaciones', 'UbicacionController')->except('show');
Route::resource('actividades', 'ActividadController')->except('show');
Route::resource('conductores', 'ComercianteController')->only('index');
Route::resource('puestos', 'PuestoController');
Route::resource('pagos', 'PagoController');

Route::resource('puestos.pagos', 'PuestoPagoController');
Route::resource('puestos.deudas', 'PuestoDeudaController');

Route::get('/buscar', 'Search\SearchComerciante@search')->name('comerciante.search');
Route::get('/buscar-puesto', 'Search\PuestoSearchController@search')->name('puestos.search');
Route::get('/buscar-conductor', 'Search\ConductorSearchController@search')->name('conductores.search');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
