@extends('admin.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Akun</h1>
    <p class="mb-4">Mengelola Data Akun Warga Desa Bukur.</p>

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
                <th>Nama</th>
                <th>No Hp</th>
                <th>Jenis Kelamin</th>
                <th>Rt</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($akun as $data)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->no_hp}}</td>
                <td>{{$data->gender}}</td>
                <td>{{$data->alamat}}</td>
                <td><form action="{{ url('/akun/' . $data -> id) }}" method="POST">
                  @csrf                  
                  <input type="hidden" name="_method" value="DELETE" class="form-control">
                  <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')"><i class="fa fa-trash"></i></button>
                </form></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

@endsection