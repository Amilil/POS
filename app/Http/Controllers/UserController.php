<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        // Menghitung jumlah pengguna dari tabel m_user
        $jumlahPengguna = UserModel::count();

        // Mengirim data ke view
        return view('user', ['jumlahPengguna' => $jumlahPengguna]);
    }
}
