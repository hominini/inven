<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group( function () {
    Route::get('/bienes', 'API\BienesController@traerBienes');
    Route::get('/ubicaciones/{idUbicacion}/bienes', 'API\BienesController@traerBienesPorUbicacion');
    Route::get('/logout', 'API\LoginController@logout');
    Route::get('/user', 'API\LoginController@user');

    Route::post('/bienes', 'API\BienesController@store');

    Route::get('/misTareas', 'API\TareasController@getTareas');
    Route::post('/evaluarConteo', 'API\TareasController@evaluarConteo');
    Route::post('/asignacionTarea/{id}/resultadoTarea', 'API\TareasController@guardarResultadoTarea');

    Route::post('/tarea/{id}/actualizarTarea', 'API\TareasController@actualizarTarea');

    Route::post('/bajas', 'API\TareasController@darBajaBienes');
    
    Route::post('/dar_baja_bien', 'API\TareasController@darBajaBien');

    Route::post('/registrarbienes', 'API\TareasController@registrarbienes');

    Route::resource('ubicaciones', 'API\UbicacionController');

    Route::post('/completarTarea/{id_tarea}', 'API\TareasController@completarTarea');
});

// Route::get('/misTareas', 'API\TareasController@getTareas');

// rutas no protegidas
// Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\LoginController@login');
