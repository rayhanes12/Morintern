<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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

    public function approve($id)
    {
        DB::transaction(function () use ($id) {
            $calon = PesertaCalon::findOrFail($id);

            // Pindahkan data ke tabel pesertas
            Peserta::create([
                'nama_lengkap'   => $calon->nama_lengkap,
                'email'          => $calon->email,
                'spesialisasi_id'=> $calon->spesialisasi_id,
                'ketua_id'       => $calon->ketua_id,
                'kelompok_id'    => $calon->kelompok_id,
                'github'         => $calon->github,
                'linkedin'       => $calon->linkedin,
                'tanggal_daftar' => now(),
                'status_id'      => 1, // 1 = Diterima
            ]);

            $calon->delete();
        });

        return back()->with('success', 'Peserta berhasil diterima.');
    }

    public function reject($id)
    {
        $calon = PesertaCalon::findOrFail($id);
        $calon->delete();

        return back()->with('warning', 'Peserta ditolak.');
    }
}
