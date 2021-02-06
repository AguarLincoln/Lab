<?php

namespace App\Http\Controllers\Professor;

use App\Http\Controllers\Controller;
use App\Models\Professor;
use Illuminate\Http\Request;


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


        $professor = Professor::where('email', $data['email'])->first();

        if (is_object($professor)) {

            if (password_verify($data['senha'], $professor->senha)) {
                $token = $professor->createToken($professor->email)->accessToken;

                return response()->json([
                    'status' => true,
                    'token' => $token,
                    'mensagem' => 'Login realizado com sucesso'
                ]);
            }

            return response()->json([
                'messagem' => 'dados invalidos'
            ], 400);
        }

        return response()->json([
            'messagem' => 'dados invalidos'
        ], 400);
    }
}
