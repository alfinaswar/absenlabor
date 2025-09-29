@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Tambah Absen</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('absen.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="labor_id" class="form-label">Nama Labor</label>
                            <select name="IdLabor" id="labor_id" class="form-control" required>
                                <option value="">-- Pilih Labor --</option>
                                @foreach($labors as $labor)
                                    <option value="{{ $labor->id }}">{{ $labor->Labor }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="Tanggal" id="tanggal" class="form-control"
                                   value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="guru" class="form-label">Guru</label>
                            <input type="text" name="Guru" id="guru" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan & Scan</button>
                    </form>
                </div>
            </div>
        </div>

        @if(session('absen_id'))
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Absen Siswa (Scan Barcode)</h3>
                        </div>
                        <div class="card-body text-center">

                            {{-- Pilih Labor --}}
                            <div class="mb-3">
                                <label for="labor">Pilih Labor:</label>
                                <select id="labor" class="form-control" style="max-width:300px;margin:auto;">
                                    <option value="">-- Pilih Labor --</option>
                                    @foreach($labors as $labor)
                                        <option value="{{ $labor->id }}">{{ $labor->Labor }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Scanner --}}
                            <div id="reader" style="width:400px;margin:auto;"></div>
                            <h4 id="result" class="mt-3 text-success"></h4>
                        </div>
                    </div>
                </div>
            </div>


        @endif
    </div>
@endsection


@push('scripts')
    @if(session('absen_id'))
        <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            let canScan = true; // kontrol cooldown

            function onScanSuccess(decodedText, decodedResult) {
                if (!canScan) return; // kalau masih cooldown, abaikan

                let laborId = $("#labor").val();
                if (!laborId) {
                    alert("⚠️ Silakan pilih labor dulu sebelum absen!");
                    return;
                }

                $("#result").text("Barcode: " + decodedText);

                $.ajax({
                    url: "{{ route('absen.scan') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        absen_id: "{{ session('absen_id') }}",
                        siswa_id: decodedText,
                        labor_id: laborId
                    },
                    success: function (data) {
                        if (data.success) {
                            alert("✅ " + data.message);
                        } else {
                            alert("❌ " + data.message);
                        }
                    },
                    error: function () {
                        alert("❌ Terjadi kesalahan server.");
                    }
                });

                // cooldown 2 detik
                canScan = false;
                setTimeout(() => {
                    canScan = true;
                }, 2000);
            }

            function onScanFailure(error) {
                // ga perlu action, biar silent aja
            }

            let html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", { fps: 10, qrbox: 250 });
            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        </script>
    @endif
@endpush

