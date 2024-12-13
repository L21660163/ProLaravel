<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

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
        $email = $request->input('email');
        $domain = '@matehuala.tecnm.mx';
        
        // Validar el dominio del correo
        if (!str_ends_with($email, $domain)) {
            return back()->withErrors([
                'email' => 'El correo debe pertenecer al dominio ' . $domain . '.',
            ])->onlyInput('email');
        }
    
        // Autenticar al usuario
        $request->authenticate();
    
        // Regenerar la sesión para protegerla contra ataques
        $request->session()->regenerate();
    
        // Obtener el usuario autenticado
        $user = Auth::user();
    
        // Verificar si el usuario tiene el rol "division"
        $role = $user->roles->first(); // Obtenemos el primer rol del usuario (si tiene varios roles)
    
        // Verificar si el usuario tiene el rol 'division'
        if ($role && $role->name === 'division') {
            // Buscar el departamento asociado al usuario en la tabla `is_a`
            $userDepartment = DB::table('is_a')
                ->where('id_user', $user->id)
                ->first(); // Suponiendo que solo hay un departamento asociado al usuario
    
            // Si el usuario tiene un departamento asociado
            if ($userDepartment) {
                // Redirigir según el departamento
                switch ($userDepartment->id_department) {
                    case 1:  // Ejemplo para el departamento 1
                        return redirect()->route('copu');
                    case 2:  // Ejemplo para el departamento 2
                        return redirect()->route('iciv');
                    case 3:  // Ejemplo para el departamento 3
                        return redirect()->route('igem');
                    case 4:  // Ejemplo para el departamento 4
                        return redirect()->route('isic');
                    case 5:  // Ejemplo para el departamento 5
                        return redirect()->route('iind');
                    default:
                        return redirect()->route('welcome');
                }
            } else {
                // Si no tiene departamento, redirigir a una página predeterminada
                return redirect()->route('dashboard');
            }
        }
    
        // Si el usuario no tiene el rol 'division', redirigir según otros roles
        switch ($role->name) {
            case 'admin':
                return redirect()->route('admin');
            case 'alumno':
                return redirect()->route('alumno');
            case 'docente':
                return redirect()->route('docente');
            case 'gestion':
                return redirect()->route('gestion');
            case 'jefe_carrera':
                return redirect()->route('department.head');
            case 'academico':
                return redirect()->route('jefedeacademia.index');
            default:
                return redirect()->route('dashboard');
        }
        
        // Si no tiene rol, redirige al home
        return redirect()->route('dashboard');
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
