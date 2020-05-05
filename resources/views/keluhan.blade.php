@extends('admin.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Keluhan</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <p class="mb-4">Kumpulan Data Dari Keluhan Yang Telah Dikirim Oleh Warga Ds. Bukur.</p>
    <a href="{{url('/keluhan/export')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Cetak Laporan</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul Keluhan</th>
                <th>Isi Keluhan</th>
                <th>Tempat</th>
                <th>Tanggal Input Keluhan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($keluhan as $data)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->judul}}</td>
                <td>{{$data->isi}}</td>
                <td>{{$data->tempat}}</td>
                <td>{{$data->created_at}}</td>
                <td><form action="{{ url('/keluhan/' . $data -> id) }}" method="POST">
                  @csrf                  
                  <input type="hidden" name="_method" value="DELETE" class="form-control">
                  <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')"><i class="fa fa-trash"></i></button>
                </form>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

@endsection