<!DOCTYPE html>
<html>
<head>
    <title>Class Bimbel Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Tryout Report</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Berbayar / Gratis</th>
                <th>Biasa / Serentak</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $tryout)
                <tr>
                    <td>{{ $tryout->id }}</td>
                    <td>{{ $tryout->name }}</td>
                    <td>{{ $tryout->is_free }}</td>
                    <td>{{ $tryout->is_together }}</td>
                    <td>{{ date('j F Y', strtotime($tryout->start_date)) }}</td>
                    <td>{{ date('j F Y', strtotime($tryout->end_date)) }}</td>
                    <td>{{ $tryout->created_at }}</td>
                    <td>{{ $tryout->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>