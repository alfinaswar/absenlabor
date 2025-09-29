<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cetak Semua Barcode Siswa</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            margin: 10px;
            width: 200px;
            display: inline-block;
        }

        .barcode {
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Daftar Barcode Absen Siswa</h2>

    @foreach($siswa as $item)
        <div class="card">
            <p><strong>{{ $item->Nama }}</strong></p>
            <p>Kelas: {{ $item->Kelas }}</p>
            <div class="barcode">
                {!! DNS1D::getBarcodeHTML($item->id, 'C39') !!}
            </div>
            <p>{{ $item->id }}</p>
        </div>
    @endforeach

    <script>
        window.print();
    </script>
</body>

</html>