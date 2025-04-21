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



  <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
    @forelse ($alimentacion as $plan)
    <div class="rounded-lg border p-4 shadow bg-white">
      <div class="flex justify-between items-center mb-2">
        <span class="text-2xl">🌿</span>
        <h2 class="text-lg font-semibold">Vaca ID: {{ $plan->id_vaca }}</h2>
        <span class="text-sm px-2 py-0.5 bg-green-100 text-green-800 rounded-full">Plan #{{ $plan->id_alimentacion }}</span>
      </div>

      <p class="mt-2 text-sm text-muted-foreground line-clamp-3" title="{{ $plan->plan_alimenticio }}">
        <strong>Plan:</strong> {{ $plan->plan_alimenticio }}
      </p>


      <div class="mt-4 text-sm text-gray-600">
        <p><strong>Inicio:</strong> {{ \Carbon\Carbon::parse($plan->fecha_inicio)->format('d/m/Y') }}</p>
        <p><strong>Fin:</strong> {{ \Carbon\Carbon::parse($plan->fecha_fin)->format('d/m/Y') }}</p>
      </div>
      <div class="mt-5 flex justify-end space-x-2">
        <a href="{{ route('Ganadero.alimentacion.show', $plan->id_alimentacion) }}"
          class="inline-flex items-center justify-center px-3 py-1.5 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition text-sm">
          Ver
        </a>
        <a href="{{ route('Ganadero.alimentacion.edit', $plan->id_alimentacion) }}"
          class="inline-flex items-center justify-center px-3 py-1.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm">
          Editar
        </a>
        <form action="{{ route('Ganadero.alimentacion.destroy', $plan->id_alimentacion) }}" method="POST"
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
    @empty
    <div class="col-span-full text-center text-muted-foreground">
      No hay planes de alimentación registrados.
    </div>
    @endforelse
  </div>
</div>
@endsection