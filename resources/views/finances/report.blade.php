<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bulanan</title>
</head>
<body>
    <h1>Laporan Bulanan</h1>
    <h2>Pemasukan: Rp. {{ number_format($incomes, 2, ',', '.') }}</h2>
    <h2>Pengeluaran: Rp. {{ number_format($expenses, 2, ',', '.') }}</h2>

    <a href="{{ route('finances.index') }}">Kembali ke Daftar Keuangan</a>
</body>
</html>
