@extends('layouts.app')

@section('content')
<div class="space-y-10">
    {{-- Encabezado --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">Registrar Reportes</h1>
            <p class="text-gray-500 mt-1">Ingresa los datos del Reporte.</p>
        </div>
        @if (Auth()->user()->rol === 'ganadero')
        <a href="{{ route('Ganadero.tratamientosReportes.index') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 18l-6-6 6-6" />
            </svg>
            Volver a Tratamientos
        </a>
        @endif

        @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
        <a href="{{ route('Administrador.tratamientosReportes.index') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 18l-6-6 6-6" />
            </svg>
            Volver a Tratamientos
        </a>
        @endif
    </div>

    {{-- Recuadro del formulario --}}
    <section class="bg-gray-50 border border-gray-200 rounded-xl p-6 shadow-md">
        <form action="{{ route('Ganadero.tratamientosReportes.storeR') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid md:grid-cols-2 gap-4">
                {{-- ID del Gestor --}}
                <div>
                    <label for="id_gestor" class="block text-sm font-medium text-gray-700 mb-1"> Gestor</label>
                    <select name="id_gestor" id="id_gestor" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                        <option value="">Seleccione una opción</option>
                        @foreach ($Gestores as $gestor)
                            <option value="{{ $gestor->id_usuario }}">{{ $gestor->name }}</option>
                        @endforeach
                    </select>
                </div>


            </div>

            {{-- Descripcion Reporte --}}
            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripcion</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" placeholder="Describe el Reporte..."></textarea>
            </div>

            {{-- Fecha del Reporte --}}
            <div>
                <label for="fecha_reporte" class="block text-sm font-medium text-gray-700 mb-1">Fecha del Reporte</label>
                <input type="date" name="fecha_reporte" id="fecha_reporte" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
            </div>

            {{-- Botón de envío --}}
            <div class="flex justify-end">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2 rounded-md shadow">
                    Guardar
                </button>
            </div>
        </form>
    </section>
</div>
@endsection