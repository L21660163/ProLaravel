<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $domain = '@matehuala.tecnm.mx';

        // Validación
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+'.preg_quote($domain, '/').'$/', // Validar que el correo termine con el dominio específico
                'unique:' . User::class,
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Generar el número de control
        $controlNumber = $this->generateControlNumber();

        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'control_number' => $controlNumber, // Asignar el número de control generado
        ]);

        // Asignar rol predeterminado (id = 1)
        DB::table('role_user')->insert([
            'role_id' => 1, // ID del rol Alumno
            'user_id' => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('alumno', absolute: false));
    }

    /**
     * Generate a unique control number for the user.
     *
     * @return string
     */
    private function generateControlNumber(): string
    {
        $yearPrefix = date('y'); // Obtener los últimos dos dígitos del año actual (por ejemplo, 2024 -> 24)
        $fixedPart = '660'; // Parte fija del número de control
        $randomPart = rand(100, 999); // Generar tres dígitos aleatorios entre 100 y 999

        $controlNumber = $yearPrefix . $fixedPart . $randomPart;

        // Verificar si el número de control ya existe en la base de datos
        while (User::where('control_number', $controlNumber)->exists()) {
            // Si el número de control ya existe, generar uno nuevo
            $randomPart = rand(100, 999);
            $controlNumber = $yearPrefix . $fixedPart . $randomPart;
        }

        return $controlNumber;
    }
}
