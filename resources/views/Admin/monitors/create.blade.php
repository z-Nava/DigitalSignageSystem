@extends('layouts.admin')

@section('title', 'Nuevo Monitor')

@section('content')
<div class="max-w-xl mx-auto bg-white/10 p-8 rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6">Nuevo Monitor</h2>

    <form action="{{ route('admin.monitors.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-2 font-semibold">Nombre:</label>
            <input type="text" name="name" class="w-full rounded p-2 text-black" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-semibold">Dirección IP:</label>
            <input type="text" name="ip_address" class="w-full rounded p-2 text-black" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-semibold">Línea de Producción:</label>
            <select name="line_id" class="w-full rounded p-2 text-black" required>
                <option value="">Seleccionar línea</option>
                @foreach ($lines as $line)
                    <option value="{{ $line->id }}">{{ $line->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.monitors.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Cancelar</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection
