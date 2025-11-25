<?php

namespace App\Console\Commands;

use Exception;
use App\Models\PesertaCalon;
use Illuminate\Console\Command;

class TestAnggotaCreation extends Command
{
    protected $signature = 'test:anggota';
    protected $description = 'Test creating an anggota without password to verify nullable column';

    public function handle()
    {
        try {
            // Check if ketua (ID 5) exists
            $ketua = PesertaCalon::find(5);
            if (!$ketua) {
                $this->error('PesertaCalon with ID 5 not found. Create a ketua first.');
                return 1;
            }

            // Create anggota without password
            $anggota = PesertaCalon::create([
                'nama_lengkap' => 'Test Anggota ' . now()->timestamp,
                'no_telp' => '08123456789',
                'email' => 'anggota_' . now()->timestamp . '@test.com',
                'ketua_id' => 5,
                'kelompok_id' => 0,
            ]);

            $this->info("✅ SUCCESS: Anggota created with ID {$anggota->id}");
            $this->info("   Name: {$anggota->nama_lengkap}");
            $this->info("   Email: {$anggota->email}");
            $this->info("   Password is NULL: " . ($anggota->password === null ? 'YES ✓' : 'NO ✗'));

            return 0;
        } catch (Exception $e) {
            $this->error("❌ ERROR: " . $e->getMessage());
            return 1;
        }
    }
}
