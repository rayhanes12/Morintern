<!-- Features (program) section - matches Figma Frame24 -->
<section id="program" class="bg-white">
    <div class="max-w-[1440px] mx-auto px-8 lg:px-12">
        <!-- Blue band top spacer to match design -->
        <div class="h-12 bg-[#648DDB] w-full rounded-t-md mt-8"></div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center bg-white py-16">
            <!-- Left collage -->
            <div class="flex justify-center lg:justify-start">
                <div class="grid grid-cols-2 gap-4 w-80">
                    <img src="{{ asset('assets/landing/Frame24.svg') }}" alt="" class="rounded-3xl object-cover w-full h-40">
                    <img src="{{ asset('assets/landing/Frame 24.jpg') }}" alt="" class="rounded-3xl object-cover w-full h-40">
                    <img src="{{ asset('assets/landing/Landing page.svg') }}" alt="" class="rounded-3xl object-cover w-full h-40">
                    <img src="{{ asset('assets/landing/MorIntern.svg') }}" alt="" class="rounded-3xl object-cover w-full h-40">
                </div>
            </div>

            <!-- Right text -->
            <div>
                <h2 class="text-2xl lg:text-3xl font-bold text-center lg:text-left text-[#1E40AF]">Program Morn Intern dirancang untuk memberikan pengalaman kerja nyata di dunia industri.</h2>
                <p class="mt-6 text-gray-700 max-w-xl">Selama masa magang, peserta akan:</p>
                <ul class="mt-6 space-y-3 list-none text-gray-700">
                    <li class="flex items-start gap-3"><span class="mt-1 text-[#648DDB]">•</span> Berkolaborasi dengan tim profesional di berbagai bidang.</li>
                    <li class="flex items-start gap-3"><span class="mt-1 text-[#648DDB]">•</span> Mengerjakan proyek nyata yang berdampak.</li>
                    <li class="flex items-start gap-3"><span class="mt-1 text-[#648DDB]">•</span> Mendapatkan bimbingan dari mentor berpengalaman.</li>
                    <li class="flex items-start gap-3"><span class="mt-1 text-[#648DDB]">•</span> Mengembangkan portofolio dan keterampilan kerja.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
{{-- Component: features --}}
<section id="features" class="mt-20 bg-white/60 p-6 rounded-2xl">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="font-semibold">Feature One</h3>
            <p class="mt-2 text-sm text-gray-600">Penjelasan singkat fitur.</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="font-semibold">Feature Two</h3>
            <p class="mt-2 text-sm text-gray-600">Penjelasan singkat fitur.</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="font-semibold">Feature Three</h3>
            <p class="mt-2 text-sm text-gray-600">Penjelasan singkat fitur.</p>
        </div>
    </div>
</section>