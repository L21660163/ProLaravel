<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function index()
{
    $roles = Role::all();  // Asegúrate de usar la variable $roles en minúsculas // Asegúrate de obtener los permisos también

    // Pasa las variables correctamente a la vista
    return view('dashboard', compact('roles'));

    $permissions = Permission::all();
    Log::debug('Permissions:', $permissions->toArray());  // Esto imprimirá los permisos en el log
    return view('dashboard', compact('permissions'));
}


    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        Log::debug('Roles:', $roles->toArray());
        Log::debug('Permissions:', $permissions->toArray());
        
        return view('dashboard', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Crear un nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Asignar roles y permisos
        $user->assignRole($request->roles);
        $user->givePermissionTo($request->permissions);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('dashboard', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        // Sincronizar roles y permisos
        $user->syncRoles($request->roles);
        $user->syncPermissions($request->permissions);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
