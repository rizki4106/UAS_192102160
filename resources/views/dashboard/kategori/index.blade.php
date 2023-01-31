@extends('dashboard.main')
@section('container')
  <div class="content-header"> 
    <div class="container-fluid" style="margin-top: -4em">
      <div class="col-sm-12">
        <h1 class="m-0">Halaman Kategori</h1>
      </div>
    </div> 
    <div class="card-body">
      @if (session()->has('sukses'))
        <div class="alert alert-success" role="alert">
            {{ session('sukses') }}
        </div>
      @endif
      <a href="/dashboard/kategori/create" class="btn btn-primary mb-3">Tambah Data</a>
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama Kategori</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($kategori as $kategori)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $kategori->nama }}</td>
            <td>
              <a href="/dashboard/kategori/{{ $kategori->slug }}/edit" class="btn btn-warning">Edit</a>
              <form action="/dashboard/kategori/{{ $kategori->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('yakin akan menghapus data?')">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection