<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Models\Kota;
use App\Http\Models\ObjekWisata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Tag;
use Uuid;
use Carbon\Carbon;
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

        echo $finalFormatTime;
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
