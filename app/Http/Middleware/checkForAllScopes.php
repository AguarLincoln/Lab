<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkForAllScopes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$scopes)
    {
        if (!$request->user() || !$request->user()->token()) {
            return response()->json(['Error, tente novamente mais tarde']);
        }

        foreach ($scopes as $scope) {
            if ($request->user()->tokenCan($scope)) {
                return $next($request);
            }
        }

        return response()->json([
            'menssagem' => 'Não autorizado'
        ], 403);
    }
}
