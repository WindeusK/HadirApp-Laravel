<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Buku extends Model
{
    protected $fillable = [
        'judul',
        'isbn',
        'jumlah',
        'penulis',
        'sinopsis'
    ];
    public $timestamps = false;
}
