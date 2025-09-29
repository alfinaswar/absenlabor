@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Kelas</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="Kelas" class="form-label">Nama Kelas</label>
                    <input type="text" name="Kelas" id="Kelas" class="form-control" value="{{ $kelas->Kelas }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection