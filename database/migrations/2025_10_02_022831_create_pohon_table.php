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
        $table->integer('umur_pohon');
        $table->float('tinggi_pohon');
        $table->string('lokasi_pohon');
        $table->foreignId('id_pemilik')->constrained('pemilik_pohon');
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
