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
    <h1>Class Bimbel Report</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Bimbel</th>
                <th>User</th>
                <th>Sub Category</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $class)
                <tr>
                    <td>{{ $class->id }}</td>
                    <td>{{ $class->bimbel->name }}</td>
                    <td>{{ $class->user->name }}</td>
                    <td>{{ $class->sub_categories->name }}</td>
                    <td>{{ date('j F Y', strtotime($class->date)) }}</td>
                    <td>{{ date('h:i A', strtotime($class->start_time)) }}</td>
                    <td>{{ date('h:i A', strtotime($class->end_time)) }}</td>
                    <td>{{ $class->created_at }}</td>
                    <td>{{ $class->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>