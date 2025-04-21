@extends('layouts.app')

@section('content')
<div class="space-y-6">
  <div class="flex items-start justify-between">
    <div>
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Bienvenido a GanaSys 🐄</h1>
      <p class="text-muted-foreground mt-1">
        Selecciona una opción en la barra lateral o explora todo lo que te ofrece nuestro sistema.
      </p>
    </div>
  </div>

  <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
    <div class="rounded-lg border p-5 bg-white shadow-sm">
      <h3 class="text-lg font-semibold flex items-center mb-2">
        <i class="fa-solid fa-hat-cowboy text-emerald-600 mr-2"></i> Gestión de Ganado
      </h3>
      <p class="text-muted-foreground text-sm">
        Administra eficientemente el inventario de tu ganado, registra nacimientos, ventas, compras y eventos clave.
      </p>
    </div>

    <div class="rounded-lg border p-5 bg-white shadow-sm">
      <h3 class="text-lg font-semibold flex items-center mb-2">
        <i class="fa-solid fa-utensils text-orange-500 mr-2"></i> Alimentación
      </h3>
      <p class="text-muted-foreground text-sm">
        Controla la alimentación con dietas personalizadas, asegurando la nutrición y productividad de tu ganado.
      </p>
    </div>

    <div class="rounded-lg border p-5 bg-white shadow-sm">
      <h3 class="text-lg font-semibold flex items-center mb-2">
        <i class="fa-solid fa-notes-medical text-red-500 mr-2"></i> Historial Médico
      </h3>
      <p class="text-muted-foreground text-sm">
        Lleva un registro completo de tratamientos, vacunación y revisiones para mantener la salud del ganado.
      </p>
    </div>

    <div class="rounded-lg border p-5 bg-white shadow-sm">
      <h3 class="text-lg font-semibold flex items-center mb-2">
        <i class="fa-solid fa-chart-line text-blue-600 mr-2"></i> Producción
      </h3>
      <p class="text-muted-foreground text-sm">
        Supervisa la producción de leche, carne y otros derivados con informes detallados y análisis de rendimiento.
      </p>
    </div>

    <div class="rounded-lg border p-5 bg-white shadow-sm">
      <h3 class="text-lg font-semibold flex items-center mb-2">
        <i class="fa-solid fa-cart-shopping text-purple-600 mr-2"></i> Ventas y Compras
      </h3>
      <p class="text-muted-foreground text-sm">
        Registra operaciones comerciales como ventas, compras de ganado e insumos para un control financiero claro.
      </p>
    </div>

    <div class="rounded-lg border p-5 bg-white shadow-sm">
      <h3 class="text-lg font-semibold flex items-center mb-2">
        <i class="fa-solid fa-file-medical-alt text-pink-500 mr-2"></i> Tratamientos y Reportes
      </h3>
      <p class="text-muted-foreground text-sm">
        Genera informes sobre tratamientos, gastos veterinarios y resultados de manera automatizada.
      </p>
    </div>
  </div>
</div>
@endsection
