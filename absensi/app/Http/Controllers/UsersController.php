<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $data = [
            "data_role" => Users::orderBy("nama_users", "ASC")->get()
        ];

        return view("/admin/users/data_users", $data);
    }

    public function tambah(Request $request)
    {
        Users::create($request->all());

        return redirect()->back();
    }

    public function hapus(Request $request)
    {
        Users::where("id_role", $request->id_role)->delete();

        return redirect()->back();
    }

    public function edit($id_role)
    {
        $data = [
            "edit" => Users::where("id_role", $id_role)->first(),
            "data_role" => Users::where("id_role", "!=", $id_role)->orderBy("nama_users", "ASC")->get()
        ];

        return view("/admin/users/edit_users", $data);
    }

    public function simpan(Request $request)
    {
        users::where("id_role", $request->id_role)->update([
            "nama_users" => $request->nama_users
        ]);

        return redirect("/admin/users");
    }
}
