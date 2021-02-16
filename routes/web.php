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

// Ésta línea genera todas las rutas necesarias para autenticación
Auth::routes();

// Ruta home
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {

    // rutas usuarios
    Route::resource('users','UserController');

    // Rutas bienes
    Route::get('/bienes', 'BienesController@indice');
    Route::get('/bienes/crear', 'BienesController@crear');
    Route::get('/bienes/{bien}/editar', 'BienesController@editar');
    Route::get('/bienes/{bien}', 'BienesController@mostrar');
    Route::post('/bienes', 'BienesController@almacenar');
    Route::put('/bienes/{bien}', 'BienesController@actualizar');
    Route::delete('/bienes/{bien}', 'BienesController@destruir');

    // Rutas inventarios
    // Route::get('/inventarios', 'ControladorInventarios@indice');
    // Route::get('/inventarios/crear', 'ControladorInventarios@crear');
    // Route::get('/inventarios/{inventario}/editar', 'ControladorInventarios@editar');
    // Route::get('/inventarios/{inventario}', 'ControladorInventarios@mostrar');
    // Route::post('/inventarios', 'ControladorInventarios@almacenar');
    // Route::put('/inventarios/{inventario}', 'ControladorInventarios@actualizar');
    // Route::delete('/inventarios/{inventario}', 'ControladorInventarios@destruir');

    // Rutas bienes_muebles
    Route::get('/muebles', 'MueblesController@indice')->name('muebles.index');
    Route::get('/muebles/crear', 'MueblesController@crear')->name('muebles.create');
    Route::get('/muebles/{mueble}/editar', 'MueblesController@editar')->name('muebles.edit');
    Route::get('/muebles/{mueble}', 'MueblesController@mostrar')->name('muebles.show');
    Route::post('/muebles', 'MueblesController@almacenar');
    Route::put('/muebles/{mueble}', 'MueblesController@actualizar');
    Route::delete('/muebles/{mueble}', 'MueblesController@destruir')->name('muebles.destroy');

    // Rutas bienes_recursos_tecnologicos
    Route::get('/bienes_tecnologicos', 'TechAssetsController@indice')->name('bienes_tecnologicos.index');
    Route::get('/bienes_tecnologicos/crear', 'TechAssetsController@crear')->name('bienes_tecnologicos.create');
    Route::get('/bienes_tecnologicos/{bien}/editar', 'TechAssetsController@editar')->name('bienes_tecnologicos.edit');
    Route::get('/bienes_tecnologicos/{bien}', 'TechAssetsController@mostrar')->name('bienes_tecnologicos.show');
    Route::post('/bienes_tecnologicos', 'TechAssetsController@almacenar');
    Route::put('/bienes_tecnologicos/{bien}', 'TechAssetsController@actualizar');
    Route::delete('/bienes_tecnologicos/{bien}', 'TechAssetsController@destruir')->name('bienes_tecnologicos.destroy');

    // Rutas bienes_items_bibliograficos
    Route::get('/bienes_items_bibliograficos', 'LibrosController@indice')->name('libros.index');
    Route::get('/bienes_items_bibliograficos/crear', 'LibrosController@crear')->name('libros.create');
    Route::get('/bienes_items_bibliograficos/{item_biblio}/editar', 'LibrosController@editar')->name('libros.edit');
    Route::get('/bienes_items_bibliograficos/{item_biblio}', 'LibrosController@mostrar')->name('libros.show');
    Route::post('/bienes_items_bibliograficos', 'LibrosController@almacenar');
    Route::put('/libros/{item_biblio}', 'LibrosController@actualizar');
    Route::delete('/bienes_items_bibliograficos/{item_biblio}', 'LibrosController@destruir')->name('libros.destroy');

    // Rutas ubicaciones
    Route::get('/ubicaciones', 'UbicacionesController@indice')->name('rutas.index'); //ver
    Route::get('/ubicaciones/crear', 'UbicacionesController@crear')->name('ubicaciones.create');
    Route::get('/ubicaciones/{ubicacion}/editar', 'UbicacionesController@editar')->name('ubicaciones.edit');
    Route::get('/ubicaciones/{ubicacion}', 'UbicacionesController@mostrar')->name('ubicaciones.show');
    Route::post('/ubicaciones', 'UbicacionesController@almacenar');
    Route::put('/ubicaciones/{ubicacion}', 'UbicacionesController@actualizar');
    Route::delete('/ubicaciones/{ubicacion}', 'UbicacionesController@destruir')->name('ubicaciones.destroy');

    // Rutas usuarios_finales
    Route::get('/usuarios_finales', 'FinalUsersController@indice');
    Route::get('/usuarios_finales/crear', 'FinalUsersController@crear');
    Route::get('/usuarios_finales/{usuario_final}/editar', 'FinalUsersController@editar');
    Route::get('/usuarios_finales/{usuario_final}', 'FinalUsersController@mostrar');
    Route::post('/usuarios_finales', 'FinalUsersController@almacenar');
    Route::put('/usuarios_finales/{usuario_final}', 'FinalUsersController@actualizar');
    Route::delete('/usuarios_finales/{usuario_final}', 'FinalUsersController@destruir');

    Route::resource('asignacionesTareas', 'AsignacionesTareasController');

    Route::get('/settings', 'SettingsController@index')->name('settings');

    Route::get('/download', 'UbicacionesController@exportar')->name('download');

    Route::get('/conteo', 'AsignacionesTareasController@indice_conteo')->name('conteo.index'); //ver
    Route::get('/conteo/{id}', 'AsignacionesTareasController@mostrar_conteo')->name('conteo.show');

    // Route::get('/bajas', 'AsignacionesTareasController@indice_bajas')->name('bajas.index'); //ver
    // Route::get('/bajas/{id}', 'AsignacionesTareasController@mostrar_bajas')->name('bajas.show');

    Route::get('/bajas', 'MotivoBajaController@index')->name('bajas.index'); //ver
    Route::get('/bajas/{id}', 'MotivoBajaController@show')->name('bajas.show');

    Route::get('/registro', 'AsignacionesTareasController@indice_registros')->name('registros.index'); //ver
    Route::get('/registros/{id}', 'AsignacionesTareasController@mostrar_registros')->name('registros.show');

    Route::get('/bienes_dt', 'BienesController@indexDTable')->name('bienes_dt.index');

});
