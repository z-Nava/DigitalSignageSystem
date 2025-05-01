@extends('layouts.admin')

@section('title', 'Editar Línea')

@section('content')
<div class="max-w-xl mx-auto bg-white/10 p-8 rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6">Editar Línea de Producción</h2>

    <form action="{{ route('admin.lines.update', $line->id) }}" method="POST">
        @csrf
        @method('PUT')  
        <div>
            <label for="name" class="block mb-2 font-semibold">Nombre de la línea:</label>
            <input type="text" name="name" id="name" class="w-full rounded-lg p-3 text-black focus:outline-none focus:ring focus:ring-green-400" value="{{ old('name', $line->name) }}" required>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.lines.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Cancelar</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow">
                Guardar cambios
            </button>
        </div>
    </form>
</div>
@endsection
