@extends('dashboard.main')
@section('container')
    <div class="card-body">
        <div class="card card-primary">
            <div class="card-header" style="margin-top: -4em;">
                <h3 class="card-title">Edit Berita</h3>
            </div>
            <form method="POST" action="/dashboard/berita/{{ $berita->slug }}" enctype="multipart/form-data">
            @method('put')    
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="judul_berita">Judul Berita</label>
                    <input type="text" class="form-control @error ('judul_berita') is-invalid @enderror" id="judul_berita" name="judul_berita" placeholder="Judul Berita" value="{{ old('judul_berita', $berita->judul_berita) }}">
                    @error('judul_berita')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug Berita" value="{{ old('slug', $berita->slug) }}">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="custom-select rounded-0" id="kategori_id" name="kategori_id">
                      @foreach ($kategori as $kategori)
                        @if (old('kategori_id', $berita->kategori_id)==$kategori->id)
                            <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
                        @else
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endif
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="hidden" name="foto_lama" value="{{ $berita->foto }}">
                    <input type="file" class="form-control @error ('foto') is-invalid @enderror" id="foto" name="foto">
                    <p style="margin-top: 10px; font-size: 90%; color: rgb(18, 138, 250);"><i> Upload Foto jika ada perubahan.</i></p>
                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="isi_berita">Isi Berita</label>
                    @error('isi_berita')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                    <textarea id="summernote" name="isi_berita">{{ old('isi_berita', $berita->isi_berita) }}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Berita</button>
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

