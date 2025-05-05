<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Monitor: {{ $monitor->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="refresh" content="60">
</head>
<body class="bg-black text-white min-h-screen p-10">
    <h1 class="text-3xl font-bold mb-6">
        Monitor: {{ $monitor->name }} - Modelo: {{ $monitor->productModel->name }}
    </h1>

    @foreach($instructions as $instruction)
        <div class="mb-6 border border-gray-700 p-4 rounded-lg bg-gray-800">
            <h2 class="text-xl font-semibold mb-2">{{ $instruction->title }}</h2>
            <p class="mb-2">{{ $instruction->description }}</p>
            @if($instruction->file_path)
                <a href="{{ asset('storage/' . $instruction->file_path) }}" target="_blank" class="text-blue-400 underline">
                    Ver archivo adjunto
                </a>
            @endif
        </div>
    @endforeach
</body>
</html>
