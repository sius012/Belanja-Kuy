<?php

namespace App\Http\HelperBelanjakuy;
 
        
use App\Models\Kategori;
class KategoriHelper {

    public $idKategori;
    public $namaKategori;

    public static function tambahkategori($namaKategori){
        $kategori = new Kategori;
        $kategori->nama_kategori = $namaKategori;

        $kategori->save();

        $newKategori = new KategoriHelper;
        $newKategori->namaKategori = $kategori->nama_kategori;
        $newKategori->idKategori = $kategori->id;

        return $newKategori;
    }

    public static function getKategori($kolom,$isi=null){
        $arr = [];

        if($kolom == "all"){
            $kategoriModel = Kategori::all();
            
            foreach($kategoriModel as $i => $kategoris){
                $kategoriHelper = new KategoriHelper;
                $kategoriHelper->idKategori = $kategoris->id_kategori;
                $kategoriHelper->namaKategori = $kategoris->nama_kategori;

                $arr[$i] = $kategoriHelper;
            }

            return $arr;
        }

        $dataModel = Kategori::where($kolom, $isi)->get()->toArray();

        if(count($dataModel) > 1){
            foreach($dataModel as $i =>$datas){
                $kategori = new KategoriHelper;

                $kategori->idKategori = $datas->id_kategori;
                $kategori->namaKategori = $datas->nama_kategori;

                $arr[$i] = $kategori;
                
            }

            return $arr;
        }else{
            $kategori = new KategoriHelper;

            $kategori->idKategori = $dataModel[0]->id_kategori;
            $kategori->namaKategori = $dataModel[0]->$datas->nama_kategori;

            return $kategori;
        }
    }

    public function hapusKategori(){

    }
    
            
            
}

        
?>