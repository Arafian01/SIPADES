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
        Schema::create('peralatan_dan_mesin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_aset')->constrained('aset')->onDelete('cascade');
            $table->string('kode_pemilik');
            $table->string('ruang');
            $table->string('merk');
            $table->string('ukuran');
            $table->string('bahan');
            $table->date('tanggal_perolehan');
            $table->string('nomor_pabrik');
            $table->string('nomor_rangka');
            $table->string('nomor_mesin');
            $table->string('nomor_polisi');
            $table->string('nomor_bpkb');
            $table->string('perolehan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peralatan_dan_mesin');
    }
};
