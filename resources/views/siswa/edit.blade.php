@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Siswa</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="Nama">Nama</label>
                    <input type="text" name="Nama" class="form-control" id="Nama" placeholder="Masukkan nama siswa"
                        value="{{ old('Nama', $siswa->Nama) }}" required>
                </div>
                <div class="form-group">
                    <label for="Nis">NIS</label>
                    <input type="text" name="Nis" class="form-control" id="Nis" placeholder="Masukkan NIS"
                        value="{{ old('Nis', $siswa->Nis) }}" required>
                </div>
                <div class="form-group">
                    <label for="Jk">Jenis Kelamin</label>
                    <select name="Jk" id="Jk" class="form-control" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="L" {{ old('Jk', $siswa->Jk) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('Jk', $siswa->Jk) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="TanggalLahir">Tanggal Lahir</label>
                    <input type="date" name="TanggalLahir" class="form-control" id="TanggalLahir"
                        value="{{ old('TanggalLahir', $siswa->TanggalLahir) }}" required>
                </div>
                <div class="form-group">
                    <label for="Kelas">Kelas</label>
                    <select name="Kelas" id="Kelas" class="form-control" required>
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($kelas as $item)
                            <option value="{{ $item->id }}" {{ old('Kelas', $siswa->Kelas) == $item->id ? 'selected' : '' }}>
                                {{ $item->Kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection