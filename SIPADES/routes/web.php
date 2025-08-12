<?php

use App\Http\Controllers\bukuController;
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
    // Route::get('/tanah/create/{status}', [gtanahController::class, 'create'])->name('tanah.create');
    // Route::get('/tanah/create/{status?}', [gtanahController::class, 'create'])->name('tanah.create');
    Route::get('/tanah/create/{id}', [gtanahController::class, 'create'])->name('tanah.create');
    Route::get('/peralatan_dan_mesin/create/{id}', [gperalatan_dan_mesinController::class, 'create'])->name('peralatan_dan_mesin.create');
    Route::get('/pengadaan/create/{id}', [PengadaanController::class, 'create'])->name('pengadaan.create');
    Route::get('/gedung_dan_bangunan/create/{id}', [ggedung_dan_bangunanController::class, 'create'])->name('gedung_dan_bangunan.create');
    Route::get('/jalan_irigasi_dan_jaringan/create/{id}', [gjalan_irigasi_dan_jaringanController::class, 'create'])->name('jalan_irigasi_dan_jaringan.create');
    Route::get('/aset_tetap_lainnya/create/{id}', [gaset_tetap_lainnyaController::class, 'create'])->name('aset_tetap_lainnya.create');
    Route::get('/kontruksi_dalam_pengerjaan/create/{id}', [gkontruksi_dalam_pengerjaanController::class, 'create'])->name('kontruksi_dalam_pengerjaan.create');
    Route::get('/pengadaan/create/{id}/{id_golongan}/{id_aset}', [PengadaanController::class, 'create'])->name('pengadaan.create');

    Route::get('/tanah/edit/{id}/{id_pengadaan}', [gtanahController::class, 'edit'])->name('tanah.edit');
    Route::get('/peralatan_dan_mesin/edit/{id}/{id_pengadaan}', [gperalatan_dan_mesinController::class, 'edit'])->name('peralatan_dan_mesin.edit');
    Route::get('/gedung_dan_bangunan/edit/{id}/{id_pengadaan}', [ggedung_dan_bangunanController::class, 'edit'])->name('gedung_dan_bangunan.edit');
    Route::get('/jalan_irigasi_dan_jaringan/edit/{id}/{id_pengadaan}', [gjalan_irigasi_dan_jaringanController::class, 'edit'])->name('jalan_irigasi_dan_jaringan.edit');
    Route::get('/aset_tetap_lainnya/edit/{id}/{id_pengadaan}', [gaset_tetap_lainnyaController::class, 'edit'])->name('aset_tetap_lainnya.edit');
    Route::get('/kontruksi_dalam_pengerjaan/edit/{id}/{id_pengadaan}', [gkontruksi_dalam_pengerjaanController::class, 'edit'])->name('kontruksi_dalam_pengerjaan.edit');
    
    Route::delete('/pengadaan/{id}/{id_detail}', [PengadaanController::class, 'destroy'])->name('pengadaan.destroy');

    Route::resource('buku', bukuController::class)->middleware('auth');
});

require __DIR__ . '/auth.php';
