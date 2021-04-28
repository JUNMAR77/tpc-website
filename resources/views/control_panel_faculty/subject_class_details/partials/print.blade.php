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
    <?php
        $days = $ClassSubjectDetail ? $ClassSubjectDetail->class_schedule ? explode(';', rtrim($ClassSubjectDetail->class_schedule,";")) : [] : [];
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
    <h4>Faculty : {{ strtoupper($FacultyInformation->last_name. ', '. $FacultyInformation->first_name . ' ' . $FacultyInformation->middle_name) }}</h4>
    <h4>Subject : <span class="text-red"><i>{{ $ClassSubjectDetail->subject }}</i></span> 
    {{--  Time : <span class="text-red"><i>{{ strftime('%r',strtotime($ClassSubjectDetail->class_time_from)) . ' - ' . strftime('%r',strtotime($ClassSubjectDetail->class_time_to)) }}</i></span> Days : <span class="text-red"><i>{{ $ClassSubjectDetail->class_days }}</i></span>  --}}
        Schedule : <span class="text-red"><i>{{ rtrim($daysDisplay, '/') }}</i></span>
    </h4>
    <h4>Grade & Section : <span class="text-red"><i>{{ $ClassSubjectDetail->grade_level . ' ' .$ClassSubjectDetail->section }}</i></span></h4>
    <small for="">as of {{ Date('F d, Y H:i') }}</small>
    <table class="table no-margin">
        <thead>
            <tr>
                <th>#</th>
                <th style="text-align: center">Username</th>
                <th style="text-align: center">Student Name</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td colspan="3">Male</td>
                </tr>
                @if ($EnrollmentMale)
                    @foreach ($EnrollmentMale as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td style="text-align:center">{{ $data->username }}</td>
                            <td style="text-align:center">{{ $data->student_name }}</td>
                        </tr>
                    @endforeach
                @endif
                <tr>
                        <td colspan="3">Female</td>
                    </tr>
                    @if ($EnrollmentFemale)
                        @foreach ($EnrollmentFemale as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td style="text-align:center">{{ $data->username }}</td>
                                <td style="text-align:center">{{ $data->student_name }}</td>
                            </tr>
                        @endforeach
                    @endif
            </tbody>
    </table>
</body>
</html>