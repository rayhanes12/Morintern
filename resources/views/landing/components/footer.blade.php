<!-- Footer -->
<footer class="bg-[#648DDB] text-white mt-12">
    <div class="max-w-[1440px] mx-auto px-8 lg:px-12 py-12 text-center">
        <h4 class="text-lg font-medium">Hubungi Kami</h4>
        <div class="flex items-center justify-center gap-6 mt-6">
            <a href="#" aria-label="instagram" class="opacity-90 hover:opacity-100">
                <img src="{{ asset('assets/instagram-white.svg') }}" alt="ig" class="h-8 w-8">
            </a>
            <a href="#" aria-label="linkedin" class="opacity-90 hover:opacity-100">
                <img src="{{ asset('assets/linkedin-white.svg') }}" alt="ln" class="h-8 w-8">
            </a>
        </div>
    </div>
</footer>
{{-- Component: footer --}}
<footer class="mt-24 text-sm text-gray-600">
    <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
</footer>