<?php

namespace App\Http\Controllers\Professor\Vaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'empresa_id',
            'valor',
            'endereco',
            'bairro',
            'cidade',
            'email',
            'telefone'
        );

        try {
            DB::table('vagas')->insert($data);

            return response()->json([
                'status' => true,
                'menssagem' => 'Vaga cadastrada com sucesso'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'mensagem' => 'Erro de cadastro, tente novamente mais tarde!',
                'error' => $e->getMessage()
            ]);
        }
    }
}
