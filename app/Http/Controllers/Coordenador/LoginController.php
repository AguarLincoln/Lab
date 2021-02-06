<?php

namespace App\Http\Controllers\Coordenador;

use App\Http\Controllers\Controller;
use App\Models\Coordenador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = $request->only('email', 'senha');


        $coordenador = Coordenador::where('email', $data['email'])->first();

        if (is_object($coordenador)) {

            if (password_verify($data['senha'], $coordenador->senha)) {
                $token = $coordenador->createToken($coordenador->email, ['coordenador'])->accessToken;

                return response()->json([
                    'status' => true,
                    'token' => $token,
                    'mensagem' => 'Login realizado com sucesso'
                ]);
            }

            return response()->json([
                'status' => false,
                'messagem' => 'dados invalidos/senha'
            ], 400);
        }

        return response()->json([
            'messagem' => 'dados invalidos/email'
        ], 400);
    }
}
