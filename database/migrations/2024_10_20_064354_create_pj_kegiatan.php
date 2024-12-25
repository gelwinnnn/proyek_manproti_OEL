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
        Schema::create('pj_kegiatan', function (Blueprint $table) {
            $table->id('id_kegiatan');
            $table->string('nama_pj', 100);
            $table->string('notelp_pj', 14);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pj_kegiatan');
    }
};
