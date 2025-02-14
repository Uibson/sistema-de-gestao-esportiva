<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Override the authenticated method to redirect based on user role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated($request, $user)
    {
        // Verifique o nível de usuário (role) e redirecione de acordo
        switch ($user->role->name) {
            case 'Admin':
                return redirect()->route('admin.dashboard'); // Redirecionar para o painel do Admin
            case 'Gestor':
                return redirect()->route('gestor.dashboard'); // Redirecionar para o painel do Gestor
            case 'Coordenador':
                return redirect()->route('coordenador.dashboard'); // Redirecionar para o painel do Coordenador
            case 'Operador':
                return redirect()->route('operador.dashboard'); // Redirecionar para o painel do Operador
            default:
                return redirect()->route('home'); // Redireciona para o home caso o papel não seja reconhecido
        }
    }
}
