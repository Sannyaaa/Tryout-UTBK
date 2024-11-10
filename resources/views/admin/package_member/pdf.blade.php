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
    <h1>pAKET Report</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Harga</th>
                <th>Tryout</th>
                <th>Bimbel</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $paket)
                <tr>
                    <td>{{ $paket->id }}</td>
                    <td>{{ $paket->image }}</td>
                    <td>{{ $paket->name }}</td>
                    <td>{{ $paket->price }}</td>
                    <td>{{ $paket->tryout->name }}</td>
                    <td>{{ $paket->bimbel->name }}</td>
                    <td>{{ $paket->created_at }}</td>
                    <td>{{ $paket->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>