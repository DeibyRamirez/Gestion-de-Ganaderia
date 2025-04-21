
    document.addEventListener("DOMContentLoaded", function () {
        const currentUrl = window.location.href;

        // Lista de enlaces con sus respectivos ids
        const sidebarLinks = [
            { id: "sidebar_ganado", url: "{{ route('Ganadero.ganado.index') }}" },
            { id: "sidebar_dashboard", url: "{{ route('Ganadero.dashboard.index') }}" },
            { id: "sidebar_alimentacion", url: "{{ route('Ganadero.alimentacion.index') }}" },
            { id: "sidebar_historial", url: "{{ route('Ganadero.historial.index') }}" },
            { id: "sidebar_produccion", url: "{{ route('Ganadero.produccion.index') }}" },
            { id: "sidebar_ventas", url: "{{ route('Ganadero.ventas.index') }}" },
            { id: "sidebar_tratamientosReportes", url: "{{ route('Ganadero.tratamientosReportes.index') }}" },
            { id: "sidebar_publicaciones", url: "{{ route('Ganadero.publicaciones.index') }}" },
        ];

        sidebarLinks.forEach(link => {
            // Comparamos si la URL actual incluye el enlace esperado
            if (currentUrl.includes(link.url)) {
                const element = document.getElementById(link.id);
                if (element) {
                    element.classList.add("bg-red-500", "text-white");
                }
            }
        });
    });

