@extends('layouts.admin')

@section('title', 'Líneas de Producción')

@section('content')
<div class="flex justify-between items-center mb-6">
    <a href="/admin/dashboard?role=admin" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow transition">
        Inicio
    </a>
    <h2 class="text-2xl font-bold">Líneas de Producción</h2>
    <a href="{{route('admin.lines.create')}}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow transition">
        + Nueva Línea
    </a>
</div>
@if (session('success'))
    <div class="mb-4 p-4 rounded-lg bg-green-500 text-white shadow-lg animate-fade-in">
        {{ session('success') }}
    </div>
@endif
<div class="overflow-x-auto rounded-xl shadow">
    <table class="min-w-full bg-white/10 text-white text-left">
        <thead class="bg-black/40">
            <tr>
                <th class="px-6 py-3">#</th>
                <th class="px-6 py-3">Nombre</th>
                <th class="px-6 py-3">Monitores</th>
                <th class="px-6 py-3">Modelos</th>
                <th class="px-6 py-3 text-right">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/20">
            @forelse ($lines as $index => $line)
            <tr class="hover:bg-white/10 transition">
                <td class="px-6 py-4">{{ $index + 1 }}</td>
                <td class="px-6 py-4">{{ $line->name }}</td>
                <td class="px-6 py-4">{{ $line->monitors()->count() }}</td>
                <td class="px-6 py-4">{{ $line->models()->count() }}</td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="#" class="text-blue-400 hover:underline">Ver</a>
                    <a href="{{route('admin.lines.edit', $line->id)}}" class="text-yellow-400 hover:underline">Editar</a>
                    <form action="{{ route('admin.lines.destroy', $line->id) }}" method="POST" 
                    onsubmit="return confirm('¿Estás seguro de eliminar esta línea?')" 
                    class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:underline">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr class="hover:bg-white/10 transition">
                <td class="px-6 py-4">No hay lineas registradas aun.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
