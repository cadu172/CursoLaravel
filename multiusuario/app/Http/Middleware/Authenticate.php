<?php

namespace App\Http\Middleware;

use Closure; // incluido por carlos
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
   
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {                        
            return route('login');
        }        
    }

}
