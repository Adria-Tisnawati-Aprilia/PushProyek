<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Murid;
use File;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "data_murid" => Murid::all()
        ];

        return view("/admin/murid", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // = SELECT * FROM murid;
        $data = [
        "data_murid" => Murid::all()
     ];

    return view("/admin/murid/addmurid/index", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $simpan = Murid::create($request->all());

        $foto = $request->file("foto_murid");
        $fileName = $foto->getClientOriginalName();
        $request->file("foto_murid")->move("image", $fileName);

        $simpan->foto_murid = $fileName;
        $simpan->save();

        return redirect("/murid")->with("tambah", "Data Berhasil di Tambahkan");
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
    $data = [
        "edit" => Murid::where("id", $id)->first()
    ];

    return view("/admin/murid/edit_pelatih", $data);

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
        $update = Murid::where("id", $request->id)->first();

        $update->nama_murid = $request->nama_murid;
        $update->umur = $request->umur;
        $update->gender_murid = $request->gender_murid;
        $update->no_hp = $request->no_hp;
        $update->alamat_murid = $request->alamat_murid;


        if ($request->file("foto_murid") == "") {

            $update->foto_murid = $update->foto_murid;

        } else {

            File::delete("image/".$update->foto_murid);

            $file = $request->file("foto_murid");
            $fileName = $file->getClientOriginalName();
            $request->file("foto_murid")->move("image", $fileName);
            $update->foto_murid = $fileName;
        }

        $update->update();

        return redirect("/murid")->with("update", "Data Berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Murid::where("id", $id)->first();

        File::delete("image/".$hapus->foto_murid);

        Murid::where("id", $id)->delete();

        return redirect()->back();
    }
}
