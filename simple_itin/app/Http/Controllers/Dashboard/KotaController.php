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

    public function update(Request $request){
        $kotaId = trim($request->kota_id);
        $namaKota = ucfirst(trim($request->nama_kota));

        $updateKota = Kota::findOrFail($kotaId);
        $updateKota->nama_kota = $namaKota;

        if($updateKota->save()){
            return response()->json(
                array(
                    "response"  => "success",
                    "message"   => "City has been updated"
                )
            );
        }else{
            return response()->json(
                array(
                    "response"  => "error",
                    "message"   => "City failed to update"
                )
            );
        }
    }

    public function destroy(Request $request){
        $kotaId = trim($request->id);

        if(Kota::where("kota_id", $kotaId)->delete()){
            return response()->json(
                array(
                    "response"  => "success",
                    "message"   => "Data has been deleted"
                )
            );
        }
        else{
            return response()->json(
                array(
                    "response"  => "error",
                    "message"   => "Data failed to update"
                )
            );
        }
    }
}
