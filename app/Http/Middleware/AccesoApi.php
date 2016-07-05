<?php

namespace App\Http\Middleware;

use App\ApiAcceso;
use Closure;

class AccesoApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $apiAcceso = new ApiAcceso();
        if($request->hasHeader('donaVeApiAcceso')){
            if($apiAcceso->tokenValido($request->header('donaVeApiAcceso'))){
                return $next($request);
            }
            abort(403, 'Unauthorized action.');
        }
        abort(403, 'Unauthorized action.');
    }
}
