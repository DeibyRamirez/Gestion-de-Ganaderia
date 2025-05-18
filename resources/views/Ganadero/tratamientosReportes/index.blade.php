@extends('layouts.app')

@section('content')
<div class="space-y-10">
  {{-- Encabezado --}}
  <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
      <h1 class="text-4xl font-bold text-emerald-700">Gestión de Tratamientos y Reportes</h1>
      <p class="text-gray-500 mt-1">Visualiza los tratamientos aplicados y genera reportes fácilmente.</p>
    </div>
    @if (in_array(Auth()->user()->rol, ['administrador', 'gestor']))
    <div class="flex gap-3">
      <a href="{{ route('Ganadero.tratamientosReportes.createTratamiento') }}"
        class="px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
        + Nueva Tratamiento
      </a>
      <a href="{{ route('Ganadero.tratamientosReportes.createR') }}"
        class="px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
        + Nueva Reporte
      </a>
    </div>
    @endif
  </div>



  {{-- Mensajes --}}
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

  {{-- Sección de Tratamientos --}}
  <section>
    <h2 class="text-2xl font-semibold text-emerald-700 mb-4">Tratamientos Registrados</h2>
    <div class="overflow-x-auto">
      <div class="flex gap-6 flex-nowrap w-max pr-4">
        @foreach($tratamientos as $tratamiento)
        <div class="bg-white shadow rounded-lg p-5 hover:shadow-md transition">
          <h3 class="text-lg font-bold text-gray-800">Tratamiento #{{ $tratamiento->id_tratamiento }}</h3>
          <p class="text-sm text-gray-600 mt-1">Gestor: <span class="font-medium">{{ $tratamiento->gestor->name ?? 'Nombre no disponible' }}</span></p>
          <p class="text-sm text-gray-600">Historial ID: <span class="font-medium">{{ $tratamiento->id_historial }}</span></p>
          <p class="text-sm text-gray-600 mt-2"><strong>Descripción:</strong> {{ $tratamiento->descripcion }}</p>
          <p class="text-xs text-gray-400 mt-2">Fecha: {{ \Carbon\Carbon::parse($tratamiento->fecha_tratamiento)->format('d/m/Y') }}</p>
          <div class="mt-5 flex justify-end space-x-2">
            <a href="{{ route('Ganadero.tratamientosReportes.show', $tratamiento->id_tratamiento) }}"
              class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition text-sm font-medium">
              Ver
            </a>
            @if (in_array(Auth()->user()->rol, ['administrador', 'gestor']))

            <a href="{{ route('Ganadero.tratamientosReportes.edit', $tratamiento->id_tratamiento) }}"
              class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition text-sm font-medium">
              Editar
            </a>
            <form action="{{ route('Ganadero.tratamientosReportes.destroy', $tratamiento->id_tratamiento) }}" method="POST" class="inline">
              @csrf
              @method('DELETE')
              <button type="submit"
                onclick="return confirm('¿Está seguro de que desea eliminar este tratamiento?')"
                class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition text-sm font-medium">
                Eliminar
              </button>
            </form>
            @endif

          </div>
        </div>
        @endforeach
      </div>
    </div>
</div>
</section>

{{-- Sección de Reportes --}}
<section>
  <br class="my-6">
  <h2 class="text-2xl font-semibold text-emerald-700 mb-4">Reportes Generados</h2>
  <div class="overflow-x-auto">
    <div class="flex gap-6 flex-nowrap w-max pr-4">
      @foreach($reportes as $reporte)
      <div class="bg-white shadow rounded-lg p-5 hover:shadow-md transition w-80 h-70 overflow-hidden">
        <div class="flex justify-between items-start">
          <h3 class="text-lg font-bold text-gray-800">Reporte #{{ $reporte->id_reporte }}</h3>
          <button class="text-sm text-emerald-600 hover:underline flex items-center" title="Descargar">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
              <polyline points="7 10 12 15 17 10" />
              <line x1="12" y1="15" x2="12" y2="3" />
            </svg>
            Descargar
          </button>
        </div>
        <p class="text-sm text-gray-600 mt-2"><strong>Gestor:</strong> {{ $reporte->id_gestor }}</p>
                <p class="text-sm text-gray-600 mt-2"><strong>Ganadero:</strong> {{ $reporte->id_ganadero }}</p>
        <p class="text-sm text-gray-600 mt-1"><strong>Descripción:</strong> {{ $reporte->descripcion }}</p>
        <p class="text-xs text-gray-400 mt-2">Fecha: {{ \Carbon\Carbon::parse($reporte->fecha_reporte)->format('d/m/Y') }}</p>
        <div class="mt-5 flex justify-end space-x-2">
          <a href="{{ route('Ganadero.tratamientosReportes.showR', $reporte->id_reporte) }}"
            class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition text-sm font-medium">
            Ver
          </a>
          @if (in_array(Auth()->user()->rol, ['administrador', 'gestor']))

          <a href="{{ route('Ganadero.tratamientosReportes.editR', $reporte->id_reporte) }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition text-sm font-medium">
            Editar
          </a>
          <form action="{{ route('Ganadero.tratamientosReportes.destroyR', $reporte->id_reporte) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit"
              onclick="return confirm('¿Está seguro de que desea eliminar este reporte?')"
              class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition text-sm font-medium">
              Eliminar
            </button>
          </form>
          @endif
        </div>
      </div>
      @endforeach
    </div>
  </div>
  </div>
</section>
</div>
@endsection