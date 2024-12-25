<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasUuids;
    protected $fillable= [
        'name',
        'description',
        'transfer_proof',
        'transfer_date',
    ];
    
}
