<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduk extends Model
{
    use HasFactory;

    protected $table = "detail_produk";   

    protected $fillable = ["kode_produk","deskripsi","gambar","created_at","updated_at"];

    public function produk(){
        return $this->hasOne(Produk::class);
    }
}
