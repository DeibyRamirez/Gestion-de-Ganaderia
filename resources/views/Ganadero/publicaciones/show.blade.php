@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-6 space-y-6">
  <div class="flex items-center justify-between">
    <h1 class="text-3xl font-bold text-emerald-700">Detalle de la Publicación</h1>
    @if (auth()->user()->rol === 'ganadero')
    <a href="{{ route('Ganadero.publicaciones.index') }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded-md shadow hover:bg-emerald-700 transition">
    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path d="M15 18l-6-6 6-6" />
        </svg>
      Volver
    </a>

    @endif

    @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
    <a href="{{ route('Administrador.publicaciones.index') }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded-md shadow hover:bg-emerald-700 transition">
    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path d="M15 18l-6-6 6-6" />
        </svg>
      Volver
    </a>
    @endif
  </div>

  <div class="space-y-4">
    <div>
      <span class="font-semibold text-gray-700">Descripción:</span>
      <p class="text-gray-800">{{ $publicacion->descripcion }}</p>
    </div>

    <div>
      <span class="font-semibold text-gray-700">Precio:</span>
      <p class="text-gray-800">${{ number_format($publicacion->precio, 2) }}</p>
    </div>

    <div>
      <span class="font-semibold text-gray-700">Tipo de Producto:</span>
      <p class="text-gray-800">{{ $publicacion->tipo_producto }}</p>
    </div>

    <div>
      <span class="font-semibold text-gray-700">Cantidad:</span>
      <p class="text-gray-800">{{ $publicacion->cantidad }}</p>
    </div>

    <div>
      <span class="font-semibold text-gray-700">Estado:</span>
      <p class="text-gray-800">{{ $publicacion->estado }}</p>
    </div>

    <div>
      <span class="font-semibold text-gray-700">Fecha:</span>
      <p class="text-gray-800">{{ \Carbon\Carbon::parse($publicacion->fecha)->format('d/m/Y') }}</p>
    </div>
  </div>
</div>
@endsection