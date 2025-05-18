@extends('layouts.app')

@section('content')
<div class="space-y-15">
    <!-- Producción de Leche -->
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Producción de Leche</h1>
                <p class="text-muted-foreground">Registros de producción lechera del ganado</p>
            </div>
            @if (in_array(Auth()->user()->rol, ['administrador', 'ganadero']))


            <a href="{{ route('Ganadero.produccion.create') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M8 12h8M12 8v8"></path>
                </svg>
                Nuevo Registro
            </a>
            @endif
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

        <div class="overflow-x-auto mt-6">
            @if ($produccion->where('tipo_produccion', 'leche')->isEmpty())
            <div class="text-center text-muted-foreground py-10">
                No hay registros de producción de leche.
            </div>
            @else
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">Ganado ID</th>
                        <th class="py-3 px-4 text-left">Cantidad (L)</th>
                        <th class="py-3 px-4 text-left">Fecha</th>
                        <th class="py-3 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($produccion->where('tipo_produccion', 'leche') as $registro)
                    <tr class="border-t">
                        <td class="py-2 px-4">#{{ $registro->id_produccion }}</td>
                        <td class="py-2 px-4">🐄 {{ $registro->id_vaca }}</td>
                        <td class="py-2 px-4">{{ $registro->cantidad }} L</td>
                        <td class="py-2 px-4">{{ \Carbon\Carbon::parse($registro->fecha)->format('d/m/Y') }}</td>
                        <td class="py-2 px-4 space-x-2 flex flex-wrap">
                            <a href="{{ route('Ganadero.produccion.show', $registro->id_produccion) }}" class="px-3 py-1 text-sm bg-gray-600 text-white rounded hover:bg-gray-700">Ver</a>
                            @if (in_array(Auth()->user()->rol, ['administrador', 'ganadero']))

                            <a href="{{ route('Ganadero.produccion.edit', $registro->id_produccion) }}" class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">Editar</a>
                            <form action="{{ route('Ganadero.produccion.destroy', $registro->id_produccion)}}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar esta publicación?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

    <!-- Separador visual -->
    <div class="my-12 border-t border-gray-300"></div>

    <!-- Producción de Carne -->
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Producción de Carne</h1>
                <p class="text-muted-foreground">Registros de producción cárnica del ganado</p>
            </div>
        </div>

        <div class="overflow-x-auto mt-6">
            @if ($produccion->where('tipo_produccion', 'carne')->isEmpty())
            <div class="text-center text-muted-foreground py-10">
                No hay registros de producción de carne.
            </div>
            @else
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">Ganado ID</th>
                        <th class="py-3 px-4 text-left">Cantidad (Kg)</th>
                        <th class="py-3 px-4 text-left">Fecha</th>
                        <th class="py-3 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($produccion->where('tipo_produccion', 'carne') as $registro)
                    <tr class="border-t">
                        <td class="py-2 px-4">#{{ $registro->id_produccion }}</td>
                        <td class="py-2 px-4">🐄 {{ $registro->id_vaca }}</td>
                        <td class="py-2 px-4">{{ $registro->cantidad }} Kg</td>
                        <td class="py-2 px-4">{{ \Carbon\Carbon::parse($registro->fecha)->format('d/m/Y') }}</td>
                        <td class="py-2 px-4 space-x-2 flex flex-wrap">
                            <a href="{{ route('Ganadero.produccion.show', $registro->id_produccion) }}" class="px-3 py-1 text-sm bg-gray-600 text-white rounded hover:bg-gray-700">Ver</a>
                            @if (in_array(Auth()->user()->rol, ['administrador', 'ganadero']))
                            <a href="{{ route('Ganadero.produccion.edit', $registro->id_produccion) }}" class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">Editar</a>
                            <form action="{{ route('Ganadero.produccion.destroy', $registro->id_produccion)}}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar esta publicación?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection