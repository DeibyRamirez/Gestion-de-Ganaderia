@extends('layouts.app')

@section('content')
<div class="space-y-6 px-6">
    <div>
        <h1 class="text-3xl font-bold tracking-tight">Dashboard</h1>
        <p class="text-gray-500">
            Bienvenido al sistema de gestión ganadera. Aquí puede ver un resumen de su operación.
        </p>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        {{-- Total de Ganado --}}
        <div class="rounded-lg border p-4 shadow bg-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Total de Ganado</p>
                    <h2 class="text-2xl font-bold">124</h2>
                    <p class="text-sm text-green-500">+5% este mes</p>
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

        {{-- Producción de Leche --}}
        <div class="rounded-lg border p-4 shadow bg-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Producción de Leche</p>
                    <h2 class="text-2xl font-bold">1,284 L</h2>
                    <p class="text-sm text-green-500">+2.5% este mes</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-droplets-icon lucide-droplets">
                    <path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z" />
                    <path d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97" />
                </svg>
            </div>
            <p class="mt-2 text-sm text-gray-400">Producción diaria</p>
        </div>

        {{-- Ventas Mensuales --}}
        <div class="rounded-lg border p-4 shadow bg-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Ventas Mensuales</p>
                    <h2 class="text-2xl font-bold">$24,500</h2>
                    <p class="text-sm text-green-500">+10% este mes</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dollar-sign-icon lucide-dollar-sign">
                    <line x1="12" x2="12" y1="2" y2="22" />
                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                </svg>
            </div>
            <p class="mt-2 text-sm text-gray-400">Ingresos del mes actual</p>
        </div>

        {{-- Rendimiento --}}
        <div class="rounded-lg border p-4 shadow bg-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Rendimiento</p>
                    <h2 class="text-2xl font-bold">87%</h2>
                    <p class="text-sm text-red-500">-3% este mes</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil-ruler-icon lucide-pencil-ruler">
                    <path d="M13 7 8.7 2.7a2.41 2.41 0 0 0-3.4 0L2.7 5.3a2.41 2.41 0 0 0 0 3.4L7 13" />
                    <path d="m8 6 2-2" />
                    <path d="m18 16 2-2" />
                    <path d="m17 11 4.3 4.3c.94.94.94 2.46 0 3.4l-2.6 2.6c-.94.94-2.46.94-3.4 0L11 17" />
                    <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                    <path d="m15 5 4 4" />
                </svg>
            </div>
            <p class="mt-2 text-sm text-gray-400">Eficiencia operativa</p>
        </div>
    </div>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <div class="col-span-2 rounded-lg border p-6 bg-white shadow">
            <h2 class="mb-4 text-xl font-semibold">Producción Reciente</h2>
            <div class="h-80 rounded-md bg-gray-200"></div>
        </div>
        <div class="rounded-lg border p-6 bg-white shadow">
            <h2 class="mb-4 text-xl font-semibold">Actividades Pendientes</h2>
            <div class="space-y-4">
                @for ($i = 1; $i <= 4; $i++)
                    <div class="flex items-center gap-4 rounded-md border p-3 bg-gray-50">
                    <div class="h-2 w-2 rounded-full bg-emerald-500"></div>
                    <div>
                        <p class="font-medium">Tarea pendiente {{ $i }}</p>
                        <p class="text-sm text-gray-400">Fecha: 12/04/2023</p>
                    </div>
            </div>
            @endfor
        </div>
    </div>
</div>
</div>
@endsection