<?php

namespace App\Console\Commands;

use App\Http\Controllers\ProfileController;
use App\Models\PesertaCalon;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimulateStoreAnggota extends Command
{
    protected $signature = 'simulate:store-anggota {ketuaId=5}';
    protected $description = 'Simulate calling ProfileController@storeAnggota as a ketua to verify linked fields';

    public function handle()
    {
        $ketuaId = (int) $this->argument('ketuaId');
        $ketua = PesertaCalon::find($ketuaId);
        if (! $ketua) {
            $this->error("Ketua with ID {$ketuaId} not found.");
            return 1;
        }

        Auth::guard('peserta')->login($ketua);

        $payload = [
            'nama_lengkap' => 'Sim Anggota ' . now()->timestamp,
            'no_telp' => '081122334455',
            'email' => 'sim_anggota_' . now()->timestamp . '@test.com',
            'github' => 'https://github.com/sim',
            'linkedin' => 'https://linkedin.com/in/sim',
        ];

        $request = Request::create('/profile/anggota', 'POST', $payload);

        $controller = new ProfileController();
        $response = $controller->storeAnggota($request);

        $data = json_decode($response->getContent(), true);
        if ($data && isset($data['success']) && $data['success']) {
            $this->info('SUCCESS: ' . $data['message']);
            $this->line(print_r($data['data'], true));
        } else {
            $this->error('FAILED: ' . json_encode($data));
        }

        return 0;
    }
}
