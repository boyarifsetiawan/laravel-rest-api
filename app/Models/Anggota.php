<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = ['id_anggota', 'nama', 'jenis_kelamin', 'alamat', 'status'];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
