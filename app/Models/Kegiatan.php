<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'nama_kegiatan',
        'tgl_kegiatan',
        'deskripsi',
    ];

    // Relasi ke tabel PJKegiatan
    public function pjkegiatan()
    {
        return $this->belongsTo(PJKegiatan::class, 'id_pj');
    }

    // Relasi one-to-many ke tabel FotoKegiatan
    public function fotoKegiatan()
    {
        return $this->hasMany(FotoKegiatan::class, 'id_kegiatan');
    }
}
