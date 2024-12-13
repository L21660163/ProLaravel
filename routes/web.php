<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ResidenceProjectController;
use App\Http\Controllers\AlumnoController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/division', function () {
    return view('division');
})->middleware(['auth', 'verified'])->name('division');

Route::get('/gestion', function () {
    return view('GTyV/index');
})->middleware(['auth', 'verified'])->name('gestion');

Route::get('/academico', function () {
    return view('academico');
})->middleware(['auth', 'verified'])->name('academico');

Route::get('/jefeCarrera', function () {
    return view('jefeCarrera');
})->middleware(['auth', 'verified'])->name('jefeCarrera');

Route::get('/alumno/alumno', function () {
    return view('alumno');
})->middleware(['auth', 'verified'])->name('alumno');

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'verified'])->name('admin');

Route::get('/docente', function () {
    return view('docente');
})->middleware(['auth', 'verified'])->name('docente');

Route::get('/formatos', function () {
    return view('/alumno/partials/formatos');
})->name('formatos');

Route::get('/carta-acep', function () {
    return view('/alumno/formatos/carta-aceptacion');
});

Route::get('/carta-pres', function () {
    return view('/alumno/formatos/carta-presentacion');
});

Route::get('/fromato8a', function () {
    return view('/alumno/formatos/formato8a');
});

Route::get('/formato8b', function () {
    return view('/alumno/formato8b');
});

Route::get('/formato9', function () {
    return view('/alumno/formatos/formato9');
});

Route::get('/carta-term', function () {
    return view('/alumno/formatos/carta-terminacion');
});

Route::get('/inf-tec', function () {
    return view('/alumno/formatos/informe-tecnico');
});

Route::get('/test-roles', function () {
    $user = Auth::user();
    
    if ($user) {
        dd($user->roles);
    } else {
        return "No hay usuario autenticado.";
    }
});

Route::post('/archivo/subir', [ArchivoController::class, 'subir'])->name('archivo');
Route::get('/archivo/{archivo}', [ArchivoController::class, 'descargar'])->name('archivo.descargar');
Route::get('/dashboard', [ArchivoController::class, 'mostrarArchivos'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/intranet', function () {
    return redirect()->away('https://matehuala.tecnm.mx/intranet/');
})->name('intranet');



Route::resource('users', UserController::class);


Route::resource('users', UserController::class);  // Usamos resource para manejar todas las rutas de CRUD


 
Route::get('/api/permissions', function () {
    $permissions = Permission::all();  // Obtener todos los permisos desde la base de datos
    return response()->json($permissions);  // Retornar los permisos en formato JSON
});

Route::get('/api/users', function () {
    $users = User::with('roles:name')->get(['id', 'name', 'email']); // Incluye los roles con solo sus nombres
    return response()->json($users);
});


Route::get('/api/roles', function () {
    $roles = Role::all(['id', 'name']); // Solo obtener 'id' y 'name'
    return response()->json($roles);
});

Route::get('/api/user-roles/{user}', function ($id) {
    $user = User::findOrFail($id); // Busca al usuario por ID
    $roles = $user->getRoleNames(); // Obtiene los nombres de los roles asignados al usuario
    return response()->json($roles);
});


Route::post('/api/users', function (Illuminate\Http\Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'role' => 'required|string',
        'permission' => 'required|string',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    // Asignar rol y permiso
    $user->assignRole($request->role);
    $user->givePermissionTo($request->permission);

    return response()->json(['message' => 'Usuario creado con éxito'], 201);
});


// Esta ruta ahora pasa los archivos desde el controlador
Route::get('/dashboard', [ArchivoController::class, 'mostrarArchivos'])->middleware(['auth', 'verified'])->name('dashboard');


Route::post('/guardar-archivo', [FilesController::class, 'guardarArchivo']);
Route::get('/descargar-formatos', function () {
    $filePath = storage_path('app/public/DocumentosResidencias.zip');
    
    if (!file_exists($filePath)) {
        abort(404, 'El archivo no existe.');
    }

    return response()->download($filePath, 'DocumentosResidencias.zip');
})->name('descargar.formatos');


Route::get('/subir-archivo', function () {
    return view('upload');
})->middleware('auth');  // Asegúrate de que el usuario esté autenticado

Route::post('/subir-archivo', [FilesController::class, 'subir'])->name('archivo.subir')->middleware('auth');  // Asegúrate de que el usuario esté autenticado

Route::get('/person', [PersonController::class, 'index']);
Route::get('/person-departments', [TableController::class, 'getPersonDepartments']);
Route::get('/person-permissions', [TableController::class, 'getPersonPermissions']);
Route::get('/residence-adviser-types', [TableController::class, 'getResidenceAdviserTypes']);
Route::get('/residence-ambits', [TableController::class, 'getResidenceAmbits']);
Route::get('/residence-comment-types', [TableController::class, 'getResidenceCommentTypes']);
Route::get('/residence-comment-types', [TableController::class, 'getResidenceDictums']);
Route::get('/residence-documents', [TableController::class, 'getResidenceDocuments']);
Route::get('/residence-file-dictums', [TableController::class, 'getResidenceFileDictums']);
Route::get('/residence-file-types', [TableController::class, 'getResidenceFileTypes']);
Route::get('/residence-kinds', [TableController::class, 'getResidenceKinds']);
Route::get('/residence-natures', [TableController::class, 'getResidenceNatures']);
Route::get('/residence-project-phases', [TableController::class, 'getResidenceProjectPhases']);
Route::get('/residence-project-types', [TableController::class, 'getResidenceProjectTypes']);
Route::get('/residence-sectors', [TableController::class, 'getResidenceSectors']);
Route::get('/person_career', [TableController::class, 'getPersonCareer']);
Route::get('/residence-companies', [TableController::class, 'getResidenceCompanies']);




Route::post('/residence-projects', [ResidenceProjectController::class, 'store']);


Route::get('/get-user-projects', [ResidenceProjectController::class, 'getUserProjects']);


Route::middleware('auth')->group(function () {
    Route::get('/user-projects', [ResidenceProjectController::class, 'getUserProjects'])->name('user.projects');
    Route::get('/project/{id}', [ResidenceProjectController::class, 'show'])->name('project.show');
});

Route::middleware(['auth', 'verified'])->get('/alumno/alumno', [AlumnoController::class, 'index'])->name('alumno');

Route::post('/upload-report', [FilesController::class, 'file'])->name('upload.report');

Route::middleware(['auth', 'verified'])->post('/upload-report', [FilesController::class, 'file'])->name('upload.report');


use App\Http\Controllers\ResidenceCompanyController;
use App\Models\ResidenceProject;

Route::get('/companies', [ResidenceCompanyController::class, 'index'])->name('companies.index');

Route::put('/fase/update', [ResidenceProjectController::class, 'update'])->name('fase.update');


Route::get('/projects/{id}/update-phase', [ResidenceProjectController::class, 'showUpdatePhaseForm'])->name('projects.updatePhaseForm');
Route::put('/projects/{id}/update-phase', [ResidenceProjectController::class, 'updateProjectPhase'])->name('projects.updatePhase');


Route::get('/projects/career/cn', [ResidenceProjectController::class, 'getProjectsByCareer']);


Route::post('projects/update-phase/{id}', [ResidenceProjectController::class, 'updateProjectPhase']);


Route::get('/projects/phase/2', [ResidenceProjectController::class, 'getProjectsByPhase']);


Route::post('/upload-file', [ResidenceProjectController::class, 'uploadFile']);

Route::get('/projects/{id}/files', [ResidenceProjectController::class, 'getProjectFiles']);


Route::get('/files/view/{id}', [ResidenceProjectController::class, 'viewFile'])->name('files.view');
Route::post('/document/upload', [ResidenceProjectController::class, 'uploadDocument'])->name('document.upload');

Route::get('/mis-documentos', [ResidenceProjectController::class, 'myDocuments'])->name('my.documents');






//Odalys
Route::get('/subir-archivo', function () {
    return view('upload');
})->middleware('auth');  // Asegúrate de que el usuario esté autenticado

Route::post('/subir-archivo', [FilesController::class, 'subir'])->name('archivo.subir')->middleware('auth');  // Asegúrate de que el usuario esté autenticado

use App\Http\Controllers\JefeAcademiaController;

Route::get('/jefeacademia', [JefeAcademiaController::class, 'index'])->name('jefeacademia.index');
Route::get('/proyecto/{id}', [JefeAcademiaController::class, 'detalle'])->name('proyecto.detalle');
Route::get('/proyecto/crear', [JefeAcademiaController::class, 'crear'])->name('proyecto.crear');
Route::post('/proyecto', [JefeAcademiaController::class, 'store'])->name('proyecto.store');

use App\Http\Controllers\ProyectoController;

// Route::resource('proyectos', ProyectoController::class);

use App\Http\Controllers\JefeDeAcademiaController;

Route::prefix('jefedeacademia')->group(function () {
    Route::get('/', [JefeDeAcademiaController::class, 'index'])->name('jefedeacademia.index');
    
    // Ruta única para aceptar o rechazar proyectos
    Route::post('/{id}/proceso', [JefeDeAcademiaController::class, 'proceso'])->name('jefedeacademia.proceso');
});

use App\Http\Controllers\DepartmentHeadController;

Route::get('/jefe-departamento', [DepartmentHeadController::class, 'index'])->name('department.head');


// Subir proyecto
Route::get('/subirproyecto', [ResidenceProjectController::class, 'index'])->name('residenceproject.index');
Route::post('/subirproyecto/store', [ResidenceProjectController::class, 'store'])->name('residenceproject.store');

Route::get('/gtv', [ResidenceCompanyController::class, 'index'])->name('gtv.index');
Route::post('/gtv', [ResidenceCompanyController::class, 'store'])->name('gtv.store');







// Rutas de coordinadores
Route::get('/coordinador/copu', function () {
    return view('/division/Coordinador-copu'); // Renderiza la vista 'Coordinador-copu.blade.php'
})->name('copu');

Route::get('/coordinador/iciv', function () {
    return view('/division/Coordinador-iciv'); // Renderiza la vista 'Coordinador-iciv.blade.php'
})->name('iciv');

Route::get('/coordinador/igem', function () {
    return view('/division/Coordinador-igem'); // Renderiza la vista 'Coordinador-igem.blade.php'
})->name('igem');

Route::get('/coordinador/isic', function () {
    return view('/division/Coordinador-isic'); // Renderiza la vista 'Coordinador-isic.blade.php'
})->name('isic');

Route::get('/coordinador/iind', function () {
    return view('/division/Coordinador-iind'); // Renderiza la vista 'Coordinador-iind.blade.php'
})->name('iind');