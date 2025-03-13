<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        // $data = [
        //     'Kategori_kode' => 'SNK',
        //     'Kategori_nama' => 'Snack/Makanan Ringan',
        //     'created_at' => now()
        // ];
        // DB::table('m_kategori')->insert($data);
        // return 'Insert data baru berhasil';

        
        // $row = DB::table('m_kategori')->where('Kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
        // return 'Insert data berhasil. Jumlah data yang ditambahkan: ' . $row . ' baris'; 
        
        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row. ' baris';

        $data = DB::table('m_kategori')->get();
        return view('kategori', ['data' => $data]);
    }
}
