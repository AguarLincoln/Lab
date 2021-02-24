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

Route::post('/', 'Professor\StoreController');
Route::get('/', 'Professor\AllController');
Route::post('/login', 'Professor\LoginController');

Route::post('/turma/{turmaId}/aluno/{alunoId}', 'Turma\AddStudentController'); // turma/{id}/aluno/{id}
Route::delete('/turma/{turmaId}/aluno/{alunoId}', 'Turma\DestroyStudentController');
Route::put('/turma/{turmaId}/aluno/{alunoId}', 'Turma\ApStudentController');
Route::get('/turma', 'Turma\AllController');

Route::get('/aluno', 'Aluno\AllController');
