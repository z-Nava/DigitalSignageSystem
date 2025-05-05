@extends('layouts.admin')

@section('title', 'Dashboard de Admin')

@section('content')
<div class="space-y-12">
    {{-- Sección: Gestión de Datos --}}
    <section>
        <h2 class="text-2xl font-bold mb-6 border-b border-white/20 pb-2">Gestión de Datos</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- Líneas --}}
            <a href="{{ route('admin.lines.index') }}"
               class="bg-white/10 hover:bg-white/20 p-6 rounded-xl shadow text-white transition transform hover:scale-105 block">
                <h3 class="text-xl font-semibold mb-2">Líneas</h3>
                <p class="text-sm text-gray-300">Gestiona las líneas de producción</p>
            </a>

            {{-- Monitores --}}
            <a href="{{ route('admin.monitors.index') }}"
               class="bg-white/10 hover:bg-white/20 p-6 rounded-xl shadow text-white transition transform hover:scale-105 block">
                <h3 class="text-xl font-semibold mb-2">Monitores</h3>
                <p class="text-sm text-gray-300">Controla los monitores activos</p>
            </a>

            {{-- Modelos --}}
            <a href="{{ route('admin.models.index') }}"
               class="bg-white/10 hover:bg-white/20 p-6 rounded-xl shadow text-white transition transform hover:scale-105 block">
                <h3 class="text-xl font-semibold mb-2">Modelos</h3>
                <p class="text-sm text-gray-300">Gestiona los modelos de producción</p>
            </a>

            {{-- Instrucciones --}}
            <a href="{{ route('admin.instructions.index') }}"
               class="bg-white/10 hover:bg-white/20 p-6 rounded-xl shadow text-white transition transform hover:scale-105 block">
                <h3 class="text-xl font-semibold mb-2">Instrucciones</h3>
                <p class="text-sm text-gray-300">Organiza las instrucciones de trabajo</p>
            </a>
        </div>
    </section>

    {{-- Sección: Asignaciones --}}
    <section>
        <h2 class="text-2xl font-bold mb-6 border-b border-white/20 pb-2">Asignaciones</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            {{-- Asignar modelo e instrucción --}}
            <a href="{{ route('admin.monitors.assignView') }}"
               class="bg-white/10 hover:bg-white/20 p-6 rounded-xl shadow text-white transition transform hover:scale-105 block">
                <h3 class="text-xl font-semibold mb-2">Asignar Modelo e Instrucción</h3>
                <p class="text-sm text-gray-300">Asigna un modelo y una instrucción a un monitor</p>
            </a>

            {{-- Aquí puedes agregar más opciones de asignación --}}
        </div>
    </section>
</div>
@endsection
