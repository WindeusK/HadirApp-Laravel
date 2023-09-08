<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = [
        'judul_buku',
        'jumlah',
        'id_peminjam',
        'tanggal_pinjam',
        'batas_pinjam',
        'tanggal_kembali'
    ];

    public $timestamps = false;
}
