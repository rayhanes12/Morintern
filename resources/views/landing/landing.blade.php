@extends('layouts.landing')

@section('content')
<div class="min-h-screen bg-white text-[#0F172A]">

    {{-- Header --}}
    @include('landing.components.header')

    <main class="landing-content">

        {{-- Hero Section --}}
        @include('landing.components.hero')

        {{-- Features / Program Section --}}
        <section id="program" class="py-20 bg-gradient-to-b from-white to-gray-50">
            @include('landing.components.features')
        </section>

        {{-- Job Section --}}
        <section id="lowongan" class="py-20 bg-gray-50 border-t">
            @include('landing.components.jobs')
        </section>

        {{-- CTA Section (Now matches smooth transition to footer) --}}
        <section id="get-started" 
            class="py-20 text-center bg-gradient-to-b from-gray-50 to-[#648DDB] text-white">

            <h2 class="text-3xl font-bold mb-6">Siap Memulai Karier Profesionalmu?</h2>

            <p class="max-w-2xl mx-auto text-lg opacity-90">
                Daftar sekarang dan bergabung dalam program magang MorIntern untuk mendapatkan pengalaman dunia kerja yang sesungguhnya.
            </p>

            <a href="{{ route('peserta.register') }}" 
                class="inline-block mt-8 bg-white text-[#648DDB] px-10 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition">
                Daftar Sekarang
            </a>
        </section>

        {{-- Footer (already gradient) --}}
        @include('landing.components.footer')

    </main>
</div>
@endsection
