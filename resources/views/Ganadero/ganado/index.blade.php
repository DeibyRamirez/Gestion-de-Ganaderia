@extends('layouts.app')

@section('content')
<div class="space-y-6">
  <div class="flex items-center justify-between">
    <div>
      <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Gestión de Ganado</h1>
      <p class="text-muted-foreground text-gray-600">
        Administre su inventario de ganado, registre nuevos animales y consulte información detallada.
      </p>
    </div>
    <a href="{{ route('Ganadero.ganado.create') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
      <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="10"></circle>
        <path d="M8 12h8M12 8v8"></path>
      </svg>
      Nuevo Animal
    </a>
  </div>

  <div class="text-center mb-6">


    @if (session('success'))
    <div id="success-mensaje" class="bg-green-500 text-white font-semibold px-4 py-2 rounded-md shadow mt-4">
      {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div id="error-mensaje" class="bg-red-500 text-white font-semibold px-4 py-2 rounded-md shadow mt-4">
      {{ session('error') }}
    </div>
    @endif
  </div>

  <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">


    @foreach ($ganado as $vaca)
    <div class="rounded-2xl border border-gray-200 bg-white shadow-sm p-5 hover:shadow-md transition duration-200">
      <div class="flex justify-between items-center mb-3">
        <div class="flex items-center space-x-2">
          <span class="text-2xl">🐄</span>
          <h2 class="text-xl font-bold text-gray-800">{{ $vaca->nombre }}</h2>
        </div>
        <span class="text-xs font-medium px-3 py-1 rounded-full bg-emerald-100 text-emerald-800">ID: {{ $vaca->id_vaca }}</span>
      </div>

      <div class="text-sm text-gray-600 space-y-1">
        <p><span class="font-semibold">Raza:</span> {{ $vaca->raza }}</p>
        <p><span class="font-semibold">Edad:</span> {{ $vaca->edad }} años</p>
        <p><span class="font-semibold">Tipo:</span> {{ $vaca->tipo }}</p>
        <p><span class="font-semibold">Nacimiento:</span> {{ $vaca->fecha_nacimiento }}</p>
      </div>

      <div class="mt-5 flex justify-end space-x-2">
        <a href="{{ route('Ganadero.ganado.show', $vaca->id_vaca) }}"
          class="inline-flex items-center justify-center px-3 py-1.5 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition text-sm">
          Ver
        </a>
        <a href="{{ route('Ganadero.ganado.edit', $vaca->id_vaca) }}"
          class="inline-flex items-center justify-center px-3 py-1.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm">
          Editar
        </a>
        <form action="{{ route('Ganadero.ganado.destroy', $vaca->id_vaca) }}" method="POST"
          onsubmit="return confirm('¿Está seguro de que desea eliminar este animal?');">
          @csrf
          @method('DELETE')
          <button type="submit"
            class="inline-flex items-center justify-center px-3 py-1.5 bg-red-600 text-white rounded-md hover:bg-red-700 transition text-sm">
            Eliminar
          </button>
        </form>


      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection


@vite(['resources/js/app.js'])