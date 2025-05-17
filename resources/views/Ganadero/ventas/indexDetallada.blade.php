@extends('layouts.app')

@section('content')
<div class="space-y-6">
    {{-- Encabezado --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-4xl font-bold text-emerald-700">Registro de Ventas Detalladas</h1>
        </div>
        {{-- Botones --}}
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('Ganadero.ventas.createProduccion') }}"
                class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M8 12h8M12 8v8"></path>
                </svg>
                Nueva Venta Producción
            </a>

            <a href="{{ route('Ganadero.ventas.create') }}"
                class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M8 12h8M12 8v8"></path>
                </svg>
                Nueva Venta Ganado
            </a>

            <a href="{{ route('Ganadero.ventas.index') }}"
                class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M15 18l-6-6 6-6" />
                </svg>
                Volver a Ventas
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

    {{-- Transacciones de Producción --}}
    <div class="rounded-lg border p-6 space-y-4">
        <h2 class="text-xl font-semibold">Transacciones Recientes</h2>
        <p class="text-sm text-gray-500">Últimas ventas de Producción registradas</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($ventas as $venta)
            <div class="rounded-lg border shadow-sm p-4 bg-white hover:shadow-md transition">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d/m/Y') }}</span>
                    <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Producción</span>
                </div>
                <p class="text-lg font-semibold">Producto: {{ ucfirst($venta->producto) }}</p>
                <p class="text-sm text-gray-600">Cantidad: {{ $venta->cantidad }}</p>
                <p class="text-sm text-gray-600">Precio: ${{ $venta->precio }}</p>
                @foreach ($Ganaderos as $Ganadero )
                @if ($Ganadero->id_usuario == $venta->id_vendedor)
                <p class="text-sm text-gray-600">Vendedor: {{ $Ganadero->name }}</p>
                @endif
                @if ($Ganadero->id_usuario == $venta->id_comprador)
                <p class="text-sm text-gray-600">Comprador: {{ $Ganadero->name }}</p>
                @endif

                @endforeach

                <div class="mt-5 flex justify-end space-x-2">
                    <a href="{{ route('Ganadero.ventas.show', $venta->id_venta ) }}"
                        class="px-3 py-1.5 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition text-sm">Ver</a>
                    <a href="{{ route('Ganadero.ventas.edit', $venta->id_venta) }}"
                        class="px-3 py-1.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm">Editar</a>
                    <form action="{{ route('Ganadero.ventas.destroy', $venta->id_venta) }}" method="POST"
                        onsubmit="return confirm('¿Está seguro de que desea eliminar este animal?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-3 py-1.5 bg-red-600 text-white rounded-md hover:bg-red-700 transition text-sm">Eliminar</button>
                    </form>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-gray-500 py-8">
                No hay transacciones registradas.
            </div>
            @endforelse
        </div>
    </div>

    {{-- Transacciones de Ganado --}}
    <div class="rounded-lg border p-6 space-y-4">
        <h2 class="text-xl font-semibold">Transacciones Recientes</h2>
        <p class="text-sm text-gray-500">Últimas ventas de Ganado registradas</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($ventas_ganado as $venta_g)
            <div class="rounded-lg border shadow-sm p-4 bg-white hover:shadow-md transition">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($venta_g->fecha_venta)->format('d/m/Y') }}</span>
                    <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Ganado</span>
                </div>
                @foreach ($Ganado as $animal)
                @if ($animal->id_vaca == $venta_g->id_vaca)
                <p class="text-lg font-semibold">Animal Vendido: {{ $animal->nombre }}</p>
                @endif
                @endforeach
 
                <p class="text-sm text-gray-600">Precio: ${{ $venta_g->precio }}</p>
                @foreach ($Ganaderos as $Ganadero )
                @if ($Ganadero->id_usuario == $venta_g->id_vendedor)
                <p class="text-sm text-gray-600">Vendedor: {{ $Ganadero->name }}</p>
                @endif
                @if ($Ganadero->id_usuario == $venta_g->id_comprador)
                <p class="text-sm text-gray-600">Comprador: {{ $Ganadero->name }}</p>
                @endif

                @endforeach
                <div class="mt-5 flex justify-end space-x-2">
                    <a href="{{ route('Ganadero.ventas.showG', $venta_g->id_venta ) }}"
                        class="px-3 py-1.5 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition text-sm">Ver</a>
                    <a href="{{ route('Ganadero.ventas.editG', $venta_g->id_venta) }}"
                        class="px-3 py-1.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm">Editar</a>
                    <form action="{{ route('Ganadero.ventas.destroyG', $venta_g->id_venta) }}" method="POST"
                        onsubmit="return confirm('¿Está seguro de que desea eliminar este animal?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-3 py-1.5 bg-red-600 text-white rounded-md hover:bg-red-700 transition text-sm">Eliminar</button>
                    </form>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-gray-500 py-8">
                No hay transacciones registradas.
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection