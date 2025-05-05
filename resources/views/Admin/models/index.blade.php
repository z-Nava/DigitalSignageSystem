@extends('layouts.admin')

@section('title', 'Modelos de Producción')

@section('content')
@if (session('success'))
    <div class="mb-4 p-4 bg-green-500 text-white rounded shadow">{{ session('success') }}</div>
@endif

<div class="flex justify-between items-center mb-6">
    <a href="{{ route('admin.dashboard') }}"
       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow transition">
        Inicio
    </a>
    <h2 class="text-2xl font-bold">Modelos de Producción</h2>
    <a href="{{ route('admin.models.create') }}"
       class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow">
        + Nuevo Modelo
    </a>
</div>

@php
    $modelsByLine = $models->groupBy(fn($m) => $m->line->name ?? 'Sin línea');
@endphp

@foreach ($modelsByLine as $lineName => $groupedModels)
    <div class="mb-10">
        <h3 class="text-lg font-semibold text-white bg-black/40 px-4 py-2 rounded-t-md">
            Línea: {{ $lineName }}
        </h3>
        <div class="overflow-x-auto rounded-b-md shadow">
            <table class="min-w-full bg-white/5 text-white text-left">
                <thead class="bg-black/30 text-sm uppercase">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Nombre</th>
                        <th class="px-6 py-3">Instrucciones</th>
                        <th class="px-6 py-3 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @foreach ($groupedModels as $index => $model)
                        <tr class="hover:bg-white/10 transition">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $model->name }}</td>
                            <td class="px-6 py-4">
                                {{ $model->workInstructions->count() }} instrucciones
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.models.edit', $model->id) }}"
                                   class="text-yellow-400 hover:underline">Editar</a>

                                <form action="{{ route('admin.models.destroy', $model->id) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('¿Eliminar este modelo?')">
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
@endforeach
@endsection
