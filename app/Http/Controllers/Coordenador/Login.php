<?php

namespace App\Http\Controllers\Coordenador;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\Coordenador;
use App\Models\Professor;
use Illuminate\Http\Request;

class Login extends Controller
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

        $aluno = Aluno::where('email', $data['email'])->first();

        if (is_object($aluno)) {

            if (password_verify($data['senha'], $aluno->senha)) {
                $token = $aluno->createToken($aluno->email, ['aluno'])->accessToken;

                return response()->json([
                    'status' => true,
                    'token' => $token,
                    'tipo' => 'aluno',
                    'mensagem' => 'Login realizado com sucesso'
                ]);
            }

            return response()->json([
                'status' => false,
                'messagem' => 'dados invalidos'
            ], 400);
        }

        $coordenador = Coordenador::where('email', $data['email'])->first();

        if (is_object($coordenador)) {

            if (password_verify($data['senha'], $coordenador->senha)) {
                $token = $coordenador->createToken($coordenador->email, ['coordenador'])->accessToken;

                return response()->json([
                    'status' => true,
                    'token' => $token,
                    'tipo' => 'coordenador',
                    'mensagem' => 'Login realizado com sucesso'
                ]);
            }

            return response()->json([
                'status' => false,
                'messagem' => 'dados invalidos/senha'
            ], 400);
        }

        $professor = Professor::where('email', $data['email'])->first();

        if (is_object($professor)) {

            if (password_verify($data['senha'], $professor->senha)) {
                $token = $professor->createToken($professor->email, ['professor'])->accessToken;

                return response()->json([
                    'status' => true,
                    'token' => $token,
                    'tipo' => 'professor',
                    'mensagem' => 'Login realizado com sucesso'
                ]);
            }

            return response()->json([
                'messagem' => 'dados invalidos'
            ], 400);
        }

        return response()->json([
            'messagem' => 'dados invalidos/email'
        ], 400);
    }
}
