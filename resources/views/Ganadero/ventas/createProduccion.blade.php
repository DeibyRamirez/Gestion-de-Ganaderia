@extends('layouts.app')

@section('content')

<div class="space-y-10">
    {{-- Encabezado --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">Registrar Venta de Produccion</h1>
            <p class="text-gray-500 mt-1">Completa la información de la transacción.</p>
        </div>
        @if (Auth()->user()->rol === 'ganadero')
        <a href="{{ route('Ganadero.ventas.indexDetallada') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 18l-6-6 6-6" />
            </svg>
            Volver a Ventas
        </a>
        @endif

        @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
        <a href="{{ route('Administrador.ventas.index') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 18l-6-6 6-6" />
            </svg>
            Volver a Ventas
        </a>
        @endif
    </div>

    {{-- Formulario --}}
    <section>
        <form action="{{ route('Ganadero.ventas.store') }}" method="POST" class="space-y-6 bg-white shadow rounded-lg p-6">
            @csrf

            <div class="grid md:grid-cols-2 gap-4">
                {{-- ID del Vendedor --}}
               
                <input type="hidden" name="id_vendedor" id="id_vendedor" value="{{ Auth()->user()->id_usuario }}">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Vendedor</label>
                    <input type="text" class="w-full border-gray-300 rounded-md shadow-sm bg-gray-100" value="{{ Auth()->user()->name }}" readonly>
                </div>
                {{-- ID del Comprador --}}
                <div>
                    <label for="id_comprador" class="block text-sm font-medium text-gray-700 mb-1">Comprador</label>
                    <select name="id_comprador" id="id_comprador" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                        <option value="">Seleccione una opción</option>
                        @foreach ($Ganaderos as $Ganadero)
                            @if ($Ganadero->id_usuario != Auth()->user()->id_usuario)
                                <option value="{{ $Ganadero->id_usuario }}">{{ $Ganadero->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                {{-- Tipo de Producción --}}
                <div>
                    <label for="producto" class="block text-sm font-medium text-gray-700 mb-1">Tipo de Producción</label>
                    <select name="producto" id="producto" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                        <option value="">Seleccione una opción</option>
                        <option value="leche">Leche</option>
                        <option value="carne">Carne</option>
                    </select>
                </div>

                {{-- Cantidad --}}
                <div>
                    <label for="cantidad" class="block text-sm font-medium text-gray-700 mb-1">Cantidad</label>
                    <input type="number" step="0.01" name="cantidad" id="cantidad" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                </div>

                {{-- Precio --}}
                <div>
                    <label for="precio" class="block text-sm font-medium text-gray-700 mb-1">Precio ($)</label>
                    <input type="number" step="0.01" name="precio" id="precio" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                </div>

                {{-- Fecha --}}
                <div>
                    <label for="fecha_venta" class="block text-sm font-medium text-gray-700 mb-1">Fecha</label>
                    <input type="date" name="fecha_venta" id="fecha" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2 rounded-md shadow">
                    Guardar
                </button>
            </div>
        </form>
    </section>
</div>
@endsection
