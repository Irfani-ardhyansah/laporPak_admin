<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lapra;
use File;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $laporan = Lapra::all();
        return view('laporan', compact('laporan'));
    }

    public function hapus($id)
    {
        $gambar = Lapra::where('id',$id)->first();
		File::delete('uploads/'.$gambar->judul.'.jpg');

        $laporan = Lapra::find($id);
        $laporan -> delete();
        alert()->error('Success','Laporan Berhasil Dihapus!');
        return redirect('laporan');
    }
}
