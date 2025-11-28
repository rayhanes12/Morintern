<!-- Jobs section -->
<section id="lowongan" class="bg-gray-50 py-16">
    <!-- Header -->
    <div class="text-center mb-12">
        <h3 class="text-3xl lg:text-4xl font-bold text-[#0F172A]">
            Lowongan Magang Tersedia
        </h3>
        <p class="text-gray-600 mt-3 text-lg max-w-2xl mx-auto">
            Temukan posisi magang yang sesuai dengan minat dan kemampuanmu. Mari mulai perjalanan karirmu bersama kami.
        </p>
    </div>

    <!-- Grid -->
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach(['Quality Assurance','Backend Developer','System Analyst','Frontend Developer'] as $job)
            <div class="bg-white rounded-xl shadow-md border hover:shadow-xl transition-all duration-300 p-6 group">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-semibold text-xl text-[#0F172A] group-hover:text-[#648DDB] transition-colors">
                        {{ $job }}
                    </h4>
                    <span class="text-[#648DDB] text-sm font-medium bg-[#E8F0FF] px-2 py-1 rounded-md">
                        Magang
                    </span>
                </div>

                <ul class="text-gray-600 space-y-2 text-sm leading-relaxed">
                    <li>Mahasiswa aktif atau lulusan maksimal 1 tahun.</li>
                    <li>Semangat belajar tinggi & mampu bekerja dalam tim.</li>
                    <li>Bersedia mengikuti program magang selama periode.</li>
                    <li>Memahami dasar-dasar sesuai posisi yang dilamar.</li>
                </ul>

                <div class="mt-6">
                    <a href="{{ route('peserta.register') }}"
                    class="block w-full text-center bg-[#648DDB] text-white py-2 rounded-lg font-medium hover:bg-[#527bc8] transition">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- CTA Buttons -->
        <div class="text-center mt-14">
            <a href="{{ route('peserta.register') }}"
            class="inline-block px-8 py-3 bg-[#648DDB] text-white font-semibold rounded-lg shadow-md hover:bg-[#527bc8] transition">
                Daftar Magang
            </a>

            <div class="mt-4">
                <a href="#" class="px-6 py-2 bg-[#648DDB] text-white rounded-md">LIHAT LOWONGAN LAINNYA</a>
            </div>
        </div>
    </div>
</section>
<!-- Jobs section -->
{{-- <section id="lowongan" class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">LOWONGAN TERSEDIA</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Quality Assurance -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-4">Quality Assurance</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#678DE5] mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Mahasiswa aktif atau lulusan maksimal 1 tahun.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#678DE5] mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Memiliki semangat belajar tinggi dan mampu bekerja dalam tim.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#678DE5] mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Bersedia mengikuti program selama periode magang.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#678DE5] mt-1 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Menguasai dasar-dasar sesuai posisi yang dilamar.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Perguruan Tinggi Mitra -->
            {{-- <section id="mitra" class="bg-[#648DDB] py-16">
                <div class="max-w-[1440px] mx-auto px-6 lg:px-12">

                    <!-- Header -->
                    <h2 class="text-center text-3xl font-bold text-white mb-12">
                        PERGURUAN TINGGI MITRA
                    </h2>

                    <!-- Intro -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

                        <!-- Text -->
                        <div class="text-white text-lg leading-relaxed">
                            <p>
                                MORBIS melalui MORINTERN berkolaborasi dengan berbagai Perguruan Tinggi di Indonesia 
                                untuk memberikan pengalaman magang berbasis proyek nyata.  
                            </p>
                            <p class="mt-4">
                                Melalui kerja sama ini, mahasiswa tidak hanya belajar teori, tetapi juga mengasah 
                                keterampilan teknis dan soft skill langsung dari industri.
                            </p>
                        </div>

                        <!-- Image -->
                        <div class="flex justify-center">
                            <img src="{{ asset('assets/landing/mitra-foto.png') }}" 
                                alt="Perguruan Tinggi Mitra"
                                class="rounded-xl shadow-lg w-full max-w-md object-cover">
                        </div>
                    </div>

                    <!-- Logo Grid -->
                    <div class="mt-16 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-10 place-items-center">

                        @foreach(range(1,5) as $univ)
                        <div class="text-center flex flex-col items-center">
                            <div class="w-24 h-24 rounded-full bg-white shadow-md flex items-center justify-center">
                                <img src="{{ asset('assets/landing/univ-logo.png') }}" 
                                    alt="Logo Universitas"
                                    class="w-16 h-16 object-contain">
                            </div>
                            <p class="mt-3 text-white font-medium">Univ 1</p>
                        </div>
                        @endforeach

                    </div>

                </div>
            </section> --}}

        <div class="mt-12 text-center">
            <a href="{{ route('peserta.register') }}" class="inline-block bg-[#678DE5] text-white px-6 py-3 rounded-md font-semibold hover:bg-blue-600 transition-colors">
                DAFTAR
            </a>
            <a href="#" class="block mt-4 text-[#678DE5] hover:underline">
                LIHAT LOWONGAN LAINNYA
            </a>    
        </div>
    </div>
</section> 
