<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Report</title>
</head>
<body>
    <h1>Monthly Report</h1>

    <form action="{{ route('monthly.report') }}" method="GET">
        <label for="month">Select Month:</label>
        <select name="month" id="month" required>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>

        <label for="year">Select Year:</label>
        <input type="number" name="year" id="year" value="{{ date('Y') }}" required>

        <button type="submit">Generate Report</button>
    </form>

    <p><strong>Total Income:</strong> Rp{{ number_format($totalIncome ?? 0, 2) }}</p>
    <p><strong>Total Expense:</strong> Rp{{ number_format($totalExpense ?? 0, 2) }}</p>
</body>
</html>
