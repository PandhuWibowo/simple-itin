<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Models\Kota;
use App\Http\Models\Kuliner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Uuid;
use Illuminate\Support\Str;
use Image;

class KulinerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $kuliner = Kuliner::orderBy("nama_kuliner", "asc")->get();
        return view("dashboard_admin.main.kuliner.index", compact("kuliner"));
    }

    public function create(){
        $kota = Kota::orderBy("nama_kota", "asc")->get();
        return view("dashboard_admin.main.kuliner.add_kuliner", compact("kota"));
    }

    public function edit($kuliner){
        $kota = Kota::orderBy("nama_kota", "asc")->get();
        $editKuliner = Kuliner::where("kuliner_id", $kuliner)->first();
        return view("dashboard_admin.main.kuliner.edit_kuliner", compact("kota", "editKuliner"));
    }

    public function store(Request $request){
        $namaKuliner = ucwords(trim($request->nama_kuliner));
        $cityId = trim($request->city_id);
        $address = ucfirst(trim($request->address));

        $description = ucfirst(trim($request->description));
        $slug = Str::slug($namaKuliner);

        if($request->hasFile("image")){
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $txtImage     = $request->file("image");
            $txtImageName = "Thumb-Culinary".time().'.'.$txtImage->getClientOriginalExtension();

            $destinationPath = public_path('image/kuliner');
            $img = Image::make($txtImage->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$txtImageName);

            $kulinerStore = new Kuliner([
                "kuliner_id" => Uuid::generate()->string,
                "nama_kuliner" => $namaKuliner,
                "slug"  => $slug,
                "kota_id"   => $cityId,
                "alamat" => $address,
                "deskripsi" => $description,
                "image" => $txtImageName
            ]);

            if($kulinerStore->save()){
                $txtImage->move($destinationPath, $txtImageName);

                Session::pull("sess_kuliner");
                Session::pull("sess_city_id");
                Session::pull("sess_address");
                Session::pull("sess_desc");

                return back()->with('success','Culinary created successfully');
            }else{
                return back()->with('error','Culinary failed created');
            }

        }else{
            Session::put("sess_kuliner", $namaKuliner);
            Session::put("sess_city_id", $cityId);
            Session::put("sess_address", $address);
            Session::put("sess_desc", $description);

            return back()->with('error','There is no image');
        }
    }

    public function update(Request $request)
    {
        $kulinerId = trim($request->kuliner_id);
        $namaKuliner = ucwords(trim($request->nama_kuliner));
        $cityId = trim($request->city_id);
        $address = ucfirst(trim($request->address));
        $description = ucfirst(trim($request->description));
        $slug = Str::slug($namaKuliner);

        if($request->hasFile("image")){
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $txtImage     = $request->file("image");
            $txtImageName = "Thumb-".time().'.'.$txtImage->getClientOriginalExtension();

            $destinationPath = public_path('image/kuliner');
            $img = Image::make($txtImage->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$txtImageName);

            $updateKuliner = Kuliner::findOrFail($kulinerId);
            $updateKuliner->nama_kuliner = $namaKuliner;
            $updateKuliner->slug = $slug;
            $updateKuliner->kota_id = $cityId;
            $updateKuliner->alamat = $address;
            $updateKuliner->deskripsi = $description;
            $updateKuliner->image = $txtImageName;

            if($updateKuliner->save()){
                $txtImage->move($destinationPath, $txtImageName);

                return back()->with('success','Tourist Attraction created successfully');
            }else{
                return back()->with('error','Tourist Attraction failed created');
            }
        }else{
            $updateKuliner = Kuliner::findOrFail($kulinerId);
            $updateKuliner->nama_kuliner = $namaKuliner;
            $updateKuliner->slug = $slug;
            $updateKuliner->kota_id = $cityId;
            $updateKuliner->alamat = $address;
            $updateKuliner->deskripsi = $description;

            if($updateKuliner->save()){
                return back()->with('success','Tourist Attraction created successfully');
            }else{
                return back()->with('error','Tourist Attraction failed created');
            }
        }
    }

    public function destroy(Request $request)
    {
        $kulinerId = trim($request->kuliner_id);

        if(Kuliner::where("kuliner_id", $kulinerId)->delete()){
            return response()->json(
                array(
                    "response"  => "success",
                    "message"   => "Data has been removed"
                )
            );
        }else{
            return response()->json(
                array(
                    "response"  => "error",
                    "message"   => "Data failed to remove"
                )
            );
        }
    }
}
