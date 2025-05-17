<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-md rounded-b-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center text-gray-700 hover:text-green-800 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" class="me-3" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7 10a5 5 0 0 1-4-8 4 4 0 0 0 4 4h10a4 4 0 0 0 4-4 5 5 0 0 1-4 8" />
                        <path d="M6.4 15c-.3-.6-.4-1.3-.4-2 0-4 3-3 3-7" />
                        <path d="M10 12.5v1.6" />
                        <path d="M17.6 15c.3-.6.4-1.3.4-2 0-4-3-3-3-7" />
                        <path d="M14 12.5v1.6" />
                        <path d="M15 22a4 4 0 1 0-3-6.7A4 4 0 1 0 9 22Z" />
                        <path d="M9 18h.01" />
                        <path d="M15 18h.01" />
                    </svg>
                    <span class="font-bold text-2xl text-gray-700  hover:text-green-800 transition">GanaSys</span>
                </a>
            </div>

            <!-- Rol centrado -->
            <div class="text-gray-600 font-semibold text-sm uppercase hidden md:flex items-center">
                {{ strtoupper(Auth::user()->rol) }}
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-sm font-medium text-gray-700 rounded-lg transition">
                            <div>{{ Auth::user()->name . ' ' . Auth::user()->last_name }} </div>
                            <br>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-door-open-icon lucide-door-open">
                                <path d="M11 20H2" />
                                <path d="M11 4.562v16.157a1 1 0 0 0 1.242.97L19 20V5.562a2 2 0 0 0-1.515-1.94l-4-1A2 2 0 0 0 11 4.561z" />
                                <path d="M11 4H8a2 2 0 0 0-2 2v14" />
                                <path d="M14 12h.01" />
                                <path d="M22 20h-3" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Salir') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile hamburger -->
            <div class="flex sm:hidden">
                <button @click="open = ! open" class="text-gray-500 hover:text-blue-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="sm:hidden px-4 pt-2 pb-4 bg-gray-50 rounded-b-lg shadow-inner">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>

        <div class="mt-4 border-t border-gray-200 pt-4">
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Perfil') }}
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Salir') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>