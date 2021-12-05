<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    public function __construct() {
        $this->middleware("guest:admin-web");
    }

    public function login (Request $request) {

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];


        $validarLogin = Auth::guard("admin-web")->attempt($credentials, $request->remember);

        if ( $validarLogin )
        {

            return redirect()->intended(route('admin.dashboard'));

        }

        return redirect()->back()->withIOnputs($request->onley('email', 'remember'));


    }

    public function index() {
        return view("auth.admin-login");
    }
}
