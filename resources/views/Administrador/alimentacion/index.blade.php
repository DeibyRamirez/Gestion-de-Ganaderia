@extends('layouts.app')

@section('content')
<div class="space-y-6">
  <div class="flex items-center justify-between">
    <div>
      <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Alimentación</h1>
      <p class="text-muted-foreground">Gestione los planes alimenticios y dietas para su ganado</p>
    </div>
    <a href="{{ route('Ganadero.alimentacion.create') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
      <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="10"></circle>
        <path d="M8 12h8M12 8v8"></path>
      </svg>
      Nuevo Plan
    </a>
  </div>

  {{-- Tabla de planes de alimentación --}}
  <div class="overflow-x-auto mt-6">
    @if ($alimentacion->isEmpty())
    <div class="text-center text-muted-foreground py-10">
      No hay planes de alimentación registrados.
    </div>
    @else
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
      <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
        <tr>
          <th class="py-3 px-4 text-left">ID Plan</th>
          <th class="py-3 px-4 text-left">Vaca ID</th>
          <th class="py-3 px-4 text-left">Plan Alimenticio</th>
          <th class="py-3 px-4 text-left">Fecha de Inicio</th>
          <th class="py-3 px-4 text-left">Fecha de Fin</th>
          <th class="py-3 px-4 text-left">Acciones</th>
        </tr>
      </thead>
      <tbody class="text-gray-700">
        @foreach ($alimentacion as $plan)
        <tr class="border-t">
          <td class="py-2 px-4">#{{ $plan->id_alimentacion }}</td>
          <td class="py-2 px-4">🐄 {{ $plan->id_vaca }}</td>
          <td class="py-2 px-2">{{ $plan->plan_alimenticio }}</td>
          <td class="py-2 px-4">{{ \Carbon\Carbon::parse($plan->fecha_inicio)->format('d/m/Y') }}</td>
          <td class="py-2 px-4">{{ \Carbon\Carbon::parse($plan->fecha_fin)->format('d/m/Y') }}</td>
          
          <td class="py-2 px-4 space-x-4 flex flex-wrap">
            <a href="{{ route('Ganadero.alimentacion.show', $plan->id_alimentacion) }}" class="px-3 py-1 text-sm bg-gray-600 text-white rounded hover:bg-gray-700">Ver</a>
            <a href="{{ route('Ganadero.alimentacion.edit', $plan->id_alimentacion) }}" class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">Editar</a>
            <form action="{{ route('Ganadero.alimentacion.destroy', $plan->id_alimentacion) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar esta publicación?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection