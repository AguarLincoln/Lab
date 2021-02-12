<?php

namespace App\Http\Controllers\Vaga;

use App\Http\Controllers\Controller;
use App\Models\Vaga;
use Illuminate\Http\Request;

class AllController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Vaga::with('empresa')->get();
    }
}
