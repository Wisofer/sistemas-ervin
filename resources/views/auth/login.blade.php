<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-r from-black to-blue-800 h-screen">
        <div class="bg-white bg-opacity-95 rounded-lg p-12 shadow-lg w-full max-w-2xl"> <!-- Aumentado el ancho máximo -->
            <h1 class="text-5xl font-extrabold text-center text-gray-900 mb-8">Iniciar Sesión</h1>
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-5">
                    <x-input-label for="email" :value="__('Correo Electrónico')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <x-input-label for="password" :value="__('Contraseña')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mb-5">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                        <span class="ml-2 text-sm text-gray-700">{{ __('Recuérdame') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mb-5">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-700 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif

                    <x-primary-button>
                        {{ __('Iniciar Sesión') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="mt-5 text-center">
                <span class="text-sm text-gray-700">¿No tienes una cuenta? </span>
                <a href="{{ route('register') }}" class="text-green-600 hover:text-green-900 font-semibold">{{ __('Regístrate aquí') }}</a>
            </div>
        </div>
    </div>
</x-guest-layout>
