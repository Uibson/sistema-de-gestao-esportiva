<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // Removemos a propriedade $redirectTo estática
    // protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Exibe o formulário de registro e carrega os perfis de acesso.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        // Busca todos os perfis de acesso (roles)
        $roles = Role::all();

        // Passa as roles para a view
        return view('auth.register', compact('roles'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Máximo 2MB
            'role_id' => ['required', 'exists:roles,id'],
            'status' => ['required', 'boolean'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $photoPath = $data['photo']->store('photos', 'public'); // Salva a foto no disco público

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'photo' => $photoPath,
            'role_id' => $data['role_id'],
            'status' => $data['status'],
        ]);
    }

    /**
     * Determine where to redirect users after registration.
     *
     * @return string
     */
    protected function redirectTo()
    {
        // Obtenha o usuário recém-criado
        $user = auth()->user();

        // Redirecione com base no perfil (role) do usuário
        if ($user->role->name === 'Admin') {
            return '/admin/dashboard'; // Rota específica para Admin
        } elseif ($user->role->name === 'Gestor') {
            return '/gestor/dashboard'; // Rota específica para Gestor
        } elseif ($user->role->name === 'Coordenador') {
            return '/coordenador/dashboard'; // Rota específica para Coordenador
        } elseif ($user->role->name === 'Operador') {
            return '/operador/dashboard'; // Rota específica para Operador
        }

        // Caso padrão (se nenhum perfil corresponder)
        return '/home';
    }
}
