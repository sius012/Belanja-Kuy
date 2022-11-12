<?php

namespace App\Http\Controllers\Produk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


//load Helper
use App\Http\HelperBelanjakuy\MerekHelper;


class MerekController extends Controller
{
    public function index(){
        return view("merek.index");
    }

    public function tambahmerek(Request $req){
        $merekBaru = MerekHelper::tambahMerek($req->nama_merek);
        return redirect()->back();
    }
}
