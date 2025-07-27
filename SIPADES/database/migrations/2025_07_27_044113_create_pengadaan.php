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
        Schema::create('pengadaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengguna')->constrained('pengguna')->onDelete('cascade');
            $table->string('no_pengadaan');
            $table->date('tanggal_pengadaan');
            $table->string('no_kuitansi');
            $table->date('tanggal_spp');
            $table->string('no_bast');
            $table->date('tanggal_bast');
            $table->string('nama_rekanan');
            $table->text('uraian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengadaan');
    }
};
