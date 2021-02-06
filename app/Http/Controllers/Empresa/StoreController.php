<?php

namespace App\Http\Controllers\Empresa;

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
            'nome_da_empresa',
            'cnpj',
            'email',
            'telefone',
            'nome_representante',
            'cpf_representante',
            'email_representante',
            'telefone_representante',
            'endereco',
            'numero',
            'bairro',
            'complemento',
            'cep',
            'cidade'
        );

        try {
            DB::table('empresas')->insert($data);

            return response()->json([
                'menssagem' => 'Empresa cadastrada com sucesso!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'menssagem' => 'Error tente novamente mais tarde',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
