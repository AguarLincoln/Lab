<?php

namespace App\Http\Controllers\Turma;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use Illuminate\Http\Request;

class ApStudentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $alunoId)
    {
        $data = $request->only('ap1', 'ap2', 'ap3');

        try {

            $turma = Turma::all();
            return $turma;
            $turma = $turma->alunos()->updateExistingPivot($alunoId, $data);
            //$turma = $turma->alunos()->updateExistingPivot($alunoId, ['ap1' => 10, 'ap2' => 10]);

            return response()->json([
                'menssagem' => 'Notas atualizada com sucesso',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'menssagem' => 'Error, tente novamente mais tarde',
                'error' => $e->getMessage()
            ]);
        }
    }
}
