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

Route::post('/', 'Coordenador\StoreController');
//Route::post('/login', 'LoginController');
Route::post('/login', 'Coordenador\Login');

Route::post('/turma', 'Turma\StoreController');




Route::middleware('auth:coordenador')->get('/', function () {
    return Coordenador::all();
});


Route::middleware(['auth:coordenador', 'auth:professor', 'scopes:coordenador,professor'])->group(function () {
    Route::post('/vaga', 'Vaga\StoreController');
    Route::get('/vaga', 'Vaga\AllController');
});
