<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Backfill `spesialisasi_id`, and copy `nama` -> `nama_lengkap`, `no_hp` -> `no_telepon`.
     * Create `spesialisasi_backfill_log` for rows that could not be matched automatically.
     */
    public function up(): void
    {
        if (!Schema::hasTable('calon_pesertas')) {
            return;
        }

        // Ensure log table exists
        if (!Schema::hasTable('spesialisasi_backfill_log')) {
            Schema::create('spesialisasi_backfill_log', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('calon_peserta_id')->nullable();
                $table->string('spesialisasi_value')->nullable();
                $table->text('notes')->nullable();
                $table->timestamps();
            });
        }

        // If spesialisasi table missing, we cannot map; log and exit.
        $hasSpesialisasi = Schema::hasTable('spesialisasi');

        DB::transaction(function () use ($hasSpesialisasi) {
            DB::table('calon_pesertas')->orderBy('id')->chunk(200, function ($rows) use ($hasSpesialisasi) {
                foreach ($rows as $row) {
                    $updates = [];

                    // Copy nama -> nama_lengkap when missing
                    if (empty($row->nama_lengkap) && isset($row->nama) && !empty($row->nama)) {
                        $updates['nama_lengkap'] = $row->nama;
                    }

                    // Copy no_hp -> no_telepon when missing
                    if (empty($row->no_telepon) && isset($row->no_hp) && !empty($row->no_hp)) {
                        $updates['no_telepon'] = $row->no_hp;
                    }

                    // Attempt to map spesialisasi string to spesialisasi.id
                    if ($hasSpesialisasi && empty($row->spesialisasi_id) && isset($row->spesialisasi) && !empty($row->spesialisasi)) {
                        $value = trim($row->spesialisasi);
                        $match = DB::table('spesialisasi')
                            ->whereRaw('LOWER(nama_spesialisasi) LIKE ?', ['%' . strtolower($value) . '%'])
                            ->first();

                        if ($match && isset($match->id)) {
                            $updates['spesialisasi_id'] = $match->id;
                        } else {
                            // Insert into log for manual inspection
                            DB::table('spesialisasi_backfill_log')->insert([
                                'calon_peserta_id' => $row->id,
                                'spesialisasi_value' => $row->spesialisasi,
                                'notes' => 'No automatic match found',
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);
                        }
                    }

                    if (!empty($updates)) {
                        DB::table('calon_pesertas')->where('id', $row->id)->update($updates);
                    }
                }
            });
        });
    }

    /**
     * Reverse the backfill operation: delete log table only if exists.
     */
    public function down(): void
    {
        if (Schema::hasTable('spesialisasi_backfill_log')) {
            Schema::dropIfExists('spesialisasi_backfill_log');
        }
    }
};
