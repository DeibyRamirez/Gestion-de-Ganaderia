@extends('layouts.app')

@section('content')
<div class="flex min-h-screen items-center justify-center bg-gray-100 p-4">
    <div class="w-full max-w-md bg-white rounded-xl shadow-md overflow-hidden">
        <div class="text-center p-6 space-y-2">
            <div class="flex justify-center">
                {{-- Icono de hoja --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bull-head-icon lucide-bull-head">
                <path d="M7 10a5 5 0 0 1-4-8 4 4 0 0 0 4 4h10a4 4 0 0 0 4-4 5 5 0 0 1-4 8" />
                <path d="M6.4 15c-.3-.6-.4-1.3-.4-2 0-4 3-3 3-7" />
                <path d="M10 12.5v1.6" />
                <path d="M17.6 15c.3-.6.4-1.3.4-2 0-4-3-3-3-7" />
                <path d="M14 12.5v1.6" />
                <path d="M15 22a4 4 0 1 0-3-6.7A4 4 0 1 0 9 22Z" />
                <path d="M9 18h.01" />
                <path d="M15 18h.01" />
            </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">GanaSys</h2>
            <p class="text-sm text-gray-500">Ingrese sus credenciales para acceder al sistema</p>
        </div>

        <form method="POST" action="" class="px-6 space-y-6">
            @csrf

            {{-- Correo electrónico --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                <input type="email" name="email" id="email" placeholder="ejemplo@correo.com" required
                       class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500">
            </div>

            {{-- Contraseña --}}
            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                    <a href="" class="text-xs text-emerald-600 hover:underline">
                        ¿Olvidó su contraseña?
                    </a>
                </div>
                <input type="password" name="password" id="password" required
                       class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500">
            </div>

            {{-- Botón --}}
            <div class="space-y-4 pb-6">
                <button type="submit" formaction="{{ route('Ganadero.dashboard.index') }}" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-2 rounded-md shadow">
                    Iniciar sesión
                </button>

                <div class="text-center text-sm">
                    ¿No tiene una cuenta?
                    <a href="{{ route('inicioRegistro.Registro') }}" class="text-emerald-600 hover:underline">
                        Registrarse
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
