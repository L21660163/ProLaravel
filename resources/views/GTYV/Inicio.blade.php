<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Dinámico Actualizado</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #121212; /* Fondo oscuro */
            color: #f1f1f1; /* Texto claro */
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(45deg, #1e90ff, #000000);
            color: white;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo img {
            width: 40px;
            height: 40px;
        }

        .logo span {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .menu {
            display: flex;
            gap: 1.5rem;
        }

        .menu a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
            font-size: 1rem;
            transition: color 0.3s;
        }

        .menu a i {
            margin-right: 0.5rem;
        }

        .menu a:hover {
            color: #1e90ff;
        }

        .hamburguesa {
            display: none;
            flex-direction: column;
            gap: 0.3rem;
            cursor: pointer;
        }

        .hamburguesa div {
            width: 25px;
            height: 3px;
            background: white;
            transition: transform 0.3s;
        }

        .menu-desplegable {
            display: none;
            flex-direction: column;
            background: linear-gradient(45deg, #1e90ff, #000000);
            position: absolute;
            top: 60px;
            right: 10px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .menu-desplegable a {
            display: flex;
            align-items: center;
            padding: 1rem;
            text-decoration: none;
            color: white;
            font-size: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            transition: background 0.3s;
        }

        .menu-desplegable a i {
            margin-right: 0.5rem;
        }

        .menu-desplegable a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .menu-desplegable a:last-child {
            border-bottom: none;
        }

        .submenu {
            display: none;
            flex-direction: column;
            background: rgba(30, 144, 255, 0.9);
            padding-left: 1rem;
        }

        .submenu a {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }

        .submenu a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        @media (max-width: 768px) {
            .menu {
                display: none;
            }

            .hamburguesa {
                display: flex;
            }
        }

        /* Estilos para el contenido principal */
        section {
            padding: 2rem;
            background-color: #181818;
            border-radius: 8px;
            margin-top: 100px; /* Para evitar que se sobreponga con el header fijo */
        }

        h1 {
            color: #f1f1f1;
            margin-bottom: 1rem;
        }

        .catalogo {
            margin-top: 1rem;
        }

        .boton {
            background-color: #1e90ff;
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            margin: 0.5rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .boton:hover {
            background-color: #0f7aff;
        }

        .boton:active {
            background-color: #1e90ff;
        }

        .resultado {
            margin-top: 2rem;
            color: #f1f1f1;
        }

        /* Estilos de las empresas */
        .empresa {
            margin-bottom: 1rem;
        }

        .empresa strong {
            color: #1e90ff;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="https://matehuala.tecnm.mx/SEPRET/Assets/img/favicon.png" alt="Logo SEPRET">
                <span>SEPRET</span>
            </div>
            <div class="menu">
                <a href="Inicio.html"><i class="fas fa-home"></i>Inicio</a>
                <a href="#sobre-mi"><i class="fas fa-user"></i>Departamento Gestión Tecnológica y Vinculación</a>
                <a href="#residencias" onclick="toggleSubmenu(event, 'submenu-residencias')"><i class="fas fa-folder"></i>Residencias</a>
                <div id="submenu-residencias" class="submenu">
                    <a href="#empresas"><i class="fas fa-building"></i>Empresas</a>
                    <a href="carta.blade.php"><i class="fas fa-file-alt"></i>Carta de presentación</a>
                </div>
            </div>
            <div class="hamburguesa" onclick="toggleMenu()">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </nav>
        <div class="menu-desplegable" id="menu-desplegable">
            <a href="Inicio.html"><i class="fas fa-home"></i>Inicio</a>
            <a href="#sobre-mi"><i class="fas fa-user"></i>Departamento Gestión Tecnológica y Vinculación</a>
            <a href="#residencias" onclick="toggleSubmenu(event, 'submenu-desplegable-residencias')"><i class="fas fa-folder"></i>Residencias</a>
            <div id="submenu-desplegable-residencias" class="submenu">
                <a href="#empresas"><i class="fas fa-building"></i>Empresas</a>
                <a href="carta.blade.php"><i class="fas fa-file-alt"></i>Carta de presentación</a>
            </div>
        </div>
    </header>

    <section id="inicio">
        <h1>Catálogo de Empresas</h1>
        <div class="catalogo">
            <button class="boton" onclick="mostrarEmpresasActivas()">Activas</button>
            <button class="boton" onclick="mostrarEmpresasInactivas()">Inactivas</button>
        </div>
        <div id="resultado" class="resultado"></div>
    </section>

    <script>
        function mostrarEmpresasActivas() {
            const empresasActivas = [
                { nombre: "Empresa A", rfc: "RFC123456" },
                { nombre: "Empresa B", rfc: "RFC789012" }
            ];

            const resultado = document.getElementById('resultado');
            resultado.innerHTML = '<h2>Empresas Activas</h2>' + empresasActivas.map(empresa => `
                <p><strong>${empresa.nombre}</strong> - RFC: ${empresa.rfc}</p>
            `).join('');
        }

        function mostrarEmpresasInactivas() {
            const empresasInactivas = [
                { nombre: "Empresa C", rfc: "RFC345678" },
                { nombre: "Empresa D", rfc: "RFC901234" }
            ];

            const resultado = document.getElementById('resultado');
            resultado.innerHTML = '<h2>Empresas Inactivas</h2>' + empresasInactivas.map(empresa => `
                <p><strong>${empresa.nombre}</strong> - RFC: ${empresa.rfc}</p>
            `).join('');
        }

        function toggleMenu() {
            const menuDesplegable = document.getElementById('menu-desplegable');
            const isDisplayed = menuDesplegable.style.display === 'flex';
            menuDesplegable.style.display = isDisplayed ? 'none' : 'flex';
        }

        function toggleSubmenu(event, submenuId) {
            event.preventDefault();
            const submenu = document.getElementById(submenuId);
            const isDisplayed = submenu.style.display === 'flex';
            submenu.style.display = isDisplayed ? 'none' : 'flex';
        }
    </script>
</body>
</html>
