<?php

namespace App\Http\Controllers\Portal;

use App\Http\Models\Kota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $kota = Kota::orderBy("nama_kota", "asc")->get();
        return view("dashboard_admin.main.portal.index", compact("kota"));
    }
}
