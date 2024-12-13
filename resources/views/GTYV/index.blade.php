<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Empresas</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #121212; color: #f1f1f1; }
        .container { max-width: 800px; margin: auto; padding: 1rem; }
        h1 { text-align: center; color: #1e90ff; }
        .empresas { margin-top: 1rem; }
        .empresas h2 { color: #1e90ff; }
        .empresa { margin-bottom: 0.5rem; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Catálogo de Empresas</h1>
        <div class="empresas">
            <h2>Empresas Activas</h2>
            @foreach ($empresasActivas as $empresa)
                <div class="empresa">{{ $empresa->nombre }} - RFC: {{ $empresa->rfc }}</div>
            @endforeach
        </div>
        <div class="empresas">
            <h2>Empresas Inactivas</h2>
            @foreach ($empresasInactivas as $empresa)
                <div class="empresa">{{ $empresa->nombre }} - RFC: {{ $empresa->rfc }}</div>
            @endforeach
        </div>
        <a href="{{ route('empresas.create') }}" style="display: block; margin-top: 1rem; color: #1e90ff;">Registrar Nueva Empresa</a>
    </div>
</body>
</html>
