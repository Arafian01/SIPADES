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
        Schema::create('jalan_irigasi_dan_jaringan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_aset')->constrained('aset')->onDelete('cascade');
            $table->string('kode_pemilik');
            $table->date('tanggal_perolehan');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jalan_irigasi_dan_jaringan');
    }
};
