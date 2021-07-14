<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use App\Models\Relatorio;
use Illuminate\Http\Request;

class AllRelatorioController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return response()->json([
            'dados' => Relatorio::all()
        ]);
    }
}
