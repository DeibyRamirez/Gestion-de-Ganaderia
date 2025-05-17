@extends('layouts.app')

@section('content')
<div class="space-y-10">
  <div class="flex items-center justify-between">
    <div>
      <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Gestión de Tratamientos</h1>
      <p class="text-muted-foreground">Consulte y gestione los tratamientos generados</p>
    </div>
    <div>
      <a href="{{ route('Ganadero.tratamientosReportes.createTratamiento') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
        <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="10"></circle>
          <path d="M8 12h8M12 8v8"></path>
        </svg>
        Nuevo Tratamiento
      </a>
      
    </div>
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

  {{-- Tabla de Tratamientos --}}
  <div class="overflow-x-auto mt-6">
    @if ($tratamientos->isEmpty())
    <div class="text-center text-muted-foreground py-10">
      No hay tratamientos registrados.
    </div>
    @else
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
      <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
        <tr>
          <th class="py-3 px-4 text-left">ID Tratamiento</th>
          <th class="py-3 px-4 text-left">Gestor ID</th>
          <th class="py-3 px-4 text-left">Historial ID</th>
          <th class="py-3 px-4 text-left">Descripción</th>
          <th class="py-3 px-4 text-left">Fecha</th>
          <th class="py-3 px-4 text-left">Acciones</th>
        </tr>
      </thead>
      <tbody class="text-gray-700">
        @foreach ($tratamientos as $tratamiento)
        <tr class="border-t">
          <td class="py-2 px-4">{{ $tratamiento->id_tratamiento }}</td>
          <td class="py-2 px-4">{{ $tratamiento->id_gestor }}</td>
          <td class="py-2 px-4">{{ $tratamiento->id_historial }}</td>
          <td class="py-2 px-4">{{ \Illuminate\Support\Str::limit($tratamiento->descripcion, 40) }}</td>
          <td class="py-2 px-4">{{ \Carbon\Carbon::parse($tratamiento->fecha_tratamiento)->format('d/m/Y') }}</td>
          <td class="py-2 px-4 space-x-2 flex flex-wrap">
            <a href="{{ route('Ganadero.tratamientosReportes.show', $tratamiento->id_tratamiento) }}" class="px-3 py-1 text-sm bg-gray-600 text-white rounded hover:bg-gray-700">Ver</a>
            <a href="{{ route('Ganadero.tratamientosReportes.edit', $tratamiento->id_tratamiento) }}" class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">Editar</a>
            <form action="{{ route('Ganadero.tratamientosReportes.destroy', $tratamiento->id_tratamiento) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar esta publicación?');">
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

  <div class="flex items-center justify-between">
    <div>
      <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Gestión de Reportes</h1>
      <p class="text-muted-foreground">Consulte y gestione los reportes generados</p>
    </div>
    <div>
      
      <a href="{{ route('Ganadero.tratamientosReportes.createR') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
        <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="10"></circle>
          <path d="M8 12h8M12 8v8"></path>
        </svg>
        Nuevo Reporte
      </a>
    </div>
  </div>

  {{-- Tabla de Reportes --}}
  <div class="overflow-x-auto mt-6">
    @if ($reportes->isEmpty())
    <div class="text-center text-muted-foreground py-10">
      No hay reportes generados.
    </div>
    @else
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
      <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
        <tr>
          <th class="py-3 px-4 text-left">ID Reporte</th>
          <th class="py-3 px-4 text-left">Gestor ID</th>
          <th class="py-3 px-4 text-left">Descripción</th>
          <th class="py-3 px-4 text-left">Fecha</th>
          <th class="py-3 px-4 text-left">Acciones</th>
        </tr>
      </thead>
      <tbody class="text-gray-700">
        @foreach ($reportes as $reporte)
        <tr class="border-t">
          <td class="py-2 px-4">{{ $reporte->id_reporte }}</td>
          <td class="py-2 px-4">{{ $reporte->id_gestor }}</td>
          <td class="py-2 px-4">{{ \Illuminate\Support\Str::limit($reporte->descripcion, 40) }}</td>
          <td class="py-2 px-4">{{ \Carbon\Carbon::parse($reporte->fecha_reporte)->format('d/m/Y') }}</td>
          <td class="py-2 px-4">
            <div class="flex flex-wrap gap-2">
              <a href="{{ route('Ganadero.tratamientosReportes.showR', $reporte->id_reporte) }}" class="px-3 py-1 text-sm bg-gray-600 text-white rounded hover:bg-gray-700">Ver</a>
              <a href="{{ route('Ganadero.tratamientosReportes.editR', $reporte->id_reporte) }}" class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">Editar</a>
              <form action="{{ route('Ganadero.tratamientosReportes.destroyR', $reporte->id_reporte) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar esta publicación?');" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
              </form>
              <a href="#" class="px-3 py-1 text-sm bg-emerald-100 text-emerald-700 rounded hover:bg-emerald-200">Descargar</a>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
      </tr>

      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection