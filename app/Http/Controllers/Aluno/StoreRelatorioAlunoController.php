<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use App\Models\Relatorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreRelatorioAlunoController extends Controller
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
            $data['aluno_id'] = Auth::user()->id;
            $request->only('relatorio');


            $relatorio = Relatorio::create($data);

            return response()->json([
                'mensagem' => 'Relatário inserido com sucesso'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'mensagem' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
