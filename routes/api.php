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
	Route::resource('bienes', 'API\ControladorBienes');
});

Route::get('muebles', function() {

    $muebles = \App\Mueble::all();
    foreach ($muebles as $mueble) {
        $mueble->bien_control_administrativo;
        $mueble->bien_control_administrativo->bien;
    }

    return $muebles->toJSON(JSON_PRETTY_PRINT);
});

Route::get('muebles/{id}', function($id) {

    $mueble = \App\Mueble::find($id);
    $mueble->bien_control_administrativo;
    $mueble->bien_control_administrativo->bien;
    $muebleReturn = $mueble->toArray();

    foreach ($muebleReturn['bien_control_administrativo'] as $key => $val)
    {
        $muebleReturn[$key] = $val;
    }

    foreach ($muebleReturn['bien_control_administrativo']['bien'] as $key => $val)
    {
        $muebleReturn[$key] = $val;
    }

    unset($muebleReturn['bien_control_administrativo']);
    unset($muebleReturn['bien']);

    return json_encode($muebleReturn);
});
