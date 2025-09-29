@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Guru</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('guru.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="Nip" class="form-label">NIP</label>
                    <input type="text" name="Nip" id="Nip" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="Nama" class="form-label">Nama Guru</label>
                    <input type="text" name="Nama" id="Nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="Mapel" class="form-label">Mata Pelajaran</label>
                    <input type="text" name="Mapel" id="Mapel" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection