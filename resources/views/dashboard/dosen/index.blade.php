@extends('dashboard.main')
@section('container')
  <div class="content-header"> 
    <div class="container-fluid" style="margin-top: -4em">
      <div class="col-sm-12">
        <h1 class="m-0">Halaman Dosen</h1>
      </div>
    </div> 
    <div class="card-body">
      @if (session()->has('create-success'))
        <div class="alert alert-success" role="alert">
            {{ session('create-success') }}
        </div>
      @endif
      <a href="/dashboard/dosen/create" class="btn btn-primary mb-3">Tambah Dosen</a>
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Nomor Telepon</th>
          <th>Email</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_dosen }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->nomor_telepon }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <a href='/dashboard/dosen/update/{{ $item->id }}' class="btn btn-warning btn-sm">edit</a>
                        <form action="/dashboard/dosen/delete/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">hapus</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection