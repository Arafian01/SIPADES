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
            'nama_golongan' => 'Tanah',
        ]);
        golongan::create([
            'nama_golongan' => 'Peralatan dan Mesin',
        ]);
        golongan::create([
            'nama_golongan' => 'Gedung dan Bangunan',
        ]);
        golongan::create([
            'nama_golongan' => 'Jalan, Irigasi, dan Jaringan',
        ]);
        golongan::create([
            'nama_golongan' => 'Aset Tetap Lainnya',
        ]);
        golongan::create([
            'nama_golongan' => 'Konstruksi Dalam Pengerjaan',
        ]);
    }
}
