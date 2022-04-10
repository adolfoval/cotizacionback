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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/cotizacion", "App\Http\Controllers\CotizacionController@index");//muestra todas las cotizaciones.
Route::post("cotizacion/mail", "App\Http\Controllers\CotizacionController@sendEmail");//enviar emails
Route::post("/cotizacion/crear", "App\Http\Controllers\CotizacionController@store");//crear una cotizacion.
