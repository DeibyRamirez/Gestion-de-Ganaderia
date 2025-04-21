@extends('layouts.app')

@section('content')
<div class="space-y-10">
    {{-- Encabezado --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">Registrar Tratamiento</h1>
            <p class="text-gray-500 mt-1">Ingresa los datos del tratamiento aplicado al animal.</p>
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
        <form action="" method="POST" class="space-y-6">
            @csrf

            <div class="grid md:grid-cols-2 gap-4">
                {{-- ID del Gestor --}}
                <div>
                    <label for="gestor_id" class="block text-sm font-medium text-gray-700 mb-1">ID del Gestor</label>
                    <select name="gestor_id" id="gestor_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                        <option value="">Seleccione una opción</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>

                {{-- ID del Historial --}}
                <div>
                    <label for="historial_id" class="block text-sm font-medium text-gray-700 mb-1">ID del Historial</label>
                    <select name="historial_id" id="historial_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                        <option value="">Seleccione una opción</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
            </div>

            {{-- Tratamiento aplicado --}}
            <div>
                <label for="tratamiento" class="block text-sm font-medium text-gray-700 mb-1">Tratamiento Aplicado</label>
                <textarea name="tratamiento" id="tratamiento" rows="4" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" placeholder="Describe el tratamiento aplicado..."></textarea>
            </div>

            {{-- Fecha del tratamiento --}}
            <div>
                <label for="fecha" class="block text-sm font-medium text-gray-700 mb-1">Fecha del Tratamiento</label>
                <input type="date" name="fecha" id="fecha" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
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
