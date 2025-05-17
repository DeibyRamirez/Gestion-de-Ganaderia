@extends('layouts.app')

@section('content')
<div class="space-y-10">

    {{-- Encabezado --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">Editar Usuario</h1>
            <p class="text-gray-500 mt-1">Modifica los datos del usuario seleccionado.</p>
        </div>

        <a href="{{ route('Administrador.usuario.index') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 18l-6-6 6-6" />
            </svg>
            Volver a Usuarios
        </a>
    </div>

    {{-- Formulario --}}
    <section class="bg-gray-50 border border-gray-200 rounded-xl p-6 shadow-md">
        <form action="{{ route('Administrador.usuario.update', $id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $usuario->name) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                </div>

                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $usuario->last_name) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $usuario->email) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                </div>

                <input type="hidden" name="password" id="password" value="{{ old('password', $usuario->password) }}">

                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $usuario->telefono) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                </div>

                <div>
                    <label for="direccion" class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                    <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $usuario->direccion) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                </div>

                <div>
                    <label for="rol" class="block text-sm font-medium text-gray-700 mb-1">Rol</label>
                    <select name="rol" id="rol" class="w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                        <option value="" disabled selected>Selecciona un rol</option>
                        <option value="administrador">Administrador</option>
                        <option value="ganadero">Ganadero</option>
                        <option value="gestor">Gestor</option>
                        <!-- Agrega más roles según sea necesario -->
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2 rounded-md shadow">
                    Actualizar
                </button>
            </div>
        </form>
    </section>
</div>
@endsection
