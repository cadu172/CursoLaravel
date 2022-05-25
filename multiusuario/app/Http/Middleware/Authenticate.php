<?php

namespace App\Http\Middleware;

use Closure; // incluido por carlos
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    
    // atributo da classe para ser usado na função de redirect
    //protected $guards = []; //incluido por carlos
    protected $guard;

    // substitui a função de handle herdada de "Middleware"
    //incluido por carlos
    /*public function handle($request, Closure $next, ...$guards)
    {        
        $this->guards = $guards;
        
        // chamar o método handle herdado
        return parent::handle($request, $next, ...$guards);
    }*/
    
    
    /**
     * Handle an unauthenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function unauthenticated($request, array $guards)
    {
        
        $this->guard = $guards[0];

        return response("Olá " . $this->guard);
        
        /*throw new AuthenticationException(
            'Unauthenticated.', $guards, $this->redirectTo($request)
        );*/
    }    
    
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    /*protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {            
            // caso seja um guarda do admin, redirecionar para o admin-login
             //incluido por carlos
            if ( $this->guards[0]==='admin' )
                return route('login-admin');

            // opção padrão
            return route('login');
        }        
    }*/


    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {            
            // opção padrão
            return route('login');
        }        
    }

}
