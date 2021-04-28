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
        }
    </style>
</head>
<body>

    <div>
        <label for="">Faculty Name : </label>
        <strong>{{ ucfirst($FacultyInformation->last_name) . ', ' . ucfirst($FacultyInformation->first_name) . ' ' . ucfirst($FacultyInformation->middle_name) }}</strong>
        <div>
            <label>Subjects</label>
            <table class="table table-bordered">
                <tr>
                    <th>Schedule</th>
                    <th>Subject</th>
                    <th>Grade Level</th>
                    <th>Section</th>
                    <th>Room</th>
                    <th>School Year</th>
                </tr>
                <tbody>
                    @if ($ClassSubjectDetail)
                        @foreach($ClassSubjectDetail as $data) 
                            <?php
                                $days = $data ? $data->class_schedule ? explode(';', rtrim($data->class_schedule,";")) : [] : [];
                                $daysObj = [];
                                $daysDisplay = '';
                                if ($days) 
                                {
                                    foreach($days as $day)
                                    {
                                        $day_sched = explode('@', $day);
                                        $day = '';
                                        if ($day_sched[0] == 1) {
                                            $day = 'M';
                                        } else if ($day_sched[0] == 2) {
                                            $day = 'T';
                                        } else if ($day_sched[0] == 3) {
                                            $day = 'W';
                                        } else if ($day_sched[0] == 4) {
                                            $day = 'TH';
                                        } else if ($day_sched[0] == 5) {
                                            $day = 'F';
                                        }
                                        $t = explode('-', $day_sched[1]);
                                        $daysDisplay .= $day . '@' . $t[0] . '-' . $t[1] . '/';
                                    }
                                }
                            ?>
                            <tr>
                                <td>{{ rtrim($daysDisplay, '/') }}</td>
                                <td>{{ $data->subject }}</td>
                                <td>{{ $data->grade_level }}</td>
                                <td>{{ $data->section }}</td>
                                <td>{{ $data->room_code }}</td>
                                <td>{{ $data->school_year }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="7">No record found</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>