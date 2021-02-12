<?php

namespace App\Http\Controllers\Coordenador;

use App\Http\Controllers\Controller;
use App\Models\Coordenador;
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
            'email' => 'required|unique:coordenadores,email',
            'senha' => 'required|min:6|max:255'
        ]);

        $data = $request->only(['nome', 'email', 'senha']);
        $data['senha'] = bcrypt($data['senha']);

        try {
            Coordenador::create($data);

            return response()->json([
                'mensagem' => 'Usuario cadastrado com sucesso!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'mensagem' => 'Error ao cadastrar, tente novamente mais tarde',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
