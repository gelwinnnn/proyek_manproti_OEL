<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoKegiatan extends Model
{
    use HasFactory;

    protected $table = 'foto_kegiatan';

    protected $fillable = [
        'id_kegiatan',
        'path_foto',
    ];

    // Relasi ke tabel Kegiatan
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan');
    }
}
