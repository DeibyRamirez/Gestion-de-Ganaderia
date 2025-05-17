@extends('layouts.app')

@section('content')
<div class="space-y-6 px-6">
    <div>
        <h1 class="text-3xl font-bold tracking-tight">Dashboard</h1>
        <p class="text-gray-500">
            Bienvenido al sistema de gestión ganadera. Aquí puede ver un resumen de todo el sistema.
        </p>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        {{-- Total de Ganado --}}
        <div class="rounded-lg border p-4 shadow bg-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Total de Ganado</p>
                    <h2 class="text-2xl font-bold">{{ $ganado }}</h2>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cow-head-icon lucide-cow-head">
                    <path d="M17.8 15.1a10 10 0 0 0 .9-7.1h.3c1.7 0 3-1.3 3-3V3h-3c-1.3 0-2.4.8-2.8 1.9a10 10 0 0 0-8.4 0C7.4 3.8 6.3 3 5 3H2v2c0 1.7 1.3 3 3 3h.3a10 10 0 0 0 .9 7.1" />
                    <path d="M9 9.5v.5" />
                    <path d="M15 9.5v.5" />
                    <path d="M15 22a4 4 0 1 0-3-6.6A4 4 0 1 0 9 22Z" />
                    <path d="M9 18h.01" />
                    <path d="M15 18h.01" />
                </svg>
            </div>
            <p class="mt-2 text-sm text-gray-400">Cabezas de ganado activas</p>
        </div>

        {{-- Total Ganaderos --}}
        <div class="rounded-lg border p-4 shadow bg-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Total de Ganaderos</p>
                    <h2 class="text-2xl font-bold">{{ $ganaderos }}</h2>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wheat-icon lucide-wheat">
                    <path d="M2 22 16 8" />
                    <path d="M3.47 12.53 5 11l1.53 1.53a3.5 3.5 0 0 1 0 4.94L5 19l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z" />
                    <path d="M7.47 8.53 9 7l1.53 1.53a3.5 3.5 0 0 1 0 4.94L9 15l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z" />
                    <path d="M11.47 4.53 13 3l1.53 1.53a3.5 3.5 0 0 1 0 4.94L13 11l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z" />
                    <path d="M20 2h2v2a4 4 0 0 1-4 4h-2V6a4 4 0 0 1 4-4Z" />
                    <path d="M11.47 17.47 13 19l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L5 19l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z" />
                    <path d="M15.47 13.47 17 15l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L9 15l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z" />
                    <path d="M19.47 9.47 21 11l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L13 11l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z" />
                </svg>
            </div>
            <p class="mt-2 text-sm text-gray-400">Total de usuarios Ganaderos</p>
        </div>

        {{-- Total Administradores --}}
        <div class="rounded-lg border p-4 shadow bg-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Total de Administradores</p>
                    <h2 class="text-2xl font-bold">{{ $admins }}</h2>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-icon lucide-users">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
            </div>
            <p class="mt-2 text-sm text-gray-400">Administradores en Labor</p>
        </div>

        {{-- Total Gestores --}}
        <div class="rounded-lg border p-4 shadow bg-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Total de Gestores</p>
                    <h2 class="text-2xl font-bold">{{ $gestores }}</h2>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-icon lucide-users">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
            </div>
            <p class="mt-2 text-sm text-gray-400">Gestores al mando</p>
        </div>

        {{-- Producción de Leche --}}
        <div class="rounded-lg border p-4 shadow bg-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Producción de Leche</p>
                    <h2 class="text-2xl font-bold">{{ $leche }} Litros</h2>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-droplets-icon lucide-droplets">
                    <path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z" />
                    <path d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97" />
                </svg>
            </div>
            <p class="mt-2 text-sm text-gray-400">Venta total</p>
        </div>

        {{-- Producción de Carne --}}
        <div class="rounded-lg border p-4 shadow bg-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Producción de Carne</p>
                    <h2 class="text-2xl font-bold">{{ $carne }} Kilogramos</h2>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-beef-icon lucide-beef">
                    <path d="M16.4 13.7A6.5 6.5 0 1 0 6.28 6.6c-1.1 3.13-.78 3.9-3.18 6.08A3 3 0 0 0 5 18c4 0 8.4-1.8 11.4-4.3" />
                    <path d="m18.5 6 2.19 4.5a6.48 6.48 0 0 1-2.29 7.2C15.4 20.2 11 22 7 22a3 3 0 0 1-2.68-1.66L2.4 16.5" />
                    <circle cx="12.5" cy="8.5" r="2.5" />
                </svg>
            </div>
            <p class="mt-2 text-sm text-gray-400">Venta Total</p>
        </div>
    </div>

    <div class="grid gap-6 md:grid-cols-1 lg:grid-cols-1">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold mb-4"></h2>
            <div style="position: relative; height: 350px; width: 100%;">
                <canvas id="produccionChart"
                    data-ganado="{{ $ganado }}"
                    data-ganaderos="{{ $ganaderos }}"
                    data-admins="{{ $admins }}"
                    data-gestores="{{ $gestores }}"
                    data-leche="{{ $leche }}"
                    data-carne="{{ $carne }}"></canvas>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const canvas = document.getElementById('produccionChart');
            if (canvas) {
                canvas.width = canvas.parentElement.offsetWidth;
            }
        });
    </script>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const canvas = document.getElementById('produccionChart');

        if (!canvas) {
            console.error('No se encontró el elemento canvas con ID "produccionChart"');
            return;
        }

        const ctx = canvas.getContext('2d');

        // Los datos los tomamos desde los atributos data- que pusimos en el canvas
        const ganado = parseInt(canvas.dataset.ganado) || 0;
        const ganaderos = parseInt(canvas.dataset.ganaderos) || 0; // Corregido: era 'ganadores'
        const admins = parseInt(canvas.dataset.admins) || 0;
        const gestores = parseInt(canvas.dataset.gestores) || 0;
        const leche = parseFloat(canvas.dataset.leche) || 0;
        const carne = parseFloat(canvas.dataset.carne) || 0;

        console.log('Datos cargados:', {
            ganado,
            ganaderos, // Corregido
            admins,
            gestores,
            leche,
            carne
        });

        const data = {
            labels: ['Ganado Total', 'Total Ganaderos', 'Total Administradores', 'Total Gestores', 'Venta de Leche (L)', 'Venta de Carne (Kg)'],
            datasets: [{
                label: 'Valores',
                data: [ganado, ganaderos, admins, gestores, leche, carne], // Corregido: era 'ganadores'
                backgroundColor: [
                    'rgba(34, 197, 94, 0.7)',   // Verde para ganado
                    'rgba(59, 130, 246, 0.7)',  // Azul para ganaderos - Corregido
                    'rgba(239, 68, 68, 0.7)',   // Rojo para admins
                    'rgba(202, 138, 4, 0.7)',   // Amarillo para gestores
                    'rgba(34, 123, 94, 0.7)',   // Verde oscuro para leche - Corregido
                    'rgba(156, 163, 175, 0.7)'  // Gris para carne - Corregido
                ],
                borderColor: [
                    'rgba(34, 197, 94, 1)',
                    'rgba(59, 130, 246, 1)',    // Corregido
                    'rgba(239, 68, 68, 1)',
                    'rgba(202, 138, 4, 1)',
                    'rgba(34, 123, 94, 1)',
                    'rgba(156, 163, 175, 1)'    // Corregido
                ],
                borderWidth: 2
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Resumen del Sistema Ganadero'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMax: Math.max(ganado, ganaderos, admins, gestores, leche, carne) * 1.2
                    },
                    x: {
                        ticks: {
                            maxRotation: 45,
                            minRotation: 0
                        }
                    }
                }
            }
        };

        // Crear el gráfico
        try {
            new Chart(ctx, config);
            console.log('Gráfico creado exitosamente');
        } catch (error) {
            console.error('Error al crear el gráfico:', error);
            // Mostrar mensaje de error en el contenedor
            canvas.parentElement.innerHTML = '<div class="text-red-500 text-center p-4">Error al cargar la gráfica</div>';
        }
    });
</script>
@endpush