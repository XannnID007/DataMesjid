@extends('layout/app')

@section('konten')
    <div>

        <h3>Mata Kuliah : {{ $data->nama_matkul }}</h3>
        <br>
        <p>
            <b>ID Matkul :</b> {{ $data->id_matkul }}
        </p>
        <br>
        <p>
            <b>Jadwal :</b> {{ $data->jadwal }}
        </p>
        <br>
        <p>
            <b>Kelas :</b> {{ $data->kelas }}
        </p>
        <br>
        <p>
            <b>Dosen :</b> {{ $data->dosen }}
        </p>
        <br>
        <hr>
        <p>
            <a href='/matkul' class="btn btn-secondary">
                << Kembali</a>
        </p>
    </div>
@endsection
