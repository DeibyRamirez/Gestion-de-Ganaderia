@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Editar Tratamiento</h1>

    <form action="{{ route('Ganadero.tratamientosReportes.update', $tratamiento->id_tratamiento) }}" method="POST" class="space-y-6 bg-white border p-6 rounded-2xl shadow-sm">
        @csrf
        @method('PUT')

        <div class="grid md:grid-cols-2 gap-4">
                {{-- ID del Gestor --}}
                <div>
                    <label for="id_gestor" class="block text-sm font-medium text-gray-700 mb-1">ID del Gestor</label>
                    <select name="id_gestor" id="id_gestor" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                        <option value="">Seleccione una opción</option>
                        @foreach ($Gestores as $gestor)
                        <option value="{{ $gestor->id_usuario }}" {{ (old('id_gestor', $tratamiento->id_gestor) == $gestor->id_usuario) ? 'selected' : '' }}>
                            {{ $gestor->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                {{-- ID del Historial --}}
                <div>
                    <label for="id_historial" class="block text-sm font-medium text-gray-700 mb-1">ID del Historial</label>
                    <select name="id_historial" id="id_historial" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                        <option value="">Seleccione una opción</option>
                        @foreach ($historiales as $historial)
                        <option value="{{ $historial->id_historial }}" {{ (old('id_historial', $tratamiento->id_historial) == $historial->id_historial) ? 'selected' : '' }}>
                            {{ $historial->id_historial }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripcion</label>
            <textarea type="text" name="descripcion" id="descripcion" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">{{ old('descripcion', $tratamiento->descripcion) }}</textarea>
        </div>
        
        <div>
            <label for="fecha_tratamiento" class="block text-sm font-medium text-gray-700">Fecha del Tratamiento</label>
            <input type="date" name="fecha_tratamiento" id="fecha_tratamiento" value="{{ old('fecha_tratamiento', $tratamiento->fecha_tratamiento) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
        </div>

        <div class="flex justify-end space-x-3">
            <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 transition">
                Guardar cambios
            </button>
            @if (Auth::user()->rol == 'ganadero')
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