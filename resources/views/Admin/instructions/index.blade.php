@extends('layouts.admin')

@section('title', 'Instrucciones de Trabajo')

@section('content')
@if (session('success'))
    <div class="mb-4 p-4 bg-green-500 text-white rounded shadow">{{ session('success') }}</div>
@endif

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Instrucciones de Trabajo</h2>
    <a href="{{ route('admin.instructions.create') }}"
       class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow">
        + Nueva Instrucción
    </a>
</div>

<div class="overflow-x-auto rounded-xl shadow">
    <table class="min-w-full bg-white/10 text-white text-left">
        <thead class="bg-black/40">
            <tr>
                <th class="px-6 py-3">#</th>
                <th class="px-6 py-3">Título</th>
                <th class="px-6 py-3">Modelo</th>
                <th class="px-6 py-3">Línea</th>
                <th class="px-6 py-3">Archivo</th>
                <th class="px-6 py-3 text-right">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/20">
            @forelse ($instructions as $index => $instruction)
                <tr class="hover:bg-white/10 transition">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">{{ $instruction->title }}</td>
                    <td class="px-6 py-4">{{ $instruction->model->name ?? '—' }}</td>
                    <td class="px-6 py-4">{{ $instruction->model->line->name ?? '—' }}</td>
                    <td class="px-6 py-4">
                        @if ($instruction->file_path)
                            <a href="{{ asset($instruction->file_path) }}" target="_blank" class="text-cyan-300 hover:underline">Ver archivo</a>
                        @else
                            <span class="text-gray-400">—</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.instructions.edit', $instruction->id) }}" class="text-yellow-400 hover:underline">Editar</a>
                        <form action="{{ route('admin.instructions.destroy', $instruction->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar esta instrucción?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-300">No hay instrucciones registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
