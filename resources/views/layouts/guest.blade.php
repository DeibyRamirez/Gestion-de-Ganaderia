<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .bg-auth {
            background-image: url("data:image/svg+xml,%3Csvg width='52' height='26' viewBox='0 0 52 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d1fae5' fill-opacity='0.4'%3E%3Cpath d='M10 10c0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6h2c0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4 3.314 0 6 2.686 6 6 0 2.21 1.79 4 4 4v2c-3.314 0-6-2.686-6-6 0-2.21-1.79-4-4-4-3.314 0-6-2.686-6-6zm25.464-1.95l8.486 8.486-1.414 1.414-8.486-8.486 1.414-1.414z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex flex-col sm:justify-center items-center bg-auth">
        

        <!-- Auth Card -->
        <div class="w-full sm:max-w-2xl px-2 py-8">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <div class="px-8 py-6">
                {{ $slot }}
            </div>
            
            <!-- Footer -->
            <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 text-center">
                <p class="text-sm text-gray-500">
                © {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Todos los derechos reservados.
                </p>
            </div>
            </div>
        </div>

        <!-- Support Links -->
        <div class="w-full sm:max-w-lg mt-6 px-6 text-center">
            <div class="flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:space-x-6 text-sm">
                <a href="#" class="text-gray-500 hover:text-emerald-600 transition">Términos de servicio</a>
                <a href="#" class="text-gray-500 hover:text-emerald-600 transition">Política de privacidad</a>
                <a href="#" class="text-gray-500 hover:text-emerald-600 transition">Contacto</a>
            </div>
        </div>
    </div>
</body>
</html>