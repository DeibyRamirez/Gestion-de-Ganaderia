@extends('layouts.app')

@section('content')
<div class="space-y-6">
  <div class="flex items-center justify-between">
    <div>
      <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Historial Médico</h1>
      <p class="text-gray-500">Consulte y gestione el historial médico de su ganado</p>
    </div>

    @if (in_array(Auth()->user()->rol, ['administrador', 'gestor']))
    <a href="{{ route('Ganadero.historial.create') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
      <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="10"></circle>
        <path d="M8 12h8M12 8v8"></path>
      </svg>
      Nuevo Registro
    </a>
  </div>
  <div class="text-center mb-6"></div>
  @endif



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

<div class="rounded-lg border bg-white">
  <div class="p-6">
    <h2 class="text-xl font-semibold">Registros Médicos</h2>
    <p class="text-sm text-gray-500">Historial de tratamientos, vacunas y diagnósticos</p>
  </div>

  <div class="px-6 pb-6">
    <ol class="relative border-l border-gray-300">
      @foreach ($historial_medico as $historial)
      <li class="mb-10 ml-6">
        <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white">
          <svg class="w-3 h-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10 2a8 8 0 100 16 8 8 0 000-16zm3.707 7.707l-4 4a1 1 0 01-1.414 0l-2-2a1 1 0 111.414-1.414L9 11.586l3.293-3.293a1 1 0 111.414 1.414z" />
          </svg>
        </span>
        <div class="bg-gray-50 p-5 rounded-md shadow-sm hover:shadow-md transition">
          <h3 class="text-lg font-medium text-gray-900">Diagnóstico: {{ $historial->diagnostico }}</h3>
          <p class="text-sm text-gray-600 mt-1"><strong>Síntomas:</strong> {{ $historial->sintomas }}</p>
          @foreach ($vacas as $vaca)
          @if ($vaca->id_vaca == $historial->id_vaca)
          <p class="text-sm text-gray-600 mt-1"><strong>Nombre Vaca:</strong> {{ $vaca->nombre }}</p>
          @endif
          @endforeach

          <p class="text-xs text-gray-500 mt-2">📅 Fecha: {{ \Carbon\Carbon::parse($historial->fecha_diagnostico)->format('d/m/Y') }}</p>
          <div class="mt-3">

            <div class="mt-5 flex justify-end space-x-2">
              <a href="{{ route('Ganadero.historial.show', $historial->id_historial) }}"
                class="inline-flex items-center justify-center px-3 py-1.5 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition text-sm">
                Ver
              </a>
              @if (in_array(Auth()->user()->rol, ['administrador', 'gestor']))


              <a href="{{ route('Ganadero.historial.edit', $historial->id_historial) }}"
                class="inline-flex items-center justify-center px-3 py-1.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm">
                Editar
              </a>
              <form action="{{ route('Ganadero.historial.destroy', $historial->id_historial) }}" method="POST"
                onsubmit="return confirm('¿Está seguro de que desea eliminar este animal?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="inline-flex items-center justify-center px-3 py-1.5 bg-red-600 text-white rounded-md hover:bg-red-700 transition text-sm">
                  Eliminar
                </button>
              </form>
              @endif

            </div>

          </div>
        </div>
      </li>
      @endforeach
    </ol>
  </div>
</div>
</div>
@endsection