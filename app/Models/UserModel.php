<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user'; // Pastikan tabel benar

    protected $primaryKey = 'user_id'; // Pastikan primary key benar

    protected $fillable = ['level_id', 'username', 'nama', 'password']; // Tambahkan password di sini\

    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
}
