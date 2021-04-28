<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Student Attendance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
        {{--  .page-break {
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
        }  --}}
        * {
            font-family: Arial, Times, serif;
        }
        .page-break {
            page-break-after: always;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
        }
        table {
            width: 100%;
            border-spacing: 0;
            border-collapse: collapse;
            border: 0px;
            font-size : 11px;
        }
        .text-red {
            color : #dd4b39 !important;
        }
        small {
            font-size : 10px;
        }
        .text-center {
            text-align: center;
        }
        .heading1 {
            text-align: center;
            padding: 0;
            margin:0;
            font-size: 11px;
        }
        .heading2 {
            text-align: center;
            padding: 0;
            margin:0;
        }
        .heading2-title {
            font-family: "Old English Text MT", Times, serif;
        }
        .heading2-subtitle {
            font-size: 12px;
        }
        .p0 {
            padding: 0;
        }
        .m0 {
            margin: 0;
        }

        .student-info {
            font-size: 12px;
        }

        .logo {
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .report-progress {
            text-align: center;
            font-size: 12px;
            font-weight: 700;
        }
    </style>
</head>
<body>
        
        
        
        <h3 style="text-align: center;margin-bottom: 0px">Saint John Academy</h3>
        @if($Semester->grade_level == '11' || $Semester->grade_level == '12')
            <h4 style="text-align: center; margin-top: 0px; margin-bottom: 0em">SENIOR HIGH SCHOOL</h4>
        @else
            <h4 style="text-align: center; margin-top: 0px; margin-bottom: 0em">JUNIOR HIGH SCHOOL</h4>
        @endif
        <h4 style="text-align: center; margin-top: 0px">Class Attendance</h4>
        <img style="margin-left: 10em; margin-top: -1em"  class="logo sja-logo" width="85" src="{{ asset('img/sja-logo.png') }}" />
        
        @if($Semester->grade_level == '11' || $Semester->grade_level == '12')
        <table class="table" style="margin-top: 1em">
                <thead>
                    <tr>                        
                        <th colspan="2" style="text-align:left">Grade and Section: <i style="color: red">{{ $Semester->grade_level.' - '.$Semester->section }}</i></th>        
                    </tr>
                </thead>
                <tbody>      
                                            
                    <tr>
                        <td colspan="2">
                            <b>Male</b> 
                        </td>
                    </tr>

                    @foreach ($Senior_firstsem_m as $key => $data1) 
                    <tr>
                        
                        <td colspan="2">
                            <b style="font-size: 11px">
                                    {{ $key + 1 }}.{{ $data1->student_name }}
                            </b>

                            
                            {{-- {{ $data1->attendance }}  --}}
                            
                            @if($data1->attendance_first=="")

                            @else
                            <tr>
                                <td>
                                        <table class="table">
                                                <tr>                                                                                                    
                                                    <?php
                                                    $student_attendance = [];
                                                    $table_header = [
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
                                                        
                                                        
                                                        $attendance_data = json_decode($data1->attendance_first);
        
                                                        
                                                    //    $attendance_data;
        
                                                    //     if ($EnrollmentMale[0]->attendance) {
                                                    //         $attendance_data = json_decode($EnrollmentMale[0]->attendance);
                                                    //     }    
        
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
                                                        
                                                        
                                                    
                                                        <th style="width: 90px">
                                                                    <i style="font-size: 11px; color: red">First Semester</i>
                                                        </th>
                                                                @foreach ($student_attendance['table_header'] as $data)
                                                                        <th style="text-align:center">{{ $data['key'] }}</th>
                                                                @endforeach
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                Days of School
                                                            </th>
                                                            @foreach ($student_attendance['attendance_data']->days_of_school as $key => $data)
                                                                <th style="text-align:center">{{ $data }}
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
                                                                <th style="text-align:center">{{ $data }} 
                                                                </th>
                                                            @endforeach
                                                            <th class="days_present_total" style="text-align: center">
                                                                {{ $student_attendance['days_present_total'] }}
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                Days Absent
                                                            </th>
                                                            @foreach ($student_attendance['attendance_data']->days_absent as $key => $data)
                                                                <th style="text-align:center">{{ $data }}  
                                                                </th>
                                                            @endforeach
                                                            <th class="days_absent_total" style="text-align: center">
                                                                {{ $student_attendance['days_absent_total'] }}
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                Times Tardy
                                                            </th>
                                                            @foreach ($student_attendance['attendance_data']->times_tardy as $key => $data)
                                                                <th style="text-align:center">{{ $data }}  
                                                                </th>
                                                            @endforeach
                                                            <th class="times_tardy_total" style="text-align: center">
                                                                {{ $student_attendance['times_tardy_total'] }}
                                                            </th>
                                                        </tr>
                                            </table>
                                </td>

                                <td>
                                        <table id="mytable" class="table">
                                                <tr>
                                                                                                    
                                                    <?php
                                                    $student_attendance = [];
                                                    $table_header = [
                                                            ['key' => 'Nov',],
                                                            ['key' => 'Dec',],
                                                            ['key' => 'Jan',],
                                                            ['key' => 'Feb',],
                                                            ['key' => 'Mar',],
                                                            ['key' => 'Apr',],
                                                            
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
                                                        
                                                        
                                                        $attendance_data = json_decode($data1->attendance_second);
    
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
                                                        
                                                        
                                                    
    
                                                        <th style="width: 90px">
                                                            <i style="font-size: 11px; color: red">Second Semester</i>
                                                        </th>
                                                            @foreach ($student_attendance['table_header'] as $data)
                                                                    <th>{{ $data['key'] }}</th> 
                                                            {{-- / {{ json_encode($data) }}  --}}
                                                            @endforeach
                                                    </tr>
                                                    <tr>
                                                            <th>
                                                                Days of School
                                                            </th>
                                                            @foreach ($student_attendance['attendance_data']->days_of_school as $key => $data)
                                                                <th style="text-align:center">{{ $data }}
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
                                                                <th style="text-align:center">{{ $data }} 
                                                                </th>
                                                            @endforeach
                                                            <th class="days_present_total" style="text-align: center">
                                                                {{ $student_attendance['days_present_total'] }}
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                Days Absent
                                                            </th>
                                                            @foreach ($student_attendance['attendance_data']->days_absent as $key => $data)
                                                                <th style="text-align:center">{{ $data }}  
                                                                </th>
                                                            @endforeach
                                                            <th class="days_absent_total" style="text-align: center">
                                                                {{ $student_attendance['days_absent_total'] }}
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                Times Tardy
                                                            </th>
                                                            @foreach ($student_attendance['attendance_data']->times_tardy as $key => $data)
                                                                <th style="text-align:center">{{ $data }}  
                                                                </th>
                                                            @endforeach
                                                            <th class="times_tardy_total" style="text-align: center">
                                                                {{ $student_attendance['times_tardy_total'] }}
                                                            </th>
                                                        </tr>
                                                </table>
                                </td>
                            </tr>        
                        @endif
                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td colspan="2">
                            <b>Female</b>
                        </td>
                    </tr>

                    @foreach ($Senior_firstsem_f as $key => $data1) 
                    <tr>
                        
                        
                        <td colspan="2">
                            <b style="font-size: 11px">
                                    {{ $key + 1 }}.{{ $data1->student_name }}
                            </b>
                            {{-- {{ $data1->attendance }}  --}}
                            {{-- <form action="{{ route('faculty.save-class-attendance') }}" method="POST" novalidate="novalidate"> --}}
                            @if($data1->attendance_first=="")

                            @else
                            
                            <tr>
                                <td>
                                        <table class="table">
                                                <tr>
                                                                                                    
                                                        <?php
                                                        $student_attendance = [];
                                                        $table_header = [
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
                                                            
                                                            
                                                            $attendance_data = json_decode($data1->attendance_first);
                                                            
        
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
                                                        
                                                        
                                                    
        
                                                        <th style="width: 90px">
                                                                <i style="font-size: 11px; color: red">First Semester</i>
                                                        </th>
                                                            @foreach ($student_attendance['table_header'] as $data)
                                                            <th>{{ $data['key'] }}</th> 
                                                            {{-- / {{ json_encode($data) }}  --}}
                                                            @endforeach
                                                    </tr>
                                                    <tr>
                                                            <th>
                                                                Days of School
                                                            </th>
                                                            @foreach ($student_attendance['attendance_data']->days_of_school as $key => $data)
                                                                <th style="text-align:center">{{ $data }}
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
                                                                <th style="text-align:center">{{ $data }} 
                                                                </th>
                                                            @endforeach
                                                            <th class="days_present_total" style="text-align: center">
                                                                {{ $student_attendance['days_present_total'] }}
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                Days Absent
                                                            </th>
                                                            @foreach ($student_attendance['attendance_data']->days_absent as $key => $data)
                                                                <th style="text-align:center">{{ $data }}  
                                                                </th>
                                                            @endforeach
                                                            <th class="days_absent_total" style="text-align: center">
                                                                {{ $student_attendance['days_absent_total'] }}
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                Times Tardy
                                                            </th>
                                                            @foreach ($student_attendance['attendance_data']->times_tardy as $key => $data)
                                                                <th style="text-align:center">{{ $data }}  
                                                                </th>
                                                            @endforeach
                                                            <th class="times_tardy_total" style="text-align: center">
                                                                {{ $student_attendance['times_tardy_total'] }}
                                                            </th>
                                                        </tr>
                                                </table>
                                </td>

                                <td>
                                        <table class="table">
                                                <tr>
                                                                                                    
                                                    <?php
                                                    $student_attendance = [];
                                                    $table_header = [
                                                        ['key' => 'Nov',],
                                                            ['key' => 'Dec',],
                                                            ['key' => 'Jan',],
                                                            ['key' => 'Feb',],
                                                            ['key' => 'Mar',],
                                                            ['key' => 'Apr',],
                                                            
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
                                                        
                                                        
                                                        $attendance_data = json_decode($data1->attendance_second);
    
                                                        
                                                    //    $attendance_data;
    
                                                    //     if ($EnrollmentMale[0]->attendance) {
                                                    //         $attendance_data = json_decode($EnrollmentMale[0]->attendance);
                                                    //     }    
    
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
                                                        
                                                        
                                                    
    
                                                        <th style="width: 90px">
                                                            <i style="font-size: 11px; color: red">Second Semester</i>
                                                        </th>
                                                            @foreach ($student_attendance['table_header'] as $data)
                                                                <th>{{ $data['key'] }}</th> 
                                                            {{-- / {{ json_encode($data) }}  --}}
                                                            @endforeach
                                                    </tr>
                                                        <tr>
                                                            <th>
                                                                Days of School
                                                            </th>
                                                            @foreach ($student_attendance['attendance_data']->days_of_school as $key => $data)
                                                                <th style="text-align:center">{{ $data }}
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
                                                                <th style="text-align:center">{{ $data }} 
                                                                </th>
                                                            @endforeach
                                                            <th class="days_present_total" style="text-align: center">
                                                                {{ $student_attendance['days_present_total'] }}
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                Days Absent
                                                            </th>
                                                            @foreach ($student_attendance['attendance_data']->days_absent as $key => $data)
                                                                <th style="text-align:center">{{ $data }}  
                                                                </th>
                                                            @endforeach
                                                            <th class="days_absent_total" style="text-align: center">
                                                                {{ $student_attendance['days_absent_total'] }}
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                Times Tardy
                                                            </th>
                                                            @foreach ($student_attendance['attendance_data']->times_tardy as $key => $data)
                                                                <th style="text-align:center">{{ $data }}  
                                                                </th>
                                                            @endforeach
                                                            <th class="times_tardy_total" style="text-align: center">
                                                                {{ $student_attendance['times_tardy_total'] }}
                                                            </th>
                                                        </tr>
                                                </table>

                                </td>
                            </tr>
                                    
                    
                                    
                                        
                            
                                            
                            @endif
                        
                        </td>
                    </tr>
                    @endforeach
                    
        </table>

        @else
            <table class="table no-margin table-striped table-bordered" style="margin-top: 3em; width: 100%">
                <thead>
                    <tr>
                        {{-- <th style="width: 30px">#</th> --}}
                        <th colspan="1" style="text-align:left">Grade and Section: <i style="color: red">{{ $Semester->grade_level.' - '.$Semester->section }}</i></th>        
                                                    
                        
                    </tr>
                </thead>
                <tbody>      
                                            
                    <tr>
                        <td colspan="1">
                            <b>Male</b> 
                        </td>
                    </tr>

                    @foreach ($attendance_male as $key => $data1) 
                    <tr>
                        {{-- <td>{{ $key + 1 }}.</td> --}}
                        <td>
                            <b style="font-size: 11px">
                                {{ $key + 1 }}.&nbsp;{{ $data1->student_name }}
                            </b>

                            
                            
                            @if($data1->attendance=="")

                            @else
                            
                                    <table id="mytable" class="table" style="margin-top: .5em">
                                        <tr>
                                                                                            
                                            <?php
                                            $student_attendance = [];
                                            $table_header = [
                                                    ['key' => 'Jun',],
                                                    ['key' => 'Jul',],
                                                    ['key' => 'Aug',],
                                                    ['key' => 'Sep',],
                                                    ['key' => 'Oct',],
                                                    ['key' => 'Nov',],
                                                    ['key' => 'Dec',],
                                                    ['key' => 'Jan',],
                                                    ['key' => 'Feb',],
                                                    ['key' => 'Mar',],
                                                    ['key' => 'Apr',],
                                                    ['key' => 'total',],
                                                ];
                                                
                                                $attendance_data = json_decode(json_encode([
                                                    'days_of_school' => [
                                                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                                                    ],
                                                    'days_present' => [
                                                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                                                    ],
                                                    'days_absent' => [
                                                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                                                    ],
                                                    'times_tardy' => [
                                                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                                                    ]
                                                ]));
                                                
                                                
                                                $attendance_data = json_decode($data1->attendance);
                                            //    $attendance_data;

                                            //     if ($EnrollmentMale[0]->attendance) {
                                            //         $attendance_data = json_decode($EnrollmentMale[0]->attendance);
                                            //     }    

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
                                                
                                                
                                            

                                                <th>
                                                    TITLE
                                                </th>
                                                    @foreach ($student_attendance['table_header'] as $data)
                                                            <th style="text-align: center">{{ $data['key'] }}</th> 
                                                    {{-- / {{ json_encode($data) }}  --}}
                                                    @endforeach
                                            </tr>
                                            <tr>
                                                <th>
                                                    Days of School
                                                </th>
                                                @foreach ($student_attendance['attendance_data']->days_of_school as $key => $data)
                                                    <th style="text-align:center">{{ $data }}
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
                                                    <th style="text-align:center">{{ $data }} 
                                                    </th>
                                                @endforeach
                                                <th class="days_present_total" style="text-align: center">
                                                    {{ $student_attendance['days_present_total'] }}
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Days Absent
                                                </th>
                                                @foreach ($student_attendance['attendance_data']->days_absent as $key => $data)
                                                    <th style="text-align:center">{{ $data }}  
                                                    </th>
                                                @endforeach
                                                <th class="days_absent_total" style="text-align: center">
                                                    {{ $student_attendance['days_absent_total'] }}
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Times Tardy
                                                </th>
                                                @foreach ($student_attendance['attendance_data']->times_tardy as $key => $data)
                                                    <th style="text-align:center">{{ $data }}  
                                                    </th>
                                                @endforeach
                                                <th class="times_tardy_total" style="text-align: center">
                                                    {{ $student_attendance['times_tardy_total'] }}
                                                </th>
                                            </tr>
                                        </table>
                    
                                    
                                        
                        @endif
                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td colspan="1">
                            <b>Female</b>
                        </td>
                    </tr>

                    @foreach ($attendance_female as $key => $data1) 
                    <tr>
                       
                        <td>
                            <b style="font-size: 11px">
                                {{ $key + 1 }}.&nbsp;{{ $data1->student_name }}
                            </b>                           
                                    <table class="table" style="margin-top: .5em">
                                        <tr>
                                                                                            
                                            <?php
                                            $student_attendance = [];
                                            $table_header = [
                                                    ['key' => 'Jun',],
                                                    ['key' => 'Jul',],
                                                    ['key' => 'Aug',],
                                                    ['key' => 'Sep',],
                                                    ['key' => 'Oct',],
                                                    ['key' => 'Nov',],
                                                    ['key' => 'Dec',],
                                                    ['key' => 'Jan',],
                                                    ['key' => 'Feb',],
                                                    ['key' => 'Mar',],
                                                    ['key' => 'Apr',],
                                                    ['key' => 'total',],
                                                ];
                                                
                                                $attendance_data = json_decode(json_encode([
                                                    'days_of_school' => [
                                                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                                                    ],
                                                    'days_present' => [
                                                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                                                    ],
                                                    'days_absent' => [
                                                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                                                    ],
                                                    'times_tardy' => [
                                                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                                                    ]
                                                ]));
                                                
                                                
                                                $attendance_data = json_decode($data1->attendance);
                                            //    $attendance_data;

                                            //     if ($EnrollmentMale[0]->attendance) {
                                            //         $attendance_data = json_decode($EnrollmentMale[0]->attendance);
                                            //     }    

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
                                            

                                                <th>
                                                    TITLE
                                                </th>
                                                    @foreach ($student_attendance['table_header'] as $data)
                                                            <th>{{ $data['key'] }}</th> 
                                                    {{-- / {{ json_encode($data) }}  --}}
                                                    @endforeach
                                            </tr>
                                            <tr>
                                                <th>
                                                    Days of School
                                                </th>
                                                @foreach ($student_attendance['attendance_data']->days_of_school as $key => $data)
                                                    <th style="text-align:center">{{ $data }}
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
                                                    <th style="text-align:center">{{ $data }} 
                                                    </th>
                                                @endforeach
                                                <th class="days_present_total" style="text-align: center">
                                                    {{ $student_attendance['days_present_total'] }}
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Days Absent
                                                </th>
                                                @foreach ($student_attendance['attendance_data']->days_absent as $key => $data)
                                                    <th style="text-align:center">{{ $data }}  
                                                    </th>
                                                @endforeach
                                                <th class="days_absent_total" style="text-align: center">
                                                    {{ $student_attendance['days_absent_total'] }}
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Times Tardy
                                                </th>
                                                @foreach ($student_attendance['attendance_data']->times_tardy as $key => $data)
                                                    <th style="text-align:center">{{ $data }}  
                                                    </th>
                                                @endforeach
                                                <th class="times_tardy_total" style="text-align: center">
                                                    {{ $student_attendance['times_tardy_total'] }}
                                                </th>
                                            </tr>
                                        </table>
                    
                                    
                                      
                        </td>
                    </tr>
                    @endforeach
                                                    
                    
                    
                </table>
                <p style="text-align: right; font-size: 11px"><b>{{ $FacultyInformation->first_name.' '.$FacultyInformation->middle_name.' '.$FacultyInformation->last_name }}</b> <i>Class Adviser</i></p>
        @endif
</body>
</html>