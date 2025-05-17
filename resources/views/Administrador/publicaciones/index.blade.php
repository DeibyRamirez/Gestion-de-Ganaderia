@extends('layouts.app')

@section('content')
<div class="space-y-10">

    {{-- Encabezado general --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Publicaciones de Ganaderos</h1>
            <p class="text-muted-foreground text-gray-600">Explore todas las publicaciones realizadas por los ganaderos registrados en el sistema.</p>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('Ganadero.publicaciones.create') }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded shadow hover:bg-emerald-700">
                + Publicación Producto
            </a>
            <a href="{{ route('Ganadero.publicaciones.createG') }}" class="inline-flex items-center px-4 py-2 bg-teal-600 text-white rounded shadow hover:bg-teal-700">
                + Publicación Ganado
            </a>
        </div>
    </div>

    {{-- Mensajes de éxito / error --}}
    @if (session('success'))
    <div class="bg-green-500 text-white px-4 py-2 rounded-md shadow text-center">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="bg-red-500 text-white px-4 py-2 rounded-md shadow text-center">
        {{ session('error') }}
    </div>
    @endif

    {{-- Publicaciones normales --}}
    <div class="rounded-lg border p-6 space-y-4">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-4">📦 Publicaciones de Productos</h2>

            @if ($publicaciones->isEmpty())
            <p class="text-gray-500 text-center py-4">No hay publicaciones de productos.</p>
            @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border rounded shadow">
                    <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                        <tr>
                            <th class="py-2 px-4">ID</th>
                            <th class="py-2 px-4">Ganadero</th>
                            <th class="py-2 px-4">Descripción</th>
                            <th class="py-2 px-4">Tipo</th>
                            <th class="py-2 px-4">Cantidad</th>
                            <th class="py-2 px-4">Precio</th>
                            <th class="py-2 px-4">Fecha</th>
                            <th class="py-2 px-4">Estado</th>
                            <th class="py-2 px-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($publicaciones as $publicacion)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="py-2 px-4">#{{ $publicacion->id_publicacion }}</td>
                            <td class="py-2 px-4">{{ $publicacion->ganadero->name }}</td>
                            <td class="py-2 px-4">{{ \Illuminate\Support\Str::limit($publicacion->descripcion, 30) }}</td>
                            <td class="py-2 px-4">{{ $publicacion->tipo_producto }}</td>
                            <td class="py-2 px-4">{{ $publicacion->cantidad }}</td>
                            <td class="py-2 px-4">${{ number_format($publicacion->precio, 2) }}</td>
                            <td class="py-2 px-4">{{ \Carbon\Carbon::parse($publicacion->fecha)->format('d/m/Y') }}</td>
                            <td class="py-2 px-4">
                                <span class="px-2 py-1 text-xs font-medium rounded-full {{ $publicacion->estado === 'disponible' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-700' }}">
                                    {{ ucfirst($publicacion->estado) }}
                                </span>
                            </td>
                            <td class="py-2 px-4 space-x-2 text-center">
                                <a href="{{ route('Ganadero.publicaciones.show', $publicacion->id_publicacion) }}" class="text-sm bg-gray-600 text-white px-2 py-1 rounded hover:bg-gray-700">Ver</a>
                                <a href="{{ route('Ganadero.publicaciones.edit', $publicacion->id_publicacion) }}" class="text-sm bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-700">Editar</a>
                                <form action="{{ route('Ganadero.publicaciones.destroy', $publicacion->id_publicacion) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar esta publicación?');">
                                    @csrf @method('DELETE')
                                    <button class="text-sm bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>

    {{-- Publicaciones de ganado --}}
    <div class="rounded-lg border p-6 space-y-4">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-4">🐄 Publicaciones de Ganado</h2>

            @if ($publicacionesG->isEmpty())
            <p class="text-gray-500 text-center py-4">No hay publicaciones de ganado.</p>
            @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border rounded shadow">
                    <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                        <tr>
                            <th class="py-2 px-4">ID</th>
                            <th class="py-2 px-4">Ganadero</th>
                            <th class="py-2 px-4">Vaca</th>
                            <th class="py-2 px-4">Descripción</th>
                            <th class="py-2 px-4">Precio</th>
                            <th class="py-2 px-4">Fecha</th>
                            <th class="py-2 px-4">Estado</th>
                            <th class="py-2 px-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($publicacionesG as $publicacionG)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="py-2 px-4">#{{ $publicacionG->id }}</td>
                            <td class="py-2 px-4">{{ $publicacionG->ganadero->name }}</td>
                            <td class="py-2 px-4">{{ $publicacionG->id_vaca ?? 'N/A' }}</td>
                            <td class="py-2 px-4">{{ \Illuminate\Support\Str::limit($publicacionG->descripcion, 30) }}</td>
                            <td class="py-2 px-4">${{ number_format($publicacionG->precio, 2) }}</td>
                            <td class="py-2 px-4">{{ \Carbon\Carbon::parse($publicacionG->fecha)->format('d/m/Y') }}</td>
                            <td class="py-2 px-4">
                                <span class="px-2 py-1 text-xs font-medium rounded-full {{ $publicacionG->estado === 'disponible' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-700' }}">
                                    {{ ucfirst($publicacionG->estado) }}
                                </span>
                            </td>
                            <td class="py-2 px-4 space-x-2 text-center">
                                <a href="{{ route('Ganadero.publicaciones.showG', $publicacionG->id_publicacion) }}" class="text-sm bg-gray-600 text-white px-2 py-1 rounded hover:bg-gray-700">Ver</a>
                                <a href="{{ route('Ganadero.publicaciones.editG', $publicacionG->id_publicacion) }}" class="text-sm bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-700">Editar</a>
                                <form action="{{ route('Ganadero.publicaciones.destroyG', $publicacionG->id_publicacion) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar esta publicación?');">
                                    @csrf @method('DELETE')
                                    <button class="text-sm bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @endif
        </div>
    </div>

</div>
@endsection