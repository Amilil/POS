<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'kategori_id'  => 1,
                'barang_kode'  => 'ELE001',
                'barang_nama'  => 'Laptop',
                'harga_beli'   => 8000000,
                'harga_jual'   => 10000000,
            ],
            [
                'kategori_id'  => 1,
                'barang_kode'  => 'ELE002',
                'barang_nama'  => 'Smartphone',
                'harga_beli'   => 4000000,
                'harga_jual'   => 5000000,
            ],
            [
                'kategori_id'  => 2,
                'barang_kode'  => 'PAK001',
                'barang_nama'  => 'Kaos',
                'harga_beli'   => 80000,
                'harga_jual'   => 100000,
            ],
            [
                'kategori_id'  => 2,
                'barang_kode'  => 'PAK002',
                'barang_nama'  => 'Celana Jeans',
                'harga_beli'   => 150000,
                'harga_jual'   => 200000,
            ],
            [
                'kategori_id'  => 3,
                'barang_kode'  => 'MAK001',
                'barang_nama'  => 'Roti',
                'harga_beli'   => 20000,
                'harga_jual'   => 25000,
            ],
            [
                'kategori_id'  => 3,
                'barang_kode'  => 'MAK002',
                'barang_nama'  => 'Nasi Goreng',
                'harga_beli'   => 30000,
                'harga_jual'   => 35000,
            ],
            [
                'kategori_id'  => 4,
                'barang_kode'  => 'MIN001',
                'barang_nama'  => 'Kopi',
                'harga_beli'   => 10000,
                'harga_jual'   => 15000,
            ],
            [
                'kategori_id'  => 4,
                'barang_kode'  => 'MIN002',
                'barang_nama'  => 'Teh',
                'harga_beli'   => 8000,
                'harga_jual'   => 12000,
            ],
            [
                'kategori_id'  => 5,
                'barang_kode'  => 'PER001',
                'barang_nama'  => 'Meja',
                'harga_beli'   => 400000,
                'harga_jual'   => 500000,
            ],
            [
                'kategori_id'  => 5,
                'barang_kode'  => 'PER002',
                'barang_nama'  => 'Kursi',
                'harga_beli'   => 250000,
                'harga_jual'   => 300000,
            ],
        ];

        DB::table('m_barang')->insert($data);
    }
}
