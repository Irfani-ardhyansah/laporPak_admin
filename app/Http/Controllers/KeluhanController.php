<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keluhan;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\KeluhanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

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

    public function export()
    {
        return Excel::download(new KeluhanExport, 'keluhan.xlsx');
    }

    public function hapus($id)
    {
        $keluhan = Keluhan::find($id);
        $keluhan -> delete();
        alert()->error('Success','Keluhan Berhasil Dihapus!');
        return redirect('keluhan');
    }
}
