@extends('layouts.app')

@section('content')
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

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            let laborId = document.getElementById('labor').value;
            if (!laborId) {
                alert("⚠️ Silakan pilih labor dulu sebelum absen!");
                return;
            }

            document.getElementById('result').innerHTML = "Barcode: " + decodedText;

            fetch("{{ route('absen.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ siswa_id: decodedText, labor_id: laborId })
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert("✅ " + data.message);
                    } else {
                        alert("❌ " + data.message);
                    }
                });

            // hentikan scanner biar tidak dobel input
            html5QrcodeScanner.clear();
        }

        function onScanFailure(error) {
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endsection