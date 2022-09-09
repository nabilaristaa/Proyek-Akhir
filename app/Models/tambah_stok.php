<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambah_stok extends Model
{
    use HasFactory;

    protected $table = "tambah_stoks";
    protected $primaryKey = "id";
    protected $fillable = ['id','produk_id','stok_tambah',];



    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
