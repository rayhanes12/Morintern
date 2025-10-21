<x-guest-layout>
    <div class="w-full max-w-md mx-auto">
        <h2 class="text-2xl font-semibold mb-4">Reset Password</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-input-error :messages="$errors->all()" class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end">
                <x-primary-button>
                    {{ __('Send Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>

        <p class="mt-4 text-sm text-gray-600">
            Kembali ke <a href="{{ route('login') }}" class="underline">Login</a>
        </p>
    </div>
</x-guest-layout>
