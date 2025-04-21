@extends('layouts.app')

@section('content')
<div class="space-y-10">

    {{-- Encabezado --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">Registrar Alimentación</h1>
            <p class="text-gray-500 mt-1">Completa la información del plan alimenticio para un animal.</p>
        </div>
        @if (Auth()->user()->rol === 'ganadero')
        <a href="{{ route('Ganadero.alimentacion.index') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 18l-6-6 6-6" />
            </svg>
            Volver a Alimentaciones
        </a>
        @endif

        @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
        <a href="{{ route('Administrador.alimentacion.index') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 18l-6-6 6-6" />
            </svg>
            Volver a Alimentaciones
        </a>
        @endif
        
    </div>

    {{-- Recuadro con la información --}}
    <section class="bg-gray-50 border border-gray-200 rounded-xl p-6 shadow-md">
        <form action="{{-- route('alimentacion.store') --}}" method="POST" class="space-y-6">
            @csrf

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="tipo_produccion" class="block text-sm font-medium text-gray-700 mb-1">ID del Animal</label>
                    <select name="tipo_produccion" id="tipo_produccion" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                        <option value="">Seleccione una opción</option>
                        <option value="leche">1</option>
                        <option value="carne">2</option>
                    </select>
                </div>

                
                <div>   
                    <label for="fecha_inicio" class="block text-sm font-medium text-gray-700 mb-1">Fecha de Inicio</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                </div>

                <div>
                    <label for="alimento" class="block text-sm font-medium text-gray-700 mb-1">Plan Alimenticio</label>
                    <textarea name="alimento" id="alimento" rows="4" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" placeholder="Describe el plan alimenticio con detalle..." required></textarea>
                </div>


                <div>
                    <label for="fecha_fin" class="block text-sm font-medium text-gray-700 mb-1">Fecha de Finalización</label>
                    <input type="date" name="fecha_fin" id="fecha_fin" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2 rounded-md shadow">
                    Guardar
                </button>
            </div>
        </form>
    </section>
</div>
@endsection
