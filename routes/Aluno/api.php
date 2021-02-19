<?php

use App\Models\Aluno;
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
    Route::get('/', 'Aluno\AllController');
    Route::post('/', 'Aluno\StoreController');
});


Route::middleware(['auth:aluno', 'scopes:aluno'])->group(function () {
    Route::post('/canditar/{id}', 'Vaga\CandidatarController');
    Route::get('/vaga', 'Vaga\AllController');
    Route::get('/turma/participante', 'Turma\AllStudentController'); //falta id
});
Route::post('/login', 'Aluno\LoginController');
