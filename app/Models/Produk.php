<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = "produks";
    protected $primaryKey = "id";
    protected $fillable = ['id','penjual_id','gambar','nama','harga','satuan','stok','jenis','deskripsi',];

    public function penjual()
    {
        return $this->belongsTo(user_penjual::class);
    }

    public function cekout()
    {
        return $this->hasMany(cekout::class);
    }

    public function tambah_stok()
    {
        return $this->hasMany(tambah_stok::class);
    }
}
