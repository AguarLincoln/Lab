<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FreeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        try {

            $aluno = DB::select('SELECT *
                    FROM alunos AL
                    Where AL.id not in (
                    SELECT distinct(A.id) FROM alunos A, avaliacoes AV, turmas T
                    WHERE (A.id = AV.aluno_id AND AV.turma_id = T.id)
                )');


            return response()->json([
                'dados' => $aluno
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'menssagem' => 'Error, tente novamente mais tarde',
                'error' => $e->getMessage()
            ]);
        }
    }
}
