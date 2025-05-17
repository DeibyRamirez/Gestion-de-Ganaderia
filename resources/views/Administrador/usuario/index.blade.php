@extends('layouts.app')

@section('content')
<div class="space-y-10">
  <div class="flex items-center justify-between">
    <div>
      <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Gestión de Usuarios</h1>
      <p class="text-muted-foreground">Consulte y gestione los usuarios registrados</p>
    </div>
    <div>
      <a href="{{ route('Administrador.usuario.create') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
        <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="10"></circle>
          <path d="M8 12h8M12 8v8"></path>
        </svg>
        Crear Usuario
      </a>
    </div>
  </div>

  {{-- Mensajes de éxito o error --}}
  <div class="text-center mb-6">
    @if(session('success'))
    <div class="bg-green-500 text-white font-semibold px-4 py-2 rounded-md shadow mt-4">
      {{ session('success') }}
    </div>
    @elseif(session('error'))
    <div class="bg-red-500 text-white font-semibold px-4 py-2 rounded-md shadow mt-4">
      {{ session('error') }}
    </div>
    @endif
  </div>

  {{-- Tabla de usuarios --}}
  <div class="overflow-x-auto mt-6">
    @if ($usuarios->isEmpty())
    <div class="text-center text-muted-foreground py-10">
      No hay usuarios registrados.
    </div>
    @else
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
      <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
        <tr>
          <th class="py-3 px-4 text-left">ID</th>
          <th class="py-3 px-4 text-left">Nombre</th>
          <th class="py-3 px-4 text-left">Apellido</th>
          <th class="py-3 px-4 text-left">Correo</th>
          <th class="py-3 px-4 text-left">Teléfono</th>
          <th class="py-3 px-4 text-left">Dirección</th>
          <th class="py-3 px-4 text-left">Rol</th>
          <th class="py-3 px-4 text-left">Acciones</th>
        </tr>
      </thead>
      <tbody class="text-gray-700">
        @foreach($usuarios as $usuario)
        <tr class="border-t">
          <td class="py-2 px-4">{{ $usuario->id_usuario }}</td>
          <td class="py-2 px-4">{{ $usuario->name }}</td>
          <td class="py-2 px-4">{{ $usuario->last_name }}</td>
          <td class="py-2 px-4">{{ $usuario->email }}</td>
          <td class="py-2 px-4">{{ $usuario->telefono }}</td>
          <td class="py-2 px-4">{{ $usuario->direccion }}</td>
          <td class="py-2 px-4">{{ $usuario->rol }}</td>
          <td class="py-2 px-4 space-x-2 flex flex-wrap">
            <a href="{{ route('Administrador.usuario.edit', $usuario->id_usuario) }}" class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">Editar</a>
            <form action="{{ route('Administrador.usuario.destroy', $usuario->id_usuario) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection
