<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    protected $table = 'donasi';

    protected $fillable = [
        'item_donasi',
        'tgl_donasi',
        'jumlah_donasi',
        'keterangan',
    ];

    // Relasi ke tabel Donatur
    public function donatur()
    {
        return $this->belongsTo(Donatur::class, 'id_donatur');
    }
}
