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

            $aluno = DB::table('alunos')
                ->leftJoin('avaliacoes', 'alunos.id', '=', 'avaliacoes.aluno_id')
                ->whereNULL('avaliacoes.aluno_id')->get();

            return $aluno;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
