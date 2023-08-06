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


Route::resource('herramientas', App\Http\Controllers\API\herramientasAPIController::class);

Route::resource('departamentos', App\Http\Controllers\API\departamentosAPIController::class);

Route::resource('areas__de__trabajos', App\Http\Controllers\API\Areas_De_TrabajoAPIController::class);

Route::resource('activos_de_la_empresas', App\Http\Controllers\API\activos_de_la_empresaAPIController::class);

Route::resource('examples', App\Http\Controllers\API\exampleAPIController::class);

Route::resource('cargos', App\Http\Controllers\API\CargosAPIController::class);

Route::resource('analistas_examples', App\Http\Controllers\API\Analistas_exampleAPIController::class);

Route::resource('analistas', App\Http\Controllers\API\AnalistaAPIController::class);

Route::resource('mis_analistas', App\Http\Controllers\API\Mis_analistasAPIController::class);

Route::resource('mis_analistasses', App\Http\Controllers\API\Mis_analistassAPIController::class);

Route::resource('analists', App\Http\Controllers\API\AnalistAPIController::class);

Route::resource('asignars', App\Http\Controllers\API\AsignarAPIController::class);