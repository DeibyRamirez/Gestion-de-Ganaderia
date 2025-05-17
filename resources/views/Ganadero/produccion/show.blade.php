@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
  <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Detalles del Produccion</h1>

  <div class="rounded-2xl border border-gray-200 bg-white shadow-sm p-6">
    <div class="flex items-center space-x-3 mb-4">
      <span class="text-4xl">🧮</span>
    
      <h2 class="text-2xl font-bold text-gray-800"> Vaca {{ $vaca->nombre }}</h2>
    </div>

    <div class="text-gray-700 space-y-2 text-base">

      <p><strong>Tipo:</strong> {{ $produccion->tipo_produccion }}</p>
      @if ($produccion->tipo_produccion === 'leche')
      <p><strong>Cantidad:</strong> {{ $produccion->cantidad }} L</p>
      @elseif ($produccion->tipo_produccion === 'carne')
      <p><strong>Cantidad:</strong> {{ $produccion->cantidad }} Kg</p>
      @endif
      
      <p><strong>Fecha:</strong> {{ $produccion->fecha }}</p>

    </div>

    <div class="mt-6 flex justify-end space-x-3">
      <a href="{{ route('Ganadero.produccion.edit', $produccion->id_produccion) }}"
        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Editar</a>

      @if (Auth()->user()->rol === 'ganadero')
      <a href="{{ route('Ganadero.produccion.indexDetallada') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">Volver</a>
      @endif

      @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
      <a href="{{ route('Administrador.produccion.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">Volver</a>
      @endif

    </div>
  </div>
</div>
@endsection