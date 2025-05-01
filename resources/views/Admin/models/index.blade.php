@extends('layouts.admin')

@section('title', 'Modelos de Producción')

@section('content')
@if (session('success'))
    <div class="mb-4 p-4 bg-green-500 text-white rounded shadow">{{ session('success') }}</div>
@endif

<div class="flex justify-between items-center mb-6">
    <a href="{{route('admin.dashboard')}}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow transition">
        Inicio
    </a>
    <h2 class="text-2xl font-bold">Modelos de Producción</h2>
    <a href="{{ route('admin.models.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow">
        + Nuevo Modelo
    </a>
</div>

<div class="overflow-x-auto rounded-xl shadow">
    <table class="min-w-full bg-white/10 text-white text-left">
        <thead class="bg-black/40">
            <tr>
                <th class="px-6 py-3">#</th>
                <th class="px-6 py-3">Nombre</th>
                <th class="px-6 py-3">Línea</th>
                <th class="px-6 py-3 text-right">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/20">
            @forelse ($models as $index => $model)
                <tr class="hover:bg-white/10 transition">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">{{ $model->name }}</td>
                    <td class="px-6 py-4">{{ $model->line->name ?? '—' }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.models.edit', $model->id) }}" class="text-yellow-400 hover:underline">Editar</a>
                        <form action="{{ route('admin.models.destroy', $model->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este modelo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-300">No hay modelos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
