<footer id="kontak" class="bg-[#648DDB] text-white pt-16 pb-10">
    <div class="max-w-[1440px] mx-auto px-8 lg:px-12">

        <!-- Grid utama -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

            <!-- Brand -->
            <div>
                <h2 class="text-2xl font-bold tracking-tight">
                    Mor<span class="text-gray-200">Intern</span>
                </h2>
                <p class="mt-4 text-gray-100 leading-relaxed max-w-sm">
                    Program magang yang membantu mahasiswa dan fresh graduate 
                    membangun pengalaman nyata dan mengembangkan potensi terbaik mereka.
                </p>
            </div>

            <!-- Navigation -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Navigasi</h3>
                <ul class="space-y-3 text-gray-100">
                    <li><a href="/" class="hover:text-gray-200 transition">Home</a></li>
                    <li><a href="#program" class="hover:text-gray-200 transition">Tentang</a></li>
                    <li><a href="#kontak" class="hover:text-gray-200 transition">Kontak</a></li>
                    <li><a href="#lowongan" class="hover:text-gray-200 transition">Lowongan</a></li>
                </ul>
            </div>

            <!-- Contact + Maps -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Hubungi Kami</h3>
                <p class="text-gray-100 mb-6">
                    Terhubung dengan kami melalui email, telepon, atau media sosial.
                </p>

                <!-- Email & Phone -->
                <div class="space-y-3 mb-6">

                    <!-- Email -->
                    <div class="flex items-center gap-3">
                        <span class="material-icons text-white/80">mail</span>
                        <a href="mailto:info@morbis.id" class="hover:text-gray-200 transition">
                            info@morbis.id
                        </a>
                    </div>

                    <!-- Phone Kantor -->
                    <div class="flex items-center gap-3">
                        <span class="material-icons text-white/80">call</span>
                        <a href="tel:+622742850148" class="hover:text-gray-200 transition">
                            (0274) 285-0148
                        </a>
                    </div>

                </div>

                <!-- Social Icons -->
                <div class="flex items-center gap-5 mb-6">
                    <a href="https://www.instagram.com/morbis_official?igsh=aWtzYmFoNm5mYWUw"
                        class="p-2 bg-white/20 rounded-lg hover:bg-white/30 transition">
                        <img src="{{ asset('assets/landing/icon-ig.svg') }}" alt="instagram" class="w-7 h-7">
                    </a>
                    <a href="https://www.linkedin.com/company/pt-medika-digital-nusantara/"
                        class="p-2 bg-white/20 rounded-lg hover:bg-white/30 transition">
                        <img src="{{ asset('assets/landing/icon-linkedin.svg') }}" alt="linkedin" class="w-7 h-7">
                    </a>
                </div>

                <!-- Google Maps -->
                <div class="rounded-xl overflow-hidden shadow-lg">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.815780443631!2d110.4174625!3d-7.7680019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59db85d2936d%3A0xf54db039df3bb785!2sPT%20Medika%20Digital%20Nusantara!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                        width="100%"
                        height="200"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>

        <!-- Bottom Footer -->
        <div class="mt-16 border-t border-white/20 pt-6 text-center">
            <p class="text-sm text-gray-100">
                &copy; {{ date('Y') }} {{ config('app.name') }}. MorIntern.
            </p>
        </div>

    </div>
</footer>
