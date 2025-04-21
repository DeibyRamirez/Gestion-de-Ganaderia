@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
  <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Detalles del Animal</h1>

  <div class="rounded-2xl border border-gray-200 bg-white shadow-sm p-6">
    <div class="flex items-center space-x-3 mb-4">
      <span class="text-4xl">🐄</span>
      <h2 class="text-2xl font-bold text-gray-800">{{ $vaca->nombre }}</h2>
    </div>

    <div class="text-gray-700 space-y-2 text-base">
      <p><strong>ID:</strong> {{ $vaca->id_vaca }}</p>
      <p><strong>Raza:</strong> {{ $vaca->raza }}</p>
      <p><strong>Edad:</strong> {{ $vaca->edad }} años</p>
      <p><strong>Tipo:</strong> {{ $vaca->tipo }}</p>
      <p><strong>Fecha de nacimiento:</strong> {{ $vaca->fecha_nacimiento }}</p>
    </div>

    <div class="mt-6 flex justify-end space-x-3">
      <a href="{{ route('Ganadero.ganado.edit', $vaca->id_vaca) }}"
        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Editar</a>
        
        @if (Auth()->user()->rol == 'ganadero')
        <a href="{{ route('Ganadero.ganado.index') }}"
        class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">Volver</a>
        @endif

        @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
      <a href="{{ route('Administrador.ganado.index') }}"
        class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">Volver</a>
        @endif
    </div>
  </div>
</div>
@endsection
