<?php

namespace App\Http\Controllers\Vaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CandidatarController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        //$user->vagas()->toggle() //adicionar vaga ao usuario  
        return $user;
    }
}
