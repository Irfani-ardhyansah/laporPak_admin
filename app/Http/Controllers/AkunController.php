<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use App\Lapra;
use App\Keluhan;

class AkunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $akun = Akun::all();
        $laporan = Lapra::all();
        $keluhan = Keluhan::all();
        return view('dashboard', compact('akun', 'laporan', 'keluhan'));
    }

    public function index() 
    {
        $akun = Akun::get();
        return view('akun', compact('akun'));
    }

    public function hapus($id)
    {
        $akun = Akun::find($id);
        $akun -> delete();
        alert()->error('Success','Akun Berhasil Dihapus!');
        return redirect('akun');
    }
}
