@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Labor</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('labor.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="Labor" class="form-label">Nama Labor</label>
                    <input type="text" name="Labor" id="Labor" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('labor.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection