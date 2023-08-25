@extends('layout/app')

@section('konten')
    <a href='/matkul' class="btn btn-secondary">
        << Kembali</a>
            <hr>
            <form method="post" action="{{ '/matkul/' . $data->id_matkul }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <h3>ID Matkul : {{ $data->id_matkul }}</h3>
                </div>
                <div class="mb-3">
                    <label for="nama_matkul" class="form-label">Nama Matkul</label>
                    <input type="text" class="form-control" name='nama_matkul' id="nama_matkul"
                        value="{{ $data->nama_matkul }}">
                </div>
                <div class="mb-3">
                    <label for="jadwal" class="form-label">Jadwal</label>
                    <textarea class="form-control" name="jadwal">{{ $data->jadwal }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" name='kelas' value="{{ $data->kelas }}">
                </div>
                <div class="mb-3">
                    <label for="dosen" class="form-label">Dosen</label>
                    <input class="form-control" name="dosen" value="{{ $data->dosen }}">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        @endsection
