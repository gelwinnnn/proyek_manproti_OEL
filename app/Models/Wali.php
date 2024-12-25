<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    use HasFactory;

    protected $table = 'wali';

    protected $fillable = [
        'nama_wali',
        'alamat',
        'notelp',
        'hubungan',
        'pekerjaan',
    ];

    // Relasi ke tabel Anak
    public function anak()
    {
        return $this->hasMany(Anak::class, 'id_wali');
    }
}
