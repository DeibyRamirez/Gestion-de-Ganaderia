@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Editar Venta de Ganado</h1>

    <form action="{{ route('Ganadero.ventas.updateG', $venta_g->id_venta) }}" method="POST" class="space-y-6 bg-white border p-6 rounded-2xl shadow-sm">
        @csrf
        @method('PUT')

        <div>
            <label for="id_vaca" class="block text-sm font-medium text-gray-700">ID Vaca</label>
            <select name="id_vaca" id="id_vaca" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
                <option value="leche" {{ $venta_g->id_vaca == 'leche' ? 'selected' : '' }}>Leche</option>
                <option value="carne" {{ $venta_g->id_vaca == 'carne' ? 'selected' : '' }}>Carne</option>
            </select>
        </div>

        <div>
            <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
            <input type="number" name="precio" id="precio" value="{{ old('precio', $venta_g->precio) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
        </div>
        <div>
            <label for="fecha_venta" class="block text-sm font-medium text-gray-700">Fecha de la Produccion</label>
            <input type="date" name="fecha_venta" id="fecha_venta" value="{{ old('fecha_venta', default: $venta_g->fecha_venta) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
        </div>

        <div class="flex justify-end space-x-3">
            <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 transition">
                Guardar cambios
            </button>
            @if (Auth()->user()->rol === 'ganadero')
            <a href="{{ route('Ganadero.ventas.indexDetallada') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                Cancelar
            </a>
            @endif

            @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
            <a href="{{ route('Administrador.ventas.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                Cancelar
            </a>
            @endif
        </div>
    </form>
</div>
@endsection