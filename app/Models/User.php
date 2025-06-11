<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'nama',
        'email',
        'password',
        'profile_picture',
        'role', // Ini kolom yang menyimpan kode peran (ADM, USR, dll.)
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Mengembalikan URL gambar profil user.
     */
    public function getProfilePictureUrl()
    {
        return $this->profile_picture
            ? asset('storage/profile/' . $this->profile_picture)
            : asset('images/default-profile.png');
    }

    /**
     * Mengembalikan kode peran pengguna (e.g., 'ADM', 'USR').
     * Method ini dipanggil oleh middleware AuthorizeUser.
     *
     * @return string
     */
    public function getRole(): string
    {
        // Mengambil nilai langsung dari kolom 'role' di tabel users
        return $this->role ?? '';
    }

    /**
     * Menampilkan nama role berdasarkan kode.
     * Method ini berguna untuk tampilan di UI, bukan untuk otorisasi di middleware.
     */
    public function getRoleName()
    {
        $roles = [
            'ADM' => 'Administrator',
            'USR' => 'User',
            // Tambahkan peran lain jika ada (misal: 'MNG' => 'Manager', 'STF' => 'Staff')
        ];

        // Memastikan peran diubah ke uppercase untuk perbandingan yang konsisten
        return $roles[strtoupper($this->role)] ?? 'Tidak Diketahui';
    }
}
