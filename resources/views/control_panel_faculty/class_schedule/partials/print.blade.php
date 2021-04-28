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
            font-size : 11px;
        }
        .text-red {
            color : #dd4b39 !important;
        }
        small {
            font-size : 10px;
        }
    </style>
</head>
<body>
    <h4>Class Schedules</h4>
    <h5>Faculty : {{ strtoupper($FacultyInformation->last_name. ', '. $FacultyInformation->first_name . ' ' . $FacultyInformation->middle_name) }}</h5>
    <table class="table no-margin">
        <thead>
            <tr>
                <th>Time</th>
                <th>Days</th>
                <th>Subject</th>
                <th>Room</th>
                <th>Grade & Section</th>
            </tr>
        </thead>
        <tbody>
            @if ($ClassSubjectDetail)
                @foreach ($ClassSubjectDetail as $key => $data)
                    <tr>
                        <td>{{ $data->class_time_from . ' -  ' . $data->class_time_to }}</td>
                        <td>{{ $data->class_days }}</td>
                        <td>{{ $data->subject_code . ' ' . $data->subject }}</td>
                        <td>{{ 'Room' . $data->room_code }}</td>
                        <td>{{ $data->grade_level . ' ' . $data->section }}</td>
                    </tr>
                @endforeach
            @else
                
            @endif
        </tbody>
    </table>
</body>
</html>