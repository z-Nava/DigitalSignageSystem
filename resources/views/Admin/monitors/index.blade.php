@extends('layouts.admin')

@section('title', 'Monitores')

@section('content')
@if (session('success'))
    <div class="mb-4 p-4 bg-green-500 text-white rounded shadow">{{ session('success') }}</div>
@endif

<div class="flex justify-between items-center mb-6">
    <a href="{{ route('admin.dashboard') }}"
       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow transition">
        Inicio
    </a>
    <h2 class="text-2xl font-bold">Monitores por Línea</h2>
    <a href="{{ route('admin.monitors.create') }}"
       class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow">
        + Nuevo Monitor
    </a>
</div>

@php
    $monitorsByLine = $monitors->groupBy(fn($m) => $m->line->name ?? 'Sin línea');
@endphp

@foreach ($monitorsByLine as $lineName => $lineMonitors)
    <div class="mb-8">
        <h3 class="text-xl font-semibold mb-4 border-b border-white/20 pb-1">{{ $lineName }}</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($lineMonitors as $monitor)
                <div class="bg-white/10 p-4 rounded-xl shadow-lg backdrop-blur-sm border border-white/10">
                    <h4 class="text-lg font-bold mb-2">{{ $monitor->name }}</h4>
                    <p class="text-sm text-gray-300">IP: <span class="font-mono">{{ $monitor->ip_address }}</span></p>
                    <p class="text-sm text-gray-300">Modelo: 
                        <span class="font-semibold text-white">
                            {{ $monitor->productModel->name ?? 'No asignado' }}
                        </span>
                    </p>
                    <div class="mt-4 flex justify-between text-sm">
                        <a href="{{ route('admin.monitors.edit', $monitor->id) }}"
                           class="text-yellow-400 hover:underline">Editar</a>

                        <form action="{{ route('admin.monitors.destroy', $monitor->id) }}"
                              method="POST"
                              onsubmit="return confirm('¿Estás seguro de eliminar este monitor?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:underline">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach
@endsection
