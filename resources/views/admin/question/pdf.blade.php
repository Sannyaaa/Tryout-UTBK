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
    <h1>Question Report</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>tryout</th>
                <th>Mapel</th>
                <th>Question</th>
                <th>Image</th>
                <th>Jawaban A</th>
                <th>Jawaban B</th>
                <th>Jawaban C</th>
                <th>Jawaban D</th>
                <th>Jawaban E</th>
                <th>Jawaban Benar</th>
                <th>Penjelasan</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->tryout->name }}</td>
                    <td>{{ $question->sub_categories->name }}</td>
                    <td>{{ $question->question }}</td>
                    <td><img src="{{ public_path('$question->image') }}" alt=""></td>
                    <td>{{ $question->answer->a }}</td>
                    <td>{{ $question->answer->b }}</td>
                    <td>{{ $question->answer->c }}</td>
                    <td>{{ $question->answer->d }}</td>
                    <td>{{ $question->answer->e }}</td>
                    <td>{{ $question->corect_answer }}</td>
                    <td>{{ $question->explanation }}</td>
                    <td>{{ $question->created_at }}</td>
                    <td>{{ $question->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>