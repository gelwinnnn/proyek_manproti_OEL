<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengasuh extends Model
{
    use HasFactory;

    protected $table = 'pengasuh';

    protected $fillable = [
        'nama',
        'alamat',
        'no_telepon',
        'tgl_masuk',
        'pekerjaan_pengasuh',
    ];
}
