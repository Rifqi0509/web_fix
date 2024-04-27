<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $table = 'tamu';
    protected $fillable = ['nama', 'alamat', 'keperluan', 'asal_instansi', 'no_hp', 'tanggal', 'tanda_tangan'];
}
