@extends('layouts.app')

@section('content')
<div class="space-y-10">
  {{-- Encabezado --}}
  <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
      <h1 class="text-4xl font-bold text-gray-800">Nuevo Registro de Ganado</h1>
      <p class="text-gray-500 mt-1">Ingresa la información del animal para registrarlo en el sistema.</p>
    </div>
    @if (Auth()->user()->rol === 'ganadero')
    <a href="{{ route('Ganadero.ganado.index') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
      <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M15 18l-6-6 6-6" />
      </svg>
      Volver a Gestion de Ganado
    </a>
    @endif

    @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
    <a href="{{ route('Administrador.ganado.index') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
      <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M15 18l-6-6 6-6" />
      </svg>
      Volver a Gestion de Ganado
    </a>
    @endif
  </div>

  {{-- Formulario de Registro --}}
  <form action="{{ route('Ganadero.ganado.store')}}" method="POST" class="space-y-6 bg-white shadow rounded-lg p-6">
    @csrf

    <div class="grid md:grid-cols-2 gap-4">
      <div>
        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre del animal</label>
        <input type="text" name="nombre" id="nombre" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" />
      </div>

      <div>
        <label for="raza" class="block text-sm font-medium text-gray-700 mb-1">Raza del animal</label>
        <input type="text" name="raza" id="raza" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" />
      </div>

      <div>
        <label for="edad" class="block text-sm font-medium text-gray-700 mb-1">Edad del animal</label>
        <input type="number" name="edad" id="edad" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" />
      </div>

      <div>
        <label for="tipo" class="block text-sm font-medium text-gray-700 mb-1">Tipo de Producción</label>
        <select name="tipo" id="tipo" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
          <option value="">Seleccione una opción</option>
          <option value="leche">Leche</option>
          <option value="carne">Carne</option>
        </select>
      </div>

      <div>
        <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700 mb-1">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" />
      </div>
    </div>

    <div class="flex justify-end">
      <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2 rounded-md shadow">
        Guardar
      </button>
    </div>
  </form>
</div>
@endsection