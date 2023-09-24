<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('herramientas', 'App\Http\Controllers\API\herramientasAPIController');

Route::resource('departamentos', 'App\Http\Controllers\API\departamentosAPIController');

Route::resource('areas__de__trabajos', 'App\Http\Controllers\API\Areas_De_TrabajoAPIController');

Route::resource('activos_de_la_empresas', 'App\Http\Controllers\API\activos_de_la_empresaAPIController');

Route::resource('examples', 'App\Http\Controllers\API\exampleAPIController');

Route::resource('cargos', 'App\Http\Controllers\API\CargosAPIController');

Route::resource('analistas_examples', 'App\Http\Controllers\API\Analistas_exampleAPIController');

Route::resource('analistas', 'App\Http\Controllers\API\AnalistaAPIController');

Route::resource('mis_analistas', 'App\Http\Controllers\API\Mis_analistasAPIController');

Route::resource('mis_analistasses', 'App\Http\Controllers\API\Mis_analistassAPIController');

Route::resource('analists', 'App\Http\Controllers\API\AnalistAPIController');

Route::resource('asignars', 'App\Http\Controllers\API\AsignarAPIController');

Route::resource('equipo1s', App\Http\Controllers\API\Equipo1APIController::class);

Route::resource('piezas', App\Http\Controllers\API\piezasAPIController::class);

Route::resource('asistencias', App\Http\Controllers\API\asistenciaAPIController::class);