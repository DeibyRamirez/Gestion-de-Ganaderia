@extends('layouts.app')

@section('content')
<div class="space-y-10">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Publicaciones de Ganaderos</h1>
            <p class="text-muted-foreground text-gray-600">Explore todas las publicaciones realizadas por los ganaderos registrados en el sistema.</p>
        </div>
        <a href="{{ route('Ganadero.publicaciones.create') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M8 12h8M12 8v8"></path>
            </svg>
            Nueva Publicación
        </a>
    </div>

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

    @if ($publicaciones->isEmpty())
        <div class="text-center text-muted-foreground py-10">
            No hay publicaciones registradas.
        </div>
    @else
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
            <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                <tr>
                    <th class="py-3 px-4 text-left">ID</th>
                    <th class="py-3 px-4 text-left">Ganadero</th>
                    <th class="py-3 px-4 text-left">Tipo</th>
                    <th class="py-3 px-4 text-left">Cantidad</th>
                    <th class="py-3 px-4 text-left">Precio</th>
                    <th class="py-3 px-4 text-left">Fecha</th>
                    <th class="py-3 px-4 text-left">Estado</th>
                    <th class="py-3 px-4 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($publicaciones as $publicacion)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-2 px-4">#{{ $publicacion->id_publicacion }}</td>
                        <td class="py-2 px-4">{{ $publicacion->ganadero->name }}</td>
                        <td class="py-2 px-4">{{ $publicacion->tipo_producto }}</td>
                        <td class="py-2 px-4">{{ $publicacion->cantidad }}</td>
                        <td class="py-2 px-4">${{ number_format($publicacion->precio, 2) }}</td>
                        <td class="py-2 px-4">{{ \Carbon\Carbon::parse($publicacion->fecha)->format('d/m/Y') }}</td>
                        <td class="py-2 px-4">
                            @if ($publicacion->estado === 'disponible')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Disponible</span>
                            @else
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-700">No disponible</span>
                            @endif
                        </td>
                        <td class="py-2 px-4 flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                            <a href="{{ route('Ganadero.publicaciones.show', $publicacion->id_publicacion) }}" class="px-3 py-1 text-sm bg-gray-600 text-white rounded hover:bg-gray-700 text-center">Ver</a>
                            <a href="{{ route('Ganadero.publicaciones.edit', $publicacion->id_publicacion) }}" class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700 text-center">Editar</a>
                            <form action="{{ route('Ganadero.publicaciones.destroy', $publicacion->id_publicacion) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar esta publicación?');" class="text-center">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
