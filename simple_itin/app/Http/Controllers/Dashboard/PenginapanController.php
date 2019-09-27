<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Models\DetailPenginapan;
use App\Http\Models\DetailTag;
use App\Http\Models\JenisPenginapan;
use App\Http\Models\Kota;
use App\Http\Models\Penginapan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use Uuid;
use Illuminate\Support\Str;
use Image;

class PenginapanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $penginapan = Penginapan::orderBy("nama_penginapan", "asc")->get();
        return view("dashboard_admin.main.penginapan.index", compact("penginapan"));
    }

    public function create(){
        $jenisPenginapan = JenisPenginapan::orderBy("nama_jenis_penginapan","asc")->get();
        $kota = Kota::orderBy("nama_kota", "asc")->get();
        return view("dashboard_admin.main.penginapan.add_penginapan", compact("jenisPenginapan", "kota"));
    }

    public function edit($penginapan){
        $jenisPenginapan = JenisPenginapan::orderBy("nama_jenis_penginapan","asc")->get();
        $kota = Kota::orderBy("nama_kota", "asc")->get();
        $editPenginapan = Penginapan::where("penginapan_id", $penginapan)->first();
        return view("dashboard_admin.main.penginapan.edit_penginapan", compact("jenisPenginapan", "kota", "editPenginapan"));
    }

    public function store(Request $request){
        $namaPenginapan = ucwords(trim($request->nama_penginapan));
        $cityId = trim($request->city_id);
        $address = ucfirst(trim($request->address));

        $description = ucfirst(trim($request->description));
        $slug = Str::slug($namaPenginapan);

        if($request->hasFile("image")){
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $txtImage     = $request->file("image");
            $txtImageName = "Thumb-Penginapan".time().'.'.$txtImage->getClientOriginalExtension();

            $destinationPath = public_path('image/penginapan');
            $img = Image::make($txtImage->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$txtImageName);

            $penginapanStore = new Penginapan([
                "penginapan_id" => Uuid::generate()->string,
                "nama_penginapan" => $namaPenginapan,
                "slug"  => $slug,
                "kota_id"   => $cityId,
                "alamat" => $address,
                "deskripsi" => $description,
                "image" => $txtImageName
            ]);

            if($penginapanStore->save()){
                $penginapanLastId = trim($penginapanStore->penginapan_id);
                $txtImage->move($destinationPath, $txtImageName);

                for($i=0;$i<count($request->jenis_penginapan_id);$i++){
                    $detailPenginapan = new DetailPenginapan([
                        "penginapan_id"  => $penginapanLastId,
                        "jenis_penginapan_id"  => $request->jenis_penginapan_id[$i]
                    ]);

                    $detailPenginapan->save();
                }

                Session::pull("sess_nama_penginapan");
                Session::pull("sess_city_id");
                Session::pull("sess_address");
                Session::pull("sess_phone");
                Session::pull("sess_website");
                Session::pull("sess_company");
                Session::pull("sess_desc");

                return back()->with('success','Inn created successfully');
            }else{
                return back()->with('error','Inn failed created');
            }

        }else{
            Session::put("sess_nama_penginapan", $namaPenginapan);
            Session::put("sess_city_id", $cityId);
            Session::put("sess_address", $address);
            Session::put("sess_desc", $description);

            return back()->with('error','There is no image');
        }
    }

    public function update(Request $request)
    {
        $penginapanId = trim($request->penginapan_id);
        $namaPenginapan = ucwords(trim($request->nama_penginapan));
        $cityId = trim($request->city_id);
        $address = ucfirst(trim($request->address));
        $description = ucfirst(trim($request->description));
        $slug = Str::slug($namaPenginapan);

        if($request->hasFile("image")){
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $txtImage     = $request->file("image");
            $txtImageName = "Thumb-".time().'.'.$txtImage->getClientOriginalExtension();

            $destinationPath = public_path('image/wisata');
            $img = Image::make($txtImage->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$txtImageName);

            $updatePenginapan = Penginapan::findOrFail($penginapanId);
            $updatePenginapan->nama_penginapan = $namaPenginapan;
            $updatePenginapan->slug = $slug;
            $updatePenginapan->kota_id = $cityId;
            $updatePenginapan->alamat = $address;
            $updatePenginapan->deskripsi = $description;
            $updatePenginapan->image = $txtImageName;

            if($updatePenginapan->save()){
                $txtImage->move($destinationPath, $txtImageName);
                DetailPenginapan::where("penginapan_id", $penginapanId)->delete();

                for($i=0;$i<count($request->jenis_penginapan_id);$i++){
                    $detailPenginapan = new DetailPenginapan([
                        "penginapan_id"  => $penginapanId,
                        "jenis_penginapan_id"  => $request->jenis_penginapan_id[$i]
                    ]);

                    $detailPenginapan->save();
                }
                return back()->with('success','Inn created successfully');
            }else{
                return back()->with('error','Inn failed created');
            }
        }else{
            $updatePenginapan = Penginapan::findOrFail($penginapanId);
            $updatePenginapan->nama_penginapan = $namaPenginapan;
            $updatePenginapan->slug = $slug;
            $updatePenginapan->kota_id = $cityId;
            $updatePenginapan->alamat = $address;
            $updatePenginapan->deskripsi = $description;

            if($updatePenginapan->save()){
                DetailPenginapan::where("penginapan_id", $penginapanId)->delete();

                for($i=0;$i<count($request->jenis_penginapan_id);$i++){
                    $detailPenginapan = new DetailPenginapan([
                        "penginapan_id"  => $penginapanId,
                        "jenis_penginapan_id"  => $request->jenis_penginapan_id[$i]
                    ]);

                    $detailPenginapan->save();
                }
                return back()->with('success','Inn created successfully');
            }else{
                return back()->with('error','Inn failed created');
            }
        }
    }

    public function destroy(Request $request)
    {
        $penginapanId = trim($request->penginapan_id);

        if(Penginapan::where("penginapan_id", $penginapanId)->delete()){
            DetailPenginapan::where("penginapan_id", $penginapanId)->delete();
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
