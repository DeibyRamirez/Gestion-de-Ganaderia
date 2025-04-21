@extends('layouts.app')

@section('content')
<div class="space-y-6">
  <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
      <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Ventas</h1>
      <p class="text-muted-foreground">Gestione las transacciones comerciales de su operación ganadera</p>

    </div>
    <a href="{{ route('Ganadero.ventas.createProduccion') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
        <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="10"></circle>
          <path d="M8 12h8M12 8v8"></path>
        </svg>
        Nueva Venta Producción
      </a>

      <a href="{{ route('Ganadero.ventas.create') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
        <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="10"></circle>
          <path d="M8 12h8M12 8v8"></path>
        </svg>
        Nueva Venta Ganado
      </a>
    <div class="flex space-x-4">
    </div>
  </div>

  <!-- Gráficas -->
  <div class="grid gap-6 md:grid-cols-2">
    <div class="rounded-lg border p-6">
      <h2 class="mb-4 text-xl font-semibold">Ventas de Producción</h2>
      <div class="h-64 rounded-md bg-gray-100 flex items-center justify-center text-gray-400">Gráfica futura</div>
      
    </div>
    <div class="rounded-lg border p-6">
      <h2 class="mb-4 text-xl font-semibold">Ventas de Ganado</h2>
      <div class="h-64 rounded-md bg-gray-100 flex items-center justify-center text-gray-400">Gráfica futura</div>
      
    </div>
   </div> 
    <div class="mt-4 flex justify-center">
        <a href="{{ route('Ganadero.ventas.indexDetallada') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">Ver todas las ventas</a>
      </div>
  </div>
</div>
@endsection