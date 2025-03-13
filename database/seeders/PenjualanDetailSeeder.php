<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua penjualan yang sudah ada
        $penjualan = DB::table('t_penjualan')->pluck('penjualan_id')->toArray();
        // Ambil semua barang yang sudah ada
        $barang = DB::table('m_barang')->select('barang_id', 'harga_jual')->get();

        $data = [];

        foreach ($penjualan as $pj) {
            // Setiap transaksi memiliki 3 item (sesuai dengan request kamu)
            $selectedBarang = $barang->random(3);

            foreach ($selectedBarang as $b) {
                $data[] = [
                    'penjualan_id' => $pj,
                    'barang_id'    => $b->barang_id,
                    'harga'        => $b->harga_jual,
                    'jumlah'       => rand(1, 5), // Jumlah antara 1 - 5
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ];
            }
        }

        DB::table('t_penjualan_detail')->insert($data);
    }
}
