@extends('layouts.app')

@section('content')
<div class="space-y-12">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Publicaciones de Ganaderos</h1>
            <p class="text-muted-foreground text-gray-600">
                Explore todas las publicaciones realizadas por los ganaderos registrados en el sistema.
            </p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('Ganadero.publicaciones.create') }}"
                class="px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
                + Nueva Publicación Producción
            </a>
            <a href="{{ route('Ganadero.publicaciones.createG') }}"
                class="px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
                + Nueva Publicación Ganado
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

    {{-- Publicaciones de Producción --}}
    {{-- Publicaciones de Producción --}}
    <div>
        <h2 class="text-2xl font-semibold text-emerald-700 mb-4">Producción</h2>
        <div class="flex gap-6 overflow-x-auto pb-4">
            @foreach ($publicaciones as $publicacion)
            <div class="min-w-[300px] max-w-[300px] bg-white rounded-2xl shadow-lg p-6 border flex-shrink-0">
                <div class="mb-2 text-sm text-gray-500">Por: {{ $publicacion->ganadero->name }}</div>
                <div class="mb-2 text-gray-700">{{ \Illuminate\Support\Str::limit($publicacion->descripcion ,40)}}</div>

                <div class="text-sm text-gray-600 space-y-1 mb-4">
                    <p><strong>Tipo:</strong> {{ $publicacion->tipo_producto }}</p>
                    <p><strong>Cantidad:</strong> {{ $publicacion->cantidad }}</p>
                    <p><strong>Fecha:</strong> {{ $publicacion->fecha }}</p>
                    <p>
                        <strong>Estado:</strong>
                        @if($publicacion->estado === 'disponible')
                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Disponible</span>
                        @else
                        <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs">No disponible</span>
                        @endif
                    </p>
                </div>

                <p class="text-xl font-bold text-emerald-600 mb-4">
                    ${{ number_format($publicacion->precio, 2) }}
                </p>

                <div class="flex flex-wrap justify-between gap-2">
                    <a href="{{ route('Ganadero.publicaciones.show', $publicacion->id_publicacion ) }}"
                        class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 text-sm">Ver</a>
                        @if (Auth::id() === $publicacion->id_ganadero)
                    <a href="{{ route('Ganadero.publicaciones.edit', $publicacion->id_publicacion) }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">Editar</a>
                    <form action="{{ route('Ganadero.publicaciones.destroy', $publicacion->id_publicacion) }}" method="POST"
                        onsubmit="return confirm('¿Está seguro de que desea eliminar esta publicación?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-sm">Eliminar</button>
                    </form>
                    @endif
                    <button class="px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700 text-sm">Comprar</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    {{-- Publicaciones de Ganado --}}
    {{-- Publicaciones de Ganado --}}
    <div>
        <h2 class="text-2xl font-semibold text-emerald-800 mb-4">Ganado</h2>
        <div class="flex gap-6 overflow-x-auto pb-4">
            @foreach ($publicacionesG as $publicacion)
            <div class="min-w-[300px] max-w-[300px] bg-white rounded-2xl shadow-lg p-6 border flex-shrink-0">
                <div class="mb-2 text-sm text-gray-500">Por: {{ $publicacion->ganadero->name }}</div>
                <div class="mb-2 text-gray-700">{{\Illuminate\Support\Str::limit( $publicacion->descripcion ,40) }}</div>

                <div class="text-sm text-gray-600 space-y-1 mb-4">
                    <p><strong>Vaca:</strong> {{ $publicacion->id_vaca }}</p>
                    <p><strong>Fecha:</strong> {{ $publicacion->fecha }}</p>
                    <p>
                        <strong>Estado:</strong>
                        @if($publicacion->estado === 'disponible')
                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Disponible</span>
                        @else
                        <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs">No disponible</span>
                        @endif
                    </p>
                </div>

                <p class="text-xl font-bold text-emerald-600 mb-4">
                    ${{ number_format($publicacion->precio, 2) }}
                </p>

                <div class="flex flex-wrap justify-between gap-2">
                    <a href="{{ route('Ganadero.publicaciones.showG', $publicacion->id_publicacion ) }}"
                        class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 text-sm">Ver</a>
                    @if (Auth::id() === $publicacion->id_ganadero)
                    <a href="{{ route('Ganadero.publicaciones.editG', $publicacion->id_publicacion) }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">Editar</a>
                    <form action="{{ route('Ganadero.publicaciones.destroyG', $publicacion->id_publicacion) }}" method="POST"
                        onsubmit="return confirm('¿Está seguro de que desea eliminar esta publicación?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-sm">Eliminar</button>
                    </form>
                    @endif
                    <button class="px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700 text-sm">Comprar</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>


</div>
@endsection