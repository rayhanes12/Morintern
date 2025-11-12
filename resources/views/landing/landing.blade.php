@extends('layouts.landing')

@section('content')
<div class="min-h-screen bg-white">
    <!-- Include all components -->
    @include('landing.components.header')

    <main class="pt-0 landing-content">
        @include('landing.components.hero')
        @include('landing.components.features')
        @include('landing.components.jobs')

        <!-- CTA -->
        <section id="get-started" class="mt-16 text-center">
            <a href="{{ route('peserta.register') }}" class="inline-block bg-[#648DDB] text-white px-8 py-3 rounded-md font-semibold">Mulai Sekarang</a>
        </section>

        @include('landing.components.footer')
    </main>
</div>
@endsection