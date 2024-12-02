<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Models\Role;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    // Autenticar al usuario
    $request->authenticate();

    // Regenerar la sesión para protegerla contra ataques
    $request->session()->regenerate();

    // Obtener el rol del usuario
    $user = Auth::user();
    $role = $user->roles->first(); // Suponiendo que un usuario solo tiene un rol

    // Redirigir según el rol
    if ($role) {
        switch ($role->name) {
            case 'admin':
                return redirect()->route('admin');
            case 'alumno':
                return redirect()->route('alumno');
            case 'docente':
                return redirect()->route('docente');
            default:
                return redirect()->route('home');
        }
    }

    // Si no tiene rol, redirige al home
    return redirect()->route('home');
}




    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
