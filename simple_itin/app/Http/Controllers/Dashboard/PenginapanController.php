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

    }

    public function store(Request $request){
        $namaPenginapan = ucwords(trim($request->nama_penginapan));
        $cityId = trim($request->city_id);
        $address = ucfirst(trim($request->address));
        $phone = trim($request->phone);

        $timezone = ucwords(trim($request->timezone));
        $website = strtolower(trim($request->website));
        $company = ucwords(trim($request->company));

        $description = ucfirst(trim($request->description));
        $alt = $company;
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
                "kontak"    => $phone,
                "website"   => $website,
                "deskripsi" => $description,
                "alt"   => $alt,
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
            Session::put("sess_phone", $phone);
            Session::put("sess_website", $website);
            Session::put("sess_company", $company);
            Session::put("sess_desc", $description);

            return back()->with('error','There is no image');
        }
    }

    public function update(Request $request){

    }

    public function destroy(Request $request){

    }
}
