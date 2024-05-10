<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
</head>
<body>
    <h1>Attendance</h1>

    @if (isset($class))
    <p>Class ID: {{ $class->id }}</p>
    <p>Class Name: {{ $class->name }}</p>
    @endif

    <form method="POST" action="{{ route('attendance.submit') }}">
        @csrf
        @if ($class->teacher)
    <p>Teacher: {{ $class->teacher->fullname }}</p>
@endif

        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Present</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->fullname }}</td>
                    <td>
                        <input type="hidden" name="student_ids[]" value="{{ $student->id }}">
                        <input type="checkbox" name="is_present[]" value="1">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit">Submit Attendance</button>
    </form>
</body>
</html>
