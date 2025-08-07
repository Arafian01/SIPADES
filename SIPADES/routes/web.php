<?php

use App\Http\Controllers\gaset_tetap_lainnyaController;
use App\Http\Controllers\ggedung_dan_bangunanController;
use App\Http\Controllers\gjalan_irigasi_dan_jaringanController;
use App\Http\Controllers\gkontruksi_dalam_pengerjaanController;
use App\Http\Controllers\gperalatan_dan_mesinController;
use App\Http\Controllers\gtanahController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('rekening', RekeningController::class)->middleware('auth');
    Route::resource('pengguna', PenggunaController::class)->middleware('auth');
    Route::resource('ruangan', RuanganController::class)->middleware('auth');
    Route::resource('pengadaan', PengadaanController::class)->middleware('auth');
    Route::resource('tanah', gtanahController::class)->middleware('auth');
    Route::resource('peralatan_dan_mesin', gperalatan_dan_mesinController::class)->middleware('auth');
    Route::resource('gedung_dan_bangunan', ggedung_dan_bangunanController::class)->middleware('auth');
    Route::resource('jalan_irigasi_dan_jaringan', gjalan_irigasi_dan_jaringanController::class)->middleware('auth');
    Route::resource('aset_tetap_lainnya', gaset_tetap_lainnyaController::class)->middleware('auth');
    Route::resource('kontruksi_dalam_pengerjaan', gkontruksi_dalam_pengerjaanController::class)->middleware('auth');
});

require __DIR__.'/auth.php';
