<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use App\Models\Relatorio;
use Illuminate\Http\Request;

class StoreRelatorioController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        try {
            $data = $request->only('id');

            $savedPdf = $request->file('relatorio');

            if ($savedPdf) {
                $savedPdf = $savedPdf->store('relarorio/pdf/');
                $data['relatorio'] = $savedPdf;
            }

            $relatorio = Relatorio::create($data);

            return response()->json([
                'mensagem' => 'Relatário inserido com sucesso'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'mensagem' => 'Error',
                'error' => $e->getMessage()
            ]);
        }
    }
}
