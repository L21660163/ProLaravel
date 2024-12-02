<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\MyFile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FilesController extends Controller
{
    public function loadView()
    {
        $files = [];
        return view('files', ["files"=>$files]);
    }

    public function storeFile(Request $request)
    {
        // Validación del archivo
        $request->validate([
            'archivo' => 'required|mimes:pdf|max:2048',
            'nombre' => 'required|string|max:255',
        ]);

        // Lógica para guardar el archivo
        if ($archivo = $request->file('archivo')) {
            $path = $archivo->storeAs('archivos', $request->nombre . '.' . $archivo->getClientOriginalExtension());
            return back()->with('success', 'Archivo subido con éxito: ' . $path);
        }

        return back()->with('error', 'Error al subir el archivo.');
    }
    

    public function downloadFile($name)
    {

    }

    public function guardarArchivo(Request $request)
    {
        // Validar el archivo cargado
        $request->validate([
            'file' => 'required|file|mimes:pdf,jpg,png,docx|max:10240',
        ]);

        // Obtener el archivo
        $file = $request->file('file');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        
        // Guardar el archivo en el almacenamiento
        $filePath = $file->storeAs('archivos', $fileName, 'local');
        
        // Crear el registro en la base de datos
        MyFile::create([
            'Id_Person' => $request->input('id_person'), // Asigna el ID de la persona
            'Id_FileType' => $request->input('id_file_type'), // Asigna el tipo de archivo
            'Id_FileDictum' => $request->input('id_file_dictum'), // Asigna el dictamen
            'Nombre' => $fileName, // Nombre del archivo
            'Tipo' => $file->getClientMimeType(), // Tipo de archivo
            'Ruta' => $filePath, // Ruta donde se guarda el archivo
            'Active' => 1, // Marcamos como activo
            'TimeCreated' => Carbon::now(), // Fecha de creación
            'TimeUpdated' => Carbon::now(), // Fecha de actualización
        ]);

        return response()->json(['message' => 'Archivo guardado exitosamente']);
    }

    public function subir(Request $request)
    {
        // Validación del archivo
        $request->validate([
            'nombre' => 'required|string|max:255',
            'archivo' => 'required|file|mimes:jpg,jpeg,png,pdf,docx', // Agrega otros tipos de archivos si es necesario
        ]);

        // Obtenemos el archivo subido
        $file = $request->file('archivo');

        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Normalizamos el nombre del archivo para evitar caracteres especiales
        $filename = Str::slug($request->input('nombre')) . '.' . $file->getClientOriginalExtension();

        // Verificamos si la carpeta del usuario ya existe, si no, la creamos
        $userFolder = 'usuarios/' . $userId; // Carpeta del usuario por ID

        // Usamos la función 'exists' para verificar si la carpeta ya existe
        if (!Storage::exists($userFolder)) {
            // Crear la carpeta si no existe
            Storage::makeDirectory($userFolder);
        }

        // Guardamos el archivo en la carpeta del usuario
        $path = $file->storeAs($userFolder, $filename, 'public');

        // Redirigimos de nuevo con un mensaje de éxito
        return redirect()->back()->with('success', 'Archivo cargado exitosamente');
    }

}
