<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    protected $table = 'donatur';

    protected $fillable = [
        'nama_donatur',
        'notelp_donatur',
    ];
}
