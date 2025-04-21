@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Editar Historial Medico</h1>

    <form action="{{ route('Ganadero.historial.update', $historial_medico->id_historial) }}" method="POST" class="space-y-6 bg-white border p-6 rounded-2xl shadow-sm">
        @csrf
        @method('PUT')

        <div>
            <label for="sintomas" class="block text-sm font-medium text-gray-700">Sintomas</label>
            <textarea type="text" name="sintomas" id="sintomas" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">{{ old('sintomas', $historial_medico->sintomas) }}</textarea>
        </div>

        <div>
            <label for="diagnostico" class="block text-sm font-medium text-gray-700">Diagnosticos</label>
            <textarea type="text" name="diagnostico" id="diagnostico" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">{{ old('diagnostico', $historial_medico->diagnostico) }}</textarea>
        </div>

        <div>
            <label for="fecha_diagnostico" class="block text-sm font-medium text-gray-700">Fecha de Diagnostico</label>
            <input type="date" name="fecha_diagnostico" id="fecha_diagnostico" value="{{ old('fecha_diagnostico', $historial_medico->fecha_diagnostico) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
        </div>

        <div class="flex justify-end space-x-3">
            <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 transition">
                Guardar cambios
            </button>
            @if (Auth::user()->rol == 'ganadero')
            <a href="{{ route('Ganadero.historial.index') }}"
                class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">Volver</a>
            @endif

            @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
            <a href="{{ route('Administrador.historial.index') }}"
                class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">Volver</a>
            @endif
        </div>
    </form>
</div>
@endsection