@extends('layouts.app')

@section('content')
<div class="space-y-10">
    {{-- Encabezado --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-4xl font-bold text-emerald-700">Registro de Producción Detallada</h1>
        </div>
        <a href="{{ route('Ganadero.produccion.index') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 18l-6-6 6-6" />
            </svg>
            Volver a Producciones
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


    <!-- Registros Recientes en formato Card -->
    <div class="rounded-lg border">
        <div class="p-6">
            <h2 class="text-xl font-semibold">Registros Recientes</h2>
            <p class="text-sm text-muted-foreground">Últimos registros de producción</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
            @forelse ($produccion->where('tipo_produccion', 'carne') as $registro)
            <div class="rounded-lg border shadow-sm p-4 bg-white hover:shadow-md transition">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-500">{{ \Carbon\Carbon::parse($registro->fecha)->format('d/m/Y') }}</span>
                    <span class="text-sm px-2 py-1 rounded-full bg-red-100 ">
                        {{ ucfirst($registro->tipo_produccion) }}
                    </span>
                </div>
                <div class="space-y-1">
                    <p class="text-lg font-semibold">Cantidad:
                        <span class="text-gray-700">
                            {{ $registro->cantidad }} kg
                        </span>
                    </p>
                    <p class="text-sm text-gray-500">Ganado ID: {{ $registro->id_vaca }}</p>
                </div>
                <div class="mt-5 flex justify-end space-x-2">
                    <a href="{{ route('Ganadero.produccion.show', $registro->id_produccion) }}"
                        class="inline-flex items-center justify-center px-3 py-1.5 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition text-sm">
                        Ver
                    </a>
                    <a href="{{ route('Ganadero.produccion.edit', $registro->id_produccion) }}"
                        class="inline-flex items-center justify-center px-3 py-1.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm">
                        Editar
                    </a>
                    <form action="{{ route('Ganadero.produccion.destroy', $registro->id_produccion) }}" method="POST"
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
            <div class="col-span-full text-center text-gray-500 py-8"></div>
            No hay registros de producción disponibles.
        </div>
        @endforelse
        @forelse ($produccion->where('tipo_produccion', 'leche') as $registro)
        <div class="rounded-lg border shadow-sm p-4 bg-white hover:shadow-md transition">
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium text-gray-500">{{ \Carbon\Carbon::parse($registro->fecha)->format('d/m/Y') }}</span>
                <span class="text-sm px-2 py-1 rounded-full bg-blue-100">
                    {{ ucfirst($registro->tipo_produccion) }}
                </span>
            </div>
            <div class="space-y-1">
                <p class="text-lg font-semibold">Cantidad:
                    <span class="text-gray-700">
                        {{ $registro->cantidad }} L
                    </span>
                </p>
                <p class="text-sm text-gray-500">Ganado ID: {{ $registro->id_vaca }}</p>
            </div>
            <div class="mt-5 flex justify-end space-x-2">
                <a href="{{ route('Ganadero.produccion.show', $registro->id_produccion) }}"
                    class="inline-flex items-center justify-center px-3 py-1.5 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition text-sm">
                    Ver
                </a>
                <a href="{{ route('Ganadero.produccion.edit', $registro->id_produccion) }}"
                    class="inline-flex items-center justify-center px-3 py-1.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm">
                    Editar
                </a>
                <form action="{{ route('Ganadero.produccion.destroy', $registro->id_produccion) }}" method="POST"
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
        <div class="col-span-full text-center text-gray-500 py-8"></div>
        No hay registros de producción disponibles.
    </div>
    @endforelse
</div>
</div>
</div>
@endsection