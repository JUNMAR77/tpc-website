<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Faculty Schedule</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
        .page-break {
            page-break-after: always;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 5px;
        }
        table {
            width: 100%;
            border-spacing: 0;
            border-collapse: collapse;
            font-size : 10px;
        }
    </style>
</head>
<body>

            <h2>Enrolled Students</h2>
    <div>

        <div></div><label for="">School Year:</label> <strong>{{ $ClassDetail->school_year }}</strong></div>
        <div><label for="">Grade & Section:</label> <strong>{{ $ClassDetail->grade_level }} - {{ $ClassDetail->section }}</strong></div>
        <div><label for="">Room:</label> <strong>{{ $ClassDetail->room_code }}</strong></div>
        
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student Number</th>
                        <th>Student Name</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($Enrollment)
                        @foreach ($Enrollment as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data->username }}</td>
                                <td>{{ $data->fullname }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>