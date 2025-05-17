@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-6 space-y-6">
  <h1 class="text-3xl font-bold text-emerald-700 text-center">Editar Publicación</h1>

  @if ($errors->any())
  <div class="bg-red-100 text-red-700 p-4 rounded-md">
    <ul class="list-disc pl-5 space-y-1">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{ route('Ganadero.publicaciones.update', $publicacion->id_publicacion) }}" method="POST" class="space-y-5">
    @csrf
    @method('PUT')

    {{-- ID de la Vaca --}}
    <div>
      <label for="id_vaca" class="block text-sm font-medium text-gray-700 mb-1"> Animal</label>
      <select name="id_vaca" id="id_vaca" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
      <option value="">Seleccione una opción</option>
      @foreach ($Ganado as $vaca)
      <option value="{{ $vaca->id_vaca }}" {{ old('id_vaca', $publicacion->id_vaca) == $vaca->id_vaca ? 'selected' : '' }}>{{ $vaca->nombre }}</option>
      @endforeach
      </select>
    </div>

    {{-- ID del Ganadero --}}
    <div>
      <label for="id_ganadero" class="block text-sm font-medium text-gray-700 mb-1"> Ganadero</label>
      <select name="id_ganadero" id="id_ganadero" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
      <option value="">Seleccione una opción</option>
      @foreach ($Ganaderos as $Ganadero)
      <option value="{{ $Ganadero->id_usuario }}" {{ old('id_ganadero', $publicacion->id_ganadero) == $Ganadero->id_usuario ? 'selected' : '' }}>
        {{ $Ganadero->name }}
      </option>
      @endforeach
      </select>
    </div>

    <div>
      <label for="descripcion" class="block font-semibold text-gray-700">Descripción</label>
      <textarea name="descripcion" id="descripcion" rows="4"
        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500"
        required>{{ old('descripcion', $publicacion->descripcion) }}</textarea>
    </div>

    <div>
      <label for="precio" class="block font-semibold text-gray-700">Precio</label>
      <input type="number" name="precio" id="precio" step="0.01" min="0"
        value="{{ old('precio', $publicacion->precio) }}"
        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
    </div>

    <div>
      <label for="estado" class="block font-semibold text-gray-700">Estado</label>
      <select name="estado" id="estado"
        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
        <option value="">Seleccione...</option>
        <option value="Disponible" {{ old('estado', $publicacion->estado) == 'Disponible' ? 'selected' : '' }}>Disponible</option>
        <option value="Vendido" {{ old('estado', $publicacion->estado) == 'Vendido' ? 'selected' : '' }}>Vendido</option>
      </select>
    </div>

    <div>
      <label for="fecha" class="block font-semibold text-gray-700">Fecha</label>
      <input type="date" name="fecha" id="fecha"
        value="{{ old('fecha', $publicacion->fecha) }}"
        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
    </div>

    <div class="flex justify-between items-center mt-6">
      @if (auth()->user()->rol === 'ganadero')
      <a href="{{ route('Ganadero.publicaciones.index') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path d="M15 18l-6-6 6-6" />
        </svg>
        Volver a Publicaciones
      </a>

      @endif

      @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
      <a href="{{ route('Administrador.publicaciones.index') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path d="M15 18l-6-6 6-6" />
        </svg>
        Volver a Publicaciones
      </a>
      @endif
      <button type="submit"
        class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-2 rounded-md transition shadow">
        Actualizar Publicación
      </button>
    </div>
  </form>
</div>
@endsection