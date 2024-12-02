<form action="{{ route('archivo.subir') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre del archivo:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="archivo">Selecciona el archivo:</label>
        <input type="file" id="archivo" name="archivo" required>

        <button type="submit">Subir archivo</button>
    </form>

    <!-- Mostrar mensajes de éxito o error -->
    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</body>