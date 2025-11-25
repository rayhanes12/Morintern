<?php

namespace App\Http\Controllers;

use App\Models\PesertaCalon;
use App\Models\Spesialisasi;
use App\Models\PenilaianMagang;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ProfileDataUpdateRequest;
use App\Http\Requests\AnggotaStoreRequest;
use App\Http\Requests\AnggotaUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $this->getAuthenticatedUser();
        $ketua = $user;
        
        // Get anggota if user is peserta (ketua)
        $anggota = [];
        if (Auth::guard('peserta')->check()) {
            $anggota = PesertaCalon::where('ketua_id', $user->id)->get();
        }

        // Spesialisasi options from database
        $spesialisasiOptions = Spesialisasi::pluck('nama_spesialisasi', 'id')->toArray();

        return view('profile.edit', [
            'user' => $user,
            'ketua' => $ketua,
            'anggota' => $anggota,
            'spesialisasiOptions' => $spesialisasiOptions,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = $this->getAuthenticatedUser();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak terautentikasi.',
            ], 401);
        }

    $validated = $request->validate([
    'nama_lengkap' => 'required|string|max:100',
    'no_telp' => 'nullable|string|max:20',
    'github' => 'nullable|string|max:255',
    'linkedin' => 'nullable|string|max:255',
    'spesialisasi_id' => 'nullable|exists:spesialisasi,id',
    'universitas_id' => 'nullable|string|max:255',
    'jurusan_id' => 'nullable|string|max:255',
    'tanggal_mulai' => 'nullable|date',
    'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
    'cv' => 'nullable|file|mimes:zip|max:10240',
    'surat' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
]);

// Map 'name' to 'nama_lengkap' for consistency
if (isset($validated['name']) && !isset($validated['nama_lengkap'])) {
    $validated['nama_lengkap'] = $validated['name'];
    unset($validated['name']);
}

// Ensure nama_lengkap is set
if (empty($validated['nama_lengkap'])) {
    $validated['nama_lengkap'] = $user->nama_lengkap ?? $user->name ?? 'User';
}

// Ensure email is set (allow request email or use current)
if (empty($validated['email'])) {
    $validated['email'] = $user->email;
}

// If email changed and user is web user, reset email_verified_at
if ($validated['email'] !== $user->email && !$user instanceof PesertaCalon) {
    $validated['email_verified_at'] = null;
}

        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $oldPath = $user->cv;
            $base = $oldPath ? pathinfo($oldPath, PATHINFO_FILENAME) : pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $ext = strtolower($file->getClientOriginalExtension());
            $filename = Str::slug($base) . '.' . $ext;
            if ($oldPath) {
                if (Storage::disk('local')->exists($oldPath)) {
                    Storage::disk('local')->delete($oldPath);
                }
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            Storage::disk('local')->putFileAs('cv', $file, $filename);
            $validated['cv'] = 'cv/' . $filename;
        }

        if ($request->hasFile('surat')) {
            $file = $request->file('surat');
            $oldPath = $user->surat;
            $base = $oldPath ? pathinfo($oldPath, PATHINFO_FILENAME) : pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $ext = strtolower($file->getClientOriginalExtension());
            $filename = Str::slug($base) . '.' . $ext;

            if ($oldPath) {
                if (Storage::disk('local')->exists($oldPath)) {
                    Storage::disk('local')->delete($oldPath);
                }
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            Storage::disk('local')->putFileAs('surat', $file, $filename);
            $validated['surat'] = 'surat/' . $filename;
        }

        // For web users (User model), map nama_lengkap to name
        if (!$user instanceof PesertaCalon && isset($validated['nama_lengkap'])) {
            $validated['name'] = $validated['nama_lengkap'];
            unset($validated['nama_lengkap']);
        }

        // Update ketua data
        $user->update($validated);

        // Handle anggota data
        if ($request->has('anggota')) {
            foreach ($request->anggota as $anggotaItem) {
                if (empty($anggotaItem['nama_lengkap'])) continue;

                $anggotaValidated = validator($anggotaItem, [
                    'id' => 'nullable|integer|exists:peserta_calon,id',
                    'nama_lengkap' => 'required|string|max:100',
                    'no_telp' => 'nullable|string|max:20',
                    'email' => 'nullable|email|max:100',
                    'github' => 'nullable|string|max:255',
                    'linkedin' => 'nullable|string|max:255',
                    'spesialisasi_id' => 'nullable|exists:spesialisasi,id',
                    'universitas_id' => 'nullable|string|max:255',
                    'jurusan_id' => 'nullable|string|max:255',
                    'tanggal_mulai' => 'nullable|date',
                    'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
                ])->validate();

                // Prepare fields that should always be linked to ketua (main account)
                $linked = [
                    'universitas_id' => $user->universitas_id ?? null,
                    'jurusan_id' => $user->jurusan_id ?? null,
                    'tanggal_mulai' => $user->tanggal_mulai ?? null,
                    'tanggal_selesai' => $user->tanggal_selesai ?? null,
                    'cv' => $user->cv ?? null,
                    'surat' => $user->surat ?? null,
                    'kelompok_id' => $user->kelompok_id ?? null,
                ];

                if (!empty($anggotaItem['id'])) {
                    $existingAnggota = PesertaCalon::where('ketua_id', $user->id)->find($anggotaItem['id']);
                    if ($existingAnggota) {
                        // Merge validated fields but force linked fields to ketua values
                        $existingAnggota->update(array_merge($anggotaValidated, $linked));
                    }
                } else {
                    // Create anggota without password (password is nullable)
                    PesertaCalon::create(array_merge($anggotaValidated, [
                        'ketua_id' => $user->id,
                    ], $linked, [
                        // prefer provided github/linkedin but fallback to ketua
                        'github' => $anggotaValidated['github'] ?? $user->github ?? null,
                        'linkedin' => $anggotaValidated['linkedin'] ?? $user->linkedin ?? null,
                    ]));
                }
            }
        }

    return redirect()->back()->with('success', 'Profil dan anggota berhasil disimpan.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Determine which guard is authenticated
        $guard = Auth::guard('peserta')->check() ? 'peserta' : 'web';
        $passwordRule = 'current_password:' . $guard;
        
        $request->validateWithBag('userDeletion', [
            'password' => ['required', $passwordRule],
        ]);

        // Get user from the appropriate guard
        $user = Auth::guard('peserta')->check() ? Auth::guard('peserta')->user() : Auth::user();

        Auth::guard($guard)->logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    /**
     * Update profile data for peserta via AJAX.
     */
    public function updateProfileData(ProfileDataUpdateRequest $request): JsonResponse
    {
        $user = Auth::guard('peserta')->user();
        $validated = $request->validated();

        $user->update($validated);

    return redirect()->back()->with
    ('success', 'Profil dan anggota berhasil disimpan.');
    }

    /**
     * Store a new anggota via AJAX.
     */
    public function storeAnggota(AnggotaStoreRequest $request): JsonResponse
    {
        $ketua = Auth::guard('peserta')->user();

        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'no_telp' => 'required|string|max:20',
            'email' => 'required|email|max:100|unique:peserta_calon,email',
            'github' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'spesialisasi_id' => 'nullable|exists:spesialisasi,id',
            'universitas_id' => 'nullable|string|max:255',
            'jurusan_id' => 'nullable|string|max:255',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        // Force linked fields to ketua values so anggota are linked to the ketua's profile
        $linked = [
            'universitas_id' => $ketua->universitas_id ?? null,
            'jurusan_id' => $ketua->jurusan_id ?? null,
            'tanggal_mulai' => $ketua->tanggal_mulai ?? null,
            'tanggal_selesai' => $ketua->tanggal_selesai ?? null,
            'cv' => $ketua->cv ?? null,
            'surat' => $ketua->surat ?? null,
            'kelompok_id' => $ketua->kelompok_id ?? null,
        ];

        $anggota = PesertaCalon::create(array_merge($validated, [
            'ketua_id' => $ketua->id,
        ], $linked, [
            'github' => $validated['github'] ?? $ketua->github ?? null,
            'linkedin' => $validated['linkedin'] ?? $ketua->linkedin ?? null,
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Anggota berhasil ditambahkan.',
            'data' => [
                'id' => $anggota->id,
                'nama_lengkap' => $anggota->nama_lengkap,
                'email' => $anggota->email,
                'no_telp' => $anggota->no_telp,
                'github' => $anggota->github ?? '-',
                'linkedin' => $anggota->linkedin ?? '-',
                'spesialisasi' => optional($anggota->spesialisasi)->nama_spesialisasi ?? '-',
            ],
        ]);
    }

    /**
     * Delete anggota via AJAX.
     */
    public function destroyAnggota(int $id): JsonResponse
    {
        try {
            $ketua = Auth::guard('peserta')->user() ?? Auth::user();

            if (!$ketua) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized.',
                ], 401);
            }

            // Pastikan anggota memang milik ketua yang sedang login
            $anggota = PesertaCalon::where('id', $id)
                ->where('ketua_id', $ketua->id)
                ->first();

            if (!$anggota) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anggota tidak ditemukan atau bukan milik Anda.',
                ], 404);
            }

            $anggota->delete();

            return response()->json([
                'success' => true,
                'message' => 'Anggota berhasil dihapus.',
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateAnggota(AnggotaUpdateRequest $request, int $id): JsonResponse
    {
        $ketua = Auth::guard('peserta')->user() ?? Auth::user();
        $anggota = PesertaCalon::where('ketua_id', $ketua->id)->findOrFail($id);
        $anggota->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Anggota berhasil diperbarui.',
        ]);
    }

    /**
     * Get all anggota for the authenticated ketua via AJAX.
     */
    public function getAnggota(Request $request): JsonResponse
    {
        $ketua = Auth::guard('peserta')->user();

        $anggota = PesertaCalon::where('ketua_id', $ketua->id)
            ->with('spesialisasi')
            ->select('id', 'nama_lengkap', 'email', 'no_telp', 'github', 'linkedin', 'spesialisasi_id', 'tanggal_mulai', 'tanggal_selesai', 'universitas_id', 'jurusan_id', 'cv', 'surat', 'kelompok_id')
            ->get()
            ->map(function ($a) {
                return [
                    'id' => $a->id,
                    'nama' => $a->nama_lengkap,
                    'email' => $a->email,
                    'no_telp' => $a->no_telp,
                    'github' => $a->github ?? '-',
                    'linkedin' => $a->linkedin ?? '-',
                    'spesialisasi' => optional($a->spesialisasi)->nama_spesialisasi ?? '-',
                    'tanggal_mulai' => $a->tanggal_mulai?->format('Y-m-d') ?? '-',
                    'tanggal_selesai' => $a->tanggal_selesai?->format('Y-m-d') ?? '-',
                    'universitas_id' => $a->universitas_id ?? null,
                    'jurusan_id' => $a->jurusan_id ?? null,
                    'cv' => $a->cv ?? null,
                    'surat' => $a->surat ?? null,
                    'kelompok_id' => $a->kelompok_id ?? null,
                ];
            });

        return response()->json([
            'success' => true,
            'anggota' => $anggota,
        ]);
    }

    /**
     * Get penilaian (evaluation) for the authenticated user.
     * Returns JSON with masukan and file URL(s).
     */
    public function getPenilaian(Request $request): JsonResponse
    {
        $user = $this->getAuthenticatedUser();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak terautentikasi.',
            ], 401);
        }

        // Try to match by full name first, fallback to contains
        $name = $user->nama_lengkap ?? $user->nama ?? null;

        if (!$name) {
            return response()->json([
                'success' => true,
                'data' => [],
            ]);
        }

        $records = PenilaianMagang::where('nama', $name)->get();

        if ($records->isEmpty()) {
            $records = PenilaianMagang::where('nama', 'like', "%{$name}%")->get();
        }

        // Map records to include accessible file URL when present
        $data = $records->map(function ($r) {
            $fileUrl = null;
            if ($r->file_penilaian) {
                // Prefer public disk URL if exists
                if (Storage::disk('public')->exists($r->file_penilaian)) {
                    $fileUrl = Storage::disk('public')->url($r->file_penilaian);
                } else {
                    // fallback: try asset path
                    $fileUrl = asset('storage/' . ltrim($r->file_penilaian, '/'));
                }
            }

            return [
                'id' => $r->id,
                'nama' => $r->nama,
                'nilai_rata_rata' => $r->nilai_rata_rata,
                'masukan' => $r->masukan,
                'file_penilaian' => $r->file_penilaian,
                'file_url' => $fileUrl,
                'created_at' => $r->created_at?->toDateTimeString(),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    /**
     * Get the currently authenticated user from any guard.
     */
    private function getAuthenticatedUser()
    {
        return Auth::check() ? Auth::user() : Auth::guard('peserta')->user();
    }

    /**
     * Get the active authentication guard name.
     */
    private function getActiveGuard(): ?string
    {
        return Auth::check() ? 'web' : (Auth::guard('peserta')->check() ? 'peserta' : null);
    }

    public function downloadCv(Request $request, \App\Models\Peserta $peserta)
    {
        $isOwner = Auth::guard('peserta')->check() && Auth::guard('peserta')->id() === $peserta->id;
        $isHrd = Auth::guard('web')->check();

        if (! $isOwner && ! $isHrd) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $path = $peserta->cv;
        if (! $path || ! Storage::disk('local')->exists($path)) {
            return response()->json(['message' => 'File tidak ditemukan'], 404);
        }

        return response()->download(Storage::disk('local')->path($path));
    }

    public function downloadSurat(Request $request, \App\Models\Peserta $peserta)
    {
        $isOwner = Auth::guard('peserta')->check() && Auth::guard('peserta')->id() === $peserta->id;
        $isHrd = Auth::guard('web')->check();

        if (! $isOwner && ! $isHrd) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $path = $peserta->surat;
        if (! $path || ! Storage::disk('local')->exists($path)) {
            return response()->json(['message' => 'File tidak ditemukan'], 404);
        }

        return response()->download(Storage::disk('local')->path($path));
    }

    public function downloadCvCalon(Request $request, \App\Models\PesertaCalon $calon)
    {
        $isOwner = Auth::guard('peserta')->check() && Auth::guard('peserta')->id() === $calon->id;
        $isHrd = Auth::guard('web')->check();

        if (! $isOwner && ! $isHrd) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $path = $calon->cv;
        if ($path && Storage::disk('local')->exists($path)) {
            return response()->download(Storage::disk('local')->path($path));
        }
        if ($path && Storage::disk('public')->exists($path)) {
            return response()->download(Storage::disk('public')->path($path));
        }
        return response()->json(['message' => 'File tidak ditemukan'], 404);
    }

    public function downloadSuratCalon(Request $request, \App\Models\PesertaCalon $calon)
    {
        $isOwner = Auth::guard('peserta')->check() && Auth::guard('peserta')->id() === $calon->id;
        $isHrd = Auth::guard('web')->check();

        if (! $isOwner && ! $isHrd) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $path = $calon->surat;
        if ($path && Storage::disk('local')->exists($path)) {
            return response()->download(Storage::disk('local')->path($path));
        }
        if ($path && Storage::disk('public')->exists($path)) {
            return response()->download(Storage::disk('public')->path($path));
        }
        return response()->json(['message' => 'File tidak ditemukan'], 404);
    }

}
