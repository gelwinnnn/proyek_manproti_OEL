<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PJKegiatan extends Model
{
    protected $table = 'pj_kegiatan';

    protected $fillable = [
        'nama_pj',
        'notelp_pj',
    ];
}
