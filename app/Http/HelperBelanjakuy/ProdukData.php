<?php
namespace App\Http\HelperBelanjakuy;

use App\Models\Produk;
use App\Models\DetailProduk;
class ProdukData {

    //datautama
    public $namaProduk;
    public $kodeProduk;
    public $hargaSatuan;
    public $satuan;
    public $idKategori;
    public $idMerek;

    public $namaMerek = null;
    public $namaKategori = null;

    //datadetail

    public $deskripsi;
    public $gambar = null;


    public function tambahProduk(){

        $produk = new Produk;

        //FORMATKODE PRODUK (k-m-u);

        
        //count produk berdasarkan merek dan kategori
        $count = Produk::where("id_merek",$this->idMerek)->where("id_kategori", $this->idKategori)->count();
        $kodeProduk = date("y"). str_pad($this->idKategori,3,"0",STR_PAD_LEFT).str_pad($this->idMerek,3,"0",STR_PAD_LEFT).str_pad($count+1,3,"0",STR_PAD_LEFT);

        $this->kodeProduk = $kodeProduk;
        $produk->nama_produk = $this->namaProduk;
        $produk->kode_produk = $kodeProduk;
        $produk->harga_satuan = $this->hargaSatuan;
        $produk->satuan = $this->satuan;
        $produk->id_kategori = $this->idKategori;
        $produk->id_merek = $this->idMerek;

        $produk->save();

        
    }

    public function tambahDetailProduk(){

        $produkDetail = new DetailProduk;


        $produkDetail->kode_produk = $this->kodeProduk;
        $produkDetail->deskripsi = $this->deskripsi;
        $produkDetail->gambar = $this->gambar == null ? "produk-default-img.png" : $this->gambar;


        $produkDetail->save();

        
    }

    public static function getSglProduk($kode_produk){
        $produkData = new ProdukData;
        $datas = Produk::where("kode_produk", $kode_produk)->first();
    
        
            $produkData->namaProduk = $datas->kode_produk;
            $produkData->kodeProduk = $datas->nama_produk;
            $produkData->hargaSatuan = $datas->harga_satuan;
            $produkData->satuan = $datas->satuan;
            $produkData->idKategori = $datas->id_kategori;
            $produkData->idMerek = $datas->id_merek;

            //mengisi nama merek
            $produkData->namaMerek = $datas->merek->nama_merek;
            $produkData->namaKategori = $datas->kategori->nama_kategori;
        

        return $produkData;
    }

    public static function getMtpProduk($array, $val2 = null){
      $produkArray = [];

      $dataProduk = new Produk;

      //mendapatkan produk berdasarkan satu query atau lebih
      switch (gettype($array)) {

        //jika berdasarkan satu query
        case 'string':
            $dataProduk = $dataProduk->where($array,$val2);
            break;
        //jika berdasarkan banyak query
        case 'array':
            foreach ($array as $query){
                if(isset($query["type"])){
                    $param = $query;
                    switch ($query["type"]) {
                        case "or":
                           


                            unset($param["type"]);
                            if(count($param) == 3){
                                $dataProduk = $dataProduk->orWhere($param[0],$param[1],$param[2]);
                            }else{
                                $dataProduk = $dataProduk->orWhere($param[0],$param[1]);
                            }
                           
                            break;

                        case "whereNotIn":
                            
                            unset($param["type"]);
                
                            $dataProduk =$dataProduk->whereNotIn($param[0],$param[1]);
                
                           
                            break;

                         case "whereIn":
                            
                            unset($param["type"]);
                            $dataProduk =   $dataProduk->whereIn($param[0],$param[1]);
                           
                            break;
                        
                        
                        default:
                            # code...
                            break;
                    }
                }else{
                    if(count($query) == 3){
                        $dataProduk =$dataProduk->where($param[0],$param[1],$param[2]);
                    }else{
                        $dataProduk = $dataProduk->Where($param[0],$param[1]);
                    }
                }
                      
            }
        
        default:
            # code...
            break;
      }

      
      
        
      //mengisiProdukArray;
      foreach ($dataProduk->get() as $i => $dps) {
        $produkSingle = new ProdukData;

        $produkSingle->namaProduk = $dps->kode_produk;
        $produkSingle->kodeProduk = $dps->nama_produk;
        $produkSingle->hargaSatuan = $dps->harga_satuan;
        $produkSingle->satuan = $dps->satuan;
        $produkSingle->idKategori = $dps->id_kategori;
        $produkSingle->idMerek = $dps->id_merek;

        $produkArray[$i] = $produkSingle;
      }
            
        

        return $produkArray;
    }

    public function hapusProduk(){
        //menghapusProduk

        Produk::find($this->kodeProduk)->delete();

    }
}