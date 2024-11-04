<!-- resources/views/finances/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Finance Records</title>
</head>
<body>
    <h1>Finance Records</h1>

    <!-- link to add a new finance record -->
    <a href="{{ route('finances.create') }}">Add New Finance Record</a>
    
    <!-- display all records in a table -->
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($finances as $finance)
                <tr>
                    <td>{{ $finance->date }}</td>
                    <td>{{ $finance->description }}</td>
                    <td>{{ $finance->amount }}</td>
                    <td>{{ $finance->type }}</td>
                    <td>
                        <!-- link to edit -->
                        <a href="{{ route('finances.edit', $finance->id) }}">Edit</a> |
                        
                        <!-- delete form -->
                        <form action="{{ route('finances.destroy', $finance->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
