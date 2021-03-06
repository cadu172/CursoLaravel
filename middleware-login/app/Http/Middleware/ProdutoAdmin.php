<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProdutoAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if ( $request->session()->exists("login")  )
        {
            if ( $request->session()->get("login")["admin"] )
            {
                return $next($request);
            }
            return redirect()->route("perfil_negado");
        }

        // saída padrão
        return redirect()->route("acesso_negado");
    }
}
