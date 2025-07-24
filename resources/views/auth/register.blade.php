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

    <div class="min-h-screen flex flex-col items-center justify-center px-6 py-20 relative z-10">
        <div class="w-full max-w-md bg-white/90 dark:bg-base p-8 rounded-xl shadow-xl backdrop-blur-sm">
            <h2 class="text-3xl font-bold text-accent mb-8 text-center">
                Create Your Account
            </h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block font-medium text-sm text-accent">{{ __('Name') }}</label>
                    <input id="name" class="block mt-1 w-full bg-primary text-white placeholder-white border border-accent rounded-md shadow-sm focus:ring-accent focus:border-accent"
                        type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-accent" />
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block font-medium text-sm text-accent">{{ __('Email') }}</label>
                    <input id="email" class="block mt-1 w-full bg-primary text-white placeholder-white border border-accent rounded-md shadow-sm focus:ring-accent focus:border-accent"
                        type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-accent" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block font-medium text-sm text-accent">{{ __('Password') }}</label>
                    <input id="password" class="block mt-1 w-full bg-primary text-white placeholder-white border border-accent rounded-md shadow-sm focus:ring-accent focus:border-accent"
                        type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-accent" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block font-medium text-sm text-accent">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" class="block mt-1 w-full bg-primary text-white placeholder-white border border-accent rounded-md shadow-sm focus:ring-accent focus:border-accent"
                        type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-accent" />
                </div>

                <div class="flex items-center justify-between">
                    <a class="text-sm text-accent hover:underline" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button type="submit"
                        class="bg-primary hover:bg-accent text-white font-semibold py-2 px-4 rounded-lg transition shadow">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
