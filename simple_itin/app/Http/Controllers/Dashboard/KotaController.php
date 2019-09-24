<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Models\Kota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $cities = Kota::orderBy("nama_kota","asc")->get();
        return view("dashboard_admin.main.kota.index", compact("cities"));
    }

    public function store(Request $request){

    }
}
