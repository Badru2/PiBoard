<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-3">
        <h2 class="text-center fw-bold fs-4">SMK <h2 class="text-center fw-bold fs-4">PRAKARYA INTERNASIONAL</h2>
        </h2>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                placeholder="Email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                placeholder="Password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block my-3">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700
                     text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600
                     dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <x-primary-button class="ml-3 mx-auto" style="background-color: #021F35">
            <div class="mx-auto">
                {{ __('Log in') }}
            </div>
        </x-primary-button>

        <div class="flex items-center my-2">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400
                 hover:text-gray-900 dark:hover:text-gray-100 rounded-md
                 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Lupa Kata Sandi?') }}
                </a>
            @endif
        </div>

        <h3 class="text-center mt-5">
            Belum Punya Akun?
            <a href="{{ route('register') }}" class="text-primary">Register</a>
        </h3>
    </form>
</x-guest-layout>
