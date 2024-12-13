<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta de Presentación</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #f1f1f1;
        }

        header {
            background: linear-gradient(45deg, #1e90ff, #000000);
            padding: 1rem;
            text-align: center;
            color: white;
        }

        header button {
            background-color: #1e90ff;
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 1rem;
            transition: background-color 0.3s;
        }

        header button:hover {
            background-color: #0f7aff;
        }

        main {
            max-width: 800px;
            margin: 2rem auto;
            background-color: #181818;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #1e90ff;
        }

        form {
            display: grid;
            gap: 1rem;
        }

        label {
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #222;
            color: #f1f1f1;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #1e90ff;
            outline: none;
        }

        button {
            background-color: #1e90ff;
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0f7aff;
        }

        button:active {
            background-color: #1e90ff;
        }

        .resultado {
            margin-top: 2rem;
            padding: 1rem;
            background-color: #222;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Carta de Presentación</h1>
        <button onclick="redirigirInicio()">Volver a Inicio</button>
    </header>
    <main>
        <form id="formCarta">
            <div>
                <label for="id_compania">ID Compañía:</label>
                <input type="text" id="id_compania" name="id_compania" required>
            </div>
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div>
                <label for="rfc">RFC:</label>
                <input type="text" id="rfc" name="rfc" required>
            </div>
            <div>
                <label for="direccion">Dirección:</label>
                <textarea id="direccion" name="direccion" rows="3" required></textarea>
            </div>
            <div>
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required>
            </div>
            <div>
                <label for="correo_electronico">Correo Electrónico:</label>
                <input type="email" id="correo_electronico" name="correo_electronico" required>
            </div>
            <div>
                <label for="representante">Representante:</label>
                <input type="text" id="representante" name="representante" required>
            </div>
            <div>
                <label for="giro">Giro:</label>
                <input type="text" id="giro" name="giro" required>
            </div>
            <div>
                <label for="estatus">Estatus:</label>
                <select id="estatus" name="estatus" required>
                    <option value="activa">Activa</option>
                    <option value="inactiva">Inactiva</option>
                </select>
            </div>
            <button type="button" onclick="guardarCarta()">Guardar</button>
        </form>

        <div id="resultado" class="resultado" style="display: none;"></div>
    </main>

    <script>
        function redirigirInicio() {
            window.location.href = "Inicio.blade.php";
        }

        function guardarCarta() {
            const form = document.getElementById('formCarta');
            const formData = new FormData(form);

            // Crear un objeto con los datos del formulario
            const datos = {};
            formData.forEach((value, key) => {
                datos[key] = value;
            });

            // Mostrar los datos en el contenedor "resultado"
            const resultado = document.getElementById('resultado');
            resultado.style.display = 'block';
            resultado.innerHTML = `
                <h2>Datos Guardados</h2>
                <p><strong>ID Compañía:</strong> ${datos.id_compania}</p>
                <p><strong>Nombre:</strong> ${datos.nombre}</p>
                <p><strong>RFC:</strong> ${datos.rfc}</p>
                <p><strong>Dirección:</strong> ${datos.direccion}</p>
                <p><strong>Teléfono:</strong> ${datos.telefono}</p>
                <p><strong>Correo Electrónico:</strong> ${datos.correo_electronico}</p>
                <p><strong>Representante:</strong> ${datos.representante}</p>
                <p><strong>Giro:</strong> ${datos.giro}</p>
                <p><strong>Estatus:</strong> ${datos.estatus}</p>
            `;

            // Limpiar el formulario
            form.reset();
        }
    </script>
</body>
</html>
