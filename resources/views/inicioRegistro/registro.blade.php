@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-xl bg-white rounded-xl shadow-md p-8 space-y-6">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-gray-800">Crear Cuenta</h1>
            <p class="text-gray-500">Regístrate para comenzar a usar el sistema</p>
        </div>

        <form action=" {{-- {{ route('register') }} --}}" method="POST" class="space-y-4">
            @csrf

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="nombre" class="block text-sm text-gray-700 mb-1">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                </div>
                <div>
                    <label for="apellido" class="block text-sm text-gray-700 mb-1">Apellido</label>
                    <input type="text" name="apellido" id="apellido" value="{{ old('apellido') }}" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm text-gray-700 mb-1">Correo electrónico</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
            </div>

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="password" class="block text-sm text-gray-700 mb-1">Contraseña</label>
                    <input type="password" name="password" id="password" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm text-gray-700 mb-1">Repetir contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                </div>
            </div>

            <div>
                <label for="telefono" class="block text-sm text-gray-700 mb-1">Teléfono</label>
                <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
            </div>

            <div>
                <label for="direccion" class="block text-sm text-gray-700 mb-1">Dirección</label>
                <input type="text" name="direccion" id="direccion" value="{{ old('direccion') }}" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
            </div>

            <input type="hidden" name="rol" value="ganadero">

            <div class="flex justify-end">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium px-5 py-2 rounded-md shadow">
                    Registrarse
                </button>
            </div>
        </form>

        <div class="text-center text-sm">
            ¿Ya tienes una cuenta?
            <a href="{{ route('inicioRegistro.login') }}" class="text-emerald-600 hover:underline">Inicia sesión</a>
        </div>
    </div>
</div>
@endsection
