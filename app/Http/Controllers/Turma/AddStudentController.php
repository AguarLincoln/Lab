<?php

namespace App\Http\Controllers\Turma;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddStudentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($turmaId, $alunoId)
    {

        try {
            $turma = Turma::find($turmaId);
            $turma = $turma->alunos()->toggle($alunoId, ['ap1' => 0, 'ap2' => 0, 'ap3' => 0]);

            return response()->json([
                'menssagem' => 'Aluno inserido com sucesso'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'menssagem' => 'Error, tente novamente mais tarde',
                'error' => $e->getMessage()
            ]);
        }

        //$turma = $turma->alunos()->detach($alunoId);
        //$turma = $turma->alunos()->updateExistingPivot($alunoId, ['ap1' => 10, 'ap2' => 10]);

    }
}
