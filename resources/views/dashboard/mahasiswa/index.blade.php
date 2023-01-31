@extends('dashboard.main')
@section('container')
  <div class="content-header"> 
    <div class="container-fluid" style="margin-top: -4em">
      <div class="col-sm-12">
        <h1 class="m-0">Halaman Mahasiswa</h1>
      </div>
    </div> 
    <div class="card-body">
      @if (session()->has('executed-query'))
        <div class="alert alert-success" role="alert">
            {{ session('executed-query') }}
        </div>
      @endif
      <a href="/dashboard/mahasiswa/create" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama Mahasiswa</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Nomor Telepon</th>
          <th>Agama</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_mahasiswa }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->nomor_telepon }}</td>
                    <td>{{ $item->agama }}</td>
                    <td class="d-flex justify-content-start align-items-start">
                        <a href='/dashboard/mahasiswa/update/{{ $item->id }}' class="btn btn-warning btn-sm">edit</a>
                        <form action="/dashboard/mahasiswa/delete/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm ms-3" type="submit">hapus</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection