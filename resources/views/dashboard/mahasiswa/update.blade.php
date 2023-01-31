@extends('dashboard.main')
@section('container')
    <div class="card-body" style="margin-top: -4em">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update mahasiswa</h3>
            </div>
            <form method="POST" action="/dashboard/mahasiswa/edit/{{ $data->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" value="{{ $data->nama_mahasiswa }}" class="form-control @error ('nama') is-invalid @enderror" id="nama" name="nama_mahasiswa" placeholder="Nama mahasiswa">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Jenis Kelamin</label>
                    <select class="custom-select rounded-0" id="kategori_id" name="jenis_kelamin">
                        <option selected>laki laki</option>
                        <option>perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="foto">Alamat</label>
                    <textarea name='alamat' class="form-control @error ('alamat') is-invalid @enderror" placeholder="Masukan alamat">{{ $data->alamat }}</textarea>
                    @error('alamat')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nomor-telepon">Nomor Telepon</label>
                    <input value="{{ $data->nomor_telepon }}" type="text" class="form-control @error ('nomor-telepon') is-invalid @enderror" id="nomor-telepon" name="nomor_telepon" placeholder="Nomor Telepon mahasiswa">
                    @error('nomor-telepon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <input value="{{ $data->agama }}" type="agama" class="form-control @error ('agama') is-invalid @enderror" id="agama" name="agama" placeholder="agama mahasiswa">
                    @error('agama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
    <script>
        const judul_berita = document.querySelector('#judul_berita');
        const slug = document.querySelector('#slug');
        judul_berita.addEventListener('change', function(){
            fetch('/dashboard/berita/checkSlug?judul_berita='+judul_berita.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        })
    </script>
@endsection