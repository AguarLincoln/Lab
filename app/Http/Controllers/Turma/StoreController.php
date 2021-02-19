<?php

namespace App\Http\Controllers\Turma;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = $request->only(
            'semestre',
            'inicio',
            'fim',
            'professor_id'
        );

        try {
            $turma = Turma::create($data);

            return response()->json([
                'mensagem' => 'Turma Cadastrada com sucesso'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'mensagem' => 'tente novamente mais tarde',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
