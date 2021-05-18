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
Route::resource('pagos', 'PagoController')->only('store');

Route::resource('puestos.pagos', 'PuestoPagoController')->only(['index', 'create', 'store']);
Route::resource('puestos.deudas', 'PuestoDeudaController')->only(['index', 'create', 'store', 'destroy']);
Route::resource('puestos.tramites', 'PuestoTramiteController')->only(['create', 'store']);
Route::resource('puestos.servicios', 'PuestoServicioController')->only(['create', 'store']);

Route::get('puestos/{puesto}/servicios/deuda', 'PuestoServicioController@deuda')->name('servicio.deuda');
Route::post('puestos/{puesto}/sdfsdf', 'PuestoServicioController@save')->name('puestos.servicios.save');

Route::resource('puestos.pagoanticipados', 'PagoAnticipadoController')->only(['index', 'create', 'store']);
Route::resource('puestos.aguaanticipados', 'AguaAnticipadoController')->only(['index', 'create', 'store']);

// Chart
Route::get('dashboard', 'Dashboard\dashboardChartController@index')->name('dashboard');
Route::get('dashboard-banios', 'Dashboard\banioChartController@index')->name('dashboard.banio');

// Promociones
Route::resource('promociones', 'PromocionController');


// Search
Route::get('/buscar', 'Search\SearchComerciante@search')->name('comerciante.search');
Route::get('/buscar-puesto', 'Search\PuestoSearchController@search')->name('puestos.search');
Route::get('/buscar-conductor', 'Search\ConductorSearchController@search')->name('conductores.search');
Route::get('/buscar-users', 'Search\UserSearchController@search')->name('users.search');
Route::get('/buscar-promociones', 'Search\PromocionSearchController@search')->name('promociones.search');


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
Route::get('promociones-excel', 'Export\PromocionExportController@excel')->name('promociones.excel');
Route::get('promociones-pdf', 'Export\PromocionExportController@pdf')->name('promociones.pdf');

// Operaciones
Route::get('operaciones', 'Operacion\OperacionController@create')->name('operaciones.create');
// Route::post('operaciones/{id}', 'Operacion\OperacionController@store')->name('operaciones.store');

// Baños
Route::resource('banios', 'BanioController')->except(['delete', 'show']);


// Reportes
Route::get('generar-reportes', 'Reporte\ReporteDeudaController@index')->name('reporte.index');
Route::get('reporte-deudas', 'Reporte\ReporteDeudaController@deuda')->name('reporte.deuda');
Route::get('reporte-pagos', 'Reporte\ReporteDeudaController@pago')->name('reporte.pago');
Route::get('reporte-sisas', 'Reporte\ReporteDeudaController@sisa')->name('reporte.sisa');
Route::get('reporte-promociones', 'Reporte\ReporteDeudaController@promocion')->name('reporte.promocion');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
