<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keluhan;
use RealRashid\SweetAlert\Facades\Alert;

class KeluhanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $keluhan = Keluhan::get();
        return view('keluhan', compact('keluhan'));
    }

    public function hapus($id)
    {
        $keluhan = Keluhan::find($id);
        $keluhan -> delete();
        alert()->error('Success','Keluhan Berhasil Dihapus!');
        return redirect('keluhan');
    }
}
