<!-- resources/views/finances/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Finance Record</title>
</head>
<body>
    <h1>Edit Finance Record</h1>

    <!-- back link -->
    <a href="{{ route('finances.index') }}">Back to Finance Records</a>

    <!-- form to edit an existing finance record -->
    <form action="{{ route('finances.update', $finance->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="date">Date:</label>
        <input type="date" name="date" value="{{ $finance->date }}" required><br><br>

        <label for="description">Description:</label>
        <input type="text" name="description" value="{{ $finance->description }}" required><br><br>

        <label for="amount">Amount:</label>
        <input type="number" step="0.01" name="amount" value="{{ $finance->amount }}" required><br><br>

        <label for="type">Type:</label>
        <select name="type" required>
            <option value="pemasukan" {{ $finance->type == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
            <option value="pengeluaran" {{ $finance->type == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
        </select><br><br>

        <button type="submit">Update Finance</button>
    </form>
</body>
</html>
