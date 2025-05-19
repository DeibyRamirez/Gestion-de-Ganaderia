@extends('layouts.app')

@section('content')
<div class="space-y-10">
    {{-- Encabezado --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-4xl font-bold text-emerald-700">Crear Nueva Publicación</h1>
            <p class="text-gray-500 mt-1">Completa la información del producto que deseas publicar.</p>
        </div>
        @if (Auth()->user()->rol === 'ganadero')
        <a href="{{ route('Ganadero.publicaciones.index') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 18l-6-6 6-6" />
            </svg>
            Volver a las Publicaciones
        </a>
        @endif

        @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
        <a href="{{ route('Administrador.publicaciones.index') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 18l-6-6 6-6" />
            </svg>
            Volver a las Publicaciones
        </a>
        @endif
    </div>

    {{-- Validaciones --}}
    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded-md">
        <ul class="list-disc pl-5 space-y-1">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Formulario --}}
    <section>
        <form action="{{ route('Ganadero.publicaciones.store') }}" method="POST" class="space-y-6 bg-white shadow rounded-lg p-6">
            @csrf

            <div class="grid md:grid-cols-2 gap-4">

                {{-- ID del Ganadero --}}
                <div>
                    <label for="id_ganadero" class="block text-sm font-medium text-gray-700 mb-1">Ganadero</label>
                    <input type="text" value="{{ Auth()->user()->name }}" class="w-full border-gray-300 rounded-md shadow-sm bg-gray-100" readonly>
                    <input type="hidden" name="id_ganadero" id="id_ganadero" value="{{ Auth()->user()->id_usuario }}">
                </div>

                {{-- Tipo de Producto --}}
                <div>
                    <label for="tipo_producto" class="block text-sm font-medium text-gray-700 mb-1">Tipo de Producto</label>
                    <select name="tipo_producto" id="tipo_producto"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                        <option value="">Seleccione una opción</option>
                        <option value="leche">Leche</option>
                        <option value="carne">Carne</option>

                    </select>
                </div>
            </div>


            {{-- Descripción --}}
            <div class="md:col-span-2">
                <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>{{ old('descripcion') }}</textarea>
            </div>

            {{-- Cantidad --}}
            <div>
                <label for="cantidad" class="block text-sm font-medium text-gray-700 mb-1">Cantidad</label>
                <input type="number" min="1" name="cantidad" id="cantidad" value="{{ old('cantidad') }}"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
            </div>


            {{-- Precio --}}
            <div>
                <label for="precio" class="block text-sm font-medium text-gray-700 mb-1">Precio</label>
                <input type="number" step="0.01" min="0" name="precio" id="precio" value="{{ old('precio') }}"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
            </div>




            {{-- Estado --}}
            <input type="hidden" name="estado" value="disponible">

            {{-- Fecha --}}
            <div>
                <label for="fecha" class="block text-sm font-medium text-gray-700 mb-1">Fecha</label>
                <input type="date" name="fecha" id="fecha" value="{{ old('fecha', date('Y-m-d')) }}"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-md shadow">
                    Guardar Publicación
                </button>
            </div>
        </form>
    </section>
</div>
@endsection