<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Role;

class AdminController extends Controller
{               
    public function index()
    {
        // Página principal para el administrador
        return view('admin.dashboard');
    }

    public function manageUsers()
    {
        // Gestión de usuarios (mostrar lista de usuarios)
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function assignRoles()
    {
        // Asignar roles a usuarios
        $roles = Role::all();
        $users = User::all();
        return view('admin.roles.assign', compact('roles', 'users'));
    }
}
