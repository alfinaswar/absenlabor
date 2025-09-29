<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cetak Barcode - {{ $siswa->Nama }}</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            margin: 30px;
        }

        .barcode {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h2>Barcode Absen Siswa</h2>
    <p><strong>{{ $siswa->Nama }}</strong></p>
    <p>Kelas: {{ $siswa->Kelas }}</p>

    <div class="barcode">
        <img src="data:image/png;base64,{{ $barcode }}" alt="barcode">
    </div>

    <p>{{ $siswa->id }}</p>

    <script>
        window.print();
    </script>
</body>

</html>