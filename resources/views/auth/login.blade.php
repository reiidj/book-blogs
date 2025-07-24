<x-guest-layout>
    <style>
        .bg-fullscreen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -10;
            background-image: url('{{ asset('images/Library.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>

    <div class="bg-fullscreen"></div>

    <div class="relative z-10 min-h-screen flex items-center justify-center px-4 py-24">
        <div class="w-full max-w-md bg-white/90 dark:bg-base rounded-xl shadow-xl p-6 sm:p-10 lg:p-12 backdrop-blur-sm">

            <!-- Title -->
            <h2 class="text-3xl font-bold text-accent mb-8 text-center">Log In</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-accent" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block font-medium text-sm text-accent">{{ __('Email') }}</label>
                    <input id="email"
                        class="block mt-1 w-full bg-primary text-white placeholder-white border border-accent rounded-md shadow-sm focus:ring-accent focus:border-accent"
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-accent" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block font-medium text-sm text-accent">{{ __('Password') }}</label>
                    <input id="password"
                        class="block mt-1 w-full bg-primary text-white placeholder-white border border-accent rounded-md shadow-sm focus:ring-accent focus:border-accent"
                        type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-accent" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-accent text-primary shadow-sm focus:ring-accent"
                            name="remember">
                        <span class="ms-2 text-sm text-accent">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-accent hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <!-- Custom Styled Login Button -->
                    <button type="submit"
                        class="ms-3 bg-primary hover:bg-accent text-white font-medium px-5 py-2 rounded-lg transition shadow">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-guest-layout>
