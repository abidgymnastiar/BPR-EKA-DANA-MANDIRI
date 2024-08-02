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
        Schema::create('tb_simpanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('no_hp');
            $table->string('email');
            $table->string('provinsi');
            $table->string('kota');
            $table->foreignId('id_jumlah_simpanan')->constrained('tb_list_jumlah_simpanan');
            $table->enum('status', ['pending', 'process', 'done', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_simpanan');
    }
};
