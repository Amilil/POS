<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user'; // Pastikan tabel benar

    protected $primaryKey = 'user_id'; // Pastikan primary key benar

    protected $fillable = ['level_id', 'username', 'nama', 'password']; // Tambahkan password di sini
}
