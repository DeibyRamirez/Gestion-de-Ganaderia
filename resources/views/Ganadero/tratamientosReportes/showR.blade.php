@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
  <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Detalles del Reporte</h1>

  <div class="rounded-2xl border border-gray-200 bg-white shadow-sm p-6">
    <div class="flex items-center space-x-3 mb-4">
      <span class="text-4xl">📄</span>
      <h2 class="text-2xl font-bold text-gray-800"> Reporte #{{ $reporte->id_reporte }}</h2>
    </div>
    
    <div class="text-gray-700 space-y-2 text-base">
      
      
      <p><strong>Descripción:</strong> {{ $reporte->descripcion }}</p>
      <p><strong>Fecha Reporte:</strong> {{ $reporte->fecha_reporte }}</p>
      
    </div>

    <div class="mt-6 flex justify-end space-x-3">
      <a href="{{ route('Ganadero.tratamientosReportes.editR', $reporte->id_reporte) }}"
        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Editar</a>

        @if (Auth::user()->rol == 'ganadero')
      <a href="{{ route('Ganadero.tratamientosReportes.index') }}"
        class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">Volver</a>
        @endif

        @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
      <a href="{{ route('Administrador.tratamientosReportes.index') }}"
        class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">Volver</a>
        @endif
    </div>
  </div>
</div>
@endsection
