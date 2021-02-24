<?php

namespace App\Http\Controllers\Turma;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use Illuminate\Http\Request;

class AllStudentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        try {
            //$turma = Turma::Where('id', $id)->with('alunos')->get();
            $turma = Turma::with('alunos')->get();
            return response()->json([
                'dados' => $turma
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'mensagem' => 'Error, tente novamente mais tarde',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
