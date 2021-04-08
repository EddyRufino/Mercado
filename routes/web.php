<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
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

Route::resource('puestos.pagos', 'PuestoPagoController')->only(['index', 'create', 'store']);
Route::resource('puestos.deudas', 'PuestoDeudaController')->only(['index', 'create', 'store', 'destroy']);
Route::resource('puestos.tramites', 'PuestoTramiteController')->only(['create', 'store']);
Route::resource('puestos.servicios', 'PuestoServicioController')->only(['create', 'store']);


// Search
Route::get('/buscar', 'Search\SearchComerciante@search')->name('comerciante.search');
Route::get('/buscar-puesto', 'Search\PuestoSearchController@search')->name('puestos.search');
Route::get('/buscar-conductor', 'Search\ConductorSearchController@search')->name('conductores.search');
Route::get('/buscar-users', 'Search\UserSearchController@search')->name('users.search');


// Export
Route::get('puestos-excel', 'Export\PuestoExportController@excel')->name('puestos.excel');
Route::get('puestos-pdf', 'Export\PuestoExportController@pdf')->name('puestos.pdf');
// Route::get('puestos-excel-query', 'Export\PuestoExportController@queryExcel')->name('puestos.query');
Route::get('conductores-excel', 'Export\ComercianteExportController@excel')->name('conductores.excel');
Route::get('conductores-pdf', 'Export\ComercianteExportController@pdf')->name('conductores.pdf');
Route::get('users-excel', 'Export\UserExportController@excel')->name('users.excel');
Route::get('users-pdf', 'Export\UserExportController@pdf')->name('users.pdf');
Route::get('deudas-excel/{id}', 'Export\DeudaExportController@excel')->name('deudas.excel');
Route::get('deudas-pdf/{id}', 'Export\DeudaExportController@pdf')->name('deudas.pdf');


// Reportes
Route::get('generar-reportes', 'Reporte\ReporteDeudaController@index')->name('reporte.index');
Route::get('reporte-deudas', 'Reporte\ReporteDeudaController@deuda')->name('reporte.deuda');
Route::get('reporte-pagos', 'Reporte\ReporteDeudaController@pago')->name('reporte.pago');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
