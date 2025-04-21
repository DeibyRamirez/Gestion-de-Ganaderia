<aside class="w-64 bg-white-500 h-screen shadow-lg flex flex-col justify-between">
    <!-- Encabezado -->
    <div>
        {{-- <div class="flex items-center gap-2 px-4 py-3 border-b">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bull-head-icon lucide-bull-head">
                <path d="M7 10a5 5 0 0 1-4-8 4 4 0 0 0 4 4h10a4 4 0 0 0 4-4 5 5 0 0 1-4 8" />
                <path d="M6.4 15c-.3-.6-.4-1.3-.4-2 0-4 3-3 3-7" />
                <path d="M10 12.5v1.6" />
                <path d="M17.6 15c.3-.6.4-1.3.4-2 0-4-3-3-3-7" />
                <path d="M14 12.5v1.6" />
                <path d="M15 22a4 4 0 1 0-3-6.7A4 4 0 1 0 9 22Z" />
                <path d="M9 18h.01" />
                <path d="M15 18h.01" />
            </svg>
            <span class="text-lg font-semibold">GanaSys</span>

        </div>--}}


        <!-- Menú -->
        <nav class="p-4 space-y-1">
            {{-- Dashboard --}}
            <div id="sidebar_dashboard" class="flex items-center gap-2 p-2 hover:bg-gray-100 rounded transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home-icon lucide-home">
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z" />
                    <path d="M9 22V12h6v10" />
                </svg>
                @if (Auth()->user()->rol === 'ganadero')
                <a href="{{ route('Ganadero.dashboard.index') }}" class="text-sm font-medium text-gray-700"><span class="text-lg font-semibold">Inicio</span></a>
                @endif
                @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
                <a href="{{ route('Administrador.dashboard.index') }}" class="text-sm font-medium text-gray-700"><span class="text-lg font-semibold">Inicio</span></a>
                @endif
            </div>

            {{-- Ganado --}}

            <div id="sidebar_ganado" class="flex items-center gap-2 p-2 hover:bg-gray-100 rounded transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cow-head-icon lucide-cow-head">
                    <path d="M17.8 15.1a10 10 0 0 0 .9-7.1h.3c1.7 0 3-1.3 3-3V3h-3c-1.3 0-2.4.8-2.8 1.9a10 10 0 0 0-8.4 0C7.4 3.8 6.3 3 5 3H2v2c0 1.7 1.3 3 3 3h.3a10 10 0 0 0 .9 7.1" />
                    <path d="M9 9.5v.5" />
                    <path d="M15 9.5v.5" />
                    <path d="M15 22a4 4 0 1 0-3-6.6A4 4 0 1 0 9 22Z" />
                    <path d="M9 18h.01" />
                    <path d="M15 18h.01" />
                </svg>
                @if (Auth()->user()->rol === 'ganadero')
                <a href="{{ route('Ganadero.ganado.index') }}" class="text-sm font-medium text-gray-700"><span class="text-lg font-semibold">Gestion de Ganado</span></a>
                @endif
                @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
                <a href="{{ route('Administrador.ganado.index') }}" class="text-sm font-medium text-gray-700"><span class="text-lg font-semibold">Gestion de Ganado</span></a>
                @endif
            </div>


            {{-- Alimentacion --}}

            <div id="sidebar_alimentacion" class="flex items-center gap-2 p-2 hover:bg-gray-100 rounded transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-fork-knife-icon lucide-fork-knife">
                    <path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2" />
                    <path d="M7 2v20" />
                    <path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7" />
                </svg>
                @if (Auth()->user()->rol === 'ganadero')
                <a href="{{ route('Ganadero.alimentacion.index') }}" class="text-sm font-medium text-gray-700"><span class="text-lg font-semibold">Alimentacion</span></a>
                @endif
                @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
                <a href="{{ route('Administrador.alimentacion.index') }}" class="text-sm font-medium text-gray-700"><span class="text-lg font-semibold">Alimentacion</span></a>
                @endif

            </div>



            {{-- Historial --}}
            <div id="sidebar_historial" class="flex items-center gap-2 p-2 hover:bg-gray-100 rounded transition">

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-stethoscope-icon lucide-stethoscope">
                    <path d="M11 2v2" />
                    <path d="M5 2v2" />
                    <path d="M5 3H4a2 2 0 0 0-2 2v4a6 6 0 0 0 12 0V5a2 2 0 0 0-2-2h-1" />
                    <path d="M8 15a6 6 0 0 0 12 0v-3" />
                    <circle cx="20" cy="10" r="2" />
                </svg>
                @if (Auth()->user()->rol === 'ganadero')
                <a href="{{ route('Ganadero.historial.index') }}" class="text-sm font-medium text-gray-700"><span class="text-lg font-semibold">Historial Medico</span></a>
                @endif

                @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
                <a href="{{ route('Administrador.historial.index') }}" class="text-sm font-medium text-gray-700"><span class="text-lg font-semibold">Historial Medico</span></a>
                @endif

            </div>




            {{-- Produccion --}}

            <div id="sidebar_produccion" class="flex items-center gap-2 p-2 hover:bg-gray-100 rounded transition">

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-droplets-icon lucide-droplets">
                    <path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z" />
                    <path d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97" />
                </svg>
                @if (Auth()->user()->rol === 'ganadero')
                <a href="{{ route('Ganadero.produccion.index') }}" class="text-sm font-medium text-gray-700"><span class="text-lg font-semibold">Producción</span></a>
                @endif

                @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
                <a href="{{ route('Administrador.produccion.index') }}" class="text-sm font-medium text-gray-700"><span class="text-lg font-semibold">Producción</span></a>
                @endif

            </div>




            {{-- Ventas --}}

            <div id="sidebar_ventas" class="flex items-center gap-2 p-2 hover:bg-gray-100 rounded transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart-icon lucide-shopping-cart">
                    <circle cx="8" cy="21" r="1" />
                    <circle cx="19" cy="21" r="1" />
                    <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                </svg>
                @if (Auth()->user()->rol === 'ganadero')
                <a href="{{ route('Ganadero.ventas.index') }}" class="text-sm font-medium text-gray-700"><span class="text-lg font-semibold">Ventas</span></a>
                @endif

                @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
                <a href="{{ route('Administrador.ventas.index') }}" class="text-sm font-medium text-gray-700"><span class="text-lg font-semibold">Ventas</span></a>
                @endif

            </div>




            {{-- Tratamientos --}}

            <div id="sidebar_tratamientosReportes" class="flex items-center gap-2 p-2 hover:bg-gray-100 rounded transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text-icon lucide-file-text">
                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                    <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                    <path d="M10 9H8" />
                    <path d="M16 13H8" />
                    <path d="M16 17H8" />
                </svg>
                @if (Auth()->user()->rol === 'ganadero')
                <a href="{{ route('Ganadero.tratamientosReportes.index') }}" class="text-sm font-medium text-gray-700"><span class="text-lg font-semibold">Tratamientos y Reportes</span></a>
                @endif

                @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
                <a href="{{ route('Administrador.tratamientosReportes.index') }}" class="text-sm font-medium text-gray-700"><span class="text-lg font-semibold">Tratamientos y Reportes</span></a>
                @endif
            </div>


            <div id="sidebar_publicaciones" class="flex items-center gap-2 p-2 hover:bg-gray-100 rounded transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-user-icon lucide-book-user">
                    <path d="M15 13a3 3 0 1 0-6 0" />
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
                    <circle cx="12" cy="8" r="2" />
                </svg>
                @if (Auth()->user()->rol === 'ganadero')
                <a href="{{ route('Ganadero.publicaciones.index') }}" class="text-sm font-medium text-gray-700"><span class="text-lg font-semibold">Publicaciones</span></a>
                @endif

                @if (in_array(Auth()->user()->rol, ['administrador','gestor']))
                <a href="{{ route('Administrador.publicaciones.index') }}" class="text-sm font-medium text-gray-700"><span class="text-lg font-semibold">Publicaciones</span></a>
                @endif
            </div>
        </nav>

        {{--
        <!-- Pie -->
        <div class="flex items-center gap-2 p-4 border-t hover:bg-gray-100 rounded transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-icon lucide-user">
                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </svg>
            <a href="{{-- route('inicioRegistro.login') " class="text-sm font-medium text-gray-700"><span class="text-lg font-semibold">Perfil</span></a>
        </div>
        --}}
    </div>

</aside>


@vite(['resources/js/app.js'])