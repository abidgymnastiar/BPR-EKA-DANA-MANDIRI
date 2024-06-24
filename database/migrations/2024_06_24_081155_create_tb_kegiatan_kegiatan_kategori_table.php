<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_kegiatan_kegiatan_kategori', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id')->constrained('tb_kegiatan');
            $table->foreignId('kegiatan_kategori_id')->constrained('tb_kategori_kegiatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kegiatan_kegiatan_kategori');
    }
};
