<?php

namespace App\Http\Controllers\Produk;

use Illuminate\Http\Request;
use App\Http\HelperBelanjakuy\ProdukData;

//loadHelper
use App\Http\HelperBelanjakuy\MerekHelper;
use App\Http\HelperBelanjakuy\KategoriHelper;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    //menampilkan halaman pengelolaan produk
    public function index(){

      $kategoris = KategoriHelper::getKategori("all");
      $mereks= MerekHelper::getMerek("all");

      //dd($kategoris);
      
      return view("produk.index",["kategoris"=>$kategoris,"mereks"=>$mereks]);

    }


    public function tambahProduk(Request $req){
        $dataProduk = new ProdukData;

        $dataProduk->namaProduk = $req->nama_produk;
        $dataProduk->hargaSatuan = $req->harga_satuan;
        $dataProduk->satuan = $req->satuan;
        $dataProduk->idKategori = $req->id_kategori;
        $dataProduk->idMerek = $req->id_merek;
        $dataProduk->deskripsi = $req->deskripsi;

        $dataProduk->tambahProduk();
        $dataProduk->tambahDetailProduk();

        //  $ambilProduk = ProdukData::getMtpProduk("satuan","PCS");

        //  dd($ambilProduk);

      
    }

}
