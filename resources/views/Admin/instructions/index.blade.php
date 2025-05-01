@extends('layouts.admin')

@section('title', 'Instrucciones de Trabajo')

@section('content')
<div class="flex justify-between items-center mb-6">
    <a href="/admin/dashboard?role=admin" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow transition">
        Inicio
    </a>
    <h2 class="text-2xl font-bold">Instrucciones de Trabajo</h2>
    <a href="#" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow transition">
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
                <th class="px-6 py-3">Archivo</th>
                <th class="px-6 py-3 text-right">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/20">
            {{-- Ejemplo estático --}}
            <tr class="hover:bg-white/10 transition">
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">Instrucción 01</td>
                <td class="px-6 py-4">Modelo X100</td>
                <td class="px-6 py-4">
                    <a href="#" class="text-cyan-300 hover:underline">ver archivo.pdf</a>
                </td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="#" class="text-blue-400 hover:underline">Ver</a>
                    <a href="#" class="text-yellow-400 hover:underline">Editar</a>
                    <a href="#" class="text-red-400 hover:underline">Eliminar</a>
                </td>
            </tr>

            <tr class="hover:bg-white/10 transition">
                <td class="px-6 py-4">2</td>
                <td class="px-6 py-4">Instrucción 02</td>
                <td class="px-6 py-4">Modelo Z200</td>
                <td class="px-6 py-4">
                    <a href="#" class="text-cyan-300 hover:underline">manual-z200.pdf</a>
                </td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="#" class="text-blue-400 hover:underline">Ver</a>
                    <a href="#" class="text-yellow-400 hover:underline">Editar</a>
                    <a href="#" class="text-red-400 hover:underline">Eliminar</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
