@extends('dashboard.main')
@section('container')
    <div class="content-header"> 
        <div class="container-fluid" style="margin-top: -4em">
            <div class="col-sm-12 mb-4">
              <h1 class="m-0">Selamat Datang - {{ auth()->user()->name }}</h1>
            </div>
            <div class="row mb-2">
              <div class="col-sm-10">
                <div class="alert alert-info" role="alert">
                  Halaman ini digunakan untuk menjalankan proses <a href="#" style="color: brown"><b>Ujian Akhir Semester (UAS),</b></a> Semester Ganjil Tahun Akademik 2022/2023. Terdapat dua menu pada halaman ini, dimana masing-masing peserta ujian dapat mengerjakan satu menu saja sesuai degan NIM dari peserta ujian. NIM Ganjil mengerjakan menu Data Dosen, dan NIM Genap mengerjakan menu Data Mahasiswa. <br><br>
                  <p>Note: <i><b style="color: brown">Dilarang kerjasama dalam bentuk apapun.</b></i></p> 
                </div>
              </div>
            </div>
        </div>
      </div>
@endsection