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
        Schema::create('aset', function (Blueprint $table) {
            $table->id();
            $table->string('id_barang');
            $table->string('nomor_register');
            $table->foreignId('id_rekening')->constrained('rekening')->onDelete('cascade');
            $table->string('nama_label');
            $table->string('kode_belanja_bidang');
            $table->string('asal');
            $table->string('sumber_dana');
            $table->integer('nilai_perolehan');
            $table->string('kondisi');
            $table->date('tanggal_pembukuan');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};
