<x-guest-layout>
    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-2xl"> <!-- Increased max width -->
            <div class="flex justify-center">
                <!-- Logo Container -->
                <div class="w-24 h-24 rounded-full bg-emerald-100 flex items-center justify-center shadow-md border-2 border-emerald-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-600">
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
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Crear una cuenta
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                O <a href="{{ route('login') }}" class="font-medium text-emerald-600 hover:text-emerald-500">inicia sesión</a> si ya tienes una cuenta
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-2xl">
            <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10 border border-gray-100">
                <form class="space-y-6" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Nombre *
                            </label>
                            <div class="mt-1">
                                <input id="name" name="name" type="text" maxlength="50" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700">
                                Apellido *
                            </label>
                            <div class="mt-1">
                                <input id="last_name" name="last_name" type="text" maxlength="50" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500 @error('last_name') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                    value="{{ old('last_name') }}">
                                @error('last_name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="md:col-span-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                Correo electrónico *
                            </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" maxlength="100" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="telefono" class="block text-sm font-medium text-gray-700">
                                Teléfono *
                            </label>
                            <div class="mt-1">
                                <input id="telefono" name="telefono" type="tel" maxlength="15" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500 @error('telefono') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                    value="{{ old('telefono') }}">
                                @error('telefono')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Role -->
                        <input type="hidden" name="rol" value="ganadero">

                        <!-- Address -->
                        <div class="md:col-span-2">
                            <label for="direccion" class="block text-sm font-medium text-gray-700">
                                Dirección *
                            </label>
                            <div class="mt-1">
                                <input id="direccion" name="direccion" type="text" maxlength="255" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500 @error('direccion') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                    value="{{ old('direccion') }}">
                                @error('direccion')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Contraseña *
                            </label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror">
                                @error('password')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                                Confirmar Contraseña *
                            </label>
                            <div class="mt-1">
                                <input id="password_confirmation" name="password_confirmation" type="password" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-emerald-500 focus:border-emerald-500">
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition duration-150">
                            Registrarse
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
                                ¿Ya tienes una cuenta?
                            </span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('login') }}"
                            class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition duration-150">
                            Iniciar sesión
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>