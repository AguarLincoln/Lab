<?php

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

Route::middleware(['auth:coordenador', 'auth:professor', 'scopes:coordenador,professor'])->group(function () {
    Route::post('/', 'Empresa\StoreController');
});

Route::get('/', 'Empresa\ShowAllController');
