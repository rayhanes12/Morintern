<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('users')) {
            return;
        }

        if (!Schema::hasColumn('users', 'role_id')) {
            // Nothing to do
            return;
        }

        if (!Schema::hasTable('roles')) {
            // Roles table missing; cannot add FK safely.
            return;
        }

        // Attempt to add foreign key if not present. Use try/catch to avoid exceptions
        try {
            Schema::table('users', function (Blueprint $table) {
                $table->foreign('role_id')->references('id')->on('roles')->nullOnDelete();
            });
        } catch (\Throwable $e) {
            // Likely FK already exists or DB engine does not support adding; ignore.
        }
    }

    public function down(): void
    {
        if (!Schema::hasTable('users') || !Schema::hasColumn('users', 'role_id')) {
            return;
        }

        try {
            Schema::table('users', function (Blueprint $table) {
                $table->dropForeign(['role_id']);
            });
        } catch (\Throwable $_) {
            // ignore
        }
    }
};
