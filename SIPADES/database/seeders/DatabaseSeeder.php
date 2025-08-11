<?php

namespace Database\Seeders;

use App\Models\golongan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // buat 5 data golongan
        golongan::create([
            'nama_golongan' => 'tanah',
        ]);
        golongan::create([
            'nama_golongan' => 'peralatan_dan_mesin',
        ]);
        golongan::create([
            'nama_golongan' => 'gedung_dan_bangunan',
        ]);
        golongan::create([
            'nama_golongan' => 'jalan_irigasi_dan_jaringan',
        ]);
        golongan::create([
            'nama_golongan' => 'aset_tetap_lainnya',
        ]);
        golongan::create([
            'nama_golongan' => 'kontruksi_dalam_pengerjaan',
        ]);
    }
}
