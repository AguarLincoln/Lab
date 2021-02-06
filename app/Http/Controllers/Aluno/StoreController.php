<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
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
            'nome',
            'sexo',
            'data_nasc',
            'email',
            'senha',
            'cpf',
            'rg',
            'telefone',
            'endereco',
            'numero',
            'bairro',
            'complemento',
            'cep',
            'cidade'
        );

        $data['senha'] = bcrypt($data['senha']);

        try {
            Aluno::create($data);
            return response()->json([
                'mensagem' => 'Aluno cadastrado com sucesso'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'mensagem' => 'Error, por favor tente novamente mais tarde',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
