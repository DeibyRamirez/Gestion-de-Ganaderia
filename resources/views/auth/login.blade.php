<x-guest-layout>
    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="flex justify-center">
                <!-- Your Logo Here -->
                <div class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-600">
                        <path d="M7 10a5 5 0 0 1-4-8 4 4 0 0 0 4 4h10a4 4 0 0 0 4-4 5 5 0 0 1-4 8" />
                        <path d="M6.4 15c-.3-.6-.4-1.3-.4-2 0-4 3-3 3-7" />
                        <path d="M10 12.5v1.6" />
                        <path d="M17.6 15c.3-.6.4-1.3.4-2 0-4-3-3-3-7" />
                        <path d="M14 12.5v1.6" />
                        <path d="M15 22a4 4 0 1 0-3-6.7A4 4 0 1 0 9 22Z" />
                        <path d="M9 18h.01" />
                        <path d="M15 18h.01" />
                    </svg>
                </div>
                <h2 class="mt-6 text-center text-2xl font-extrabold text-gray-900">
                    Iniciar sesión
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Ingresa tus credenciales para acceder al sistema
                </p>
            </div>

            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10 border border-gray-100">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4 p-4 rounded-lg bg-green-100 border-l-4 border-green-500 text-green-700" :status="session('status')" />

                    <form class="mb-0 space-y-6" method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                Correo electrónico
                            </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" autocomplete="email" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500 @error('email') text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                    value="{{ old('email') }}">
                                @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Contraseña
                            </label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" autocomplete="current-password" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500 @error('password') text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror">
                                @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember" type="checkbox"
                                    class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300 rounded">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                    Recordarme
                                </label>
                            </div>

                            <div class="text-sm">
                                <a href="{{ route('password.request') }}" class="font-medium text-emerald-600 hover:text-emerald-500">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition duration-150">
                                Ingresar
                            </button>
                        </div>
                    </form>

                    <div class="mt-6">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">
                                    ¿No tienes una cuenta?
                                </span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <a href="{{ route('register') }}"
                                class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition duration-150">
                                Registrarse
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-guest-layout>