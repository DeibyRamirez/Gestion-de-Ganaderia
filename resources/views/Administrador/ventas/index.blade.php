@extends('layouts.app')

@section('content')

<div class="space-y-6">
    {{-- Encabezado para ventas de ganado --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-4xl font-bold text-emerald-700">Registro de las Ventas Ganado</h1>
        </div>


        <a href="{{ route('Ganadero.ventas.create') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M8 12h8M12 8v8"></path>
            </svg>
            Nueva Venta Ganado
        </a>
        
    </div>

    <!-- Tabla de Ventas de Ganado -->
    <div class="rounded-lg border p-6 space-y-4">
        <h2 class="text-xl font-semibold">Transacciones Recientes (Ganado)</h2>
        <p class="text-sm text-gray-500">Últimas ventas de Ganado registradas</p>

        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
            <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                <tr>
                    <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-600">Fecha de Venta</th>
                    <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-600">Venta ID</th>
                    <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-600">Precio</th>
                    <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-600">Vendedor ID</th>
                    <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-600">Comprador ID</th>
                    <th class="py-3 px-4 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas_ganado as $venta_g)
                <tr>
                    <td class="py-2 px-4 border-b text-sm text-gray-500">{{ \Carbon\Carbon::parse($venta_g->fecha_venta)->format('d/m/Y') }}</td>
                    <td class="py-2 px-4 border-b text-sm text-gray-600">Vaca ID: {{ $venta_g->id_vaca }}</td>
                    <td class="py-2 px-4 border-b text-sm text-gray-600">${{ $venta_g->precio }}</td>
                    <td class="py-2 px-4 border-b text-sm text-gray-600">{{ $venta_g->id_vendedor }}</td>
                    <td class="py-2 px-4 border-b text-sm text-gray-600">{{ $venta_g->id_comprador }}</td>
                    <td class="py-2 px-4 space-x-2 flex flex-wrap">
                            <a href="{{ route('Ganadero.ventas.showG', $venta_g->id_venta) }}" class="px-3 py-1 text-sm bg-gray-600 text-white rounded hover:bg-gray-700">Ver</a>
                            <a href="{{ route('Ganadero.ventas.editG', $venta_g->id_venta) }}" class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">Editar</a>
                            <form action="{{ route('Ganadero.ventas.destroyG', $venta_g->id_venta) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar esta publicación?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
                            </form>
                        </td>
                </tr>
                @endforeach
                @if($ventas_ganado->isEmpty())
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-500">No hay transacciones registradas.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    {{-- Encabezado para ventas de producción --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mt-10">
        <div>
            <h1 class="text-4xl font-bold text-emerald-700">Registro de Ventas de la Producción</h1>
        </div>
        
        <a href="{{ route('Ganadero.ventas.createProduccion') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M8 12h8M12 8v8"></path>
            </svg>
            Nueva Venta Producción
        </a>
        
    </div>

    <!-- Tabla de Ventas de Producción -->
    <div class="rounded-lg border p-6 space-y-4">
        <h2 class="text-xl font-semibold">Transacciones Recientes (Producción)</h2>
        <p class="text-sm text-gray-500">Últimas ventas de Producción registradas</p>

        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
            <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                <tr>
                    <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-600">Fecha de Venta</th>
                    <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-600">Producto</th>
                    <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-600">Cantidad</th>
                    <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-600">Precio</th>
                    <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-600">Vendedor ID</th>
                    <th class="py-2 px-4 border-b text-left text-sm font-semibold text-gray-600">Comprador ID</th>
                    <th class="py-3 px-4 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                <tr>
                    <td class="py-2 px-4 border-b text-sm text-gray-500">{{ \Carbon\Carbon::parse($venta->fecha)->format('d/m/Y') }}</td>
                    <td class="py-2 px-4 border-b text-sm text-gray-600">{{ ucfirst($venta->producto) }}</td>
                    <td class="py-2 px-4 border-b text-sm text-gray-600">{{ $venta->cantidad }}</td>
                    <td class="py-2 px-4 border-b text-sm text-gray-600">${{ $venta->precio }}</td>
                    <td class="py-2 px-4 border-b text-sm text-gray-600">{{ $venta->id_vendedor }}</td>
                    <td class="py-2 px-4 border-b text-sm text-gray-600">{{ $venta->id_comprador }}</td>
                    <td class="py-2 px-4 space-x-2 flex flex-wrap">
                            <a href="{{ route('Ganadero.ventas.show', $venta->id_venta) }}" class="px-3 py-1 text-sm bg-gray-600 text-white rounded hover:bg-gray-700">Ver</a>
                            <a href="{{ route('Ganadero.ventas.edit', $venta->id_venta) }}" class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">Editar</a>
                            <form action="{{ route('Ganadero.ventas.destroy', $venta->id_venta) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar esta publicación?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
                            </form>
                        </td>
                </tr>
                @endforeach
                @if($ventas->isEmpty())
                <tr>
                    <td colspan="6" class="py-8 text-center text-gray-500">No hay transacciones registradas.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

</div>
@endsection