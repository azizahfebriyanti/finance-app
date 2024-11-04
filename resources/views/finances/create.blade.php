<!-- resources/views/finances/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Finance Record</title>
</head>
<body>
    <h1>Add New Finance Record</h1>

    <!-- back link -->
    <a href="{{ route('finances.index') }}">Back to Finance Records</a>

    <!-- form to create a new finance record -->
    <form action="{{ route('finances.store') }}" method="POST">
        @csrf
        <label for="date">Date:</label>
        <input type="date" name="date" required><br><br>

        <label for="description">Description:</label>
        <input type="text" name="description" required><br><br>

        <label for="amount">Amount:</label>
        <input type="number" step="0.01" name="amount" required><br><br>

        <label for="type">Type:</label>
        <select name="type" required>
            <option value="pemasukan">Pemasukan</option>
            <option value="pengeluaran">Pengeluaran</option>
        </select><br><br>

        <button type="submit">Add Finance</button>
    </form>
</body>
</html>
