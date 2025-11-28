@extends('layouts.landing') 

@section('content')
<div class="min-h-screen bg-white text-[#a6c1ff]">

    {{-- Header --}}
    @include('landing.components.header')

    <main class="landing-content">

        {{-- Hero Section --}}
        @include('landing.components.hero')

        {{-- Features / Program Section --}}
        <section class="py-20 bg-white">

            @include('landing.components.features')
        </section>

        {{-- Perguruan Tinggi Mitra --}}
        @include('landing.components.mitra')

        {{-- Job Section --}}
        <section id="lowongan" class="py-16 bg-white-50 border-t">
            @include('landing.components.jobs')
        </section>

        {{-- CTA Section --}}
    <section id="get-started" 
        class="py-10 text-center bg-white text-black">

        <h2 class="text-2xl font-bold mb-3">
            Siap Memulai Karier Profesionalmu?
        </h2>

        <p class="max-w-xl mx-auto text-base opacity-90 leading-relaxed">
            Daftar sekarang dan bergabung dalam program magang MorIntern 
            untuk mendapatkan pengalaman dunia kerja yang sesungguhnya.
        </p>
    </section>

        {{-- Footer --}}
        @include('landing.components.footer')

    </main>
</div>
@endsection
