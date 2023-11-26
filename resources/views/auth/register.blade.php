<x-guest-layout>
    <div class="mb-3">
        <h2 class="text-center fw-bold fs-4">SMK <h2 class="text-center fw-bold fs-4">PRAKARYA INTERNASIONAL</h2>
        </h2>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Username -->
        <div>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" placeholder="Username" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" placeholder="Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" placeholder="Password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <x-primary-button class="mx-auto my-4" style="background-color: #021F35">
            <div class="mx-auto">
                {{ __('Sign Up') }}
            </div>
        </x-primary-button>

        <h3 class="my-1 text-center">
            Sudah Punya Akun?
            <a href="{{ route('login') }}" class="text-primary">Sign in</a>
        </h3>
    </form>
</x-guest-layout>
