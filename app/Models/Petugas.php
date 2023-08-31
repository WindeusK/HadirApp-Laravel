<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $fillable = [
        'nama',
        'nuptk',
        'no_telp'
    ];

    public $timestamps = false;
}