@extends('layouts.admin')

@section('title', 'Asignar Modelo e Instrucción a Monitor')

@section('content')
<div class="max-w-xl mx-auto bg-white/10 p-8 rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6">Selecciona el Monitor y Asigna el Modelo e Instrucción</h2>

    <form action="{{ route('admin.monitors.assign') }}" method="POST">
        @csrf

        {{-- Selección de Monitor --}}
        <div class="mb-4">
            <label for="monitor_id" class="block mb-2 font-semibold">Selecciona un Monitor:</label>
            <select name="monitor_id" id="monitor_id" class="w-full rounded p-2 text-black" required>
                <option value="">Seleccionar monitor</option>
                @foreach ($monitors as $monitor)
                    <option value="{{ $monitor->id }}">{{ $monitor->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Selección de Modelo --}}
        <div class="mb-4">
            <label for="product_model_id" class="block mb-2 font-semibold">Selecciona un Modelo:</label>
            <select name="product_model_id" id="product_model_id" class="w-full rounded p-2 text-black" required>
                <option value="">Seleccionar modelo</option>
                @foreach ($models as $model)
                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Selección de Instrucciones --}}
        <div class="mb-4">
            <label for="work_instructions" class="block mb-2 font-semibold">Selecciona las Instrucciones:</label>
            <select name="work_instructions[]" id="work_instructions" class="w-full rounded p-2 text-black" multiple required>
                @foreach ($workInstructions as $instruction)
                    <option value="{{ $instruction->id }}">{{ $instruction->title }}</option>
                @endforeach
            </select>
        </div>

        {{-- Botones --}}
        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.monitors.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Cancelar</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
                Asignar
            </button>
        </div>
    </form>
</div>
@endsection
