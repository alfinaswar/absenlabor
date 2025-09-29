@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Data Siswa</h3>

            <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Tambah Siswa
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>JK</th>
                            <th>Tanggal Lahir</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswa as $item)
                            <tr>
                                <td>{{ $item->Nama }}</td>
                                <td>{{ $item->Nis }}</td>
                                <td>{{ $item->Jk }}</td>
                                <td>{{ $item->TanggalLahir }}</td>
                                <td>{{ $item->Kelas }}</td>
                                <td>
                                    <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('siswa.destroy', $item->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                    <a href="{{ route('siswa.barcode', $item->id) }}" target="_blank"
                                        class="btn btn-info btn-sm">
                                        Cetak Barcode
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
