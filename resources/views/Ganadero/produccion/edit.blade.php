@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Editar Historial Medico</h1>

    <form action="{{ route('Ganadero.produccion.update', $produccion->id_produccion) }}" method="POST" class="space-y-6 bg-white border p-6 rounded-2xl shadow-sm">
        @csrf
        @method('PUT')

        <div>
            <label for="id_vaca" class="block text-sm font-medium text-gray-700 mb-1">ID del Animal</label>
            <select name="id_vaca" id="id_vaca" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                <option value="">Seleccione una opción</option>
                @foreach ($vacas as $vaca)
                <option value="{{ $vaca->id_vaca }}" {{ $vaca->id_vaca == old('id_vaca', $produccion->id_vaca) ? 'selected' : '' }}>
                    {{ $vaca->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="tipo_produccion" class="block text-sm font-medium text-gray-700">Tipo</label>
            <select name="tipo_produccion" id="tipo_produccion" required
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
            <option value="">Seleccione una opción</option>
            <option value="leche" {{ old('tipo_produccion', $produccion->tipo) == 'leche' ? 'selected' : '' }}>Leche</option>
            <option value="carne" {{ old('tipo_produccion', $produccion->tipo) == 'carne' ? 'selected' : '' }}>Carne</option>
            </select>
        </div>

        <div>
            <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" value="{{ old('cantidad', $produccion->cantidad) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
        </div>

        <div>
            <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha de la Produccion</label>
            <input type="date" name="fecha" id="fecha" value="{{ old('fecha', default: $produccion->fecha) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
        </div>

        <div class="flex justify-end space-x-3">
            <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 transition">
                Guardar cambios
            </button>
            @if (Auth()->user()->rol === 'ganadero')
            <a href="{{ route('Ganadero.produccion.indexDetallada') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                Cancelar
            </a>
            @endif

            @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
            <a href="{{ route('Administrador.produccion.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                Cancelar
            </a>
            @endif

        </div>
    </form>
</div>
@endsection