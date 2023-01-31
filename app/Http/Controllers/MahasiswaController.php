<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mahasiswa::all();

        return view('dashboard.mahasiswa.index', [
            "data" => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            "nama_mahasiswa" => 'required|string',
            "jenis_kelamin" => 'required|string',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|numeric',
            'agama' => 'required|string'
        ]);

        $validasi['slug'] = Str::slug($request->nama_dosen, '-');

        Mahasiswa::create($validasi);

        return redirect('/dashboard/mahasiswa')->with('executed-query', 'berhasil menambahkan mahasiswa ' . $request->nama_dosen);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhs = Mahasiswa::find($id)->first();

        return view('dashboard.mahasiswa.update', [
            "data" => $mhs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            "nama_mahasiswa" => 'required|string',
            "jenis_kelamin" => 'required|string',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|numeric',
            'agama' => 'required|string'
        ]);

        $data['slug'] = Str::slug($request->nama_mahasiswa, '-');

        Mahasiswa::where('id', $id)->update($data);

        return redirect('/dashboard/mahasiswa')->with('executed-query', 'berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return redirect('/dashboard/mahasiswa')->with('executed-query', 'berhasi menghapus data');
    }
}
