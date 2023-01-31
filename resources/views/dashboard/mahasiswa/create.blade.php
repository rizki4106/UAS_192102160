@extends('dashboard.main')
@section('container')
    <div class="card-body" style="margin-top: -4em">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Mahasiswa</h3>
            </div>
            <form method="POST" action="/dashboard/mahasiswa/post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error ('nama') is-invalid @enderror" id="nama" name="nama_mahasiswa" placeholder="Nama Mahasiswa">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Jenis Kelamin</label>
                    <select class="custom-select rounded-0" id="kategori_id" name="jenis_kelamin">
                        <option>laki laki</option>
                        <option>perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="foto">Alamat</label>
                    <textarea name='alamat' class="form-control @error ('alamat') is-invalid @enderror" placeholder="Masukan alamat"></textarea>
                    @error('alamat')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nomor-telepon">Nomor Telepon</label>
                    <input type="text" class="form-control @error ('nomor-telepon') is-invalid @enderror" id="nomor-telepon" name="nomor_telepon" placeholder="Nomor Telepon Mahasiswa">
                    @error('nomor-telepon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <input type="agama" class="form-control @error ('agama') is-invalid @enderror" id="agama" name="agama" placeholder="agama Mahasiswa">
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