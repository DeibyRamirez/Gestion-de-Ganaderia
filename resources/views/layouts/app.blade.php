<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GanaSys</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900 h-screen overflow-hidden">
    <div class="flex flex-col h-screen">
        @include('layouts.navigation')

        <!-- Navbar -->
        {{-- <nav class="bg-white shadow-md p-4 flex justify-between items-center">
            <div>
                <button id="toggleSidebar" class="p-2 m-2 md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <span class="text-gray-700 font-semibold">
                    Maicon Adres - Ganadero
                </span>
            </div>
            <div class="flex items-center space-x-4">
                <form method="GET" action=" route('inicioRegistro.login')">
                    @csrf
                    <button type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition duration-200">
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </nav>
        --}}


        <!-- Cuerpo principal -->
        <div class="flex flex-1 overflow-hidden">
            <!-- Sidebar -->
            @include('components.sidebar')

            <!-- Contenido principal scrollable -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>



    </div>



    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>

    @stack('scripts')

</body>

</html>