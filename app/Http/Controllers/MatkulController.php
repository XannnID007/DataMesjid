<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Matkul::orderBy('id_matkul', 'desc')->paginate(5);
        return view('matkul.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matkul/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('id_matkul', $request->id_matkul);
        Session::flash('nama_matkul', $request->nama_matkul);
        Session::flash('jadwal', $request->jadwal);
        Session::flash('kelas', $request->kelas);

        $request->validate([
            'id_matkul' => 'required|numeric',
            'nama_matkul' => 'required',
            'jadwal' => 'required',
            'kelas' => 'required',
            'dosen' => 'required',
            
        ], [
            'id_matkul.required' => 'Id Mata kuliah wajib diisi',
            'id_matkul.numeric' => 'Id Mata kuliah wajib diisi dalam angka',
            'nama_matkul.required' => 'Nama Mata kuliah wajib diisi',
            'jadwal.required' => 'Jadwal wajib diisi',
            'kelas.required' => 'Kelas wajib diisi',
            'dosen.required' => 'Dosen wajib diisi',
        ]);

        $data = [
            'id_matkul' => $request->input('id_matkul'),
            'nama_matkul' => $request->input('nama_matkul'),
            'jadwal' => $request->input('jadwal'),
            'kelas' => $request->input('kelas'),
            'dosen' => $request->input('dosen'),
        ];
        Matkul::create($data);
        return redirect('matkul')->with('success', 'Berhasil memasukkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Matkul::where('id_matkul', $id)->first();
        return view('matkul/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Matkul::where('id_matkul', $id)->first();
        return view('matkul/edit')->with('data', $data);
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
        $request->validate([
            'nama_matkul' => 'required',
            'jadwal' => 'required',
            'kelas' => 'required',
            'dosen' => 'required',
            
        ], [
            'id_matkul.numeric' => 'Id Mata kuliah wajib diisi dalam angka',
            'nama_matkul.required' => 'Nama Mata kuliah wajib diisi',
            'jadwal.required' => 'Jadwal wajib diisi',
            'kelas.required' => 'Kelas wajib diisi',
            'dosen.required' => 'Dosen wajib diisi',
        ]);

        $data = [
            'nama_matkul' => $request->input('nama_matkul'),
            'jadwal' => $request->input('jadwal'),
            'kelas' => $request->input('kelas'),
            'dosen' => $request->input('dosen'),
        ];

        Matkul::where('id_matkul', $id)->update($data);
        return redirect('/matkul')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matkul::where('id_matkul', $id)->delete();
        return redirect('/matkul')->with('success', 'Berhasil hapus data');
    }
}
