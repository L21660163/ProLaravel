<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <login-page></login-page>
    </div>
    
    <!-- Agregue esto para debug -->
    <script>
        console.log('Vue app mounting point:', document.getElementById('app'));
    </script>
</body>
</html>