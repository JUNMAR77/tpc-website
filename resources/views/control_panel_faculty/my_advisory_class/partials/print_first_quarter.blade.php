<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>
        PRINT - {{ $quarter }} Quarter
    </title>
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
            left: -10em;
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
    <h2 class="heading2 heading2-title">St. John's Academy Inc</h2>
    <p class="heading2 heading2-subtitle">Dinalupihan, Bataan</p>
    
    <p class="report-progress m0">JUNIOR HIGH SCHOOL</p>
    <p class="report-progress m0">S.Y. {{ $ClassSubjectDetail ? $ClassSubjectDetail->school_year : '' }}</p>
    <p class="report-progress m0">GRADESHEET</p>
    {{--  <p class="report-progress m0">( {{ $ClassSubjectDetail ?  $ClassSubjectDetail->grade_level >= 11 ? 'SENIOR HIGH SCHOOL' : 'JUNIOR HIGH SCHOOL' : ''}} )</p>  --}}
    <img style="margin-top: -.4em; margin-left: 9em" class="logo" width="100" src="{{ asset('img/sja-logo.png') }}" />
    <br/>
    <br/>
    {{--  <p class="p0 m0 student-info">Grade sheet</p>  --}}
    {{--  <p class="p0 m0 student-info">School Year : <b>{{ $ClassSubjectDetail ? $ClassSubjectDetail->school_year : '' }}</b</p>  --}}
    <p class="p0 m0 student-info">Grade & Section : <b>{{ $ClassSubjectDetail ? $ClassSubjectDetail->grade_level : '' }} - {{ $ClassSubjectDetail ? $ClassSubjectDetail->section : '' }}</b</p>
    <p class="p0 m0 student-info">Quarter : <b><i>{{ $quarter }}</i></b></p>
    <br/>
   
  @if($quarter == "Fourth")

        @if($ClassSubjectDetail->grade_level == 7 || $ClassSubjectDetail->grade_level == 8)

        {{-- <table class="table no-margin table-striped table-bordered"> --}}
            <table class="table no-margin table-striped table-bordered" style="font-size: 10px; width: 100%">
                <thead>
                    <tr>
                        <th style="width: 30px">#</th>
                        <th style="width: 200px">Student Name</th>                                       
                        {{--  @foreach ($AdvisorySubject as $sub)
                        <th><center>{{$sub->subject}} {{$sub->id}}</center></th>                                                                        
                        @endforeach  --}}
                        <th style="width: ; text-align: center" colspan="2">Filipino</th>
                        <th style="width: ; text-align: center" colspan="2">English</th>
                        <th style="width: ; text-align: center" colspan="2">Math</th>
                        <th style="width: ; text-align: center" colspan="2">Science</th>
                        <th style="width: ; text-align: center" colspan="2">A.P.</th>
                        <th style="width: ; text-align: center" colspan="2">ESP</th>
                        <th style="width: ; text-align: center" colspan="2">TLE</th>
                        <th style="width: ; text-align: center" colspan="2">MAPEH</th>                                                        
                        <th style="width: ; text-align: center" colspan="2">Religion</th>
                        <th style="width: ; text-align: center" colspan="2">G.A.</th>
                        <th style="width: ; text-align: center">REMARKS</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>                                  
                    <tr>
                        <td colspan="23">
                            <b>Male</b>
                        </td>
                        
                    </tr>
                    @foreach($GradeSheetMale as $key => $sub)
                    <tr>
                        <td>{{ $key + 1 }}.</td>
                        <td>{{$sub->student_name}}</td>
                        
                        <td><center>{{ $sub ? round($sub->filipino) > 0 ? round($sub->filipino) : '' : ''  }}</center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->filipino);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->filipino);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->filipino);
                                $subj_1 = round(($fir_g + $sec_g + $thi_g + $sub->filipino) / 4);
                                if($subj_1 > 0)
                                {
                                    echo $subj_1;
                                }
                            ?>
                        </td>
                        <td><center>{{ $sub ? round($sub->english) > 0 ? round($sub->english) : '' : ''  }}</center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->english);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->english);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->english);
                                $subj_2 = round(($fir_g + $sec_g + $thi_g + $sub->english) / 4);
                                if($subj_2 > 0)
                                {
                                    echo $subj_2;
                                }
                            ?>
                        </td>
                        <td><center>{{ $sub ? round($sub->math) > 0 ? round($sub->math) : '' : ''  }}</center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->math);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->math);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->math);
                                $subj_3 = round(($fir_g + $sec_g + $thi_g + $sub->math) / 4);
                                    if($subj_3 > 0)
                                    {
                                        echo $subj_3;
                                    }
                            ?>
                        </td>
                        <td><center>{{ $sub ? round($sub->science) > 0 ? round($sub->science) : '' : ''  }}</center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->science);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->science);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->science);
                                $subj_4 = round(($fir_g + $sec_g + $thi_g + $sub->science) / 4);
                                if($subj_4  > 0)
                                {
                                    echo $subj_4;
                                }
                            ?>
                        </td>
                        <td><center>{{ $sub ? round($sub->ap) > 0 ? round($sub->ap) : '' : ''  }}/center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->ap);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->ap);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->ap);
                                $subj_5 = round(($fir_g + $sec_g + $thi_g + $sub->ap) / 4);
                                if($subj_5 > 0)
                                {
                                    echo $subj_5;
                                }
                            ?>
                        </td>
                        <td><center>{{ $sub ? round($sub->esp) > 0 ? round($sub->esp) : '' : ''  }}</center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->esp);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->esp);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->esp);
                                $subj_6 = round(($fir_g + $sec_g + $thi_g + $sub->esp) / 4);
                                if($subj_6 > 0)
                                {
                                    echo $subj_6;
                                }
                            ?>
                        </td>
                        <td><center>{{ $sub ? round($sub->ict) > 0 ? round($sub->ict) : '' : ''  }}</center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->ict);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->ict);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->ict);
                                $subj_7 = round(($fir_g + $sec_g + $thi_g + $sub->ict) / 4);
                                if($subj_7 > 0)
                                {
                                    echo $subj_7;
                                }
                            ?>
                        </td>
                        <td><center>{{ $sub ? round($sub->mapeh) > 0 ? round($sub->mapeh) : '' : ''  }}</center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);
                                $subj_8 = round(($fir_g + $sec_g + $thi_g + $sub->mapeh) / 4);
                                if($subj_8 > 0)
                                {
                                    echo $subj_8;
                                }
                            ?>
                        </td>
                        
                        <td><center>{{ $sub ? round($sub->religion) > 0 ? round($sub->religion) : '' : ''  }}</center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->religion);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->religion);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->religion);
                                $subj_9 = round(($fir_g + $sec_g + $thi_g + $sub->religion) / 4);
                                if($subj_9 > 0)
                                {
                                    echo $subj_9;
                                }
                            
                            ?>
                        </td>
                        <td>
                            <center>                                                
                                <?php
                                    $formattedNum = number_format(round($average = ($sub->filipino + $sub->english + $sub->math + $sub->science + $sub->ap + $sub->ict + $sub->mapeh + $sub->esp +$sub->religion)/9), 0);
                                    if($formattedNum > 0 )
                                    {
                                        echo $formattedNum;
                                    }
                                    
                                ?>
                            </center>
                        </td>
                        <td>
                            <center>                                                
                                <?php
                                    $formattedNum = number_format(round($average = (round($subj_1) + round($subj_2) + round($subj_3) + round($subj_4) + round($subj_5) + round($subj_6) + round($subj_7) + round($subj_8) + round($subj_9) )/9), 0);
                                    if($formattedNum > 0 )
                                    {
                                        echo $formattedNum;
                                    }
                                    
                                ?>
                            </center>
                        </td>

                        @if(round($average) > 0)
                            @if(round($average) >= 75 && round($average) <= 89)
                                <td>
                                    <center>Passed</center>
                                </td>
                            @elseif(round($average) >= 90 && round($average) <= 94)
                                <td>
                                    <center>with honors</center>
                                </td>
                            @elseif(round($average)>= 95 && round($average) <= 97)
                                <td>
                                    <center>with high honors</center>
                                </td>
                            @elseif(round($average) >= 98 && round($average) <= 100)
                                <td>
                                    <center>with highest honors</center>
                                </td>
                            @elseif(round($average) < 75)
                                <td>
                                    <center>Failed</center>
                                </td>
                            @endif
                        @else
                            <td></td>
                        @endif
                                
                        </tr>                                    
                        @endforeach

                    <tr>
                        <td colspan="13">
                            <b>Female</b>
                        </td>
                    </tr>
                    @foreach($GradeSheetFeMale as $key => $sub)
                    <tr>
                        <td>{{ $key + 1 }}.</td>
                        <td>{{$sub->student_name}}</td>
                        
                        <td><center>{{ $sub ? round($sub->filipino) > 0 ? round($sub->filipino) : '' : ''  }}</center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->filipino);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->filipino);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->filipino);
                                $subj_1 = round(($fir_g + $sec_g + $thi_g + $sub->filipino) / 4);
                                if($subj_1 > 0)
                                {
                                    echo $subj_1;
                                }
                            ?>
                        </td>
                        <td><center>{{ $sub ? round($sub->english) > 0 ? round($sub->english) : '' : ''  }}</center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->english);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->english);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->english);
                                $subj_2 = round(($fir_g + $sec_g + $thi_g + $sub->english) / 4);
                                if($subj_2 > 0)
                                {
                                    echo $subj_2;
                                }
                            ?>
                        </td>
                        <td><center>{{ $sub ? round($sub->math) > 0 ? round($sub->math) : '' : ''  }}</center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->math);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->math);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->math);
                                $subj_3 = round(($fir_g + $sec_g + $thi_g + $sub->math) / 4);
                                    if($subj_3 > 0)
                                    {
                                        echo $subj_3;
                                    }
                            ?>
                        </td>
                        <td><center>{{ $sub ? round($sub->science) > 0 ? round($sub->science) : '' : ''  }}</center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->science);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->science);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->science);
                                $subj_4 = round(($fir_g + $sec_g + $thi_g + $sub->science) / 4);
                                if($subj_4  > 0)
                                {
                                    echo $subj_4;
                                }
                            ?>
                        </td>
                        <td><center>{{ $sub ? round($sub->ap) > 0 ? round($sub->ap) : '' : ''  }}/center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->ap);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->ap);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->ap);
                                $subj_5 = round(($fir_g + $sec_g + $thi_g + $sub->ap) / 4);
                                if($subj_5 > 0)
                                {
                                    echo $subj_5;
                                }
                            ?>
                        </td>
                        <td><center>{{ $sub ? round($sub->esp) > 0 ? round($sub->esp) : '' : ''  }}</center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->esp);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->esp);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->esp);
                                $subj_6 = round(($fir_g + $sec_g + $thi_g + $sub->esp) / 4);
                                if($subj_6 > 0)
                                {
                                    echo $subj_6;
                                }
                            ?>
                        </td>
                        <td><center>{{ $sub ? round($sub->ict) > 0 ? round($sub->ict) : '' : ''  }}</center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->ict);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->ict);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->ict);
                                $subj_7 = round(($fir_g + $sec_g + $thi_g + $sub->ict) / 4);
                                if($subj_7 > 0)
                                {
                                    echo $subj_7;
                                }
                            ?>
                        </td>
                        <td><center>{{ $sub ? round($sub->mapeh) > 0 ? round($sub->mapeh) : '' : ''  }}</center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);
                                $subj_8 = round(($fir_g + $sec_g + $thi_g + $sub->mapeh) / 4);
                                if($subj_8 > 0)
                                {
                                    echo $subj_8;
                                }
                            ?>
                        </td>
                        
                        <td><center>{{ $sub ? round($sub->religion) > 0 ? round($sub->religion) : '' : ''  }}</center></td>
                        <td>
                            <?php                                                    
                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->religion);                                                                                                        
                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->religion);
                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->religion);
                                $subj_9 = round(($fir_g + $sec_g + $thi_g + $sub->religion) / 4);
                                if($subj_9 > 0)
                                {
                                    echo $subj_9;
                                }
                            
                            ?>
                        </td>
                        <td>
                            <center>                                                
                                <?php
                                    $formattedNum = number_format(round($average = ($sub->filipino + $sub->english + $sub->math + $sub->science + $sub->ap + $sub->ict + $sub->mapeh + $sub->esp +$sub->religion)/9), 0);
                                    if($formattedNum > 0 )
                                    {
                                        echo $formattedNum;
                                    }
                                    
                                ?>
                            </center>
                        </td>
                        <td>
                            <center>                                                
                                <?php
                                    $formattedNum = number_format(round($average = (round($subj_1) + round($subj_2) + round($subj_3) + round($subj_4) + round($subj_5) + round($subj_6) + round($subj_7) + round($subj_8) + round($subj_9) )/9), 0);
                                    if($formattedNum > 0 )
                                    {
                                        echo $formattedNum;
                                    }
                                    
                                ?>
                            </center>
                        </td>

                        @if(round($average) > 0)
                            @if(round($average) >= 75 && round($average) <= 89)
                                <td>
                                    <center>Passed</center>
                                </td>
                            @elseif(round($average) >= 90 && round($average) <= 94)
                                <td>
                                    <center>with honors</center>
                                </td>
                            @elseif(round($average)>= 95 && round($average) <= 97)
                                <td>
                                    <center>with high honors</center>
                                </td>
                            @elseif(round($average) >= 98 && round($average) <= 100)
                                <td>
                                    <center>with highest honors</center>
                                </td>
                            @elseif(round($average) < 75)
                                <td>
                                    <center>Failed</center>
                                </td>
                            @endif
                        @else
                            <td></td>
                        @endif
                                
                        </tr>                                    
                        
                    @endforeach
                    
                    
                </tbody>
            </table>

        @else

            <table class="table no-margin table-striped table-bordered" style="font-size: 11px; width: 100%;">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th style="width: 200px">Student Name</th>                                       
                        {{--  @foreach ($AdvisorySubject as $sub)
                        <th><center>{{$sub->subject}} {{$sub->id}}</center></th>                                                                        
                        @endforeach  --}}
                        <th style="width: ; text-align: center" colspan="2">Filipino</th>
                        <th style="width: ; text-align: center" colspan="2">English</th>
                        <th style="width: ; text-align: center" colspan="2">Math</th>
                        <th style="width: ; text-align: center" colspan="2">Science</th>
                        <th style="width: ; text-align: center" colspan="2">AP</th>
                        <th style="width: ; text-align: center" colspan="2">TLE</th>
                        <th style="width: ; text-align: center" colspan="2">MAPEH</th>
                        <th style="width: ; text-align: center" colspan="2">ESP</th>
                        <th style="width: ; text-align: center" colspan="2">Religion</th>
                        <th style="width: ; text-align: center" colspan="2">G.A.</th>
                        <th style="font-size: 10px; width: ; text-align: center">REMARKS</th>
                        
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th  style="color: red">4TH</th>
                        <th  style="color: blue">FG</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>                                  
                    <tr>
                        <td colspan="23">
                            <b>Male</b>
                        </td>
                        
                    </tr>
                    @foreach($GradeSheetMale as $key => $sub)
                                        <tr>
                                            <td>{{ $key + 1 }}.</td>
                                            <td>{{$sub->student_name}}</td>
                                            <td><center>{{ $sub ? round($sub->filipino) > 0 ? round($sub->filipino) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                    $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->filipino);                                                                                                        
                                                    $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->filipino);
                                                    $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->filipino);
                                                    $subj_1 = round(($fir_g + $sec_g + $thi_g + $sub->filipino) / 4);
                                                    if($subj_1 > 0)
                                                    {
                                                        echo $subj_1;
                                                    }
                                                ?>
                                            </td>
                                            <td><center>{{ $sub ? round($sub->english) > 0 ? round($sub->english) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->english);                                                                                                        
                                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->english);
                                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->english);
                                                $subj_2 = round(($fir_g + $sec_g + $thi_g + $sub->english) / 4);
                                                    if($subj_2 > 0)
                                                    {
                                                        echo $subj_2;
                                                    }
                                                ?>
                                            </td>
                                            <td><center>{{ $sub ? round($sub->math) > 0 ? round($sub->math) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->math);                                                                                                        
                                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->math);
                                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->math);
                                                $subj_3 = round(($fir_g + $sec_g + $thi_g + $sub->math) / 4);
                                                    if($subj_3 > 0)
                                                    {
                                                        echo $subj_3;
                                                    }
                                                
                                                ?>
                                            </td>
                                            <td><center>{{ $sub ? round($sub->science) > 0 ? round($sub->science) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->science);                                                                                                        
                                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->science);
                                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->science);
                                                $subj_4 = round(($fir_g + $sec_g + $thi_g + $sub->science) / 4);
                                                    if($subj_4 > 0)
                                                    {
                                                        echo $subj_4;
                                                    }
                                                
                                                ?>
                                            </td>
                                            <td><center>{{ $sub ? round($sub->ap) > 0 ? round($sub->ap) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->ap);                                                                                                        
                                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->ap);
                                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->ap);
                                                $subj_5 = round(($fir_g + $sec_g + $thi_g + $sub->ap) / 4);
                                                    if($subj_5 > 0)
                                                    {
                                                        echo $subj_5;
                                                    }
                                                
                                                ?>
                                            </td>
                                            <td><center>{{ $sub ? round($sub->ict) > 0 ? round($sub->ict) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->ict);                                                                                                        
                                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->ict);
                                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->ict);
                                                $subj_6 = round(($fir_g + $sec_g + $thi_g + $sub->ict) / 4);
                                                    if($subj_6 > 0)
                                                    {
                                                        echo $subj_6;
                                                    }
                                                
                                                ?>
                                            </td>
                                            <td><center>{{ $sub ? round($sub->mapeh) > 0 ? round($sub->mapeh) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);                                                                                                        
                                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);
                                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);
                                                $subj_7 = round(($fir_g + $sec_g + $thi_g + $sub->mapeh) / 4);
                                                    if($subj_7 > 0)
                                                    {
                                                        echo $subj_7;
                                                    }
                                                
                                                ?>
                                            </td>
                                            <td><center>{{ $sub ? round($sub->esp) > 0 ? round($sub->esp) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->esp);                                                                                                        
                                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->esp);
                                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->esp);
                                                $subj_8 = round(($fir_g + $sec_g + $thi_g + $sub->esp) / 4);
                                                    if($subj_8 > 0)
                                                    {
                                                        echo $subj_8;
                                                    }
                                                
                                                ?>
                                            </td>
                                            <td><center>{{ $sub ? round($sub->religion) > 0 ? round($sub->religion) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->religion);                                                                                                        
                                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->religion);
                                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->religion);
                                                $subj_9 = round(($fir_g + $sec_g + $thi_g + $sub->religion) / 4);
                                                    if($subj_9 > 0)
                                                    {
                                                        echo $subj_9;
                                                    }
                                                
                                                ?>
                                            </td>
                                            <td>
                                                <center>                                                
                                                    <?php
                                                        $formattedNum = number_format(round($average = ($sub->filipino + $sub->english + $sub->math + $sub->science + $sub->ap + $sub->ict + $sub->mapeh + $sub->esp +$sub->religion)/9), 0);
                                                        if($formattedNum > 0)
                                                        {
                                                            echo $formattedNum;
                                                        }
                                                    ?>
                                                </center>
                                            </td>
                                            <td>
                                                <center>                                                
                                                    <?php
                                                        $formattedNum = number_format(round($average = (round($subj_1) + round($subj_2) + round($subj_3) + round($subj_4) + round($subj_5) + round($subj_6) + round($subj_7) + round($subj_8) + round($subj_9) )/9), 0);
                                                        if($formattedNum > 0)
                                                        {
                                                            echo $formattedNum;
                                                        }
                                                    ?>
                                                </center>
                                            </td>

                                            @if(round($average) > 0 )
                                                @if(round($average) >= 75 && round($average) <= 89)
                                                    <td>
                                                        <center>Passed</center>
                                                    </td>
                                                @elseif(round($average) >= 90 && round($average) <= 94)
                                                    <td>
                                                        <center>with honors</center>
                                                    </td>
                                                @elseif(round($average)>= 95 && round($average) <= 97)
                                                    <td>
                                                        <center>with high honors</center>
                                                    </td>
                                                @elseif(round($average) >= 98 && round($average) <= 100)
                                                    <td>
                                                        <center>with highest honors</center>
                                                    </td>
                                                @elseif(round($average) < 75)
                                                    <td>
                                                        <center>Failed</center>
                                                    </td>
                                                @endif
                                            @else
                                                <td></td>
                                            @endif
                                                    
                                            </tr>                                    
                                            @endforeach

                                        <tr>
                                            <td colspan="13">
                                                <b>Female</b>
                                            </td>
                                        </tr>
                                        @foreach($GradeSheetFeMale as $key => $sub)
                                        <tr>
                                            <td>{{ $key + 1 }}.</td>
                                            <td>{{$sub->student_name}}</td>
                                            <td><center>{{ $sub ? round($sub->filipino) > 0 ? round($sub->filipino) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                    $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->filipino);                                                                                                        
                                                    $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->filipino);
                                                    $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->filipino);
                                                    $subj_1 = round(($fir_g + $sec_g + $thi_g + $sub->filipino) / 4);
                                                    if($subj_1 > 0)
                                                    {
                                                        echo $subj_1;
                                                    }
                                                ?>
                                            </td>
                                            <td><center>{{ $sub ? round($sub->english) > 0 ? round($sub->english) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->english);                                                                                                        
                                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->english);
                                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->english);
                                                $subj_2 = round(($fir_g + $sec_g + $thi_g + $sub->english) / 4);
                                                    if($subj_2 > 0)
                                                    {
                                                        echo $subj_2;
                                                    }
                                                ?>
                                            </td>
                                            <td><center>{{ $sub ? round($sub->math) > 0 ? round($sub->math) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->math);                                                                                                        
                                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->math);
                                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->math);
                                                $subj_3 = round(($fir_g + $sec_g + $thi_g + $sub->math) / 4);
                                                    if($subj_3 > 0)
                                                    {
                                                        echo $subj_3;
                                                    }
                                                
                                                ?>
                                            </td>
                                            <td><center>{{ $sub ? round($sub->science) > 0 ? round($sub->science) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->science);                                                                                                        
                                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->science);
                                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->science);
                                                $subj_4 = round(($fir_g + $sec_g + $thi_g + $sub->science) / 4);
                                                    if($subj_4 > 0)
                                                    {
                                                        echo $subj_4;
                                                    }
                                                
                                                ?>
                                            </td>
                                            <td><center>{{ $sub ? round($sub->ap) > 0 ? round($sub->ap) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->ap);                                                                                                        
                                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->ap);
                                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->ap);
                                                $subj_5 = round(($fir_g + $sec_g + $thi_g + $sub->ap) / 4);
                                                    if($subj_5 > 0)
                                                    {
                                                        echo $subj_5;
                                                    }
                                                
                                                ?>
                                            </td>
                                            <td><center>{{ $sub ? round($sub->ict) > 0 ? round($sub->ict) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->ict);                                                                                                        
                                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->ict);
                                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->ict);
                                                $subj_6 = round(($fir_g + $sec_g + $thi_g + $sub->ict) / 4);
                                                    if($subj_6 > 0)
                                                    {
                                                        echo $subj_6;
                                                    }
                                                
                                                ?>
                                            </td>
                                            <td><center>{{ $sub ? round($sub->mapeh) > 0 ? round($sub->mapeh) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);                                                                                                        
                                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);
                                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->mapeh);
                                                $subj_7 = round(($fir_g + $sec_g + $thi_g + $sub->mapeh) / 4);
                                                    if($subj_7 > 0)
                                                    {
                                                        echo $subj_7;
                                                    }
                                                
                                                ?>
                                            </td>
                                            <td><center>{{ $sub ? round($sub->esp) > 0 ? round($sub->esp) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->esp);                                                                                                        
                                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->esp);
                                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->esp);
                                                $subj_8 = round(($fir_g + $sec_g + $thi_g + $sub->esp) / 4);
                                                    if($subj_8 > 0)
                                                    {
                                                        echo $subj_8;
                                                    }
                                                
                                                ?>
                                            </td>
                                            <td><center>{{ $sub ? round($sub->religion) > 0 ? round($sub->religion) : '' : ''  }}</center></td>
                                            <td>
                                                <?php                                                    
                                                $fir_g = round(\App\Grade_sheet_first::where('enrollment_id', $sub->enrollment_id)->first()->religion);                                                                                                        
                                                $sec_g = round(\App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first()->religion);
                                                $thi_g = round(\App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first()->religion);
                                                $subj_9 = round(($fir_g + $sec_g + $thi_g + $sub->religion) / 4);
                                                    if($subj_9 > 0)
                                                    {
                                                        echo $subj_9;
                                                    }
                                                
                                                ?>
                                            </td>
                                            <td>
                                                <center>                                                
                                                    <?php
                                                        $formattedNum = number_format(round($average = ($sub->filipino + $sub->english + $sub->math + $sub->science + $sub->ap + $sub->ict + $sub->mapeh + $sub->esp +$sub->religion)/9), 0);
                                                        if($formattedNum > 0)
                                                        {
                                                            echo $formattedNum;
                                                        }
                                                    ?>
                                                </center>
                                            </td>
                                            <td>
                                                <center>                                                
                                                    <?php
                                                        $formattedNum = number_format(round($average = (round($subj_1) + round($subj_2) + round($subj_3) + round($subj_4) + round($subj_5) + round($subj_6) + round($subj_7) + round($subj_8) + round($subj_9) )/9), 0);
                                                        if($formattedNum > 0)
                                                        {
                                                            echo $formattedNum;
                                                        }
                                                    ?>
                                                </center>
                                            </td>

                                            @if(round($average) > 0 )
                                                @if(round($average) >= 75 && round($average) <= 89)
                                                    <td>
                                                        <center>Passed</center>
                                                    </td>
                                                @elseif(round($average) >= 90 && round($average) <= 94)
                                                    <td>
                                                        <center>with honors</center>
                                                    </td>
                                                @elseif(round($average)>= 95 && round($average) <= 97)
                                                    <td>
                                                        <center>with high honors</center>
                                                    </td>
                                                @elseif(round($average) >= 98 && round($average) <= 100)
                                                    <td>
                                                        <center>with highest honors</center>
                                                    </td>
                                                @elseif(round($average) < 75)
                                                    <td>
                                                        <center>Failed</center>
                                                    </td>
                                                @endif
                                            @else
                                                <td></td>
                                            @endif
                                                    
                                            </tr>                                    
                                            
                                        @endforeach
                    
                    
                </tbody>
            </table>

        @endif

  @else
  
    @if($ClassSubjectDetail->grade_level == 7 || $ClassSubjectDetail->grade_level == 8 || $ClassSubjectDetail->grade_level == 9)

                    <table class="table no-margin table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Student Name</th>                                       
                                                {{--  @foreach ($AdvisorySubject as $sub)
                                                <th><center>{{$sub->subject}} {{$sub->id}}</center></th>                                                                        
                                                @endforeach  --}}
                                                <th style="width: 40px; text-align: center">Filipino</th>
                                                <th style="width: 40px; text-align: center">English</th>
                                                <th style="width: 40px; text-align: center">Mathematics</th>
                                                <th style="width: 40px; text-align: center">Science</th>
                                                <th style="width: 40px; text-align: center">Araling<br/> Panlipunan</th>
                                                <th style="width: 40px; text-align: center">ESP</th>
                                                <th style="width: 40px; text-align: center">TLE</th>
                                                <th style="width: 40px; text-align: center">MAPEH</th>                                        
                                                <th style="width: 40px; text-align: center">Religion</th>
                                                <th style="width: 40px; text-align: center">GENERAL AVERAGE</th>
                                                <th style="width: 40px; text-align: center">REMARKS</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                  
                                            <tr>
                                                <td colspan="13">
                                                    <b>Male</b>
                                                </td>
                                            </tr>
                                            @foreach($GradeSheetMale as $key => $sub)
                                            <tr>
                                                <td>{{ $key + 1 }}.</td>
                                                <td>{{$sub->student_name}}</td>
                                                <td><center>{{ $sub ? round($sub->filipino) > 0 ? round($sub->filipino) : '' : ''  }}</center></td>
                                                <td><center>{{ $sub ? round($sub->english) > 0 ? round($sub->english) : '' : ''  }}</center></td>
                                                <td><center>{{ $sub ? round($sub->math) > 0 ? round($sub->math) : '' : ''}}</center></td>
                                                <td><center>{{ $sub ? round($sub->science) > 0 ? round($sub->science) : '' : ''}}</center></td>
                                                <td><center>{{ $sub ? round($sub->ap) > 0 ? round($sub->ap) : '' : ''}}</center></td>
                                                <td><center>{{ $sub ? round($sub->esp) > 0 ? round($sub->esp) : '' : ''}}</center></td> 
                                                <td><center>{{ $sub ? round($sub->ict) > 0 ? round($sub->ict) : '' : ''}}</center></td>
                                                <td><center>{{ $sub ? round($sub->mapeh) > 0 ? round($sub->mapeh) : '' : ''}}</center></td>                                                                                               
                                                <td><center>{{ $sub ? round($sub->religion) > 0 ? round($sub->religion) : '' : ''}}</center></td>
                                                <td>
                                                    <center>                                                
                                                        <?php
                                                            $formattedNum = number_format(round($average = ($sub->filipino + $sub->english + $sub->math + $sub->science + $sub->ap + $sub->ict + $sub->mapeh + $sub->esp +$sub->religion)/9), 0);
                                                            if($formattedNum > 0)
                                                            {
                                                                echo $formattedNum;
                                                            }
                                                        ?>
                                                    </center>
                                                </td>
        
                                                @if(round($average) > 0)
                                                    @if(round($average) >= 75 && round($average) <= 89)
                                                        <td>
                                                            <center>Passed</center>
                                                        </td>
                                                    @elseif(round($average) >= 90 && round($average) <= 94)
                                                        <td>
                                                            <center>with honors</center>
                                                        </td>
                                                    @elseif(round($average)>= 95 && round($average) <= 97)
                                                        <td>
                                                            <center>with high honors</center>
                                                        </td>
                                                    @elseif(round($average) >= 98 && round($average) <= 100)
                                                        <td>
                                                            <center>with highest honors</center>
                                                        </td>
                                                    @elseif(round($average) < 75)
                                                        <td>
                                                            <center>Failed</center>
                                                        </td>
                                                    @endif
                                                @else
                                                    <td></td>
                                                @endif
                                                        
                                                </tr>                                    
                                                @endforeach
        
                                            <tr>
                                                <td colspan="13">
                                                    <b>Female</b>
                                                </td>
                                            </tr>
                                            @foreach($GradeSheetFeMale as $key => $sub)
                                            <tr>
                                                <td>{{ $key + 1 }}.</td>
                                                <td>{{$sub->student_name}}</td>
                                                
                                                <td><center>{{ $sub ? round($sub->filipino) > 0 ? round($sub->filipino) : '' : ''  }}</center></td>
                                                <td><center>{{ $sub ? round($sub->english) > 0 ? round($sub->english) : '' : ''  }}</center></td>
                                                <td><center>{{ $sub ? round($sub->math) > 0 ? round($sub->math) : '' : ''}}</center></td>
                                                <td><center>{{ $sub ? round($sub->science) > 0 ? round($sub->science) : '' : ''}}</center></td>
                                                <td><center>{{ $sub ? round($sub->ap) > 0 ? round($sub->ap) : '' : ''}}</center></td>
                                                <td><center>{{ $sub ? round($sub->esp) > 0 ? round($sub->esp) : '' : ''}}</center></td> 
                                                <td><center>{{ $sub ? round($sub->ict) > 0 ? round($sub->ict) : '' : ''}}</center></td>
                                                <td><center>{{ $sub ? round($sub->mapeh) > 0 ? round($sub->mapeh) : '' : ''}}</center></td>                                                                                               
                                                <td><center>{{ $sub ? round($sub->religion) > 0 ? round($sub->religion) : '' : ''}}</center></td>
                                                <td>
                                                    <center>
                                                        <?php
                                                        $formattedNum = number_format(round($average = ($sub->filipino + $sub->english + $sub->math + $sub->science + $sub->ap + $sub->ict + $sub->mapeh + $sub->esp +$sub->religion)/9), 0);
                                                        if($formattedNum > 0)
                                                        {
                                                            echo $formattedNum;
                                                        }
                                                        ?>                                                
                                                    </center>
                                                </td>
                                                
                                               
                                                @if(round($average) > 0)
                                                    @if(round($average) >= 75 && round($average) <= 89)
                                                        <td>
                                                            <center>Passed</center>
                                                        </td>
                                                    @elseif(round($average) >= 90 && round($average) <= 94)
                                                        <td>
                                                            <center>with honors</center>
                                                        </td>
                                                    @elseif(round($average)>= 95 && round($average) <= 97)
                                                        <td>
                                                            <center>with high honors</center>
                                                        </td>
                                                    @elseif(round($average) >= 98 && round($average) <= 100)
                                                        <td>
                                                            <center>with highest honors</center>
                                                        </td>
                                                    @elseif(round($average) < 75)
                                                        <td>
                                                            <center>Failed</center>
                                                        </td>
                                                    @endif
                                                @else
                                                    <td></td>
                                                @endif
                                            </tr>
                                            @endforeach
                                            
                                            
                                        </tbody>
                        </table>



    @else
        <table style="margin-top: -.8em;" class="table no-margin">
            <thead>
                
                    <tr>
                        <th width ="10px"><center>#</center></th>
                        <th>Student Name</th>                                       
                        {{--  @foreach ($AdvisorySubject as $sub)
                        <th><center>{{$sub->subject}} {{$sub->id}}</center></th>                                                                        
                        @endforeach  --}}
                        <th width="40px"><center>Filipino</center></th>
                        <th width="40px"><center>English</center></th>
                        <th width="40px"><center>Math</center></th>
                        <th width="40px"><center>Science</center></th>
                        <th width="40px"><center style="font-size: 10px">Araling<br/> Panlipunan</center></th>
                        <th width="40px"><center>TLE</center></th>
                        <th width="40px"><center>MAPEH</center></th>
                        <th width="40px"><center>ESP</center></th>
                        <th width="40px"><center>Religion</center></th>
                        <th width="40px"><center  style="font-size: 10px">GENERAL AVERAGE</center></th>
                        <th><center style="font-size: 10px">REMARKS</center></th>
                    </tr>
                
            </thead>
            <tbody>                                  
                <tr>
                    <td colspan="13">
                        <b>Male</b>
                    </td>
                </tr>
                @foreach($GradeSheetMale as $key => $sub)
                <tr>
                    <td><center>{{ $key + 1 }}.</center></td>
                    <td>{{$sub->student_name}}</td>   
                    

                    <td><center>{{ $sub ? round($sub->filipino) > 0 ? round($sub->filipino) : '' : ''  }}</center></td>
                    <td><center>{{ $sub ? round($sub->english) > 0 ? round($sub->english) : '' : ''  }}</center></td>
                    <td><center>{{ $sub ? round($sub->math) > 0 ? round($sub->math) : '' : ''}}</center></td>
                    <td><center>{{ $sub ? round($sub->science) > 0 ? round($sub->science) : '' : ''}}</center></td>
                    <td><center>{{ $sub ? round($sub->ap) > 0 ? round($sub->ap) : '' : ''}}</center></td>
                    <td><center>{{ $sub ? round($sub->ict) > 0 ? round($sub->ict) : '' : ''}}</center></td>
                    <td><center>{{ $sub ? round($sub->mapeh) > 0 ? round($sub->mapeh) : '' : ''}}</center></td>
                    <td><center>{{ $sub ? round($sub->esp) > 0 ? round($sub->esp) : '' : ''}}</center></td>                                        
                    <td><center>{{ $sub ? round($sub->religion) > 0 ? round($sub->religion) : '' : ''}}</center></td>
                    <td>
                        <center>                                                
                            <?php
                                $formattedNum = number_format(round($average = ($sub->filipino + $sub->english + $sub->math + $sub->science + $sub->ap + $sub->ict + $sub->mapeh + $sub->esp +$sub->religion)/9), 2);
                                if($formattedNum > 0)
                                {
                                    echo $formattedNum;
                                }
                                  
                            ?>
                        </center>
                    </td>

                    @if(round($average) > 0)
                        @if(round($average) >= 75 && round($average) <= 89)
                            <td>
                                <center>Passed</center>
                            </td>
                        @elseif(round($average) >= 90 && round($average) <= 94)
                            <td>
                                <center>with honors</center>
                            </td>
                        @elseif(round($average)>= 95 && round($average) <= 97)
                            <td>
                                <center>with high honors</center>
                            </td>
                        @elseif(round($average) >= 98 && round($average) <= 100)
                            <td>
                                <center>with highest honors</center>
                            </td>
                        @elseif(round($average) < 75)
                            <td>
                                <center>Failed</center>
                            </td>
                        @endif
                    @else
                        <td></td>
                    @endif
                            
                                                   
                    @endforeach
                </tr> 
                <tr>
                    <td colspan="13">
                        <b>Female</b>
                    </td>
                </tr>
                @foreach($GradeSheetFeMale as $key => $sub)
                <tr>
                    <td><center>{{ $key + 1 }}.</center></td>
                    <td>{{$sub->student_name}}</td>
                    <td><center>{{ $sub ? round($sub->filipino) > 0 ? round($sub->filipino) : '' : ''  }}</center></td>
                    <td><center>{{ $sub ? round($sub->english) > 0 ? round($sub->english) : '' : ''  }}</center></td>
                    <td><center>{{ $sub ? round($sub->math) > 0 ? round($sub->math) : '' : ''}}</center></td>
                    <td><center>{{ $sub ? round($sub->science) > 0 ? round($sub->science) : '' : ''}}</center></td>
                    <td><center>{{ $sub ? round($sub->ap) > 0 ? round($sub->ap) : '' : ''}}</center></td>
                    <td><center>{{ $sub ? round($sub->ict) > 0 ? round($sub->ict) : '' : ''}}</center></td>
                    <td><center>{{ $sub ? round($sub->mapeh) > 0 ? round($sub->mapeh) : '' : ''}}</center></td>
                    <td><center>{{ $sub ? round($sub->esp) > 0 ? round($sub->esp) : '' : ''}}</center></td>                                        
                    <td><center>{{ $sub ? round($sub->religion) > 0 ? round($sub->religion) : '' : ''}}</center></td>

                   
                    <td>
                        <center>
                            <?php
                            $formattedNum = number_format(round($average = ($sub->filipino + $sub->english + $sub->math + $sub->science + $sub->ap + $sub->ict + $sub->mapeh + $sub->esp +$sub->religion)/9), 2);
                            if($formattedNum > 0)
                            {
                                echo $formattedNum;
                            }
                            ?>                                                
                        </center>
                    </td>
                    
                
                    @if(round($average) > 0)
                        @if(round($average) >= 75 && round($average) <= 89)
                            <td>
                                <center>Passed</center>
                            </td>
                        @elseif(round($average) >= 90 && round($average) <= 94)
                            <td>
                                <center>with honors</center>
                            </td>
                        @elseif(round($average)>= 95 && round($average) <= 97)
                            <td>
                                <center>with high honors</center>
                            </td>
                        @elseif(round($average) >= 98 && round($average) <= 100)
                            <td>
                                <center>with highest honors</center>
                            </td>
                        @elseif(round($average) < 75)
                            <td>
                                <center>Failed</center>
                            </td>
                        @endif
                    @else
                        <td></td>
                    @endif
                </tr>
                @endforeach
                
                
            </tbody>
        </table>
    @endif
 @endif
    <p style="text-align: right; font-size: 12px"><b>{{$ClassSubjectDetail->first_name }} {{$ClassSubjectDetail->middle_name}} {{$ClassSubjectDetail->last_name}}</b> - <i>Class Adviser</i></p>

</body>
</html>