<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Digital Signage System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes gradient-x {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }
        .bg-animated {
            background: linear-gradient(-45deg,rgb(0, 4, 255),rgb(0, 0, 0),rgb(0, 4, 255),rgb(0, 0, 0));
            background-size: 400% 400%;
            animation: gradient-x 10s ease infinite;
        }
    </style>
</head>
<body class="bg-animated text-white min-h-screen py-10 px-5">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-4xl font-bold mb-10 text-center">Contenido Disponible por Línea</h1>

        @foreach($lines as $line)
            <div class="mb-10 bg-black/50 p-5 rounded-xl shadow-xl">
                <h2 class="text-2xl font-semibold mb-4">Línea: {{ $line->name }}</h2>

                @forelse($line->models as $model)
                    <div class="bg-gray-800 p-4 rounded-lg mb-4">
                        <h3 class="text-xl font-bold">Modelo: {{ $model->name }}</h3>

                        <ul class="list-disc list-inside mt-2">
                            @forelse($model->workInstructions as $instruction)
                                <li>{{ $instruction->title }}</li>
                            @empty
                                <li class="text-gray-400">No hay instrucciones asignadas</li>
                            @endforelse
                        </ul>

                        @php
                            $monitor = $model->monitors->first();
                        @endphp

                        @if($monitor && $monitor->token)
                            <a href="{{ route('client.display', ['token' => $monitor->token]) }}"
                               class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                                Ver en monitor
                            </a>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-300">No hay modelos asignados a esta línea.</p>
                @endforelse
            </div>
        @endforeach
    </div>
</body>
</html>
