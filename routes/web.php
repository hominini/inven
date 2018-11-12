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


// Rutas bienes
Route::get('/bienes', 'ControladorBienes@indice');
Route::get('/bienes/crear', 'ControladorBienes@crear');
Route::get('/bienes/{bien}/editar', 'ControladorBienes@editar');
Route::get('/bienes/{bien}', 'ControladorBienes@mostrar');
Route::post('/bienes', 'ControladorBienes@almacenar');
Route::put('/bienes/{bien}', 'ControladorBienes@actualizar');
Route::delete('/bienes/{bien}', 'ControladorBienes@destruir');


// Rutas inventarios
Route::get('/inventarios', 'ControladorInventarios@indice');
Route::get('/inventarios/crear', 'ControladorInventarios@crear');
Route::get('/inventarios/{inventario}/editar', 'ControladorInventarios@editar');
Route::get('/inventarios/{inventario}', 'ControladorInventarios@mostrar');
Route::post('/inventarios', 'ControladorInventarios@almacenar');
Route::put('/inventarios/{inventario}', 'ControladorInventarios@actualizar');
Route::delete('/inventarios/{inventario}', 'ControladorInventarios@borrar');

// Rutas bienes_muebles
Route::get('/bienes_muebles', 'ControladorBienesMuebles@indice');
Route::get('/bienes_muebles/crear', 'ControladorBienesMuebles@crear');
Route::get('/bienes_muebles/{mueble}/editar', 'ControladorBienesMuebles@editar');
Route::get('/bienes_muebles/{mueble}', 'ControladorBienesMuebles@mostrar');
Route::post('/bienes_muebles', 'ControladorBienesMuebles@almacenar');
Route::put('/bienes_muebles/{mueble}', 'ControladorBienesMuebles@actualizar');
Route::delete('/bienes_muebles/{mueble}', 'ControladorBienesMuebles@borrar');

// Rutas bienes_recursos_tecnologicos
Route::get('/bienes_recursos_tecnologicos', 'ControladorBienesRecursosTecnologicos@indice');
Route::get('/bienes_recursos_tecnologicos/crear', 'ControladorBienesRecursosTecnologicos@crear');
Route::get('/bienes_recursos_tecnologicos/{recurso}/editar', 'ControladorBienesRecursosTecnologicos@editar');
Route::get('/bienes_recursos_tecnologicos/{recurso}', 'ControladorBienesRecursosTecnologicos@mostrar');
Route::post('/bienes_recursos_tecnologicos', 'ControladorBienesRecursosTecnologicoss@almacenar');
Route::put('/bienes_recursos_tecnologicos/{recurso}', 'ControladorBienesRecursosTecnologicos@actualizar');
Route::delete('/bienes_recursos_tecnologicos/{recurso}', 'ControladorBienesRecursosTecnologicos@borrar');

// Rutas bienes_items_bibliograficos
Route::get('/bienes_items_bibliograficos', 'ControladorBienesItemsBibliograficos@indice');
Route::get('/bienes_items_bibliograficos/crear', 'ControladorBienesItemsBibliograficos@crear');
Route::get('/bienes_items_bibliograficos/{item_biblio}/editar', 'ControladorBienesItemsBibliograficos@editar');
Route::get('/bienes_items_bibliograficos/{item_biblio}', 'ControladorBienesItemsBibliograficos@mostrar');
Route::post('/bienes_items_bibliograficos', 'ControladorBienesItemsBibliograficos@almacenar');
Route::put('/bienes_items_bibliograficos/{item_biblio}', 'ControladorBienesItemsBibliograficos@actualizar');
Route::delete('/bienes_items_bibliograficos/{item_biblio}', 'ControladorBienesItemsBibliograficos@borrar');

// Rutas ubicaciones
Route::get('/ubicaciones', 'ControladorUbicaciones@indice');
Route::get('/ubicaciones/crear', 'ControladorUbicaciones@crear');
Route::get('/ubicaciones/{ubicacion}/editar', 'ControladorUbicaciones@editar');
Route::get('/ubicaciones/{ubicacion}', 'ControladorUbicaciones@mostrar');
Route::post('/ubicaciones', 'ControladorUbicaciones@almacenar');
Route::put('/ubicaciones/{ubicacion}', 'ControladorUbicaciones@actualizar');
Route::delete('/ubicaciones/{ubicacion}', 'ControladorUbicaciones@borrar');
