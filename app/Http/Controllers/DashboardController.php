<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Event;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Registra o log sempre que o usuário realizar login
        $this->middleware(function ($request, $next) {
            $this->logLogin();
            return $next($request);
        });
    }

    public function index()
{
    $statistics = [
        'total_users' => User::count(),
        'total_roles' => Role::count(),
        'active_events' => Event::where('start_date', '<=', now())
                                ->where('end_date', '>=', now())
                                ->count(),
    ];

    $recent_events = Event::with('modality')
                        ->orderBy('start_date', 'desc')
                        ->take(5)
                        ->get();

    // Obtendo os últimos 10 logs com informações do usuário (de todos os níveis)
    $logs = Log::with('user')
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();

    // Passando as variáveis para a view
    return view('admin.dashboard', compact('statistics', 'recent_events', 'logs'));
}

    // Método para salvar log de login
    private function logLogin()
    {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'Usuário logado', // Garantindo que 'action' tenha um valor
        ]);
    }



    // Método para salvar log de alterações feitas no sistema
public function logAction($action)
{
    Log::create([
        'user_id' => Auth::id(), // ID do usuário que realizou a ação
        'action' => $action, // Corrigindo para o campo 'action'
    ]);
}

}
