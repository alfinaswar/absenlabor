@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Labor</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('labor.update', $labor->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="Labor" class="form-label">Nama Labor</label>
                    <input type="text" name="Labor" id="Labor" class="form-control" value="{{ $labor->Labor }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('labor.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection