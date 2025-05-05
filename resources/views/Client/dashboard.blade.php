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
            background: linear-gradient(-45deg, #7f1d1d, #000000, #7f1d1d, #000000);
            background-size: 400% 400%;
            animation: gradient-x 15s ease infinite;
        }
    </style>
</head>
<body class="bg-animated text-white min-h-screen py-10 px-5">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-4xl font-extrabold text-center mb-12 drop-shadow-lg">
            Contenido Disponible por Línea
        </h1>

        @foreach($lines as $line)
            <div class="mb-12 border-l-4 border-red-500 pl-6 bg-black/40 p-6 rounded-xl shadow-lg">
                <h2 class="text-2xl font-semibold text-white mb-4">
                    Línea de Producción: <span class="text-red-400">{{ $line->name }}</span>
                </h2>

                @forelse($line->models as $model)
                    <div class="bg-black/60 p-5 rounded-lg mb-6 border border-white/10">
                        <h3 class="text-xl font-bold text-red-300">Modelo: {{ $model->name }}</h3>

                        <ul class="mt-3 list-disc list-inside text-sm text-white/90">
                            @forelse($model->workInstructions as $instruction)
                                <li>{{ $instruction->title }}</li>
                            @empty
                                <li class="text-gray-400 italic">No hay instrucciones asignadas</li>
                            @endforelse
                        </ul>

                        @php
                            $monitor = $model->monitors->first();
                        @endphp

                        @if($monitor && $monitor->token)
                            <div class="mt-4">
                                <a href="{{ route('client.display', ['token' => $monitor->token]) }}"
                                   class="inline-block bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded shadow transition">
                                    Ver en monitor
                                </a>
                            </div>
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

