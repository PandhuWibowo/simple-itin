<?php

namespace App\Http\Controllers\Portal;

use App\Http\Models\Kota;
use App\Http\Models\ObjekWisata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $kota = Kota::orderBy("nama_kota", "asc")->paginate(9);
        return view("dashboard_admin.main.portal.index", compact("kota"));
    }

    public function tempatKota($kota){
        $checkKotaId = Kota::select("kota_id")->where("nama_kota", $kota)->first();
        $objekWisata = ObjekWisata::where("kota_id", $checkKotaId->kota_id)->paginate(12);

        return view("dashboard_admin.main.portal.kategori_kota", compact("objekWisata","kota"));
    }

    public function objekWisata($objek_wisata){
        $objekWisata = ObjekWisata::where("slug", $objek_wisata)->first();
        return view("dashboard_admin.main.portal.objek_wisata", compact("objekWisata"));
    }
}
