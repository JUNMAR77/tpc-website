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
    
    <h2 class="heading2 heading2-title">Saint John Academy</h2>
    <p class="heading2 heading2-subtitle">Dinalupihan, Bataan</p>
    
    <p class="heading1">Republic of the Philippines
    <p class="heading1">Department of Education</p>
    <p class="heading1">Region III</p>
    <p class="heading1">Division of Bataan</p>
    <br/>
    <p class="report-progress m0">REPORT ON LEARNING PROGRESS AND ACHIEVEMENT</p>
    <p class="report-progress m0">( {{ $ClassSubjectDetail ?  $ClassSubjectDetail->grade_level >= 11 ? 'SENIOR HIGH SCHOOL' : 'JUNIOR HIGH SCHOOL' : ''}} )</p>
    <img style="margin-left: 8em" class="logo" width="100" src="{{ asset('img/sja-logo.png') }}" />
    <br/>
    <p class="p0 m0 student-info">Grade sheet</p>
    <p class="p0 m0 student-info">School Year : <b>{{ $ClassSubjectDetail ? $ClassSubjectDetail->school_year : '' }}</b</p>
    <p class="p0 m0 student-info">Grade & Section : <b>{{ $ClassSubjectDetail ? $ClassSubjectDetail->grade_level : '' }} - {{ $ClassSubjectDetail ? $ClassSubjectDetail->section : '' }}</b</p>
    {{--  <p class="p0 m0 student-info">Student Name : <b>{{ ucfirst($StudentInformation->last_name). ', ' .ucfirst($StudentInformation->first_name). ' ' . ucfirst($StudentInformation->middle_name) }}</b</p>  --}}
    <br/>
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
    <p class="p0 m0 student-info">Faculty : {{ ucfirst($FacultyInformation->last_name). ', ' .ucfirst($FacultyInformation->first_name). ' ' . ucfirst($FacultyInformation->middle_name) }}</p>
    <p class="p0 m0 student-info">Subject : <span class="text-red"><i>{{ $ClassSubjectDetail->subject }}</i></span> 
    {{--  Time : <span class="text-red"><i>{{ strftime('%r',strtotime($ClassSubjectDetail->class_time_from)) . ' - ' . strftime('%r',strtotime($ClassSubjectDetail->class_time_to)) }}</i></span> Days : <span class="text-red"><i>{{ $ClassSubjectDetail->class_days }}</i></span>  --}}
    Schedule : <span class="text-red"><i>{{ rtrim($daysDisplay, '/') }}</i></span>
    </p>
    <table class="table no-margin">
        <thead>
            <tr>
                <th>#</th>
                <th>Student Name</th>
                
             @if ($ClassSubjectDetail->grade_level >= 11) 
                <th>First Quarter</th>
                <th>Second Quarter</th>
            @elseif($ClassSubjectDetail->grade_level <= 10) 
                <th>First Grading</th>
                <th>Second Grading</th>
                <th>Third Grading</th>
                <th>Fourth Grading</th>
             @endif 
                <th>Final Grading</th>
            </tr>
        </thead>
        <tbody>
             @if ($ClassSubjectDetail->grade_level >= 11) 
                @if ($EnrollmentMale)
                    <tr>
                        <td colspan="5">Male</td>
                    </tr>
                    @foreach ($EnrollmentMale as $key => $data)
                        <tr data-student_enrolled_subject_id="{{ base64_encode($data->student_enrolled_subject_id) }}" data-student_id="{{ base64_encode($data->id) }}" data-enrollment_id="{{ base64_encode($data->enrollment_id) }}">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->student_name }}</td>
                            <td style="text-align:center">
                                {{ $data->fir_g ? $data->fir_g > 0 ? round($data->fir_g) : '' : '' }}
                            </td>
                            <td style="text-align:center">
                                {{ $data->sec_g ? $data->sec_g > 0 ? round($data->sec_g) : '' : '' }}
                            </td>
                            <td style="text-align:center">
                                    @if ($data->fir_g && $data->sec_g)
                                    @if ($data->fir_g > 0 && $data->sec_g > 0)
                                        <span class="text-red final-ratings_{{ $data->student_enrolled_subject_id }}">
                                            <strong>
                                                    <?php
                                                    $g_ctr = 0;
                                                    $g_ctr += $data->fir_g ? $data->fir_g > 0 ? 1 : 0 : 0;
                                                    $g_ctr += $data->sec_g ? $data->sec_g > 0 ? 1 : 0 : 0;
                                                   
                                                ?>
                                                {{ ($g_ctr ? round(($data->fir_g + $data->sec_g ) / $g_ctr) : '')  }}
                                            </strong>
                                        </span>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                @if ($EnrollmentFemale)
                    <tr>
                        <td colspan="5">Female</td>
                    </tr>
                    @foreach ($EnrollmentFemale as $key => $data)
                        <tr data-student_enrolled_subject_id="{{ base64_encode($data->student_enrolled_subject_id) }}" data-student_id="{{ base64_encode($data->id) }}" data-enrollment_id="{{ base64_encode($data->enrollment_id) }}">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->student_name }}</td>
                            <td style="text-align:center">
                                {{ $data->fir_g ? round($data->fir_g) : '' }}
                            </td>
                            <td style="text-align:center">
                                {{ $data->sec_g ? round($data->sec_g) : '' }}
                            </td>
                            <td style="text-align:center">
                                @if ($data->fir_g && $data->sec_g)
                                    @if ($data->fir_g > 0 && $data->sec_g > 0)
                                        <span class="text-red final-ratings_{{ $data->student_enrolled_subject_id }}">
                                            <strong>
                                                    <?php
                                                    $g_ctr = 0;
                                                    $g_ctr += $data->fir_g ? $data->fir_g > 0 ? 1 : 0 : 0;
                                                    $g_ctr += $data->sec_g ? $data->sec_g > 0 ? 1 : 0 : 0;
                                                   
                                                ?>
                                                {{ ($g_ctr ? round(($data->fir_g + $data->sec_g ) / $g_ctr) : '')  }}
                                            </strong>
                                        </span>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            @elseif($ClassSubjectDetail->grade_level <= 10) 
                @if ($EnrollmentMale)
                    @foreach ($EnrollmentMale as $key => $data)
                        <tr data-student_enrolled_subject_id="{{ base64_encode($data->student_enrolled_subject_id) }}" data-student_id="{{ base64_encode($data->id) }}" data-enrollment_id="{{ base64_encode($data->enrollment_id) }}">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->student_name }}</td>
                            <td>
                                <center>{{ $data->fir_g ? $data->fir_g > 0 ? round($data->fir_g) : '' : '' }}</center>
                            </td>
                            <td>
                                <center>{{ $data->sec_g ? $data->sec_g > 0 ? round($data->sec_g) : '' : '' }}</center>
                            </td>
                            <td>
                                <center>{{ $data->thi_g ? $data->thi_g > 0 ? round($data->thi_g) : '' : '' }}</center>
                            </td>
                            <td>
                                <center>{{ $data->fou_g ? $data->fou_g > 0 ? round($data->fou_g) : '' : '' }}</center>
                            </td>
                            <td>
                                @if ($data->fou_g && $data->fou_g > 0)
                                    <span class="text-red final-ratings_{{ $data->student_enrolled_subject_id }}">
                                        <center>
                                            <strong>
                                                <?php
                                                    $g_ctr = 0;
                                                    $g_ctr += $data->fir_g ? $data->fir_g > 0 ? 1 : 0 : 0;
                                                    $g_ctr += $data->sec_g ? $data->sec_g > 0 ? 1 : 0 : 0;
                                                    $g_ctr += $data->thi_g ? $data->thi_g > 0 ? 1 : 0 : 0;
                                                    $g_ctr += $data->fou_g ? $data->fou_g > 0 ? 1 : 0 : 0;
                                                ?>
                                                {{ ($g_ctr ? round(($data->fir_g + $data->sec_g + $data->thi_g + $data->fou_g) / $g_ctr) : '')  }}
                                            
                                            </strong>
                                        </center>
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                @if ($EnrollmentFemale)
                    @foreach ($EnrollmentFemale as $key => $data)
                        <tr data-student_enrolled_subject_id="{{ base64_encode($data->student_enrolled_subject_id) }}" data-student_id="{{ base64_encode($data->id) }}" data-enrollment_id="{{ base64_encode($data->enrollment_id) }}">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->student_name }}</td>
                            <td>
                                    <center>{{ $data->fir_g ? $data->fir_g > 0 ? round($data->fir_g) : '' : '' }}</center>
                            </td>
                            <td>
                                    <center>{{ $data->sec_g ? $data->sec_g > 0 ? round($data->sec_g) : '' : '' }}</center>
                            </td>
                            <td>
                                    <center>{{ $data->thi_g ? $data->thi_g > 0 ? round($data->thi_g) : '' : '' }}</center>
                            </td>
                            <td>
                                    <center>{{ $data->fou_g ? $data->fou_g > 0 ? round($data->fou_g) : '' : '' }}</center>
                            </td>
                            <td>
                                @if ($data->fou_g && $data->fou_g > 0)
                                    <span class="text-red final-ratings_{{ $data->student_enrolled_subject_id }}">
                                        <strong>
                                            <center>
                                                <?php
                                                    $g_ctr = 0;
                                                    $g_ctr += $data->fir_g ? $data->fir_g > 0 ? 1 : 0 : 0;
                                                    $g_ctr += $data->sec_g ? $data->sec_g > 0 ? 1 : 0 : 0;
                                                    $g_ctr += $data->thi_g ? $data->thi_g > 0 ? 1 : 0 : 0;
                                                    $g_ctr += $data->fou_g ? $data->fou_g > 0 ? 1 : 0 : 0;
                                                ?>
                                                {{ ($g_ctr ? round(($data->fir_g + $data->sec_g + $data->thi_g + $data->fou_g) / $g_ctr) : '')  }}
                                            </center>
                                        </strong>
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
             @endif 
        </tbody>
    </table>
</body>
</html>