<?php
    $student_attendance = [];
    $table_header = 
    [
        ['key' => 'Jun',],
        ['key' => 'Jul',],
        ['key' => 'Aug',],
        ['key' => 'Sep',],
        ['key' => 'Oct',],
        ['key' => 'total',],
    ];
        
        $attendance_data = json_decode(json_encode([
            'days_of_school' => [
                0, 0, 0, 0, 0, 
            ],
            'days_present' => [
                0, 0, 0, 0, 0,
            ],
            'days_absent' => [
                0, 0, 0, 0, 0,
            ],
            'times_tardy' => [
                0, 0, 0, 0, 0,
            ]
        ]));
        $attendance_data = json_decode($Enrollment_first_sem[0]->attendance_first);    

        $student_attendance = [
            // 'student_name'      => $EnrollmentMale[0]->student_name,
            'attendance_data'   => $attendance_data,
            'table_header'      => $table_header,
            'days_of_school_total' => array_sum($attendance_data->days_of_school),
            'days_present_total' => array_sum($attendance_data->days_present),
            'days_absent_total' => array_sum($attendance_data->days_absent),
            'times_tardy_total' => array_sum($attendance_data->times_tardy),
        ];
?>
<p class="report-progress-left m0"  style="margin-top: 2em; margin-left: 5px"><b>ATTENDANCE RECORD</b></p>
    <table style="width:100%; margin-bottom: 1em" class="table no-margin table-bordered table-striped">
        <tr>
            <th style="text-align:center">
                <center>
                @foreach ($student_attendance['table_header'] as $data)
                <th style="text-align:center">{{ $data['key'] }}</th>
                @endforeach
                </center>
            </th>                
        </tr>
        <tr>
            <th>
                Days of School
            </th>
            @foreach ($student_attendance['attendance_data']->days_of_school as $key => $data)
                <th style="width:7%; text-align:center">
                    {{ $data }}
                </th>
            @endforeach
            <th class="days_of_school_total" style="text-align:center">
                {{ $student_attendance['days_of_school_total'] }}
            </th>
        </tr>
        <tr>
            <th>
                Days Present
            </th>
            @foreach ($student_attendance['attendance_data']->days_present as $key => $data)
            <th style="width:7%; text-align:center">
                {{ $data }} 
            </th>
            @endforeach
            <th class="days_present_total" style="text-align:center">
                {{ $student_attendance['days_present_total'] }}
            </th>
        </tr>
        <tr>
            <th>
                Days Absent
            </th>
            @foreach ($student_attendance['attendance_data']->days_absent as $key => $data)
            <th style="width:7%; text-align:center">
                {{ $data }}  
            </th>
            @endforeach
            <th class="days_absent_total" style="text-align:center">
                {{ $student_attendance['days_absent_total'] }}
            </th>
        </tr>
        <tr>
            <th>
                Times Tardy
            </th>
            @foreach ($student_attendance['attendance_data']->times_tardy as $key => $data)
            <th style="width:7%; text-align:center">
                {{ $data }}  
            </th>
            @endforeach
            <th class="times_tardy_total" style="text-align:center">
                {{ $student_attendance['times_tardy_total'] }}
            </th>
        </tr>
    </table>
