<?php

namespace App\Http\Controllers\Professor;

use App\Http\Controllers\Controller;
use App\Models\Professor;
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

        $this->validate($request, [
            'email' => 'required|unique:professores,email',
            'senha' => 'required|min:6|max:255'
        ]);

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
            Professor::create($data);
            return response()->json([
                'mensagem' => 'Professor cadastrado com sucesso'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'mensagem' => 'Error, por favor tente novamente mais tarde',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
