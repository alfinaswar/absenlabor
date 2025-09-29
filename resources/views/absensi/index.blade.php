@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Data Absen</h3>
            <a href="{{ route('absen.create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Tambah Absen
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 25%;">Nama Labor</th>
                            <th style="width: 20%;">Tanggal</th>
                            <th style="width: 25%;">Guru</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($absen as $key => $item)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{ $item->IdLabor }}</td>
                                <td>{{ $item->Tanggal }}</td>
                                <td>{{ $item->Guru }}</td>
                                <td>
                                    <a href="{{ route('absen.show', $item->id) }}" class="btn btn-info btn-sm">Download</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
