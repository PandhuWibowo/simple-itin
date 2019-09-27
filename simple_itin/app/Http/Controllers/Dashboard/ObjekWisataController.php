<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Models\DetailTag;
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
        $objekWisata = ObjekWisata::orderBy("nama_wisata", "asc")->get();
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
        $tag = Tag::orderBy("nama_tag", "asc")->distinct()->get(['nama_tag']);
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
                $wisataLastId = trim($wisataStore->wisata_id);
                $txtImage->move($destinationPath, $txtImageName);

                for($i=0;$i<count($request->tag_id);$i++){
//                    $tag = new DetailTag([
//                        "tag_id"    => $request->tag_id[$i],
//                        "wisata_id"    => $wisataLastId,
//                    ]);

//                    $tag->save();
                    $checkTag = Tag::where("nama_tag", $request->tag_id[$i])->get()->count();
                    if($checkTag == 0 || $checkTag == "0"){
                        $tags = new Tag([
                            "tag_id"    => Uuid::generate()->string,
                            "nama_tag" => $request->tag_id[$i]
                        ]);

                        if($tags->save()){
                            $tagLastId = trim($tags->tag_id);

                            $detailTagStore = new DetailTag([
                                "tag_id"  => $tagLastId,
                                "wisata_id"  => $wisataLastId
                            ]);

                            $detailTagStore->save();
                        }
                    }else{
                        $tagTaken = Tag::select("tag_id")->where("nama_tag", $request->tag_id[$i])->first();
                        $detailTagStore = new DetailTag([
                            "tag_id"  => $tagTaken->tag_id,
                            "wisata_id"  => $wisataLastId
                        ]);

                        $detailTagStore->save();
                    }
                }

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
    public function edit($objek_wisata)
    {
        $kota = Kota::orderBy("nama_kota", "asc")->get();
        $tag = Tag::orderBy("nama_tag", "asc")->distinct()->get(['nama_tag']);
        $editWisata = ObjekWisata::where("wisata_id", $objek_wisata)->first();
        return view("dashboard_admin.main.objek_wisata.edit_objek_wisata", compact("kota", "tag", "editWisata"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
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

        $wisataId = trim($request->wisata_id);
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
            $updateWisata = ObjekWisata::findOrFail($wisataId);
            $updateWisata->nama_wisata = $namaWisata;
            $updateWisata->slug = $slug;
            $updateWisata->kota_id = $cityId;
            $updateWisata->alamat = $address;
            $updateWisata->kontak = $phone;
            $updateWisata->waktu_operasional = $finalFormatTime;
            $updateWisata->waktu_bagian = $timezone;
            $updateWisata->website = $website;
            $updateWisata->deskripsi = $description;
            $updateWisata->alt = $company;
            $updateWisata->image = $txtImageName;

            if($updateWisata->save()){
                $txtImage->move($destinationPath, $txtImageName);
                $deleteTag = DetailTag::where("wisata_id", $wisataId)->delete();

                for($i=0;$i<count($request->tag_id);$i++){
                    $checkTag = Tag::where("nama_tag", $request->tag_id[$i])->get()->count();
                    if($checkTag == 0 || $checkTag == "0"){
                        $tags = new Tag([
                            "tag_id"    => Uuid::generate()->string,
                            "nama_tag" => $request->tag_id[$i]
                        ]);

                        if($tags->save()){
                            $tagLastId = trim($tags->tag_id);

                            $detailTagStore = new DetailTag([
                                "tag_id"  => $tagLastId,
                                "wisata_id"  => $wisataId
                            ]);

                            $detailTagStore->save();
                        }
                    }else{
                        $tagTaken = Tag::select("tag_id")->where("nama_tag", $request->tag_id[$i])->first();
                        $detailTagStore = new DetailTag([
                            "tag_id"  => $tagTaken->tag_id,
                            "wisata_id"  => $wisataId
                        ]);

                        $detailTagStore->save();
                    }
                }
                return back()->with('success','Tourist Attraction created successfully');
            }else{
                return back()->with('error','Tourist Attraction failed created');
            }
        }else{
            $updateWisata = ObjekWisata::findOrFail($wisataId);
            $updateWisata->nama_wisata = $namaWisata;
            $updateWisata->slug = $slug;
            $updateWisata->kota_id = $cityId;
            $updateWisata->alamat = $address;
            $updateWisata->kontak = $phone;
            $updateWisata->waktu_operasional = $finalFormatTime;
            $updateWisata->waktu_bagian = $timezone;
            $updateWisata->website = $website;
            $updateWisata->deskripsi = $description;
            $updateWisata->alt = $company;

            if($updateWisata->save()){
                $deleteTag = DetailTag::where("wisata_id", $wisataId)->delete();

                for($i=0;$i<count($request->tag_id);$i++){
                    $checkTag = Tag::where("nama_tag", $request->tag_id[$i])->get()->count();
                    if($checkTag == 0 || $checkTag == "0"){
                        $tags = new Tag([
                            "tag_id"    => Uuid::generate()->string,
                            "nama_tag" => $request->tag_id[$i]
                        ]);

                        if($tags->save()){
                            $tagLastId = trim($tags->tag_id);

                            $detailTagStore = new DetailTag([
                                "tag_id"  => $tagLastId,
                                "wisata_id"  => $wisataId
                            ]);

                            $detailTagStore->save();
                        }
                    }else{
                        $tagTaken = Tag::select("tag_id")->where("nama_tag", $request->tag_id[$i])->first();
                        $detailTagStore = new DetailTag([
                            "tag_id"  => $tagTaken->tag_id,
                            "wisata_id"  => $wisataId
                        ]);

                        $detailTagStore->save();
                    }
                }
                return back()->with('success','Tourist Attraction created successfully');
            }else{
                return back()->with('error','Tourist Attraction failed created');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $wisataId = trim($request->wisata_id);

        if(ObjekWisata::where("wisata_id", $wisataId)->delete()){
            DetailTag::where("wisata_id", $wisataId)->delete();
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
