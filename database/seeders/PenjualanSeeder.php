<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'user_id'           => rand(1, 3), // Sesuaikan dengan jumlah user yang ada di `m_user`
                'pembeli'           => 'Pembeli ' . $i,
                'penjualan_kode'    => 'PJ-' . Str::upper(Str::random(8)), // Kode unik
                'penjualan_tanggal' => Carbon::now()->subDays(rand(1, 30)), // Acak dalam 30 hari terakhir
                'created_at'        => now(),
                'updated_at'        => now(),
            ];
        }

        DB::table('t_penjualan')->insert($data);
    }
}
