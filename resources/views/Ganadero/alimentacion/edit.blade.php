@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Editar Plan alimenticio</h1>

    <form action="{{ route('Ganadero.alimentacion.update', $alimentacion->id_vaca) }}" method="POST" class="space-y-6 bg-white border p-6 rounded-2xl shadow-sm">
        @csrf
        @method('PUT')

        <div>
            <label for="plan_alimenticio" class="block text-sm font-medium text-gray-700">Plan alimenticio</label>
            <textarea type="number" name="plan_alimenticio" id="plan_alimenticio" min="0" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">{{ old('plan_alimenticio', $alimentacion->plan_alimenticio) }}</textarea>
        </div>

        <div>
            <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha de Inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio', $alimentacion->fecha_inicio) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
        </div>

        <div>
            <label for="fecha_fin" class="block text-sm font-medium text-gray-700">Fecha de Finalizacion</label>
            <input type="date" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin', $alimentacion->fecha_fin) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
        </div>

        <div class="flex justify-end space-x-3">
            <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 transition">
                Guardar cambios
            </button>
            @if (Auth()->user()->rol === 'ganadero')
            <a href="{{ route('Ganadero.alimentacion.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                Cancelar
            </a>
            @endif

            @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
            <a href="{{ route('Administrador.alimentacion.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                Cancelar
            </a>
            @endif
        </div>
    </form>
</div>
@endsection