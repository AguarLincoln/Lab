<?php

namespace App\Http\Controllers\Vaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatarController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $user = auth()->user();

        $user->vagas()->toggle($id); //adicionar vaga ao usuario  

        $data = DB::select('select * from aluno_vagas');
        return $data;
    }
}
