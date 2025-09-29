@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Siswa</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Nama">Nama</label>
                    <input type="text" name="Nama" class="form-control" id="Nama" placeholder="Masukkan nama siswa"
                        required>
                </div>
                <div class="form-group">
                    <label for="Nis">NIS</label>
                    <input type="text" name="Nis" class="form-control" id="Nis" placeholder="Masukkan NIS" required>
                </div>
                <div class="form-group">
                    <label for="Jk">Jenis Kelamin</label>
                    <select name="Jk" id="Jk" class="form-control" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="TanggalLahir">Tanggal Lahir</label>
                    <input type="date" name="TanggalLahir" class="form-control" id="TanggalLahir" required>
                </div>
                <div class="form-group">
                    <label for="Kelas">Kelas</label>
                    <select name="Kelas" id="Kelas" class="form-control" required>
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($kelas as $item)
                            <option value="{{ $item->id }}">{{ $item->Kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection