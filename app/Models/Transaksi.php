<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['id_transaksi', 'id_anggota', 'id_buku', 'tgl_peminjaman', 'tgl_pengembalian'];
}
