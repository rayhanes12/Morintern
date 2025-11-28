<section class="pt-0 pb-20 bg-white">

    <!-- HEADER BAR FULL WIDTH -->
    <div class="w-screen bg-[#6D8ED0] py-4 relative left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]">
        <h3 class="text-center text-white font-semibold text-2xl lg:text-3xl tracking-wide">
            PERGURUAN TINGGI MITRA
        </h3>
    </div>

    <!-- Container isi -->
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 mt-12">

        <!-- Intro + Foto -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

            <!-- Text -->
            <div class="text-black text-lg leading-relaxed">
                <p>
                    MORBIS melalui MORINTERN berkolaborasi dengan berbagai Perguruan Tinggi di Indonesia 
                    untuk memberikan pengalaman magang berbasis proyek nyata.
                </p>
                <p class="mt-4">
                    Melalui kerja sama ini, mahasiswa tidak hanya belajar teori, tetapi juga mengasah 
                    keterampilan teknis dan soft skill langsung dari industri.
                </p>
            </div>

            <!-- FOTO -->
            <div class="flex justify-center">
                <img src="{{ asset('assets/landing/mitra-foto.png') }}"
                     class="rounded-xl shadow-xl w-full max-w-xl object-cover">
            </div>
        </div>

        <!-- DATA UNIVERSITAS -->
        @php
            $universitas = [
                ['nama' => 'Institut Teknologi Bandung', 'logo' => 'itb.png'],
                ['nama' => 'Universitas Amikom Yogyakarta', 'logo' => 'amikom.png'],
                ['nama' => 'Universitas Gadjah Mada', 'logo' => 'ugm.jpg'],
                ['nama' => 'Universitas Harkat Negeri', 'logo' => 'harkat.png'],
                ['nama' => 'Universitas Negeri Semarang', 'logo' => 'unesa.jpg'],
                ['nama' => 'Universitas Diponegoro', 'logo' => 'undip.png'],
                ['nama' => 'Universitas Indonesia', 'logo' => 'ui.png'],
            ];
        @endphp

        <!-- LOGO UNIVERSITAS (INFINITE SCROLL) -->
        <div class="w-full overflow-hidden mt-20">

            <!-- ANIMASI -->
            <style>
                @keyframes scroll-univ {
                    0%   { transform: translateX(0); }
                    100% { transform: translateX(-50%); }
                }
            </style>

            <div class="flex gap-10 py-4 animate-[scroll-univ_30s_linear_infinite] whitespace-nowrap">

                <!-- LOOP 1 -->
                @foreach($universitas as $u)
                    <div class="flex flex-col items-center shrink-0 w-44">

                        <!-- LOGO -->
                        <div class="w-28 h-28 bg-white rounded-full shadow-lg flex items-center justify-center">
                            <img src="{{ asset('assets/landing/univ/' . $u['logo']) }}"
                                 class="w-20 h-20 object-contain">
                        </div>

                        <!-- NAMA UNIVERSITAS -->
                        <p class="mt-3 text-gray-700 font-semibold text-center leading-snug text-sm max-w-[140px] break-words">
                            {{ $u['nama'] }}
                        </p>
                    </div>
                @endforeach

                <!-- LOOP 2 (duplikasi untuk infinite scroll) -->
                @foreach($universitas as $u)
                    <div class="flex flex-col items-center shrink-0 w-44">

                        <div class="w-28 h-28 bg-white rounded-full shadow-lg flex items-center justify-center">
                            <img src="{{ asset('assets/landing/univ/' . $u['logo']) }}"
                                 class="w-20 h-20 object-contain">
                        </div>

                        <p class="mt-3 text-gray-700 font-semibold text-center leading-snug text-sm max-w-[140px] break-words">
                            {{ $u['nama'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
