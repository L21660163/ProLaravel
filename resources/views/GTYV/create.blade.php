<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Empresa</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #121212; color: #f1f1f1; }
        .container { max-width: 800px; margin: auto; padding: 1rem; }
        h1 { text-align: center; color: #1e90ff; }
        form { display: grid; gap: 1rem; }
        label { font-weight: bold; }
        input, select, textarea { width: 100%; padding: 0.5rem; background: #222; color: #f1f1f1; border: 1px solid #444; border-radius: 5px; }
        button { padding: 0.7rem; background-color: #1e90ff; color: white; border: none; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registrar Empresa</h1>
        <form method="POST" action="{{ route('empresas.store') }}">
            @csrf
            <label for="id_compania">ID Compañía:</label>
            <input type="text" name="id_compania" required>
            
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
            
            <label for="rfc">RFC:</label>
            <input type="text" name="rfc" required>
            
            <label for="direccion">Dirección:</label>
            <textarea name="direccion" required></textarea>
            
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" required>
            
            <label for="correo_electronico">Correo Electrónico:</label>
            <input type="email" name="correo_electronico" required>
            
            <label for="representante">Representante:</label>
            <input type="text" name="representante" required>
            
            <label for="giro">Giro:</label>
            <input type="text" name="giro" required>
            
            <label for="estatus">Estatus:</label>
            <select name="estatus" required>
                <option value="activa">Activa</option>
                <option value="inactiva">Inactiva</option>
            </select>
            
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
