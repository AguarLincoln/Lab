<?php

use App\Models\Coordenador;
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

Route::post('/', 'StoreController');
Route::post('/login', 'LoginController');


Route::middleware('auth:coordenador')->get('/', function () {
    return Coordenador::all();
});

Route::post('/vaga', 'Vaga\StoreController');
