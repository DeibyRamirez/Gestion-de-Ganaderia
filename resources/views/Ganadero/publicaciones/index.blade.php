@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Publicaciones de Ganaderos</h1>
            <p class="text-muted-foreground text-gray-600">
                Explore todas las publicaciones realizadas por los ganaderos registrados en el sistema.
            </p>
        </div>
        <a href="{{ route('Ganadero.publicaciones.create') }}"
            class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M8 12h8M12 8v8"></path>
            </svg>
            Nueva Publicación
        </a>
    </div>

    <div class="text-center mb-6">
        @if (session('success'))
        <div class="bg-green-500 text-white font-semibold px-4 py-2 rounded-md shadow mt-4">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="bg-red-500 text-white font-semibold px-4 py-2 rounded-md shadow mt-4">
            {{ session('error') }}
        </div>
        @endif
    </div>

    <!-- Contenedor de publicaciones con control manual -->
    <div class="relative w-full flex justify-center items-center">
        <!-- Botón Izquierdo -->
        <button id="prevBtn" class="absolute left-4 bg-gray-200 hover:bg-gray-300 rounded-full p-3 shadow z-10">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <!-- Tarjeta de publicación -->
        <div id="cardContainer" class="w-full max-w-2xl px-4">
            @foreach ($publicaciones as $index => $publicacion)
            <div class="card-publicacion {{ $index === 0 ? '' : 'hidden' }} transition duration-500 ease-in-out">
                <div class="bg-white border border-gray-200 rounded-2xl shadow-xl p-8 space-y-4">
                    <div class="flex justify-between items-center mb-2">
                        <div>

                            <p class="text-sm text-gray-500">Por: {{ $publicacion->ganadero->name }}</p>
                        </div>
                        <span class="text-sm font-medium px-3 py-1 rounded-full bg-emerald-100 text-emerald-800">
                            ID: {{ $publicacion->id_publicacion }}
                        </span>
                    </div>

                    <p class="text-gray-700">{{ $publicacion->descripcion }}</p>

                    <div class="grid grid-cols-2 gap-3 text-sm text-gray-600">
                        <p><span class="font-semibold">Tipo:</span> {{ $publicacion->tipo_producto }}</p>
                        <p><span class="font-semibold">Cantidad:</span> {{ $publicacion->cantidad }}</p>
                        <p><span class="font-semibold">Fecha:</span> {{ $publicacion->fecha }}</p>
                        <div class="flex items-center gap-2 col-span-2">
                            <span class="font-semibold">Estado:</span>
                            @if($publicacion->estado === 'disponible')
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">
                                Disponible
                            </span>
                            @else
                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">
                                No disponible
                            </span>
                            @endif
                            
                                </div>
                        </div>

                        <div class="pt-4">
                            <p class="text-xl font-bold text-emerald-600">
                                ${{ number_format($publicacion->precio, 2) }}
                            </p>
                        </div>
                        <div class="flex justify-between items-center pt-4">
                            <div class="flex justify-start pt-4 flex-wrap gap-2">
                                <a
                                    class="inline-flex items-center justify-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-gray-700 transition text-sm">
                                    Comprar
                                </a>
                            </div>

                            <div class="flex justify-end pt-4 flex-wrap gap-2">
                                <a href="{{ route('Ganadero.publicaciones.show', $publicacion->id_publicacion ) }}"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition text-sm">
                                    Ver
                                </a>
                                <a href="{{ route('Ganadero.publicaciones.edit', $publicacion->id_publicacion) }}"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition text-sm">
                                    Editar
                                </a>
                                <form action="{{ route('Ganadero.publicaciones.destroy', $publicacion->id_publicacion) }}" method="POST"
                                    onsubmit="return confirm('¿Está seguro de que desea eliminar esta publicación?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center justify-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition text-sm">
                                        Eliminar
                                    </button>
                                </form>

                                @if($publicacion->estado === 'Disponible')
                                <a href="#"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 transition text-sm">
                                    Comprar
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

            <!-- Botón Derecho -->
            <button id="nextBtn" class="absolute right-4 bg-gray-200 hover:bg-gray-300 rounded-full p-3 shadow z-10">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Script para navegación entre publicaciones -->
    <script>
        const cards = document.querySelectorAll('.card-publicacion');
        let currentIndex = 0;

        document.getElementById('prevBtn').addEventListener('click', () => {
            cards[currentIndex].classList.add('hidden');
            currentIndex = (currentIndex - 1 + cards.length) % cards.length;
            cards[currentIndex].classList.remove('hidden');
        });

        document.getElementById('nextBtn').addEventListener('click', () => {
            cards[currentIndex].classList.add('hidden');
            currentIndex = (currentIndex + 1) % cards.length;
            cards[currentIndex].classList.remove('hidden');
        });
    </script>
    @endsection