@extends('layouts.admin')

@section('title', 'Asignar Modelo e Instrucción a Monitor')

@section('content')

<div class="max-w-3xl mx-auto bg-white/10 p-8 rounded-xl shadow mb-16">
    <h2 class="text-2xl font-bold mb-6 text-white">Asignación de Contenido</h2>
    <script src="{{ asset('js/assign-content.js') }}"></script>
    <form action="{{ route('admin.monitors.assign') }}" method="POST">
        @csrf

        {{-- MONITOR --}}
        <div class="mb-4">
            <label for="monitor_id" class="block mb-2 font-semibold text-white">Monitor:</label>
            <select name="monitor_id" id="monitor_id" class="w-full rounded p-2 text-black" required>
                <option value="">Seleccionar monitor</option>
                @foreach ($monitors as $monitor)
                    <option value="{{ $monitor->id }}" data-line-id="{{ $monitor->line->id }}">
                        {{ $monitor->name }} ({{ $monitor->ip_address }})
                    </option>
                @endforeach
            </select>

        </div>

        {{-- MODELOS agrupados por línea --}}
        <div class="mb-4">
            <label for="product_model_id" class="block mb-2 font-semibold text-white">Modelo:</label>
            <select name="product_model_id" id="product_model_id" class="w-full rounded p-2 text-black" required>
    <option value="">Seleccionar modelo</option>
    @foreach ($models as $model)
        <option value="{{ $model->id }}" data-line-id="{{ $model->line->id }}">
            {{ $model->name }} — Línea: {{ $model->line->name }}
        </option>
    @endforeach
</select>
        </div>

        {{-- INSTRUCCIONES agrupadas por modelo --}}
        <div class="mb-4">
            <label for="work_instructions" class="block mb-2 font-semibold text-white">Instrucciones:</label>
            <select name="work_instructions[]" id="work_instructions" class="w-full rounded p-2 text-black" multiple required>
    @foreach ($workInstructions as $instruction)
        <option value="{{ $instruction->id }}" data-model-id="{{ $instruction->model->id }}">
            {{ $instruction->title }} ({{ $instruction->model->name ?? '—' }})
        </option>
    @endforeach
</select>
        </div>

        {{-- BOTONES --}}
        <div class="flex justify-end space-x-3 mt-6">
            <a href="{{ route('admin.monitors.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Cancelar</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
                Asignar
            </button>
        </div>
    </form>
</div>

{{-- TABLA DE ASIGNACIONES --}}
<div class="max-w-6xl mx-auto">
    <h2 class="text-2xl font-bold mb-8 text-white">Asignaciones Actuales por Línea</h2>

    @foreach ($lines as $line)
        <div class="mb-12 bg-white/5 p-6 rounded-xl shadow">
            <h3 class="text-xl font-semibold text-red-400 mb-4">Línea: {{ $line->name }} ({{ $line->type }})</h3>

            @if ($line->monitors->count())
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white/10 text-white text-sm rounded-xl">
                        <thead class="bg-black/40 text-left">
                            <tr>
                                <th class="px-4 py-3">Monitor</th>
                                <th class="px-4 py-3">Modelo Asignado</th>
                                <th class="px-4 py-3">Instrucciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            @foreach ($line->monitors as $monitor)
                                <tr class="hover:bg-white/10 transition">
                                    <td class="px-4 py-3 font-medium">{{ $monitor->name }}</td>
                                    <td class="px-4 py-3">
                                        {{ $monitor->productModel->name ?? '—' }}
                                    </td>
                                    <td class="px-4 py-3">
                                        @if ($monitor->workInstructions->count())
                                            <ul class="list-disc list-inside">
                                                @foreach ($monitor->workInstructions as $instruction)
                                                    <li>{{ $instruction->title }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="text-gray-300 italic">Sin instrucciones</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-400 italic">No hay monitores registrados en esta línea.</p>
            @endif
        </div>
    @endforeach
</div>
@endsection
