<!-- Jobs section -->
<section id="lowongan" class="bg-white mt-8">
    <div class="bg-[#648DDB] text-white text-center py-6">
        <h3 class="text-xl lg:text-2xl font-semibold">LOWONGAN TERSEDIA</h3>
    </div>

    <div class="max-w-[1440px] mx-auto px-8 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
            @foreach(['Quality assurance','Backend Dev','System Analys','Front And'] as $job)
            <div class="bg-white rounded-lg shadow-sm p-6 border">
                <h4 class="font-semibold text-lg text-[#0F172A] mb-3">{{ $job }}</h4>
                <ul class="text-gray-600 list-disc list-inside space-y-2">
                    <li>Mahasiswa aktif atau lulusan maksimal 1 tahun.</li>
                    <li>Memiliki semangat belajar tinggi dan mampu bekerja dalam tim.</li>
                    <li>Bersedia mengikuti program selama periode magang.</li>
                    <li>Menguasai dasar-dasar sesuai posisi yang dilamar.</li>
                </ul>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('peserta.register') }}" class="px-6 py-2 bg-white border rounded-md text-[#648DDB] font-semibold">DAFTAR</a>
            <div class="mt-4">
                <a href="#" class="px-6 py-2 bg-[#648DDB] text-white rounded-md">LIHAT LOWONGAN LAINNYA</a>
            </div>
        </div>
    </div>
</section>
<!-- Jobs section -->
<section id="lowongan" class="py-16">
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

            <!-- Backend Dev -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-4">Backend Dev</h3>
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

            <!-- System Analyst -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-4">System Analyst</h3>
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

            <!-- Frontend -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-4">Frontend Dev</h3>
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
        </div>

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