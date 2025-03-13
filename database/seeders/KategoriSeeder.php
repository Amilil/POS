<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kategori_kode' => 'ELEC', 'kategori_nama' => 'Elektronik'],
            ['kategori_kode' => 'PAKA', 'kategori_nama' => 'Pakaian'],
            ['kategori_kode' => 'MAKA', 'kategori_nama' => 'Makanan'],
            ['kategori_kode' => 'MINU', 'kategori_nama' => 'Minuman'],
            ['kategori_kode' => 'PERA', 'kategori_nama' => 'Perabotan'],
        ];

        foreach ($data as $kategori) {
            DB::table('m_kategori')->updateOrInsert(
                ['kategori_kode' => $kategori['kategori_kode']], // Cek berdasarkan kode kategori
                $kategori // Insert atau update data
            );
        }
    }
}
