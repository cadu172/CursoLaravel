<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_LOGIN;

    public function index() {        
        return view("auth.admin-login");        
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin'); 
    }

    public function login(Request $request) {
        
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // retorna true ou false ao realizar login
        $loginSuccess = Auth::guard('admin')->attempt($credentials, $request->filled('remember'));

        /*
        redireciona para a página do dashboard */
        if ( $loginSuccess ) {
            return redirect()->intended(route('admin.dashboard'));
        }

        // volta para página anterior
        return redirect()->back()->withInputs($request->only(['email','remember']));

    }


    //public function logout(Request $request) {        
        /*
        // deslogar o guard admin
        Auth::guard('admin')->logout(); 
        
        // volta para página de login padrão
        return redirect()->guest(route('admin.login'));*/
    //}    
}


/**** falta ajustar a rotina de logout do usuário comun e do admin
quando estou deslogando com o admin ele está chamando o logou de usuário comum ai não desloga, precisa ver qual usuário está sendo chamado no logout e matar a sessão dele*/