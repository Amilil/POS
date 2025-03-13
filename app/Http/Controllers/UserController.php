<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Membuat user baru dengan data awal
        $user = UserModel::create([
            'username' => 'manager11',
            'nama' => 'Manager11',
            'password' => Hash::make('12345'),
            'level_id' => 2,
        ]);

        // Mengubah username user
        $user->username = 'manager12';

        // Menyimpan perubahan ke database
        $user->save();

        // Mengecek apakah ada perubahan setelah penyimpanan
        $wasChangedOverall = $user->wasChanged(); // true
        $wasChangedUsername = $user->wasChanged('username'); // true
        $wasChangedMultiple = $user->wasChanged(['username', 'level_id']); // true
        $wasChangedNama = $user->wasChanged('nama'); // false
        $wasChangedNamaUsername = $user->wasChanged(['nama', 'username']); // true

        // Debugging dengan dd()
        dd($wasChangedNamaUsername);
    }
}
