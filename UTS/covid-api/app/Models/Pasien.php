<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';

    protected $fillable = [
        'nama',
        'phone',
        'address',
        'status',
        'in_date_at',
        'out_date_at',
        'timestamp',
    ];
}
