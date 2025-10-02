<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::table('pohon', function (Blueprint $table) {
            if (!Schema::hasColumn('pohon', 'tanggal_tanam')) {
                $table->date('tanggal_tanam')->nullable()->after('jenis_pohon');
            }
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::table('pohon', function (Blueprint $table) {
            if (Schema::hasColumn('pohon', 'tanggal_tanam')) {
                $table->dropColumn('tanggal_tanam');
            }
        });
    }
};
