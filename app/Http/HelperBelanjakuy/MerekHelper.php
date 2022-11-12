<?php

namespace App\Http\HelperBelanjakuy;

use App\Models\Merek;
 
        
class MerekHelper {

    public $idMerek;
    public $namaMerek;
    
    public static function getMerek($kolom, $isi=null){
        $arr = [];
        

        if($kolom == "all"){
            $merekModel = Merek::all();
            
            foreach($merekModel as $i => $mereks){
                $merekHelper = new MerekHelper;
                $merekHelper->idMerek = $mereks->id_merek;
                $merekHelper->namaMerek = $mereks->nama_merek;

                $arr[$i] = $merekHelper;
            }

            return $arr;
        }
        $merekModel = Merek::where($kolom, $isi)->first();

        $merekHelper = new MerekHelper;

      
        if($isi = null){
            $merekModel = Merek::find($kolom);
        }
        

        
        $merekHelper->idMerek = $merekModel->id_merek;
        $merekHelper->namaMerek = $merekModel->nama_merek;

        return $merekHelper;
    }
    
    public static function tambahMerek($namaMerek){
        $merek = new Merek;
        $merek->nama_merek = $namaMerek;

        $merek->save();

        $newMerek = new MerekHelper;
        $newMerek->namaMerek = $merek->nama_merek;
        $newMerek->idMerek = $merek->id;

        return $newMerek;
    }
    
            
}

        
?>