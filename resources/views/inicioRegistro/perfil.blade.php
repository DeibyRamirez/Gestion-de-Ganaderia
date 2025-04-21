@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    {{-- Encabezado --}}
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold text-gray-800">Perfil de Usuario</h1>
        <p class="text-gray-500">Aquí puedes ver tus datos personales.</p>
    </div>

    {{-- Tarjeta de perfil --}}
    <div class="bg-white rounded-xl shadow-md p-6 space-y-6 border border-gray-200">
        {{-- Imagen del usuario (si tienes avatar) --}}
        <div class="flex justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-contact-icon lucide-contact"><path d="M16 2v2"/><path d="M7 22v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2"/><path d="M8 2v2"/><circle cx="12" cy="11" r="3"/><rect x="3" y="4" width="18" height="18" rx="2"/></svg>
        </div>

        {{-- Datos del usuario --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm text-gray-600">Nombre</label>
                <p class="text-lg font-medium text-gray-800">{{-- {{ $datos_perfil['nombre']}} --}} deiby</p>
            </div>

            <div>
                <label class="block text-sm text-gray-600">Correo electrónico</label>
                <p class="text-lg font-medium text-gray-800">{{--{{ $datos_perfil['correo'] }}  --}} deiby@gami.com</p>
            </div>

            {{-- Puedes agregar más campos si tu modelo User los tiene --}}
            {{-- <div>
                <label class="block text-sm text-gray-600">Teléfono</label>
                <p class="text-lg font-medium text-gray-800">{{ Auth::user()->telefono }}</p>
            </div> --}}
        </div>

        {{-- Botón para editar perfil --}}
        <div class="flex justify-end">
            <a href="" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white text-sm font-medium rounded-md hover:bg-emerald-700 shadow">
                Editar Perfil
            </a>
        </div>
    </div>
</div>
@endsection
