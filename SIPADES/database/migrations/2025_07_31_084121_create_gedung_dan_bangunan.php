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
        Schema::create('gedung_dan_bangunan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_aset')->constrained('aset')->onDelete('cascade');
            $table->string('kode_pemilik');
            $table->string('luas_lantai');
            $table->string('bertingkat');
            $table->string('beton');
            $table->string('no_dokumen');
            $table->string('tanggal_dokumen');
            $table->foreignId('id_tanah')->constrained('tanah')->onDelete('cascade');
            $table->string('perolehan');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gedung_dan_bangunan');
    }
};
