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
        Schema::create('tb_peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->string('nama_lengkap');
            $table->string('no_hp', 15);
            $table->string('email', 50);
            $table->string('provinsi', 50);
            $table->string('kota', 50);
            $table->enum('pekerjaan', ['PNS', 'Pegawai Swasta', 'Pensiunan PNS', 'Pensiunan Biasa', 'TNI/Polri', 'Wiraswasta atau Pengusaha', 'Tidak Bekerja', 'Lainnya']);
            $table->unsignedBigInteger('id_jaminan');
            $table->enum('sertifikat_atas_nama', ['pemohon/pasangan', 'keluarga']);
            $table->enum('jumlah_pinjaman', ['500 Juta - 1 Miliar', '1 Miliar - 2 Miliar']);
            $table->timestamps();

            $table->foreign('id_jaminan')->references('id_jaminan')->on('tb_jenis_jaminan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_peminjaman');
    }
};
