<?php

namespace App\Http\Controllers\Turma;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use Illuminate\Http\Request;

class DestroyStudentController extends Controller
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
            $turma = $turma->alunos()->detach($alunoId);

            return response()->json([
                'mensagem' => 'Aluno excluido da turma com sucesso'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'mensagem' => 'Error, tente novamente mais tarde',
                'error' => $e->getMessage()
            ]);
        }
    }
}
