<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-animated text-white min-h-screen">
    <div class="bg-black/80 min-h-screen flex flex-col">
        <header class="p-6 bg-red-600 shadow-lg flex items-center space-x-6">
            <img src="{{ asset('images/MW-LOGO-WHITE.png') }}" alt="Logo" class="w-16 h-16">
            <h1 class="text-3xl font-bold">Panel de Administrador</h1>  
        </header>
        <main class="flex-1 p-10">
            @yield('content')
        </main>
    </div>
</body>
</html>

