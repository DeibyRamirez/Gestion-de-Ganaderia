@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-emerald-700">Producción</h1>
            <p class="text-muted-foreground">Gestione y consulte los registros de producción de leche y carne</p>
        </div>
    </div>

    <!-- Secciones para Gráficas -->
    <div class="flex justify-center">
        <div class="rounded-lg border p-8 w-full max-w-4xl">
            <h2 class="mb-6 text-2xl font-semibold text-center">Producción de Leche y Carne</h2>
            <canvas id="grafica" class="h-96"
                data-meses="{{ json_encode($chartData['meses']) }}"
                data-leche="{{ json_encode($chartData['leche']) }}"
                data-carne="{{ json_encode($chartData['carne']) }}">
            </canvas>
        </div>
    </div>

    <div class="mt-4 flex justify-center">
        <a href="{{ route('Ganadero.produccion.indexDetallada') }}" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
            Ver todos los registros
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('grafica');
    
    if (!canvas) {
        console.error('No se encontró el elemento canvas con ID "grafica"');
        return;
    }
    
    const ctx = canvas.getContext('2d');
    
    // Parse the data correctly
    const meses = JSON.parse(canvas.dataset.meses);
    const leche = JSON.parse(canvas.dataset.leche);
    const carne = JSON.parse(canvas.dataset.carne);
    
    console.log('Datos cargados:', { meses, leche, carne });

    const data = {
        labels: meses,
        datasets: [
            {
                label: 'Leche (Litros)',
                data: leche,
                backgroundColor: 'rgba(59, 130, 246, 0.7)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1,
                tension: 0.1
            },
            {
                label: 'Carne (Kg)',
                data: carne,
                backgroundColor: 'rgba(239, 68, 68, 0.7)',
                borderColor: 'rgba(239, 68, 68, 1)',
                borderWidth: 1,
                tension: 0.1
            }
        ]
    };

    const config = {
        type: 'line', // Changed to line chart for time series
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += context.dataset.label.includes('Leche') 
                                    ? context.parsed.y + ' L' 
                                    : context.parsed.y + ' Kg';
                            }
                            return label;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Cantidad'
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
    };

    new Chart(ctx, config);
});
</script>
@endpush