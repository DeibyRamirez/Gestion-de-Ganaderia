@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Editar Animal</h1>

    <form action="{{ route('Ganadero.ganado.update', $vaca->id_vaca) }}" method="POST" class="space-y-6 bg-white border p-6 rounded-2xl shadow-sm">
        @csrf
        @method('PUT')

        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $vaca->nombre) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
        </div>

        <div>
            <label for="raza" class="block text-sm font-medium text-gray-700">Raza</label>
            <input type="text" name="raza" id="raza" value="{{ old('raza', $vaca->raza) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
        </div>

        <div>
            <label for="edad" class="block text-sm font-medium text-gray-700">Edad (años)</label>
            <input type="number" name="edad" id="edad" value="{{ old('edad', $vaca->edad) }}" min="0" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
        </div>

        <div>
            <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
            <select name="tipo" id="tipo" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
                <option value="leche" {{ $vaca->tipo == 'leche' ? 'selected' : '' }}>Leche</option>
                <option value="carne" {{ $vaca->tipo == 'carne' ? 'selected' : '' }}>Carne</option>
            </select>
        </div>


        <div>
            <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $vaca->fecha_nacimiento) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
        </div>

        <div class="flex justify-end space-x-3">
            <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 transition">
                Guardar cambios
            </button>
            @if (Auth()->user()->rol == 'ganadero')
                <a href="{{ route('Ganadero.ganado.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                    Cancelar
                </a>
            
            @endif
            @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
                <a href="{{ route('Administrador.ganado.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                    Cancelar
                </a>
           
            @endif
        </div>
    </form>
</div>
@endsection