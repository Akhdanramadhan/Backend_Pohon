<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan kolom alamat ke tabel pemilik_pohon
     */
    public function up(): void
    {
        Schema::table('pemilik_pohon', function (Blueprint $table) {
            $table->string('alamat')->nullable()->after('jenis_kelamin'); 
            // pakai ->after biar posisinya setelah jenis_kelamin
        });
    }

    /**
     * Hapus kolom alamat kalau rollback
     */
    public function down(): void
    {
        Schema::table('pemilik_pohon', function (Blueprint $table) {
            $table->dropColumn('alamat');
        });
    }
};
