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
        Schema::create('tanah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_aset')->constrained('aset')->onDelete('cascade');
            $table->string('kode_pemilik');
            $table->date('tanggal_perolehan');
            $table->string('luas');
            $table->string('status');
            $table->string('tanggal_sertifikat');
            $table->string('nomor_sertifikat');
            $table->string('perolehan');
            $table->string('alamat');
            $table->string('kode_lokasi');
            $table->string('lokasi_desa');
            $table->string('batas_utara');
            $table->string('batas_timur');
            $table->string('batas_selatan');
            $table->string('batas_barat');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanah');
    }
};
