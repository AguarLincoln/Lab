<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
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


        $aluno = Aluno::where('email', $data['email'])->first();

        if (is_object($aluno)) {

            if (password_verify($data['senha'], $aluno->senha)) {
                $token = $aluno->createToken($aluno->email, 'aluno')->accessToken;

                return response()->json([
                    'status' => true,
                    'token' => $token,
                    'mensagem' => 'Login realizado com sucesso'
                ]);
            }

            return response()->json([
                'status' => false,
                'messagem' => 'dados invalidos'
            ], 400);
        }

        return response()->json([
            'messagem' => 'dados invalidos'
        ], 400);
    }
}
