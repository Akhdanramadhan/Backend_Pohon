<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::table('pemilik_pohon', function (Blueprint $table) {
            // Tambahkan kolom 'alamat' setelah kolom 'nama_pemilik'
            $table->string('alamat')->nullable()->after('nama_pemilik');
        });
    }

    /**
     * Balikkan migrasi.
     */
    public function down(): void
    {
        Schema::table('pemilik_pohon', function (Blueprint $table) {
            // Hapus kolom 'alamat' jika rollback
            $table->dropColumn('alamat');
        });
    }
};
