@extends('layouts.admin')

@section('title', 'Instrucciones de Trabajo')

@section('content')
@if (session('success'))
    <div class="mb-4 p-4 bg-green-500 text-white rounded shadow">{{ session('success') }}</div>
@endif
<div class="flex justify-between items-center mb-8">
    <a href="{{ route('admin.dashboard') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow">Inicio</a>
    <h2 class="text-2xl font-bold">Instrucciones de Trabajo</h2>
    <a href="{{ route('admin.instructions.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow">+ Nueva Instrucción</a>
</div>
@foreach ($lines as $line)
    <div class="mb-10">
        <h3 class="text-xl font-semibold text-red-400 mb-4 border-b border-white/20 pb-1">Línea: {{ $line->name }}</h3>
        @foreach ($line->models as $model)
            @if ($model->workInstructions->isNotEmpty())
                <div class="mb-6">
                    <h4 class="text-lg font-semibold text-white mb-2">Modelo: {{ $model->name }}</h4>
                    <div class="overflow-x-auto rounded-xl shadow border border-white/10">
                        <table class="min-w-full text-white bg-white/5 text-left table-fixed">
                            <thead class="bg-black/30">
                                <tr class="text-sm font-semibold uppercase">
                                    <th class="w-16 px-6 py-3">#</th>
                                    <th class="w-1/3 px-6 py-3">Título</th>
                                    <th class="w-1/3 px-6 py-3">Archivo</th>
                                    <th class="w-40 px-6 py-3 text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10 text-sm">
                                @foreach ($model->workInstructions as $index => $instruction)
                                    <tr class="hover:bg-white/10 transition">
                                        <td class="px-6 py-4 align-top">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 align-top">{{ $instruction->title }}</td>
                                        <td class="px-6 py-4 align-top">
                                            @if ($instruction->file_path)
                                                <a href="{{ asset('storage/' . $instruction->file_path) }}" target="_blank" class="text-blue-400 underline truncate block w-full">
                                                    Ver archivo
                                                </a>
                                            @else
                                                <span class="text-gray-400">—</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-right align-top space-x-2">
                                            <a href="{{ route('admin.instructions.edit', $instruction->id) }}" class="text-yellow-400 hover:underline">Editar</a>
                                            <form action="{{ route('admin.instructions.destroy', $instruction->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar esta instrucción?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:underline">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endforeach
@endsection
