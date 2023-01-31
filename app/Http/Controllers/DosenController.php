<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Dosen::all();
        return view('dashboard.dosen.index', [
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
        return view("dashboard.dosen.create");
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
            "nama_dosen" => 'required|string',
            "jenis_kelamin" => 'required|string',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|numeric',
            'email' => 'required|email:rfc,dns'
        ]);

        $validasi['slug'] = Str::slug($request->nama_dosen, '-');

        Dosen::create($validasi);

        return redirect('/dashboard/dosen')->with('create-success', 'berhasil menambahkan dosen ' . $request->nama_dosen);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dosen::find($id)->first();

        return view('dashboard.dosen.update', [
            "data" => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            "nama_dosen" => 'required|string',
            "jenis_kelamin" => 'required|string',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|numeric',
            'email' => 'required|email:rfc,dns'
        ]);

        $validasi['slug'] = Str::slug($request->nama_dosen, '-');

        Dosen::where('id', $id)->update($validasi);

        return redirect('/dashboard/dosen')->with('create-success', 'berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dosen::destroy($id);
        return redirect('/dashboard/dosen')->with('create-success', 'berhasi menghapus data');
    }
}
