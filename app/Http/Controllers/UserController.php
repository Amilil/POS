<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function tambah_simpan(Request $request){
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id
        ]);
        return redirect ('/user');
    }
    public function index()
    {
        // Tambahkan beberapa data user jika belum ada
        $user = UserModel::with('level')->get();
        return view('user', ['data' => $user]);
    
        // Ambil semua data dari tabel
        $user = UserModel::all();

        return view('user', ['data' => $user]);
    }
    public function tambah()
    {
        return view('user_tambah');
    }

    public function ubah ($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }
    public function ubah_simpan($id, Request $request){
        $user = UserModel::find($id);
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->level_id = $request->level_id;

        $user->save();
        return redirect('/user');
    }
    
}
