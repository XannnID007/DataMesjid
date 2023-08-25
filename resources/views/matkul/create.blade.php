@extends('layout/app')

@section('konten')
    <form method="post" action="/matkul" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="id_matkul" class="form-label">ID Matkul</label>
            <input type="text" class="form-control" name='id_matkul' id="id_matkul" value="{{ Session::get('id_matkul') }}">
        </div>
        <div class="mb-3">
            <label for="nama_matkul" class="form-label">Nama Matkul</label>
            <input type="text" class="form-control" name='nama_matkul' id="nama_matkul"
                value="{{ Session::get('nama_matkul') }}">
        </div>
        <div class="mb-3">
            <label for="jadwal" class="form-label">Jadwal</label>
            <input class="form-control" name="jadwal" value="{{ Session::get('jadwal') }}">
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" name='kelas' id="kelas" value="{{ Session::get('kelas') }}">
        </div>
        <div class="mb-3">
            <label for="dosen" class="form-label">Dosen</label>
            <input class="form-control" name="dosen" id="dosen" value="{{ Session::get('dosen') }}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
