<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
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
    {{--  <p class="heading1">Republic of the Philippines
    <p class="heading1">Department of Education</p>
    <p class="heading1">Region III</p>
    <p class="heading1">Division of Bataan</p>
    <br/>  --}}
    <h2 class="heading2 heading2-title">Saint John Academy</h2>
    <p class="heading2 heading2-subtitle">Dinalupihan, Bataan</p>
    
    <p class="report-progress m0">JUNIOR HIGH SCHOOL</p>
    <p class="report-progress m0">S.Y. {{ $ClassSubjectDetail ? $ClassSubjectDetail->school_year : '' }}</p>
    {{--  <p class="report-progress m0">( {{ $ClassSubjectDetail ?  $ClassSubjectDetail->grade_level >= 11 ? 'SENIOR HIGH SCHOOL' : 'JUNIOR HIGH SCHOOL' : ''}} )</p>  --}}
    <img style="margin-top: -.4em; margin-left: 9em" class="logo" width="100" src="{{ asset('img/sja-logo.png') }}" />
    <br/>
    <br/>
    {{--  <p class="p0 m0 student-info">Grade sheet</p>  --}}
    {{--  <p class="p0 m0 student-info">School Year : <b>{{ $ClassSubjectDetail ? $ClassSubjectDetail->school_year : '' }}</b</p>  --}}
    <p class="p0 m0 student-info">Grade & Section : <b>{{ $ClassSubjectDetail ? $ClassSubjectDetail->grade_level : '' }} - {{ $ClassSubjectDetail ? $ClassSubjectDetail->section : '' }}</b></p>
    <p class="p0 m0 student-info">Quarter : <b><i>{{ $quarter }}</i></b></p>
    <br/>
   
    
    <table style="margin-top: -.8em" class="table no-margin">
            <thead>
                <tr>
                        <th style="width: 30px">#</th>
                        <th style="width: 200px">Student Name</th>                                       
                        {{--  @foreach ($AdvisorySubject as $sub)
                        <th><center>{{$sub->subject}} {{$sub->id}}</center></th>                                                                        
                        @endforeach  --}}
                        @if($quarter == 'First - Second')
                            <th style="width: ; text-align: center">First Grading</th>
                            <th style="width: ; text-align: center">Second Grading</th>
                        @elseif($quarter =='First - Third')
                            <th style="width: ; text-align: center">First Grading</th>
                            <th style="width: ; text-align: center">Second Grading</th>
                            <th style="width: ; text-align: center">Third Grading</th>
                        @elseif($quarter =='First - Fourth')
                            <th style="width: ; text-align: center">First Grading</th>
                            <th style="width: ; text-align: center">Second Grading</th>
                            <th style="width: ; text-align: center">Third Grading</th>
                            <th style="width: ; text-align: center">Fourth Grading</th>
                        @endif

                        <th style="width: 80px; text-align: center">GENERAL AVERAGE</th>
                        <th style="width: 80px; text-align: center">REMARKS</th>
                </tr>
            </thead>
            <tbody> 
                
                @if($quarter == 'First - Second')
                    <tr>
                        <td colspan="6">
                            <b>Male</b>
                        </td>
                    </tr>
                    @foreach($GradeSheetMale as $key => $sub)
                    <tr>
                        <td>{{ $key + 1 }}.</td>
                        <td>{{ $sub->student_name }}</td>
                        <td style="text-align: center">
                            <?php
                            $formattedNum = number_format(round($average = ($sub->filipino + $sub->english + $sub->math + $sub->science + $sub->ap + $sub->ict + $sub->mapeh + $sub->esp +$sub->religion)/9), 0);
                            echo $formattedNum;
                            ?>                                                
                        </td>
                        <td style="text-align: center">
                            <?php
                                $sec_g = \App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first();
                                $result = number_format(round($average = ($sec_g->filipino + $sec_g->english + $sec_g->math + $sec_g->science + $sec_g->ap + $sec_g->ict + $sec_g->mapeh + $sec_g->esp +$sec_g->religion)/9), 0);
                                echo $result;
                            ?>    
                            </td>
                        <td style="text-align: center">
                            <?php 
                                echo round($result_final = (round($formattedNum) + round($result)) / 2);
                            ?>
                        </td>
                        @if(round($result_final) >= 75 && round($result_final) <= 89)
                            <td>
                                <center>Passed</center>
                            </td>
                        @elseif(round($result_final) >= 90 && round($result_final) <= 94)
                            <td>
                                <center>with honors</center>
                            </td>
                        @elseif(round($result_final)>= 95 && round($result_final) <= 97)
                            <td>
                                <center>with high honors</center>
                            </td>
                        @elseif(round($result_final) >= 98 && round($result_final) <= 100)
                            <td>
                                <center>with highest honors</center>
                            </td>
                        @elseif(round($result_final) < 75)
                            <td>
                                <center>Failed</center>
                            </td>
                        @endif
                    </tr>    
                    @endforeach
                    <tr>
                        <td colspan="6">
                            <b>Female</b>
                        </td>
                    </tr>
                    @foreach($GradeSheetFeMale as $key => $sub)
                    <tr>
                        <td>{{ $key + 1 }}.</td>
                        <td>{{ $sub->student_name }}</td>
                        <td style="text-align: center">
                            <?php
                            $formattedNum = number_format(round($average = ($sub->filipino + $sub->english + $sub->math + $sub->science + $sub->ap + $sub->ict + $sub->mapeh + $sub->esp +$sub->religion)/9), 0);
                            echo $formattedNum;
                            ?>                                                
                        </td>
                        <td style="text-align: center">
                            <?php
                                $sec_g = \App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first();
                                $result = number_format(round($average = ($sec_g->filipino + $sec_g->english + $sec_g->math + $sec_g->science + $sec_g->ap + $sec_g->ict + $sec_g->mapeh + $sec_g->esp +$sec_g->religion)/9), 0);
                                echo $result;
                            ?>    
                            </td>
                        <td style="text-align: center">
                            <?php 
                                echo round($result_final = (round($formattedNum) + round($result)) / 2);
                            ?>
                        </td>
                        @if(round($result_final) >= 75 && round($result_final) <= 89)
                            <td>
                                <center>Passed</center>
                            </td>
                        @elseif(round($result_final) >= 90 && round($result_final) <= 94)
                            <td>
                                <center>with honors</center>
                            </td>
                        @elseif(round($result_final)>= 95 && round($result_final) <= 97)
                            <td>
                                <center>with high honors</center>
                            </td>
                        @elseif(round($result_final) >= 98 && round($result_final) <= 100)
                            <td>
                                <center>with highest honors</center>
                            </td>
                        @elseif(round($result_final) < 75)
                            <td>
                                <center>Failed</center>
                            </td>
                        @endif
                    </tr>    
                    @endforeach
                @elseif($quarter =='First - Third')
                    <tr>
                        <td colspan="7">
                            <b>Male</b>
                        </td>
                    </tr>
                    @foreach($GradeSheetMale as $key => $sub)
                    <tr>
                        <td>{{ $key + 1 }}.</td>
                        <td>{{ $sub->student_name }}</td>
                        <td style="text-align: center">
                            <?php
                            $formattedNum = number_format(round($average = ($sub->filipino + $sub->english + $sub->math + $sub->science + $sub->ap + $sub->ict + $sub->mapeh + $sub->esp +$sub->religion)/9), 0);
                            echo $formattedNum;
                            ?>                                                
                        </td>
                        <td style="text-align: center">
                            <?php
                                $sec_g = \App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first();
                                $sec_result = number_format(round($average = ($sec_g->filipino + $sec_g->english + $sec_g->math + $sec_g->science + $sec_g->ap + $sec_g->ict + $sec_g->mapeh + $sec_g->esp +$sec_g->religion)/9), 0);
                                echo $sec_result;
                            ?>    
                        </td>
                        <td style="text-align: center">
                            <?php
                                $thi_g = \App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first();
                                $thi_result = number_format(round($average = ($thi_g->filipino + $thi_g->english + $thi_g->math + $thi_g->science + $thi_g->ap + $thi_g->ict + $thi_g->mapeh + $thi_g->esp +$thi_g->religion)/9), 0);
                                echo $thi_result;
                            ?>    
                        </td>
                        <td style="text-align: center">
                            <?php 
                                // echo round($result_final = ($formattedNum + $sec_result + $thi_result) / 3);
                                echo round($result_final = (round($formattedNum) + round($sec_result) + round($thi_result)) / 3);
                            ?>
                        </td>
                        @if(round($result_final) >= 75 && round($result_final) <= 89)
                            <td>
                                <center>Passed</center>
                            </td>
                        @elseif(round($result_final) >= 90 && round($result_final) <= 94)
                            <td>
                                <center>with honors</center>
                            </td>
                        @elseif(round($result_final)>= 95 && round($result_final) <= 97)
                            <td>
                                <center>with high honors</center>
                            </td>
                        @elseif(round($result_final) >= 98 && round($result_final) <= 100)
                            <td>
                                <center>with highest honors</center>
                            </td>
                        @elseif(round($result_final) < 75)
                            <td>
                                <center>Failed</center>
                            </td>
                        @endif
                    </tr>    
                    @endforeach
                    <tr>
                        <td colspan="7">
                            <b>Female</b>
                        </td>
                    </tr>
                    @foreach($GradeSheetFeMale as $key => $sub)
                    <tr>
                        <td>{{ $key + 1 }}.</td>
                        <td>{{ $sub->student_name }}</td>
                        <td style="text-align: center">
                            <?php
                            $formattedNum = number_format(round($average = ($sub->filipino + $sub->english + $sub->math + $sub->science + $sub->ap + $sub->ict + $sub->mapeh + $sub->esp +$sub->religion)/9), 0);
                            echo $formattedNum;
                            ?>                                                
                        </td>
                        <td style="text-align: center">
                                <?php
                                    $sec_g = \App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first();
                                    $sec_result = number_format(round($average = ($sec_g->filipino + $sec_g->english + $sec_g->math + $sec_g->science + $sec_g->ap + $sec_g->ict + $sec_g->mapeh + $sec_g->esp +$sec_g->religion)/9), 0);
                                    echo $sec_result;
                                ?>    
                        </td>
                        <td style="text-align: center">
                                <?php
                                    $thi_g = \App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first();
                                    $thi_result = number_format(round($average = ($thi_g->filipino + $thi_g->english + $thi_g->math + $thi_g->science + $thi_g->ap + $thi_g->ict + $thi_g->mapeh + $thi_g->esp +$thi_g->religion)/9), 0);
                                    echo $thi_result;
                                ?>    
                        </td>
                        <td style="text-align: center">
                                <?php 
                                    // echo round($result_final = ($formattedNum + $sec_result + $thi_result) / 3);
                                    echo round($result_final = (round($formattedNum) + round($sec_result) + round($thi_result)) / 3);
                                ?>
                            </td>
                        @if(round($result_final) >= 75 && round($result_final) <= 89)
                            <td>
                                <center>Passed</center>
                            </td>
                        @elseif(round($result_final) >= 90 && round($result_final) <= 94)
                            <td>
                                <center>with honors</center>
                            </td>
                        @elseif(round($result_final)>= 95 && round($result_final) <= 97)
                            <td>
                                <center>with high honors</center>
                            </td>
                        @elseif(round($result_final) >= 98 && round($result_final) <= 100)
                            <td>
                                <center>with highest honors</center>
                            </td>
                        @elseif(round($result_final) < 75)
                            <td>
                                <center>Failed</center>
                            </td>
                        @endif
                    </tr>    
                    @endforeach
                @elseif($quarter =='First - Fourth')
                    <tr>
                        <td colspan="8">
                            <b>Male</b>
                        </td>
                    </tr>
                    @foreach($GradeSheetMale as $key => $sub)
                    <tr>
                        <td>{{ $key + 1 }}.</td>
                        <td>{{ $sub->student_name }}</td>
                        <td style="text-align: center">
                            <?php
                            $formattedNum = number_format(round($average = ($sub->filipino + $sub->english + $sub->math + $sub->science + $sub->ap + $sub->ict + $sub->mapeh + $sub->esp +$sub->religion)/9), 0);
                            echo $formattedNum;
                            ?>                                                
                        </td>
                        <td style="text-align: center">
                            <?php
                                $sec_g = \App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first();
                                $sec_result = number_format(round($average = ($sec_g->filipino + $sec_g->english + $sec_g->math + $sec_g->science + $sec_g->ap + $sec_g->ict + $sec_g->mapeh + $sec_g->esp +$sec_g->religion)/9), 0);
                                echo $sec_result;
                            ?>    
                        </td>
                        <td style="text-align: center">
                            <?php
                                $thi_g = \App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first();
                                $thi_result = number_format(round($average = ($thi_g->filipino + $thi_g->english + $thi_g->math + $thi_g->science + $thi_g->ap + $thi_g->ict + $thi_g->mapeh + $thi_g->esp +$thi_g->religion)/9), 0);
                                echo $thi_result;
                            ?>    
                        </td>
                        <td style="text-align: center">
                            <?php
                                $fou_g = \App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first();
                                $fou_result = number_format(round($average = ($fou_g->filipino + $fou_g->english + $fou_g->math + $fou_g->science + $fou_g->ap + $fou_g->ict + $fou_g->mapeh + $fou_g->esp +$fou_g->religion)/9), 0);
                                echo $fou_result;
                            ?>    
                        </td>
                        <?php                                                    
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->filipino);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->filipino);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->filipino);
                         $subj_1 = round(($fou_g + $sec_g + $thi_g + $sub->filipino) / 4);
                                                                        
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->english);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->english);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->english);
                        $subj_2 = round(($fou_g + $sec_g + $thi_g + $sub->english) / 4);
                                                                        
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->math);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->math);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->math);
                        $subj_3 = round(($fou_g + $sec_g + $thi_g + $sub->math) / 4);
                                                                            
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->science);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->science);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->science);
                        $subj_4 = round(($fou_g + $sec_g + $thi_g + $sub->science) / 4);
                                                                        
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->ap);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->ap);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->ap);
                        $subj_5 = round(($fou_g + $sec_g + $thi_g + $sub->ap) / 4);
                                                                        
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->esp);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->esp);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->esp);
                        $subj_6 = round(($fou_g + $sec_g + $thi_g + $sub->esp) / 4);
                                                                            
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->ict);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->ict);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->ict);
                        $subj_7 = round(($fou_g + $sec_g + $thi_g + $sub->ict) / 4);
                                                                            
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);
                        $subj_8 = round(($fou_g + $sec_g + $thi_g + $sub->mapeh) / 4);
                                                                        
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->religion);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->religion);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->religion);
                        $subj_9 = round(($fou_g + $sec_g + $thi_g + $sub->religion) / 4);
                        ?>
                    
                        <td style="text-align:center">                                                                                 
                            <?php
                                $result_final =  (round($subj_1) + round($subj_2) + round($subj_3) + round($subj_4) + round($subj_5) + round($subj_6) + round($subj_7) + round($subj_8) + round($subj_9) )/9;
                                echo round($result_final);
                            ?>                                
                        </td>
                        @if(round($result_final) >= 75 && round($result_final) <= 89)
                            <td>
                                <center>Passed</center>
                            </td>
                        @elseif(round($result_final) >= 90 && round($result_final) <= 94)
                            <td>
                                <center>with honors</center>
                            </td>
                        @elseif(round($result_final)>= 95 && round($result_final) <= 97)
                            <td>
                                <center>with high honors</center>
                            </td>
                        @elseif(round($result_final) >= 98 && round($result_final) <= 100)
                            <td>
                                <center>with highest honors</center>
                            </td>
                        @elseif(round($result_final) < 75)
                            <td>
                                <center>Failed</center>
                            </td>
                        @endif
                    </tr>    
                    @endforeach
                    <tr>
                        <td colspan="8">
                            <b>Female</b>
                        </td>
                    </tr>
                    @foreach($GradeSheetFeMale as $key => $sub)
                    <tr>
                        <td>{{ $key + 1 }}.</td>
                        <td>{{ $sub->student_name }}</td>
                        <td style="text-align: center">
                            <?php
                            $formattedNum = number_format(round($average = ($sub->filipino + $sub->english + $sub->math + $sub->science + $sub->ap + $sub->ict + $sub->mapeh + $sub->esp +$sub->religion)/9), 0);
                            echo $formattedNum;
                            ?>                                                
                        </td>
                        <td style="text-align: center">
                                <?php
                                    $sec_g = \App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first();
                                    $sec_result = number_format(round($average = ($sec_g->filipino + $sec_g->english + $sec_g->math + $sec_g->science + $sec_g->ap + $sec_g->ict + $sec_g->mapeh + $sec_g->esp +$sec_g->religion)/9), 0);
                                    echo $sec_result;
                                ?>    
                        </td>
                        <td style="text-align: center">
                                <?php
                                    $thi_g = \App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first();
                                    $thi_result = number_format(round($average = ($thi_g->filipino + $thi_g->english + $thi_g->math + $thi_g->science + $thi_g->ap + $thi_g->ict + $thi_g->mapeh + $thi_g->esp +$thi_g->religion)/9), 0);
                                    echo $thi_result;
                                ?>    
                        </td>
                        <td style="text-align: center">
                                <?php
                                    $fou_g = \App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first();
                                    $fou_result = number_format(round($average = ($fou_g->filipino + $fou_g->english + $fou_g->math + $fou_g->science + $fou_g->ap + $fou_g->ict + $fou_g->mapeh + $fou_g->esp +$fou_g->religion)/9), 0);
                                    echo $fou_result;
                                ?>    
                        </td>
                        <?php                                                    
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->filipino);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->filipino);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->filipino);
                         $subj_1 = round(($fou_g + $sec_g + $thi_g + $sub->filipino) / 4);
                                                                        
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->english);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->english);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->english);
                        $subj_2 = round(($fou_g + $sec_g + $thi_g + $sub->english) / 4);
                                                                        
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->math);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->math);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->math);
                        $subj_3 = round(($fou_g + $sec_g + $thi_g + $sub->math) / 4);
                                                                            
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->science);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->science);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->science);
                        $subj_4 = round(($fou_g + $sec_g + $thi_g + $sub->science) / 4);
                                                                        
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->ap);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->ap);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->ap);
                        $subj_5 = round(($fou_g + $sec_g + $thi_g + $sub->ap) / 4);
                                                                        
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->esp);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->esp);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->esp);
                        $subj_6 = round(($fou_g + $sec_g + $thi_g + $sub->esp) / 4);
                                                                            
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->ict);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->ict);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->ict);
                        $subj_7 = round(($fou_g + $sec_g + $thi_g + $sub->ict) / 4);
                                                                            
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);
                        $subj_8 = round(($fou_g + $sec_g + $thi_g + $sub->mapeh) / 4);
                                                                        
                        $fou_g = round(\App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first()->religion);                                                                                                        
                        $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->religion);
                        $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->religion);
                        $subj_9 = round(($fou_g + $sec_g + $thi_g + $sub->religion) / 4);
                        ?>
                    
                        <td style="text-align:center">                                                                                 
                            <?php
                                $result_final =  (round($subj_1) + round($subj_2) + round($subj_3) + round($subj_4) + round($subj_5) + round($subj_6) + round($subj_7) + round($subj_8) + round($subj_9) )/9;
                                echo round($result_final);
                            ?>                                
                        </td>
                        @if(round($result_final) >= 75 && round($result_final) <= 89)
                            <td>
                                <center>Passed</center>
                            </td>
                        @elseif(round($result_final) >= 90 && round($result_final) <= 94)
                            <td>
                                <center>with honors</center>
                            </td>
                        @elseif(round($result_final)>= 95 && round($result_final) <= 97)
                            <td>
                                <center>with high honors</center>
                            </td>
                        @elseif(round($result_final) >= 98 && round($result_final) <= 100)
                            <td>
                                <center>with highest honors</center>
                            </td>
                        @elseif(round($result_final) < 75)
                            <td>
                                <center>Failed</center>
                            </td>
                        @endif
                    </tr>    
                    @endforeach
                @endif
            </tbody>
        </table>

    <p style="text-align: right"><b>{{$ClassSubjectDetail->first_name }} {{$ClassSubjectDetail->middle_name}} {{$ClassSubjectDetail->last_name}}</b> - <i>Class Adviser</i></p>

</body>
</html>