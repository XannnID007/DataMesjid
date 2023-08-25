@extends('layout/app')

@section('konten')
    <a href="/matkul/create" class="btn btn-warning">+Tambah Data Mata Kuliah</a>
    <hr>
    <table class="table table-primary table-striped">
        <thead>
            <tr>
                <th>Dosen</th>
                <th>ID Matkul</th>
                <th>Nama Matkul</th>
                <th>Jadwal</th>
                <th>Kelas</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->dosen }}</td>
                    <td>{{ $item->id_matkul }}</td>
                    <td>{{ $item->nama_matkul }}</td>
                    <td>{{ $item->jadwal }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>
                        <a class='btn btn-secondary btn-sm' href='{{ url('/matkul/' . $item->id_matkul) }}'>Detail</a>
                        <a class='btn btn-warning btn-sm' href='{{ url('/matkul/' . $item->id_matkul . '/edit') }}'>Edit</a>
                        <form onsubmit="return confirm('Yakin mau hapus data?')" class='d-inline'
                            action="{{ '/matkul/' . $item->id_matkul }}" method='post'>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
