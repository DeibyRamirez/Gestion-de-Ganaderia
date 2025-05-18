@extends('layouts.app')

@section('content')
<div class="px-6 py-8 space-y-8 bg-gray-50 min-h-screen">
  {{-- Header --}}
  <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
    <div>
      <h1 class="text-3xl font-bold text-emerald-700">Ventas Mensuales</h1>
      <p class="text-gray-600 mt-2">Resumen de producción y ventas de leche, carne y ganado</p>
    </div>
    <div>
      <a href="{{ route('Ganadero.ventas.indexDetallada') }}" 
         class="flex items-center px-5 py-3 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
         <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
         </svg>
         Ver todas las ventas
      </a>
    </div>
  </div>

  {{-- Charts Section --}}
  <div class="grid gap-8">
    {{-- Combined Sales Chart --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
      <h2 class="text-xl font-semibold text-emerald-700 mb-4 flex items-center">
        <svg class="w-5 h-5 mr-2 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
        </svg>
        Ventas Totales por Mes
      </h2>
      <canvas id="combinedSalesChart" class="w-full" style="height: 350px;"
        data-meses="{{ json_encode($chartData['meses']) }}"
        data-venta-leche="{{ json_encode($chartData['venta_leche']) }}"
        data-venta-carne="{{ json_encode($chartData['venta_carne']) }}"
        data-venta-ganado="{{ json_encode($chartData['venta_ganado']) }}">
      </canvas>
    </div>

    {{-- Production vs Sales Comparison --}}
    <div class="grid gap-6 md:grid-cols-2">
      <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-xl font-semibold text-emerald-700 mb-4 flex items-center">
          <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
          </svg>
          Leche: Producción vs Ventas
        </h2>
        <canvas id="milkChart" class="w-full" style="height: 300px;"
          data-meses="{{ json_encode($chartData['meses']) }}"
          data-produccion="{{ json_encode($chartData['produccion_leche']) }}"
          data-ventas="{{ json_encode($chartData['venta_leche']) }}">
        </canvas>
      </div>

      <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-xl font-semibold text-emerald-700 mb-4 flex items-center">
          <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
          </svg>
          Carne: Producción vs Ventas
        </h2>
        <canvas id="meatChart" class="w-full" style="height: 300px;"
          data-meses="{{ json_encode($chartData['meses']) }}"
          data-produccion="{{ json_encode($chartData['produccion_carne']) }}"
          data-ventas="{{ json_encode($chartData['venta_carne']) }}">
        </canvas>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Combined Sales Chart
  const combinedCtx = document.getElementById('combinedSalesChart').getContext('2d');
  const combinedChart = new Chart(combinedCtx, {
    type: 'bar',
    data: {
      labels: JSON.parse(document.getElementById('combinedSalesChart').dataset.meses),
      datasets: [
        {
          label: 'Venta de Leche ($)',
          data: JSON.parse(document.getElementById('combinedSalesChart').dataset.ventaLeche),
          backgroundColor: 'rgba(59, 130, 246, 0.7)',
          borderColor: 'rgba(59, 130, 246, 1)',
          borderWidth: 1
        },
        {
          label: 'Venta de Carne ($)',
          data: JSON.parse(document.getElementById('combinedSalesChart').dataset.ventaCarne),
          backgroundColor: 'rgba(239, 68, 68, 0.7)',
          borderColor: 'rgba(239, 68, 68, 1)',
          borderWidth: 1
        },
        {
          label: 'Venta de Ganado ($)',
          data: JSON.parse(document.getElementById('combinedSalesChart').dataset.ventaGanado),
          backgroundColor: 'rgba(16, 185, 129, 0.7)',
          borderColor: 'rgba(16, 185, 129, 1)',
          borderWidth: 1
        }
      ]
    },
    options: {
      responsive: true,
      plugins: {
        tooltip: {
          callbacks: {
            label: function(context) {
              return context.dataset.label + ': $' + context.parsed.y.toLocaleString();
            }
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          title: {
            display: true,
            text: 'Valor en Pesos Colombianos'
          },
          ticks: {
            callback: function(value) {
              return '$' + value.toLocaleString();
            }
          }
        },
        x: {
          title: {
            display: true,
            text: 'Mes'
          }
        }
      }
    }
  });

  // Milk Production vs Sales Chart
  const milkCtx = document.getElementById('milkChart').getContext('2d');
  const milkChart = new Chart(milkCtx, {
    type: 'line',
    data: {
      labels: JSON.parse(document.getElementById('milkChart').dataset.meses),
      datasets: [
        {
          label: 'Producción (Litros)',
          data: JSON.parse(document.getElementById('milkChart').dataset.produccion),
          borderColor: 'rgba(59, 130, 246, 1)',
          backgroundColor: 'rgba(59, 130, 246, 0.1)',
          borderWidth: 2,
          tension: 0.1,
          fill: true
        },
        {
          label: 'Ventas ($)',
          data: JSON.parse(document.getElementById('milkChart').dataset.ventas),
          borderColor: 'rgba(16, 185, 129, 1)',
          backgroundColor: 'rgba(16, 185, 129, 0.1)',
          borderWidth: 2,
          tension: 0.1,
          fill: true,
          yAxisID: 'y1'
        }
      ]
    },
    options: {
      responsive: true,
      interaction: {
        mode: 'index',
        intersect: false,
      },
      plugins: {
        tooltip: {
          callbacks: {
            label: function(context) {
              let label = context.dataset.label || '';
              if (label.includes('Ventas')) {
                label += ': $' + context.parsed.y.toLocaleString();
              } else {
                label += ': ' + context.parsed.y.toLocaleString() + ' L';
              }
              return label;
            }
          }
        }
      },
      scales: {
        y: {
          type: 'linear',
          display: true,
          position: 'left',
          title: {
            display: true,
            text: 'Litros'
          }
        },
        y1: {
          type: 'linear',
          display: true,
          position: 'right',
          title: {
            display: true,
            text: 'Pesos Colombianos'
          },
          grid: {
            drawOnChartArea: false,
          },
          ticks: {
            callback: function(value) {
              return '$' + value.toLocaleString();
            }
          }
        }
      }
    }
  });

  // Meat Production vs Sales Chart
  const meatCtx = document.getElementById('meatChart').getContext('2d');
  const meatChart = new Chart(meatCtx, {
    type: 'line',
    data: {
      labels: JSON.parse(document.getElementById('meatChart').dataset.meses),
      datasets: [
        {
          label: 'Producción (Kg)',
          data: JSON.parse(document.getElementById('meatChart').dataset.produccion),
          borderColor: 'rgba(239, 68, 68, 1)',
          backgroundColor: 'rgba(239, 68, 68, 0.1)',
          borderWidth: 2,
          tension: 0.1,
          fill: true
        },
        {
          label: 'Ventas ($)',
          data: JSON.parse(document.getElementById('meatChart').dataset.ventas),
          borderColor: 'rgba(245, 158, 11, 1)',
          backgroundColor: 'rgba(245, 158, 11, 0.1)',
          borderWidth: 2,
          tension: 0.1,
          fill: true,
          yAxisID: 'y1'
        }
      ]
    },
    options: {
      responsive: true,
      interaction: {
        mode: 'index',
        intersect: false,
      },
      plugins: {
        tooltip: {
          callbacks: {
            label: function(context) {
              let label = context.dataset.label || '';
              if (label.includes('Ventas')) {
                label += ': $' + context.parsed.y.toLocaleString();
              } else {
                label += ': ' + context.parsed.y.toLocaleString() + ' Kg';
              }
              return label;
            }
          }
        }
      },
      scales: {
        y: {
          type: 'linear',
          display: true,
          position: 'left',
          title: {
            display: true,
            text: 'Kilogramos'
          }
        },
        y1: {
          type: 'linear',
          display: true,
          position: 'right',
          title: {
            display: true,
            text: 'Pesos Colombianos'
          },
          grid: {
            drawOnChartArea: false,
          },
          ticks: {
            callback: function(value) {
              return '$' + value.toLocaleString();
            }
          }
        }
      }
    }
  });
});
</script>
@endpush