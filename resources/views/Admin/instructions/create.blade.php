@extends('layouts.admin')

@section('title', 'Nueva Instrucción de Trabajo')

@section('content')
<div class="max-w-xl mx-auto bg-white/10 p-8 rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6">Crear Instrucción de Trabajo</h2>

    <form action="{{ route('admin.instructions.store') }}" method="POST">
        @csrf

        {{-- Modelo --}}
        <div class="mb-4">
            <label for="model_id" class="block mb-2 font-semibold">Modelo:</label>
            <select name="model_id" id="model_id" class="w-full rounded p-2 text-black" required>
                <option value="">Seleccionar modelo</option>
                @foreach ($models as $model)
                    <option value="{{ $model->id }}" {{ old('model_id', $preselectedModelId ?? '') == $model->id ? 'selected' : '' }}>
                        {{ $model->name }} — {{ $model->line->name ?? 'Sin línea' }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Título --}}
        <div class="mb-4">
            <label for="title" class="block mb-2 font-semibold">Título:</label>
            <input type="text" name="title" id="title" class="w-full rounded p-2 text-black" value="{{ old('title') }}" required>
        </div>

        {{-- Descripción --}}
        <div class="mb-4">
            <label for="description" class="block mb-2 font-semibold">Descripción:</label>
            <textarea name="description" id="description" class="w-full rounded p-2 text-black" rows="4">{{ old('description') }}</textarea>
        </div>

        {{-- Archivo (simulado por ahora con texto) --}}
        <div class="mb-4">
            <label for="file_path" class="block mb-2 font-semibold">Ruta del archivo (simulada):</label>
            <input type="text" name="file_path" id="file_path" class="w-full rounded p-2 text-black" placeholder="ej: storage/instructions/doc.pdf" value="{{ old('file_path') }}">
        </div>

        {{-- Botones --}}
        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.instructions.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Cancelar</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection
