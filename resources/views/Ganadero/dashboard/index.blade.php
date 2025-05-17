@extends('layouts.app')

@section('content')
<div class="px-6 py-8 space-y-8 bg-gray-50 min-h-screen">
    {{-- Encabezado --}}
    <div>
        <h1 class="text-4xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-500 mt-1">Bienvenido al sistema de gestión ganadera. Visualiza un resumen de tus operaciones.</p>
    </div>

    {{-- Tarjetas estadísticas --}}
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        {{-- Total de Ganado --}}
        <div class="bg-white rounded-xl border p-5 shadow hover:shadow-lg transition duration-300">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Total de Ganado</p>
                    <h2 class="text-2xl font-bold text-gray-800">{{ $GanadoTotal }}</h2>

                </div>
                <svg class="w-10 h-10 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M17.8 15.1a10 10 0 0 0 .9-7.1h.3c1.7 0 3-1.3 3-3V3h-3c-1.3 0-2.4.8-2.8 1.9a10 10 0 0 0-8.4 0C7.4 3.8 6.3 3 5 3H2v2c0 1.7 1.3 3 3 3h.3a10 10 0 0 0 .9 7.1" />
                    <path d="M9 9.5v.5M15 9.5v.5M15 22a4 4 0 1 0-3-6.6A4 4 0 1 0 9 22Z" />
                    <path d="M9 18h.01M15 18h.01" />
                </svg>
            </div>
            <p class="mt-2 text-sm text-gray-400">Cabezas de ganado activas</p>
        </div>

        {{-- Producción de Leche --}}
        <div class="bg-white rounded-xl border p-5 shadow hover:shadow-lg transition duration-300">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Producción de Leche</p>
                    <h2 class="text-2xl font-bold text-gray-800">{{ $leche }} Litros</h2>

                </div>
                <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z" />
                    <path d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97" />
                </svg>
            </div>
            <p class="mt-2 text-sm text-gray-400">Producción Total</p>
        </div>

        {{-- Producción de Carne --}}
        <div class="bg-white rounded-xl border p-5 shadow hover:shadow-lg transition duration-300">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Producción de Carne</p>
                    <h2 class="text-2xl font-bold text-gray-800">{{ $carne }} Kilos</h2>

                </div>
                <svg class="w-10 h-10 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke="currentColor" stroke-width="2" d="M17.5 6.5c-2-2-6-2-8 0l-3 3c-2 2-2 6 0 8s6 2 8 0l3-3c2-2 2-6 0-8z" />
                    <ellipse cx="12" cy="12" rx="3" ry="5" fill="currentColor" opacity="0.3" />
                </svg>
            </div>
            <p class="mt-2 text-sm text-gray-400">Producción Total</p>
        </div>


        {{-- Total de Ventas --}}
        <div class="bg-white rounded-xl border p-5 shadow hover:shadow-lg transition duration-300">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Total Ventas</p>
                    <h2 class="text-2xl font-bold text-gray-800">$ {{$ingresos }}</h2>

                </div>
                <svg class="w-10 h-10 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <line x1="12" x2="12" y1="2" y2="22" />
                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                </svg>
            </div>
            <p class="mt-2 text-sm text-gray-400">Ingresos actuales</p>
        </div>
    </div>

    {{-- Gráfico de producción reciente --}}
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <div class="col-span-2 bg-white rounded-xl p-6 shadow hover:shadow-lg transition duration-300">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">📈 Producción Reciente</h2>
              
            </div>
            <canvas id="produccionChart"
                class="w-full"
                style="height: 300px; max-height: 300px;"
                data-ganado="{{ $GanadoTotal }}"
                data-leche="{{ $leche }}"
                data-carne="{{ $carne }}"
                data-ingresos="{{ $ingresos }}">
            </canvas>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('produccionChart');
    
    if (!canvas) {
        console.error('No se encontró el elemento canvas con ID "produccionChart"');
        return;
    }
    
    const ctx = canvas.getContext('2d');
    
    // Los datos los tomamos desde los atributos data- que pusimos en el canvas
    const ganadoTotal = parseInt(canvas.dataset.ganado) || 0;
    const leche = parseFloat(canvas.dataset.leche) || 0;
    const carne = parseFloat(canvas.dataset.carne) || 0;
    const ingresos = parseFloat(canvas.dataset.ingresos) || 0;
    
    console.log('Datos cargados:', { ganadoTotal, leche, carne, ingresos });

    const data = {
        labels: ['Ganado Total', 'Leche (L)', 'Carne (Kg)', 'Ingresos ($)'],
        datasets: [{
            label: 'Producción',
            data: [ganadoTotal, leche, carne, ingresos],
            backgroundColor: [
                'rgba(34,197,94, 0.7)',   // Verde
                'rgba(59,130,246, 0.7)',  // Azul
                'rgba(239,68,68, 0.7)',   // Rojo
                'rgba(202,138,4, 0.7)'    // Amarillo
            ],
            borderColor: [
                'rgba(34,197,94, 1)',
                'rgba(59,130,246, 1)',
                'rgba(239,68,68, 1)',
                'rgba(202,138,4, 1)'
            ],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: Math.max(ganadoTotal, leche, carne, ingresos) * 1.1
                }
            }
        }
    };

    // Crear el gráfico
    new Chart(ctx, config);
});
</script>
@endpush