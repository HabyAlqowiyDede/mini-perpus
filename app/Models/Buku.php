<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
   
    protected $fillable = [
        'judul',
        'genre',
        'pengarang',
        'penerbit',
        'stok',
        'status'
    ];

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
