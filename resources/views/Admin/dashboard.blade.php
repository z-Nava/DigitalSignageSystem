@extends('layouts.admin')

@section('title', 'Dashboard de Admin')

@section('content')
<div class="space-y-8">
    {{-- CRUDs --}}
    <div class="text-2xl font-semibold mb-4">Gestión de Datos</div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white/10 p-6 rounded-xl shadow hover:scale-105 transition">
            <a href="{{ route('admin.lines.index') }}" class="text-white underline">
                <h2 class="text-xl font-semibold">Líneas</h2>
            </a>
            <p class="text-3xl mt-2">Gestiona las líneas de producción</p>
        </div>

        <div class="bg-white/10 p-6 rounded-xl shadow hover:scale-105 transition">
            <a href="{{ route('admin.monitors.index') }}" class="text-white underline">
                <h2 class="text-xl font-semibold">Monitores</h2>
            </a>
            <p class="text-3xl mt-2">Controla los monitores activos</p>
        </div>

        <div class="bg-white/10 p-6 rounded-xl shadow hover:scale-105 transition">
            <a href="{{ route('admin.models.index') }}" class="text-white underline">
                <h2 class="text-xl font-semibold">Modelos</h2>
            </a>
            <p class="text-3xl mt-2">Gestiona los modelos de producción</p>
        </div>

        <div class="bg-white/10 p-6 rounded-xl shadow hover:scale-105 transition">
            <a href="{{ route('admin.instructions.index') }}" class="text-white underline">
                <h2 class="text-xl font-semibold">Instrucciones</h2>
            </a>
            <p class="text-3xl mt-2">Organiza las instrucciones de trabajo</p>
        </div>
    </div>

    {{-- Asignaciones --}}
    <div class="text-2xl font-semibold mt-8 mb-4">Asignaciones</div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
        <div class="bg-white/10 p-6 rounded-xl shadow hover:scale-105 transition">
            <a href="{{ route('admin.monitors.assignView') }}" class="text-white underline">
                <h2 class="text-xl font-semibold">Asignar Modelo e Instrucción</h2>
            </a>
            <p class="text-3xl mt-2">Asigna un modelo y una instrucción a un monitor</p>
        </div>

        {{-- Puedes agregar más opciones de asignación aquí si las necesitas --}}
    </div>

    </div>
@endsection
