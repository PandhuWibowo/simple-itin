<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Models\JenisPenginapan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Uuid;
class JenisPenginapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accomodationTypes = JenisPenginapan::orderBy("nama_jenis_penginapan","asc")->get();
        return view("dashboard_admin.main.jenis_penginapan.index", compact("accomodationTypes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $namaJenisPenginapan = ucfirst(trim($request->nama_jenis_penginapan));
        $storeJenisPenginapan = new JenisPenginapan([
            "jenis_penginapan_id" => Uuid::generate()->string,
            "nama_jenis_penginapan" => $namaJenisPenginapan
        ]);

        if($storeJenisPenginapan->save()){
            return response()->json(
                array(
                    "response" => "success",
                    "message" => "Data has been saved"
                )
            );
        }else{
            return response()->json(
                array(
                    "response" => "error",
                    "message" => "Data failed to update"
                )
            );
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
    public function update(Request $request)
    {
        $jenisPenginapanId = trim($request->jenis_penginapan_id);
        $namaJenisPenginapanId = ucfirst(trim($request->nama_jenis_penginapan));

        $updateJenisPenginapan = JenisPenginapan::findOrFail($jenisPenginapanId);

        $updateJenisPenginapan->nama_jenis_penginapan = $namaJenisPenginapanId;
        if($updateJenisPenginapan->save()){
            return response()->json(
                array(
                    "response"  => "success",
                    "message"   => "Data has been updated"
                )
            );
        }else{
            return response()->json(
                array(
                    "response" => "error",
                    "message"   => "Data failed to update"
                )
            );
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
        $jenisPenginapanId = trim($request->id);

        if(JenisPenginapan::where("jenis_penginapan_id", $jenisPenginapanId)->delete()){
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
