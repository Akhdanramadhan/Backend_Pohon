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
    Schema::table('pohon', function (Blueprint $table) {
        $table->string('satuan_tinggi')->default('m')->after('tinggi_pohon');
    });
}

public function down(): void
{
    Schema::table('pohon', function (Blueprint $table) {
        $table->dropColumn('satuan_tinggi');
    });
}

};
