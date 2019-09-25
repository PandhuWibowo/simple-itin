<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Models\Kota;
use App\Http\Models\ObjekWisata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Tag;
use Session;
use Uuid;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Image;
class ObjekWisataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objekWisata = ObjekWisata::orderBy("nama_wisata")->get();
        return view("dashboard_admin.main.objek_wisata.index", compact("objekWisata"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = Kota::orderBy("nama_kota", "asc")->get();
        $tag = Tag::orderBy("nama_tag", "asc")->get();
        return view("dashboard_admin.main.objek_wisata.add_objek_wisata", compact("kota", "tag"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $namaWisata = ucwords(trim($request->nama_wisata));
        $cityId = trim($request->city_id);
        $address = ucfirst(trim($request->address));
        $phone = trim($request->phone);
        $officeHours = trim($request->office_hours);
        $changeformatMysqlTime = Carbon::createFromFormat('h:i A', $officeHours);
        $finalFormatTime = $changeformatMysqlTime->format("H:i:s");

        $timezone = ucwords(trim($request->timezone));
        $website = strtolower(trim($request->website));
        $company = ucwords(trim($request->company));

        $description = ucfirst(trim($request->description));
        $alt = $company;
        $slug = Str::slug($namaWisata);

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

            $wisataStore = new ObjekWisata([
                "wisata_id" => Uuid::generate()->string,
                "nama_wisata" => $namaWisata,
                "slug"  => $slug,
                "kota_id"   => $cityId,
                "alamat" => $address,
                "kontak"    => $phone,
                "waktu_operasional" => $finalFormatTime,
                "waktu_bagian"  => $timezone,
                "website"   => $website,
                "deskripsi" => $description,
                "alt"   => $alt,
                "image" => $txtImageName
            ]);

            if($wisataStore->save()){
                $txtImage->move($destinationPath, $txtImageName);

//                for($i=0;$i<count($request->tag_id);$i++){
//                    $tag = new Tag([
//                        "tag_id"    => Uuid::generate()->string,
//                        "wisata_id"    => $postLastId,
//                        "nama_tag"  => $request->tag_id[$i]
//                    ]);
//
//                    $tag->save();
//                }

                Session::pull("sess_nama_wisata");
                Session::pull("sess_city_id");
                Session::pull("sess_address");
                Session::pull("sess_phone");
                Session::pull("sess_office_hours");
                Session::pull("sess_timezone");
                Session::pull("sess_website");
                Session::pull("sess_company");
                Session::pull("sess_desc");

                return back()->with('success','Tourist Attraction created successfully');
            }else{
                return back()->with('error','Tourist Attraction failed created');
            }


        }else{
            Session::put("sess_nama_wisata", $namaWisata);
            Session::put("sess_city_id", $cityId);
            Session::put("sess_address", $address);
            Session::put("sess_phone", $phone);
            Session::put("sess_office_hours", $officeHours);
            Session::put("sess_timezone", $timezone);
            Session::put("sess_website", $website);
            Session::put("sess_company", $company);
            Session::put("sess_desc", $description);

            return back()->with('error','There is no image');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
