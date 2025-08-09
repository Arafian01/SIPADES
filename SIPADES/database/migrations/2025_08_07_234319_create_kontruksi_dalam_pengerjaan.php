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
        Schema::create('kontruksi_dalam_pengerjaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_aset')->constrained('aset')->onDelete('cascade');
            $table->string('nomor_dokumen');
            $table->date('tanggal_dokumen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontruksi_dalam_pengerjaan');
    }
};
