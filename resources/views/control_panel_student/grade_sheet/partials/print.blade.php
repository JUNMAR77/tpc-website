<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Student Gradesheet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
            * {
                font-family: Arial, Times, serif;
            }
            .page-break {
                page-break-after: always;
            }
            th, td {
                border: 1px solid #000;
                padding: 3px;
            }
            table {
                width: 100%;
                border-spacing: 0;
                border-collapse: collapse;
                font-size : 11px;
            }
            .table-student-info {
                width: 100%;
            }            
            .table-student-info th, .table-student-info td {
                border: none;
                padding: 0 2px 2px 2px;
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
            }
            .sja-logo {
                top: 10px;
                right: 10px;
            }
            .deped-bataan-logo {
                top: 10px;
                left: 10px;
            }
            .report-progress {
                text-align: center;
                font-size: 12px;
                font-weight: 700;
            }
            .report-progress-left {
                text-align: left;
                font-size: 12px;
                font-weight: 700;
            }
            .grade7{
                border-bottom: 6px solid green;
                margin-top: 0in;
            }

            .stem{
                border-bottom: 6px solid green;
                margin-top: -10px;
            }

            .grade8{
                border-bottom: 6px solid yellow;
                margin-top: 0in;
            }

            .abm{
                border-bottom: 6px solid yellow;
                margin-top: -10px;
            }

            .grade9{
                border-bottom: 6px solid #bb0a1e;
                margin-top: 0in;
            }

            .grade10{
                border-bottom: 6px solid blue;
                margin-top: 0in;
            }

            .humss{
                border-bottom: 6px solid blue;
                margin-top: -10px;
            }
        </style>
</head>
<body>

        @if($ClassDetail->section_grade_level == 7)
            <p class="grade7"></p>
        @elseif($ClassDetail->section_grade_level == 8)
            <p class="grade8"></p>
        @elseif($ClassDetail->section_grade_level == 9)
            <p class="grade9"></p>
        @elseif($ClassDetail->section_grade_level == 10)
            <p class="grade10"></p>
        @elseif($ClassDetail->grade_level == 11)

            @if($ClassDetail->strand_id == 1)
                <p class="grade9"></p>
            @elseif($ClassDetail->strand_id == 2)
                <p class="grade7"></p>
                <p class="stem"></p>
            @elseif($ClassDetail->strand_id == 3)
                <p class="grade10"></p>
                <p class="humss"></p>
            @elseif($ClassDetail->strand_id == 4)
                <p class="grade8"></p>
                <p class="abm"></p>
            @endif

        @elseif($ClassDetail->grade_level == 12)
            
            @if($ClassDetail->strand_id == 1)
                <p class="grade9"></p>
            @elseif($ClassDetail->strand_id == 2)
                <p class="grade7"></p>
                <p class="stem"></p>
            @elseif($ClassDetail->strand_id == 3)
                <p class="grade10"></p>
                <p class="humss"></p>
            @elseif($ClassDetail->strand_id == 4)
                <p class="grade8"></p>
                <p class="abm"></p>
            @endif
            
        @endif
        
    <?php 
        $Semester = \App\Semester::where('current', 1)->first()->id; 
    ?>
                <p class="heading1">Republic of the Philippines</p>
                <p class="heading1">Department of Education</p>
                <p class="heading1">Region III</p>
                <p class="heading1">Division of Bataan</p>
                <br/>
                <h2 class="heading2 heading2-title">St. John's Academy Inc</h2>
                <p class="heading2 heading2-subtitle"><b>K to 12 BASIC EDUCATION CURRICULUM</b></p>
                <p class="heading2 heading2-subtitle"><b>Formerly Saint John Academy</b></p>
                <p class="heading2 heading2-subtitle">Dinalupihan, Bataan</p>
                <br/>
                <p class="report-progress m0">REPORT ON LEARNING PROGRESS AND ACHIEVEMENT</p>
                <p class="report-progress m0">( {{ $ClassDetail ?  $ClassDetail->section_grade_level >= 11 ? 'SENIOR HIGH SCHOOL' : 'JUNIOR HIGH SCHOOL' : ''}} )</p>
                <img style="margin-right: 3em; margin-top: {{ $ClassDetail ?  $ClassDetail->section_grade_level >= 11 ? '4em' : '4.5em' : ''}}"  class="logo sja-logo" width="{{ $ClassDetail ?  $ClassDetail->section_grade_level >= 11 ? 115 : 100 : ''}}" src="{{ $ClassDetail ?  $ClassDetail->section_grade_level >= 11 ? asset('img/SHS_logo.png') : asset('img/sja-logo.png') : ''}}" />
                <img style="margin-left: 3em; margin-top: 4.5em;" class="logo deped-bataan-logo" width="100" src="{{ asset('img/deped-bataan-logo.png') }}" />
                <br/>

                <table class="table-student-info">
                    <tr>
                        <td>
                            <p class="p0 m0 student-info"><b>Name</b> : {{ ucfirst($StudentInformation->last_name). ', ' .ucfirst($StudentInformation->first_name). ' ' . ucfirst($StudentInformation->middle_name) }}</p>
                        </td>
                        <td>
                            <p class="p0 m0 student-info"><b>LRN</b> : {{ $StudentInformation->user->username }}</p>
                        </td>
                    </tr>                    
                    <tr>
                        <td>
                            <p class="p0 m0 student-info"><b>Birthdate</b> : {{ $StudentInformation->birthdate ? date_format(date_create($StudentInformation->birthdate), 'F d, Y') : '' }}</p>
                        </td>
                        <td>
                            <p class="p0 m0 student-info"><b>Age</b> : 
                             {{ $StudentInformation->age_may }} years old</p>                             
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="p0 m0 student-info"><b>School</b> Year : {{ $ClassDetail ? $ClassDetail->school_year : '' }}</p>
                        </td>
                        <td>
                            <p class="p0 m0 student-info"><b>Sex</b> : {{ $StudentInformation->gender == 1 ? "Male" : "Female" }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="p0 m0 student-info"><b>Grade & Section </b>: {{ $ClassDetail ? $ClassDetail->section_grade_level : '' }} - {{ $ClassDetail ? $ClassDetail->section : '' }}</p>
                        </td>
                        <td>                            
                        </td>
                    </tr>
                    <tr>
                        @if ($grade_level >= 11)
                            @if($Semester == 1)
                                <td>
                                    <p class="p0 m0 student-info"><b>Track/Strand - Academic:</b> 
                                        <?php  $strand_name = \App\Strand::where('id', $ClassDetail->strand_id)
                                                ->first(); 
                                                echo $strand_name->strand;
                                        ?>                                        
                                    </p>
                                    <p class="p0 m0 student-info"><b>Semester</b> : <i style="color: red">First</i></p>
                                </td>
                                <td>                                        
                                </td>
                            @else
                                <td>
                                    <p class="p0 m0 student-info"><b>Track/Strand - Academic:</b> 
                                        <?php  $strand_name = \App\Strand::where('id', $ClassDetail->strand_id)
                                                ->first(); 
                                                echo $strand_name->strand;
                                        ?>                                        
                                    </p>
                                    <p class="p0 m0 student-info"><b>Semester</b> : <i style="color: red">Second</i></p>
                                </td>
                                <td>                                        
                                </td>
                            @endif
                        @endif
                    </tr>
                </table> 
    <br/>
    
    @if ($grade_level >= 11)         
        <?php 
            $Semester = \App\Semester::where('current', 1)->first()->id; 
        ?>
        @if($Semester == 1)
            @include('control_panel_student.grade_sheet.partials.grade_sheet.senior.first_sem')
        @else
            @include('control_panel_student.grade_sheet.partials.grade_sheet.senior.second_sem')            
        @endif
    @else
        @include('control_panel_student.grade_sheet.partials.grade_sheet.junior_grades')
    @endif
</body>
</html>