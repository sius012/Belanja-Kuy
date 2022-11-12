<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Model\DetailProduk;
use App\Model\Kategori;
use App\Model\Merek;

class Produk extends Model
{
    use HasFactory;

    protected $table = "produks";

    protected $fillable = ["kode_produk","nama_produk","harga_satuan","satuan","id_kategori","created_at","updated_at"];

    public function detail(){
        return $this->hasOne(DetailProduk::class, "kode_produk");
    }

    public function merek(){
        return $this->hasOne(Merek::class, "id_merek");
    }

    public function kategori(){
        return $this->hasOne(Kategori::class, "id_kategori");
    }
}
