<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Peserta;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
            $anggota = Peserta::where('ketua_id', $user->id)->get();
        }

        // Spesialisasi options for dropdown
        $spesialisasiOptions = [
            1 => 'Back End',
            2 => 'Front End',
            3 => 'System Analyst',
            4 => 'Quality Assurance',
        ];

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
    public function update(Request $request)
    {
        $user = Auth::guard('peserta')->user();
        
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak terautentikasi.',
            ], 401);
        }

        // Validate ketua profile data
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'no_telp' => 'nullable|string|max:20',
            'email' => 'required|email|max:100',
            'github' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'spesialisasi_id' => 'nullable|integer|exists:spesialisasi,id',
            'universitas_id' => 'nullable|string|max:255',
            'jurusan_id' => 'nullable|string|max:255',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'cv' => 'nullable|file|mimes:zip|max:10240',
            'surat' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle file uploads
        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvPath = $cvFile->store('landing/profile', 'public');
            $validated['cv'] = $cvPath;
        }

        if ($request->hasFile('surat')) {
            $suratFile = $request->file('surat');
            $suratPath = $suratFile->store('landing/profile', 'public');
            $validated['surat'] = $suratPath;
        }

        // Map universitas_id and jurusan_id to correct column names
        if (isset($validated['universitas_id'])) {
            $validated['universitas'] = $validated['universitas_id'];
            unset($validated['universitas_id']);
        }
        if (isset($validated['jurusan_id'])) {
            $validated['jurusan'] = $validated['jurusan_id'];
            unset($validated['jurusan_id']);
        }

        // Update ketua data
        $user->update($validated);

        // Handle anggota data (array structure: anggota[index][field])
        if ($request->has('anggota')) {
            $anggotaData = $request->input('anggota');
            
            foreach ($anggotaData as $anggotaItem) {
                if (empty($anggotaItem['nama_lengkap'])) {
                    continue; // Skip empty entries
                }

                $anggotaValidated = validator($anggotaItem, [
                    'id' => 'nullable|integer|exists:peserta_calon,id',
                    'nama_lengkap' => 'required|string|max:100',
                    'no_telp' => 'nullable|string|max:20',
                    'email' => 'nullable|email|max:100',
                    'github' => 'nullable|string|max:255',
                    'linkedin' => 'nullable|string|max:255',
                    'spesialisasi_id' => 'nullable|integer|exists:spesialisasi,id',
                ])->validate();

                if (!empty($anggotaItem['id'])) {
                    // Update existing anggota
                    $existingAnggota = Peserta::where('ketua_id', $user->id)
                        ->find($anggotaItem['id']);
                    if ($existingAnggota) {
                        $existingAnggota->update($anggotaValidated);
                    }
                } else {
                    // Create new anggota
                    Peserta::create(array_merge($anggotaValidated, [
                        'ketua_id' => $user->id,
                        'kelompok_id' => $user->kelompok_id ?? null,
                    ]));
                }
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Profil dan anggota berhasil disimpan.',
        ]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $guard = $this->getActiveGuard();

        $passwordRule = ['required'];
        if ($guard) {
            $passwordRule[] = 'current_password:'.$guard;
        } else {
            $passwordRule[] = 'current_password';
        }

        $request->validateWithBag('userDeletion', [
            'password' => $passwordRule,
        ]);

        $user = $this->getAuthenticatedUser();

        // Logout from the specific guard used
        if ($guard === 'peserta') {
            Auth::guard('peserta')->logout();
        } else {
            Auth::logout();
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Update profile data for peserta via AJAX.
     */
    public function updateProfileData(Request $request): JsonResponse
    {
        $user = Auth::guard('peserta')->user();

        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'no_telp' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'github' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'spesialisasi_id' => 'nullable|integer|exists:spesialisasi,id',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        $user->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Profil berhasil diperbarui.',
        ]);
    }

    /**
     * Store a new anggota via AJAX.
     */
    public function storeAnggota(Request $request): JsonResponse
    {
        $ketua = Auth::guard('peserta')->user();

        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'no_telp' => 'required|string|max:20',
            'email' => 'required|email|max:100|unique:peserta_calon,email',
            'github' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'spesialisasi_id' => 'nullable|integer|exists:spesialisasi,id',
        ]);

        $anggota = Peserta::create(array_merge($validated, [
            'ketua_id' => $ketua->id,
            'kelompok_id' => $ketua->kelompok_id ?? null,
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
                'spesialisasi' => $this->getSpesialisasiName($anggota->spesialisasi_id),
            ],
        ]);
    }

    /**
     * Delete anggota via AJAX.
     */
    public function destroyAnggota($id): JsonResponse
    {
        $ketua = Auth::guard('peserta')->user();
        
        $anggota = Peserta::where('ketua_id', $ketua->id)->findOrFail($id);
        $anggota->delete();

        return response()->json([
            'success' => true,
            'message' => 'Anggota berhasil dihapus.',
        ]);
    }

    /**
     * Get all anggota for the authenticated ketua via AJAX.
     */
    public function getAnggota(Request $request): JsonResponse
    {
        $ketua = Auth::guard('peserta')->user();

        $anggota = Peserta::where('ketua_id', $ketua->id)
            ->select('id', 'nama_lengkap', 'email', 'no_telp', 'github', 'linkedin', 'spesialisasi_id', 'tanggal_mulai', 'tanggal_selesai')
            ->get()
            ->map(function ($a) {
                return [
                    'id' => $a->id,
                    'nama' => $a->nama_lengkap,
                    'email' => $a->email,
                    'no_telp' => $a->no_telp,
                    'github' => $a->github ?? '-',
                    'linkedin' => $a->linkedin ?? '-',
                    'spesialisasi' => $this->getSpesialisasiName($a->spesialisasi_id),
                    'tanggal_mulai' => $a->tanggal_mulai?->format('Y-m-d') ?? '-',
                    'tanggal_selesai' => $a->tanggal_selesai?->format('Y-m-d') ?? '-',
                ];
            });

        return response()->json([
            'success' => true,
            'anggota' => $anggota,
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

    /**
     * Get spesialisasi name by ID.
     */
    private function getSpesialisasiName(?int $id): string
    {
        $spesialisasiMap = [
            1 => 'Back End',
            2 => 'Front End',
            3 => 'System Analyst',
            4 => 'Quality Assurance',
        ];

        return $spesialisasiMap[$id] ?? 'N/A';
    }

}
