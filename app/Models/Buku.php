<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
