@extends('layouts.admin')

@section('title', 'Dashboard de Admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white/10 p-6 rounded-xl shadow hover:scale-105 transition">
    <a href="{{ route('admin.lines.index') }}" class="text-white underline">
        <h2 class="text-xl font-semibold">Líneas</h2>
    </a>
        <p class="text-3xl mt-2"></p>
    </div>

    <div class="bg-white/10 p-6 rounded-xl shadow hover:scale-105 transition">
    <a href="{{ route('admin.monitors.index') }}" class="text-white underline">
        <h2 class="text-xl font-semibold">Monitores</h2>
    </a>
        <p class="text-3xl mt-2"></p>
    </div>

    <div class="bg-white/10 p-6 rounded-xl shadow hover:scale-105 transition">
    <a href="{{ route('admin.models.index') }}" class="text-white underline">
        <h2 class="text-xl font-semibold">Modelos</h2>
    </a>
        <p class="text-3xl mt-2"></p>
    </div>

    <div class="bg-white/10 p-6 rounded-xl shadow hover:scale-105 transition">
    <a href="{{ route('admin.instructions.index') }}" class="text-white underline">
        <h2 class="text-xl font-semibold">Instrucciones</h2>
    </a>
        <p class="text-3xl mt-2"></p>
    </div>
</div>
@endsection
