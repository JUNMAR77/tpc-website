<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Semester:{{ $sem }} / Quarter: {{ $quarter }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
        
        .page-break {
            page-break-after: always;
        }
        td {
            border: 1px solid #000;
            padding: 2px;
        }
        th {
            border: 1px solid #000;
            padding: 2px;
        }
        table {
            width: 100%;
            border-spacing: 0;
            border-collapse: collapse;
            font-size : 11px;
            border: 1px solid black;
            
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
    {{--  <p class="heading1">Republic of the Philippines
    <p class="heading1">Department of Education</p>
    <p class="heading1">Region III</p>
    <p class="heading1">Division of Bataan</p>
    <br/>  --}}
    <h2 class="heading2 heading2-title">Saint John Academy</h2>
    <p class="heading2 heading2-subtitle">Dinalupihan, Bataan</p>
    
    <p class="report-progress m0">SENIOR HIGH SCHOOL</p>
    <p class="report-progress m0">S.Y. {{ $ClassSubjectDetail ? $ClassSubjectDetail->school_year : '' }}</p>
    {{--  <p class="report-progress m0">( {{ $ClassSubjectDetail ?  $ClassSubjectDetail->grade_level >= 11 ? 'SENIOR HIGH SCHOOL' : 'JUNIOR HIGH SCHOOL' : ''}} )</p>  --}}
    <img style="margin-top: -.4em; margin-left: 9em" class="logo" width="100" src="{{ asset('img/SHS_logo.png') }}" />
    <br/>
    <br/>
    {{--  <p class="p0 m0 student-info">Grade sheet</p>  --}}
    {{--  <p class="p0 m0 student-info">School Year : <b>{{ $ClassSubjectDetail ? $ClassSubjectDetail->school_year : '' }}</b</p>  --}}
    <p class="p0 m0 student-info">Grade & Section : <b>{{ $ClassSubjectDetail ? $ClassSubjectDetail->grade_level : '' }} - {{ $ClassSubjectDetail ? $ClassSubjectDetail->section : '' }}</b</p>
    <p class="p0 m0 student-info">Semester: <span class="text-red"><i>{{ $sem }}</i></span> Quarter: <span class="text-red"><i>{{ $quarter }}</i></span></p>
        
    <br/>
   
    <center>
        @include('control_panel_faculty.my_advisory_class.partials.data_senior_gradesheet')
    </center>
    <p style="text-align: right"><b>{{$ClassSubjectDetail->first_name }} {{$ClassSubjectDetail->middle_name}} {{$ClassSubjectDetail->last_name}}</b> - <i>Class Adviser</i></p>

</body>
</html>