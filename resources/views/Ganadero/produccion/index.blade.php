@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-emerald-700"">Producción</h1>
            <p class=" text-muted-foreground">Gestione y consulte los registros de producción de leche y carne</p>
        </div>
        
    </div>
    
    <!-- Secciones para Gráficas -->
    <div class="grid gap-6 md:grid-cols-2">
        <div class="rounded-lg border p-6">
            <h2 class="mb-4 text-xl font-semibold">Producción de Leche</h2>
            <div class="h-64 rounded-md bg-gray-100 flex items-center justify-center text-gray-400">Gráfica futura</div>
        </div>

        <div class="rounded-lg border p-6">
            <h2 class="mb-4 text-xl font-semibold">Producción de Carne</h2>
            <div class="h-64 rounded-md bg-gray-100 flex items-center justify-center text-gray-400">Gráfica futura</div>
        </div>
    </div>

    <div class="mt-4 flex justify-center">
        <a href="{{ route('Ganadero.produccion.indexDetallada') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
            Ver todos los registros
        </a>
    </div>

</div>
@endsection