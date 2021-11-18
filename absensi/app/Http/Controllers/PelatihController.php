<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatih;
use File;

class PelatihController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // = SELECT * FROM pelatih;
        $data = [
            "data_pelatih" => Pelatih::all()
        ];

        return view("/admin/index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // = SELECT * FROM pelatih;
        $data = [
        "data_pelatih" => Pelatih::all()
    ];

    return view("/admin/pelatih/addpelatih/index", $data);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $simpan = Pelatih::create($request->all());

        $foto = $request->file("foto_pelatih");
        $fileName = $foto->getClientOriginalName();
        $request->file("foto_pelatih")->move("image", $fileName);

        $simpan->foto_pelatih = $fileName;
        $simpan->save();

        return redirect("/pelatih")->with("tambah", "Data Berhasil di Tambahkan");
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
            "edit" => Pelatih::where("id", $id)->first()
        ];

        return view("/admin/pelatih/edit_pelatih", $data);

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
        $update = Pelatih::where("id", $request->id)->first();

        $update->nama_pelatih = $request->nama_pelatih;
        $update->jenis_tari = $request->jenis_tari;
        $update->no_hp = $request->no_hp;
        $update->alamat_pelatih = $request->alamat_pelatih;
        $update->gender_pelatih = $request->gender_pelatih;

        if ($request->file("foto_pelatih") == "") {

            $update->foto_pelatih = $update->foto_pelatih;

        } else {

            File::delete("image/".$update->foto_pelatih);

            $file = $request->file("foto_pelatih");
            $fileName = $file->getClientOriginalName();
            $request->file("foto_pelatih")->move("image", $fileName);
            $update->foto_pelatih = $fileName;
        }

        $update->update();

        return redirect("/pelatih")->with("update", "Data Berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Pelatih::where("id", $id)->first();

        File::delete("image/".$hapus->foto_pelatih);

        Pelatih::where("id", $id)->delete();

        return redirect()->back();
    }
}
