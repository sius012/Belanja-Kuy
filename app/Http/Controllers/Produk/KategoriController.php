<?php

namespace App\Http\Controllers\Produk;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\HelperBelanjakuy\KategoriHelper;
use App\Http\HelperBelanjakuy\MerekHelper;

class KategoriController extends Controller
{
    public function index(){
        
       
        return view("kategori.index");
    }

    public function tambahKategori(Request $req){
        //menambahkan kategori melalui helper;
        $kategoriBaru = KategoriHelper::tambahKategori($req->nama_kategori);
        return redirect()->back();
    }


}
