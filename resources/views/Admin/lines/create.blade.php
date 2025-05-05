@extends('layouts.admin')

@section('title', 'Crear Nueva Línea')

@section('content')
<div class="max-w-xl mx-auto bg-white/10 p-8 rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6">Nueva Línea de Producción</h2>

    <form action="{{route('admin.lines.store')}}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="name" class="block mb-2 font-semibold">Nombre de la línea:</label>
            <input type="text" name="name" id="name" class="w-full rounded-lg p-3 text-black focus:outline-none focus:ring focus:ring-green-400" placeholder="Ej. Línea A">
        </div>
        <div>
        <label for="type" class="block mb-2 font-semibold">Tipo de línea:</label>
        <select name="type" id="type" class="w-full rounded p-2 text-black" required>
            <option value="Baterias">Baterías</option>
            <option value="Motores">Motores</option>
            <option value="MXFuel">MXFuel</option>
            <option value="Consolas">Consolas</option>
        </select>
        </div>
        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.lines.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Cancelar</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection
