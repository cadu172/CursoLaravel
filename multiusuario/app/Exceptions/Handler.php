<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use Illuminate\Auth\AuthenticationException; //includido por carlos para usar na função "unauthenticated"

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }


    /**
     * Handle an unauthenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     * INCLUIDO POR CARLOS EM 02/06/2022
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // rota padrão caso não esteja autenticado
        $routeName = "login";
        
        // caso seja um guard de login de administrador
        if ( $exception->guards()[0]=='admin'  ) {
            $routeName = "admin.login";        
        }

        //return response("unauthenticated: " . $exception->guards()[0]);
        return redirect()->guest(route($routeName));
    }    

}
