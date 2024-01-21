<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['id_transaksi', 'id_anggota', 'id_buku', 'tgl_peminjaman', 'tgl_pengembalian'];

    protected $casts = [
        'tgl_peminjaman' => 'datetime',
        'tgl_pengembalian' => 'datetime'
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
