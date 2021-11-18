<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class formController extends Controller
{
    public function form()
    {
        return view('add_barang');
    }
    public function postData(Request $request)
    {
        $data = [
            'nama'          =>  $request->input('nama'),
            'no_pengenal'   =>  $request->input('number'),
            'keterangan'    =>  $request->input(''),

        ];
        dd($data);
    }
}
