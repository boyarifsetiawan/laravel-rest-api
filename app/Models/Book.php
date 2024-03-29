<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['id_buku', 'judul_buku', 'kategori', 'pengarang', 'penerbit'];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
