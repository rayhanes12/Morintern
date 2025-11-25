<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\PesertaCalon;
use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $calon = PesertaCalon::all();

        return view('hrd.calon.index', compact('calon'));
    }

    public function approve(Request $request, PesertaCalon $calon)
    {
        $this->authorize('approve', $calon);

        // Safety: prevent duplicate email
        if (Peserta::where('email', $calon->email)->exists()) {
            $message = 'Email sudah terdaftar pada Peserta.';
            return $request->wantsJson()
                ? response()->json(['success' => false, 'message' => $message], 422)
                : back()->with('error', $message);
        }

        DB::transaction(function () use ($calon) {
            $password = $calon->password ?: Hash::make(Str::random(12));

            $cvPath = null;
            if ($calon->cv) {
                $cvBase = basename($calon->cv);
                if (Storage::disk('local')->exists($calon->cv)) {
                    $cvPath = $calon->cv; // already private
                } elseif (Storage::disk('public')->exists($calon->cv)) {
                    $target = 'cv/' . $cvBase;
                    $stream = Storage::disk('public')->readStream($calon->cv);
                    Storage::disk('local')->put($target, $stream);
                    if (is_resource($stream)) {
                        fclose($stream);
                    }
                    Storage::disk('public')->delete($calon->cv);
                    $cvPath = $target;
                }
            }
            $suratPath = null;
            if ($calon->surat) {
                $suratBase = basename($calon->surat);
                if (Storage::disk('local')->exists($calon->surat)) {
                    $suratPath = $calon->surat;
                } elseif (Storage::disk('public')->exists($calon->surat)) {
                    $target = 'surat/' . $suratBase;
                    $stream = Storage::disk('public')->readStream($calon->surat);
                    Storage::disk('local')->put($target, $stream);
                    if (is_resource($stream)) {
                        fclose($stream);
                    }
                    Storage::disk('public')->delete($calon->surat);
                    $suratPath = $target;
                }
            }

            $peserta = Peserta::create([
                'nama_lengkap'    => $calon->nama_lengkap,
                'email'           => $calon->email,
                'password'        => $password,
                'google_id'       => $calon->google_id,
                'no_telp'         => $calon->no_telp,
                'ketua_id'        => $calon->ketua_id,
                'perusahaan_id'   => $calon->perusahaan_id ?? null,
                'tanggal_daftar'  => now(),
                'status_id'       => 1,
                'spesialisasi_id' => $calon->spesialisasi_id,
                'kelompok_id'     => $calon->kelompok_id,
                'universitas'     => $calon->universitas_id ?? null,
                'jurusan'         => $calon->jurusan_id ?? null,
                'github'          => $calon->github,
                'linkedin'        => $calon->linkedin,
                'tanggal_mulai'   => $calon->tanggal_mulai,
                'tanggal_selesai' => $calon->tanggal_selesai,
                'cv'              => $cvPath,
                'surat'           => $suratPath,
            ]);

            $calon->delete();

            Log::info('HRD approved calon peserta', [
                'calon_id' => $calon->id,
                'peserta_id' => $peserta->id,
                'email' => $peserta->email,
            ]);
        });

        $message = 'Peserta berhasil diterima.';
        return $request->wantsJson()
            ? response()->json(['success' => true, 'message' => $message])
            : back()->with('success', $message);
    }

    public function reject(Request $request, PesertaCalon $calon)
    {
        $this->authorize('reject', $calon);

        DB::transaction(function () use ($calon) {
            // Existing logic deletes the record; optionally set status if used
            $calon->delete();

            Log::info('HRD rejected calon peserta', [
                'calon_id' => $calon->id,
                'email' => $calon->email,
            ]);
        });

        $message = 'Peserta ditolak.';
        return $request->wantsJson()
            ? response()->json(['success' => true, 'message' => $message])
            : back()->with('warning', $message);
    }
}
