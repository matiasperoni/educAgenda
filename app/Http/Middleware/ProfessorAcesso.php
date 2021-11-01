<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProfessorAcesso
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
        if(Auth::check() && Auth::users()->professor) {
            return $next($request);
        }
        dd('Acesso negado, vc nao e um professor');
        
    }
}
