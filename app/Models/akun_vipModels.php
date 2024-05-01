<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akun_vipModels extends Model
{
    protected $table = 'akun_vips';
    protected $fillable = [
        'username', // tambahkan kolom username
        'name',
        'email',
        'password',
        'alamat', // tambahkan kolom alamat
        'no_telepon', // tambahkan kolom no_telepon
        'tanggal_lahir', // tambahkan kolom tanggal_lahir
    ];
}
