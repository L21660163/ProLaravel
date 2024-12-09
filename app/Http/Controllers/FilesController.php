<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\MyFile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\ResidenceProjectFile;

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
    $request->validate([
        'nombre' => 'required|string|max:255',
        'archivo' => 'required|file|mimes:jpg,jpeg,png,pdf,docx',
        'seccion' => 'required|string', // Campo para identificar la sección
    ]);

    $userId = Auth::id();
    $userFolder = 'usuarios/' . $userId;

    if (!Storage::exists($userFolder)) {
        Storage::makeDirectory($userFolder);
    }

    $file = $request->file('archivo');
    $prefix = Str::slug($request->input('seccion')); // Prefijo basado en la sección
    $filename = $prefix . '-' . Str::slug($request->input('nombre')) . '.' . $file->getClientOriginalExtension();

    $file->storeAs($userFolder, $filename, 'public');

    return redirect()->back()->with('success', 'Archivo cargado exitosamente.');
}



//Reporte preliminar

public function file(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:pdf',
        'id_project' => 'required|integer',
    ]);

    // Si llegamos aquí, la validación fue exitosa
    $userId = Auth::user()->id;

    try {
        $file = $request->file('file');
        $fileName = time() . '-' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads', $fileName);

        return response()->json([
            'message' => 'Archivo subido exitosamente',
            'path' => $path,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Error al procesar el archivo',
            'details' => $e->getMessage(),
        ], 500);
    }

}
}
