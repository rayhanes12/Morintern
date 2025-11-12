<x-guest-layout>
    <main class="register-page">
        <!-- Background elements -->
        <img src="{{ asset('images/vector-1.svg') }}" class="bg-vector-1" aria-hidden="true" alt="" />
        <img src="{{ asset('images/illustration.png') }}" class="bg-illustration" alt="Ilustrasi tim kerja MORINTERN" />
        
        <!-- Registration form -->
        <div class="register-form-container relative z-10">
            <h2 class="text-2xl font-bold text-[#942323] mb-6">{{ __('Buat Akun Anda') }}</h2>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nama Lengkap -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Nama Lengkap')" class="text-[#333] mb-2" />
                    <x-text-input 
                        id="name" 
                        class="form-input" 
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        required 
                        autofocus 
                        autocomplete="name" 
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Alamat Email')" class="text-[#333] mb-2" />
                    <x-text-input 
                        id="email" 
                        class="form-input" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autocomplete="username" 
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Kata Sandi')" class="text-[#333] mb-2" />
                    <x-text-input 
                        id="password" 
                        class="form-input"
                        type="password"
                        name="password"
                        required 
                        autocomplete="new-password" 
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" class="text-[#333] mb-2" />
                    <x-text-input 
                        id="password_confirmation" 
                        class="form-input"
                        type="password"
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password" 
                    />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex flex-col space-y-4">
                    <x-primary-button class="register-button">
                        {{ __('Daftar') }}
                    </x-primary-button>
                    
                    <div class="text-center">
                        <a class="login-link text-sm" href="{{ route('login') }}">
                            {{ __('Sudah punya akun? Masuk') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </main>
</x-guest-layout>
