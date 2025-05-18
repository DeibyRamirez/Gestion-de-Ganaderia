<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-md rounded-b-lg sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo Section -->
            <div class="flex items-center space-x-4">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center group">
                    <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center group-hover:bg-emerald-200 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-600">
                            <path d="M7 10a5 5 0 0 1-4-8 4 4 0 0 0 4 4h10a4 4 0 0 0 4-4 5 5 0 0 1-4 8" />
                            <path d="M6.4 15c-.3-.6-.4-1.3-.4-2 0-4 3-3 3-7" />
                            <path d="M10 12.5v1.6" />
                            <path d="M17.6 15c.3-.6.4-1.3.4-2 0-4-3-3-3-7" />
                            <path d="M14 12.5v1.6" />
                            <path d="M15 22a4 4 0 1 0-3-6.7A4 4 0 1 0 9 22Z" />
                        </svg>
                    </div>
                    <span class="ml-3 text-xl font-bold text-gray-800 group-hover:text-emerald-600 transition-colors duration-200">GanaSys</span>
                </a>
                
                
            </div>

            <!-- Role Badge (Desktop) -->
                <div class="hidden md:flex items-center">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 uppercase">
                        {{ Auth::user()->rol }}
                    </span>
                </div>

            <!-- User Dropdown (Desktop) -->
            <div class="hidden sm:flex sm:items-center space-x-4">
                <!-- Notifications Icon (Example) -->
                <button class="p-2 text-gray-500 hover:text-emerald-600 hover:bg-gray-100 rounded-full transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                        <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                    </svg>
                </button>
                
                <!-- User Menu -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center space-x-2 text-sm font-medium text-gray-700 hover:text-emerald-600 transition-colors duration-200">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-semibold">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->last_name, 0, 1)) }}
                                </div>
                                <span class="ml-2 hidden md:inline">{{ Auth::user()->name }}</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 text-xs text-gray-500 border-b border-gray-100">
                            {{ Auth::user()->email }}
                        </div>
                        
                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center text-red-600 hover:bg-red-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                    <polyline points="16 17 21 12 16 7" />
                                    <line x1="21" y1="12" x2="9" y2="12" />
                                </svg>
                                {{ __('Salir') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex sm:hidden items-center">
                <!-- Role Badge (Mobile) -->
                <span class="mr-3 px-2 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 uppercase">
                    {{ Auth::user()->rol }}
                </span>
                
                <button @click="open = !open" class="p-2 text-gray-500 hover:text-emerald-600 focus:outline-none transition-colors duration-200">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div x-show="open" x-transition:enter="transition ease-out duration-200" 
         x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-150" 
         x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
         class="sm:hidden px-4 pt-2 pb-4 bg-white rounded-b-lg shadow-lg">
         
        <div class="flex items-center px-4 py-3 border-b border-gray-100">
            <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-semibold mr-3">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->last_name, 0, 1)) }}
            </div>
            <div>
                <div class="font-medium text-gray-800">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</div>
                <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
            </div>
        </div>

        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                <rect x="3" y="3" width="7" height="7" />
                <rect x="14" y="3" width="7" height="7" />
                <rect x="14" y="14" width="7" height="7" />
                <rect x="3" y="14" width="7" height="7" />
            </svg>
            {{ __('Dashboard') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </svg>
            {{ __('Perfil') }}
        </x-responsive-nav-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center text-red-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    <polyline points="16 17 21 12 16 7" />
                    <line x1="21" y1="12" x2="9" y2="12" />
                </svg>
                {{ __('Salir') }}
            </x-responsive-nav-link>
        </form>
    </div>
</nav>