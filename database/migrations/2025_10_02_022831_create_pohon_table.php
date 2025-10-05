<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
Schema::create('pohon', function (Blueprint $table) {
    $table->id();
    $table->string('nama_pohon');
    $table->string('jenis_pohon');
    $table->date('tanggal_tanam')->nullable();
    $table->decimal('tinggi_pohon', 8, 2)->nullable();
    $table->string('lokasi_pohon')->nullable();
    $table->decimal('latitude', 10, 7)->nullable();
    $table->decimal('longitude', 10, 7)->nullable();
    $table->foreignId('id_pemilik')->constrained('pemilik_pohon')->onDelete('cascade');
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pohon');
    }
};
