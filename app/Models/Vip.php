<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vip extends Model
{
    use HasFactory;
    protected $table = 'vip';
    protected $fillable = [
        'kd_undangan',
        'nama',
        'alamat',
        'asal_instansi',
        'no_hp',
        'keperluan',
        'departemen',
        'seksi',
        'tanggal',
        'status',
        'ket',
        'jam',
        'tanda_tangan',
    ];
}