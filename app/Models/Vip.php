<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vip extends Model
{
    use HasFactory;
    protected $table = 'vip';
    protected $fillable = [
<<<<<<< HEAD
        'undangan',
=======
        'kd_undangan',
>>>>>>> 438ad34 (update)
        'nama',
        'alamat',
        'keperluan',
        'asal_instansi',
        'no_hp',
        'tanggal',
<<<<<<< HEAD
=======
        'departemen',
        'seksi',
        'status',
        'ket',
>>>>>>> 438ad34 (update)
    ];
}
