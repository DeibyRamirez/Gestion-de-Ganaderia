@extends('layouts.app')

@section('content')
<div class="space-y-10">
  {{-- Encabezado --}}
  <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
      <h1 class="text-4xl font-bold text-gray-800">Gestión de Tratamientos y Reportes</h1>
      <p class="text-gray-500 mt-1">Visualiza los tratamientos aplicados y genera reportes fácilmente.</p>
    </div>
    <a href="{{ route('Ganadero.tratamientosReportes.createTratamiento') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
      <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="10"></circle>
        <path d="M8 12h8M12 8v8"></path>
      </svg>
      Nuevo Tratamiento
    </a>

    <a href="{{ route('Ganadero.tratamientosReportes.createReporte') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
      <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="10"></circle>
        <path d="M8 12h8M12 8v8"></path>
      </svg>
      Nuevo Reporte
    </a>
  </div>

  {{-- Sección de Tratamientos --}}
  <section>
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Tratamientos Registrados</h2>
    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
      @foreach($tratamientos as $tratamiento)
      <div class="bg-white shadow rounded-lg p-5 hover:shadow-md transition">
        <h3 class="text-lg font-bold text-emerald-700">Tratamiento #{{ $tratamiento->id_tratamiento }}</h3>
        <p class="text-sm text-gray-600 mt-1">Gestor ID: <span class="font-medium">{{ $tratamiento->id_gestor }}</span></p>
        <p class="text-sm text-gray-600">Historial ID: <span class="font-medium">{{ $tratamiento->id_historial }}</span></p>
        <p class="text-sm text-gray-600 mt-2"><strong>Descripción:</strong> {{ $tratamiento->descripcion }}</p>
        <p class="text-xs text-gray-400 mt-2">Fecha: {{ \Carbon\Carbon::parse($tratamiento->fecha_tratamiento)->format('d/m/Y') }}</p>
        <div class="mt-5 flex justify-end space-x-2">
                <a href="{{ route('Ganadero.tratamientosReportes.show', $tratamiento->id_tratamiento ) }}"
                    class="inline-flex items-center justify-center px-3 py-1.5 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition text-sm">
                    Ver
                </a>
                <a href="{{ route('Ganadero.tratamientosReportes.edit', $tratamiento->id_tratamiento) }}"
                    class="inline-flex items-center justify-center px-3 py-1.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm">
                    Editar
                </a>
                <form action="{{ route('Ganadero.tratamientosReportes.destroy', $tratamiento->id_tratamiento) }}" method="POST"
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
  </section>

  {{-- Sección de Reportes --}}
  <section>
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Reportes Generados</h2>
    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
      @foreach($reportes as $reporte)
      <div class="bg-white shadow rounded-lg p-5 hover:shadow-md transition">
        <div class="flex justify-between items-start">
          <h3 class="text-lg font-bold text-gray-800">Reporte #{{ $reporte->id_reporte }}</h3>
          <button class="text-sm text-emerald-600 hover:underline flex items-center">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
              <polyline points="7 10 12 15 17 10" />
              <line x1="12" y1="15" x2="12" y2="3" />
            </svg>
            Descargar
          </button>
        </div>
        <p class="text-sm text-gray-600 mt-2"><strong>Gestor ID:</strong> {{ $reporte->id_gestor }}</p>
        <p class="text-sm text-gray-600 mt-1"><strong>Descripción:</strong> {{ $reporte->descripcion }}</p>
        <p class="text-xs text-gray-400 mt-2">Fecha: {{ \Carbon\Carbon::parse($reporte->fecha)->format('d/m/Y') }}</p>
        <div class="mt-5 flex justify-end space-x-2">
                <a href="{{ route('Ganadero.tratamientosReportes.showR', $reporte->id_reporte ) }}"
                    class="inline-flex items-center justify-center px-3 py-1.5 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition text-sm">
                    Ver
                </a>
                <a href="{{ route('Ganadero.tratamientosReportes.editR', $reporte->id_reporte) }}"
                    class="inline-flex items-center justify-center px-3 py-1.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm">
                    Editar
                </a>
                <form action="{{ route('Ganadero.tratamientosReportes.destroyR', $reporte->id_reporte) }}" method="POST"
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
  </section>

</div>
@endsection