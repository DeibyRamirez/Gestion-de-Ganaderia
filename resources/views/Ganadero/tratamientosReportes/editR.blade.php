@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Editar Reportes</h1>

    <form action="{{ route('Ganadero.tratamientosReportes.updateR', $reporte->id_reporte) }}" method="POST" class="space-y-6 bg-white border p-6 rounded-2xl shadow-sm">
        @csrf
        @method('PUT')

        <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripcion</label>
            <textarea type="text" name="descripcion" id="descripcion" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">{{ old('descripcion', $reporte->descripcion) }}</textarea>
        </div>
        
        <div>
            <label for="fecha_reporte" class="block text-sm font-medium text-gray-700">Fecha del Reporte</label>
            <input type="date" name="fecha_reporte" id="fecha_reporte" value="{{ old('fecha_reporte', $reporte->fecha_reporte) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
        </div>

        <div class="flex justify-end space-x-3">
            <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 transition">
                Guardar cambios
            </button>
            @if (Auth()->user()->rol === 'ganadero')
            <a href="{{ route('Ganadero.tratamientosReportes.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                Cancelar
            </a>
            @endif

            @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
            <a href="{{ route('Administrador.tratamientosReportes.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                Cancelar
            </a>
            @endif
        </div>
    </form>
</div>
@endsection