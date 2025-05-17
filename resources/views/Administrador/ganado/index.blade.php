@extends('layouts.app')

@section('content')
<div class="space-y-6">
  <div class="flex items-center justify-between">
    <div>
      <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Gestión de Ganado</h1>
      <p class="text-muted-foreground">
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

  {{-- Tabla de Ganado --}}
  <div class="overflow-x-auto mt-6">
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
      <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
        <tr>
          <th class="py-3 px-4 text-left">ID</th>
          <th class="py-3 px-4 text-left">Nombre</th>
          <th class="py-3 px-4 text-left">Raza</th>
          <th class="py-3 px-4 text-left">Edad</th>
          <th class="py-3 px-4 text-left">Tipo</th>
          <th class="py-3 px-4 text-left">Fecha de nacimiento</th>
          <th class="py-3 px-4 text-left">Acciones</th>
        </tr>
      </thead>
      <tbody class="text-gray-700">
        @foreach ($ganado as $vaca)
        <tr class="border-t">
          <td class="py-2 px-4">#{{ $vaca->id_vaca }}</td>
          <td class="py-2 px-4 font-medium">🐄 {{ $vaca->nombre }}</td>
          <td class="py-2 px-4">{{ $vaca->raza }}</td>
          <td class="py-2 px-4">{{ $vaca->edad }} años</td>
          <td class="py-2 px-4">{{ $vaca->tipo }}</td>
          <td class="py-2 px-4">{{ $vaca->fecha_nacimiento }}</td>
          <td class="py-2 px-4 flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
            <a href="{{ route('Ganadero.ganado.show', $vaca->id_vaca) }}" class="px-3 py-1 text-sm bg-gray-600 text-white rounded hover:bg-gray-700 text-center">Ver</a>
            <a href="{{ route('Ganadero.ganado.edit', $vaca->id_vaca) }}" class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700 text-center">Editar</a>
            <form action="{{ route('Ganadero.ganado.destroy', $vaca->id_vaca) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar esta publicación?');" class="text-center">
              @csrf
              @method('DELETE')
              <button type="submit" class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection