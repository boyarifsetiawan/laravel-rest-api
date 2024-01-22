<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['id_transaksi', 'anggota_id', 'buku_id', 'tgl_peminjaman', 'tgl_pengembalian'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'buku_id');
    }
}
