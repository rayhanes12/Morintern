<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Behavior:
     * - If `roles` table exists: do nothing.
     * - If `role` table exists but `roles` does not: create `roles`, copy rows from `role`.
     * - Do NOT drop `role` table automatically; leave manual note in comments.
     */
    public function up(): void
    {
        // If roles exists, prefer it and skip consolidation.
        if (Schema::hasTable('roles')) {
            // Nothing to do.
            return;
        }

        // If legacy singular table exists, create roles and copy data.
        if (Schema::hasTable('role') && !Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->string('label')->nullable();
                $table->timestamps();
            });

            // Copy data from `role` into `roles` mapping possible column names.
            $legacy = DB::table('role')->get();
            foreach ($legacy as $row) {
                // Determine original name value
                $originalName = null;
                if (isset($row->nama_role)) {
                    $originalName = $row->nama_role;
                } elseif (isset($row->nama)) {
                    $originalName = $row->nama;
                } elseif (isset($row->name)) {
                    $originalName = $row->name;
                }

                if (empty($originalName)) {
                    $originalName = 'role_' . ($row->id ?? uniqid());
                }

                // Slugify to ASCII lowercase for `name`.
                $slug = strtolower(preg_replace('/[^A-Za-z0-9]+/', '_', iconv('UTF-8', 'ASCII//TRANSLIT', $originalName)));

                try {
                    DB::table('roles')->insert([
                        'id' => $row->id ?? null,
                        'name' => $slug,
                        'label' => $originalName,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } catch (\Throwable $e) {
                    // If insertion with explicit id fails, insert without id and continue.
                    DB::table('roles')->insert([
                        'name' => $slug . '_' . ($row->id ?? uniqid()),
                        'label' => $originalName,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * NOTE: We do not drop legacy `role` table here. If both `roles` and `role` exist,
     * manual reconciliation is recommended before rollback.
     */
    public function down(): void
    {
        // We do not automatically drop tables that may contain legacy data.
        // If you created `roles` with this migration and want to drop it on rollback,
        // uncomment the following line after manual verification:
        // Schema::dropIfExists('roles');
    }
};
