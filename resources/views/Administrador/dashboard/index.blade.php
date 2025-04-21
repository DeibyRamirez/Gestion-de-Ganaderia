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

        {{-- Total Ganaderos --}}
        <div class="rounded-lg border p-4 shadow bg-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Total de Ganaderos</p>
                    <h2 class="text-2xl font-bold">124</h2>
                    <p class="text-sm text-green-500">+5% este mes</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wheat-icon lucide-wheat"><path d="M2 22 16 8"/><path d="M3.47 12.53 5 11l1.53 1.53a3.5 3.5 0 0 1 0 4.94L5 19l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z"/><path d="M7.47 8.53 9 7l1.53 1.53a3.5 3.5 0 0 1 0 4.94L9 15l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z"/><path d="M11.47 4.53 13 3l1.53 1.53a3.5 3.5 0 0 1 0 4.94L13 11l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z"/><path d="M20 2h2v2a4 4 0 0 1-4 4h-2V6a4 4 0 0 1 4-4Z"/><path d="M11.47 17.47 13 19l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L5 19l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z"/><path d="M15.47 13.47 17 15l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L9 15l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z"/><path d="M19.47 9.47 21 11l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L13 11l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z"/></svg>
            </div>
            <p class="mt-2 text-sm text-gray-400">Total de Ganaderos</p>
        </div>


        {{-- Total Administradores --}}
        <div class="rounded-lg border p-4 shadow bg-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Total de Administradores</p>
                    <h2 class="text-2xl font-bold">124</h2>
                    <p class="text-sm text-green-500">+5% este mes</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-icon lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <p class="mt-2 text-sm text-gray-400">Administradores en Linea</p>
        </div>


        {{-- Total Gestores --}}
        <div class="rounded-lg border p-4 shadow bg-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Total de Gestores</p>
                    <h2 class="text-2xl font-bold">124</h2>
                    <p class="text-sm text-green-500">+5% este mes</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-icon lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <p class="mt-2 text-sm text-gray-400">Gestores en Linea</p>
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

        {{-- Producción de Carne --}}
        <div class="rounded-lg border p-4 shadow bg-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Producción de Carne</p>
                    <h2 class="text-2xl font-bold">1,284 Kg</h2>
                    <p class="text-sm text-green-500">+2.5% este mes</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-beef-icon lucide-beef"><path d="M16.4 13.7A6.5 6.5 0 1 0 6.28 6.6c-1.1 3.13-.78 3.9-3.18 6.08A3 3 0 0 0 5 18c4 0 8.4-1.8 11.4-4.3"/><path d="m18.5 6 2.19 4.5a6.48 6.48 0 0 1-2.29 7.2C15.4 20.2 11 22 7 22a3 3 0 0 1-2.68-1.66L2.4 16.5"/><circle cx="12.5" cy="8.5" r="2.5"/></svg>
            </div>
            <p class="mt-2 text-sm text-gray-400">Producción diaria</p>
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