<div class="table-responsive">
    <table style="margin-top: -.8em" class="table no-margin">
        <thead>
            <tr>
                <th style="width: 30px">#</th>
                <th style="width: 200px">Student Name</th>
                <?php 
                    $AdvisorySubject2 = \App\ClassSubjectDetail::
                        where('class_details_id', $ClassSubjectDetail->id)
                        ->where('sem', 1)                                              
                        ->orderBY('class_subject_order','ASC')
                        ->get();
                    $AdvisorySubject = \App\ClassSubjectDetail::
                        where('class_details_id', $ClassSubjectDetail->id)
                        ->where('sem', 2)                                              
                        ->orderBY('class_subject_order','ASC')
                        ->get();
                ?>

                @if($sem=='First')
                    @if($quarter=="First")
                        @foreach ($AdvisorySubject2 as $key => $sub)                                     
                            <th style="width: 30px; text-align: center">
                                {{-- {{ $sub->subject_id }}  --}}
                                <?php 
                                    $subject_details = \App\SubjectDetail::
                                    where('id', $sub->subject_id)
                                    ->where('status',1)                                            
                                    ->get();
                                    
                                    echo $subject_details[0]->subject_code;
                                ?>
                            </th>                                                                  
                        @endforeach 
                        
                        <th style="width: 80px">GENERAL AVERAGE</th>
                    @else
                        @foreach ($AdvisorySubject2 as $key => $sub)                                     
                            <th style="width: 30px; text-align: center" colspan="3">
                                {{-- {{ $sub->subject_id }}  --}}
                                <?php 
                                    $subject_details = \App\SubjectDetail::
                                    where('id', $sub->subject_id)  
                                    ->where('status',1)                                               
                                    ->get();  
                                    
                                    echo $subject_details[0]->subject_code;
                                ?>
                            </th>                                                                  
                        @endforeach 
                        
                        <th style="width: 80px" colspan="2">GENERAL AVERAGE</th>
                    @endif
                @else
                    @if($quarter=="First")
                        @foreach ($AdvisorySubject as $key => $sub)                                     
                            <th style="width: 30px; text-align: center">
                                {{-- {{ $sub->subject_id }}  --}}
                                <?php 
                                    $subject_details = \App\SubjectDetail::
                                    where('id', $sub->subject_id)                                                
                                    ->get();
                                    
                                    echo $subject_details[0]->subject_code;
                                ?>
                            </th>                                                                  
                        @endforeach 
                        
                        <th style="width: 80px">GENERAL AVERAGE</th>
                    @else
                        @foreach ($AdvisorySubject as $key => $sub)                                     
                            <th style="width: 30px; text-align: center" colspan="3">
                                {{-- {{ $sub->subject_id }}  --}}
                                <?php 
                                    $subject_details = \App\SubjectDetail::
                                    where('id', $sub->subject_id)                                                
                                    ->get();  
                                    
                                    echo $subject_details[0]->subject_code;
                                ?>
                            </th>                                                                  
                        @endforeach 
                        
                        <th style="width: 80px" colspan="2">GENERAL AVERAGE</th>
                    @endif
                @endif
                        
                
                <th style="width: 80px">REMARKS</th>
            </tr>
        </thead>
            <tbody>                                  
                <tr>
                    @if($quarter=="Second")
                        <td>
                            <b>Male</b>
                        </td>
                        <td></td>
                        @if($NumberOfSubject->class_subject_order == 7)
                                <td style="color: red">1st</td>
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                
                        @elseif($NumberOfSubject->class_subject_order == 8)
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                
                        @else
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                                <td style="color: red">1st</td>                                             
                                <td style="color: red">2nd</td>
                                <td style="color: blue">FG</td>
                        @endif
                        <td></td>
                        <td></td>
                        <td></td>   
                    @else
                        <td colspan="13">
                            <b>Male</b>
                        </td>
                    @endif
                </tr>
                @if($sem=="First")
                    @if($quarter=="Second")
                        @foreach($GradeSheetMale as $key => $sub)
                        <tr>
                                {{-- $ClassSubjectDetail->grade_level . ' ' .$ClassSubjectDetail->section
                            @if($ClassSubjectDetail->grade_level == 12 && $ClassSubjectDetail->section == '') --}}
                            @if($NumberOfSubject->class_subject_order == 7)
                                <td>{{ $key + 1 }}.</td>
                                <td>{{$sub->student_name}}</td>
                                <td style="text-align:center">
                                        <?php                                                    
                                            echo $subject1 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                        ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_1) }}</center></td>                                            
                                    <td style="text-align:center">
                                        <?php 
                                            echo $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                        ?>
                                    </td>
                                    <td style="text-align:center">
                                        <?php                                                    
                                            echo $subject2 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                        ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_2) }}</center></td>                                            
                                    <td style="text-align:center">
                                        <?php 
                                            echo $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                        ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject3 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                            ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_3) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject4 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                            ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_4) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                            ?>
                                    </td>
                                    
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject5 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                            ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_5) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject6 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                            ?>
                                    </td>
                                    <td><center>{{  round($sub->subject_6) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject7 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                            ?>
                                    </td>
                                    <td><center>{{  round($sub->subject_7) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                            ?>
                                    </td>
                                                                                

                                    <td>
                                            <center>                                                
                                                    <?php
                                                        $formattedNum = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7)/7, 2);
                                                        echo $formattedNum;
                                                    ?>
                                            </center>
                                    </td>
                                    

                                    <td>
                                        <center>                                                
                                            <?php
                                                $formattedNum = number_format(round($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7)/7), 0);
                                                echo $formattedNum;
                                            ?>
                                        </center>
                                    </td>

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
                                        
                                                                    
                                

                            @elseif($NumberOfSubject->class_subject_order == 8)
                                <td>{{ $key + 1 }}.</td>
                                <td>{{$sub->student_name}}</td>
                                <td style="text-align:center">
                                        <?php                                                    
                                            echo $subject1 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                        ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_1) }}</center></td>                                            
                                    <td style="text-align:center">
                                        <?php 
                                            echo $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                        ?>
                                    </td>
                                    <td style="text-align:center">
                                        <?php                                                    
                                            echo $subject2 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                        ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_2) }}</center></td>                                            
                                    <td style="text-align:center">
                                        <?php 
                                            echo $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                        ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject3 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                            ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_3) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject4 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                            ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_4) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                            ?>
                                    </td>
                                    
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject5 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                            ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_5) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject6 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                            ?>
                                    </td>
                                    <td><center>{{  round($sub->subject_6) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject7 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                            ?>
                                    </td>
                                    <td><center>{{  round($sub->subject_7) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject8 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                            ?>
                                    </td>
                                    <td><center>{{  round($sub->subject_8) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg8 = round(($sub->subject_8 + $subject8) / 2);
                                            ?>
                                    </td>
                                

                                    <td>
                                            <center>                                                
                                                    <?php
                                                        $formattedNum = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8)/8, 2);
                                                        echo $formattedNum;
                                                    ?>
                                            </center>
                                    </td>
                                    

                                    <td>
                                        <center>                                                
                                            <?php
                                                $formattedNum = number_format(round($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8)/8), 0);
                                                echo $formattedNum;
                                            ?>
                                        </center>
                                    </td>

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
                                <td>{{ $key + 1 }}.</td>
                                <td>{{$sub->student_name}}</td>
                                <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject1 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                    ?>
                                </td>
                                <td><center>{{ round($sub->subject_1) }}</center></td>                                            
                                <td style="text-align:center">
                                    <?php 
                                        echo $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                    ?>
                                </td>
                                <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject2 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                    ?>
                                </td>
                                <td><center>{{ round($sub->subject_2) }}</center></td>                                            
                                <td style="text-align:center">
                                    <?php 
                                        echo $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                    ?>
                                </td>
                                <td style="text-align:center">
                                        <?php                                                    
                                            echo $subject3 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                        ?>
                                </td>
                                <td><center>{{ round($sub->subject_3) }}</center></td>
                                <td style="text-align:center">
                                        <?php 
                                            echo $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                        ?>
                                </td>
                                <td style="text-align:center">
                                        <?php                                                    
                                            echo $subject4 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                        ?>
                                </td>
                                <td><center>{{ round($sub->subject_4) }}</center></td>
                                <td style="text-align:center">
                                        <?php 
                                            echo $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                        ?>
                                </td>
                                
                                <td style="text-align:center">
                                        <?php                                                    
                                            echo $subject5 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                        ?>
                                </td>
                                <td><center>{{ round($sub->subject_5) }}</center></td>
                                <td style="text-align:center">
                                        <?php 
                                            echo $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                        ?>
                                </td>
                                <td style="text-align:center">
                                        <?php                                                    
                                            echo $subject6 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                        ?>
                                </td>
                                <td><center>{{  round($sub->subject_6) }}</center></td>
                                <td style="text-align:center">
                                        <?php 
                                            echo $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                        ?>
                                </td>
                                <td style="text-align:center">
                                        <?php                                                    
                                            echo $subject7 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                        ?>
                                </td>
                                <td><center>{{  round($sub->subject_7) }}</center></td>
                                <td style="text-align:center">
                                        <?php 
                                            echo $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                        ?>
                                </td>
                                <td style="text-align:center">
                                        <?php                                                    
                                            echo $subject8 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                        ?>
                                </td>
                                <td><center>{{  round($sub->subject_8) }}</center></td>
                                <td style="text-align:center">
                                        <?php 
                                            echo $fg8 = round(($sub->subject_8 + $subject8) / 2);
                                        ?>
                                </td>
                                <td style="text-align:center">
                                        <?php                                                    
                                            echo $subject9 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_9);
                                        ?>
                                </td>
                                <td><center>{{  round($sub->subject_9) }}</center></td>
                                <td style="text-align:center">
                                        <?php 
                                            echo $fg9 = round(($sub->subject_9 + $subject9) / 2);
                                        ?>
                                </td>

                                <td>
                                        <center>                                                
                                                <?php
                                                    $formattedNum = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8 +$fg9)/9, 2);
                                                    echo $formattedNum;
                                                ?>
                                        </center>
                                </td>
                                

                                <td>
                                    <center>                                                
                                        <?php
                                            $formattedNum = number_format(round($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8 +$fg9)/9), 0);
                                            echo $formattedNum;
                                        ?>
                                    </center>
                                </td>

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
                            
                            @if($NumberOfSubject->class_subject_order == 7)
                                <td>{{ $key + 1 }}.</td>
                                <td>{{$sub->student_name}}</td>
                                <td style="text-align:center">
                                        <?php                                                    
                                            echo $subject1 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                        ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_1) }}</center></td>                                            
                                    <td style="text-align:center">
                                        <?php 
                                            echo $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                        ?>
                                    </td>
                                    <td style="text-align:center">
                                        <?php                                                    
                                            echo $subject2 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                        ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_2) }}</center></td>                                            
                                    <td style="text-align:center">
                                        <?php 
                                            echo $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                        ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject3 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                            ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_3) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject4 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                            ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_4) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                            ?>
                                    </td>
                                    
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject5 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                            ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_5) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject6 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                            ?>
                                    </td>
                                    <td><center>{{  round($sub->subject_6) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject7 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                            ?>
                                    </td>
                                    <td><center>{{  round($sub->subject_7) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                            ?>
                                    </td>
                                                                                

                                    <td>
                                            <center>                                                
                                                    <?php
                                                        $formattedNum = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7)/7, 2);
                                                        echo $formattedNum;
                                                    ?>
                                            </center>
                                    </td>
                                    

                                    <td>
                                        <center>                                                
                                            <?php
                                                $formattedNum = number_format(round($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7)/7), 0);
                                                echo $formattedNum;
                                            ?>
                                        </center>
                                    </td>

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
                                        
                                                                    
                                

                            @elseif($NumberOfSubject->class_subject_order == 8)
                                <td>{{ $key + 1 }}.</td>
                                <td>{{$sub->student_name}}</td>
                                <td style="text-align:center">
                                        <?php                                                    
                                            echo $subject1 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                        ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_1) }}</center></td>                                            
                                    <td style="text-align:center">
                                        <?php 
                                            echo $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                        ?>
                                    </td>
                                    <td style="text-align:center">
                                        <?php                                                    
                                            echo $subject2 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                        ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_2) }}</center></td>                                            
                                    <td style="text-align:center">
                                        <?php 
                                            echo $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                        ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject3 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                            ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_3) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject4 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                            ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_4) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                            ?>
                                    </td>
                                    
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject5 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                            ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_5) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject6 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                            ?>
                                    </td>
                                    <td><center>{{  round($sub->subject_6) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject7 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                            ?>
                                    </td>
                                    <td><center>{{  round($sub->subject_7) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject8 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                            ?>
                                    </td>
                                    <td><center>{{  round($sub->subject_8) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg8 = round(($sub->subject_8 + $subject8) / 2);
                                            ?>
                                    </td>
                                

                                    <td>
                                            <center>                                                
                                                    <?php
                                                        $formattedNum = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8)/8, 2);
                                                        echo $formattedNum;
                                                    ?>
                                            </center>
                                    </td>
                                    

                                    <td>
                                        <center>                                                
                                            <?php
                                                $formattedNum = number_format(round($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8)/8), 0);
                                                echo $formattedNum;
                                            ?>
                                        </center>
                                    </td>

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
                                <td>{{ $key + 1 }}.</td>
                                <td>{{$sub->student_name}}</td>
                                <td style="text-align:center">
                                        <?php                                                    
                                            echo $subject1 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                        ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_1) }}</center></td>                                            
                                    <td style="text-align:center">
                                        <?php 
                                            echo $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                        ?>
                                    </td>
                                    <td style="text-align:center">
                                        <?php                                                    
                                            echo $subject2 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                        ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_2) }}</center></td>                                            
                                    <td style="text-align:center">
                                        <?php 
                                            echo $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                        ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject3 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                            ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_3) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject4 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                            ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_4) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                            ?>
                                    </td>
                                    
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject5 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                            ?>
                                    </td>
                                    <td><center>{{ round($sub->subject_5) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject6 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                            ?>
                                    </td>
                                    <td><center>{{  round($sub->subject_6) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject7 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                            ?>
                                    </td>
                                    <td><center>{{  round($sub->subject_7) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject8 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                            ?>
                                    </td>
                                    <td><center>{{  round($sub->subject_8) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg8 = round(($sub->subject_8 + $subject8) / 2);
                                            ?>
                                    </td>
                                    <td style="text-align:center">
                                            <?php                                                    
                                                echo $subject9 = round(\App\Grade_sheet_firstsem::where('enrollment_id', $sub->enrollment_id)->first()->subject_9);
                                            ?>
                                    </td>
                                    <td><center>{{  round($sub->subject_9) }}</center></td>
                                    <td style="text-align:center">
                                            <?php 
                                                echo $fg9 = round(($sub->subject_9 + $subject9) / 2);
                                            ?>
                                    </td>

                                    <td>
                                            <center>                                                
                                                    <?php
                                                        $formattedNum = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8 +$fg9)/9, 2);
                                                        echo $formattedNum;
                                                    ?>
                                            </center>
                                    </td>
                                    

                                    <td>
                                        <center>                                                
                                            <?php
                                                $formattedNum = number_format(round($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8 +$fg9)/9), 0);
                                                echo $formattedNum;
                                            ?>
                                        </center>
                                    </td>

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
                                        
                                                                
                                
                            @endif
                            
                        </tr>             
                        @endforeach 
                    
                    @else

                        @foreach($GradeSheetMale as $key => $sub)
                        <tr>
                                {{-- $ClassSubjectDetail->grade_level . ' ' .$ClassSubjectDetail->section
                            @if($ClassSubjectDetail->grade_level == 12 && $ClassSubjectDetail->section == '') --}}
                            @if($NumberOfSubject->class_subject_order == 7)
                                <td>{{ $key + 1 }}.</td>
                                <td>{{$sub->student_name}}</td>
                                <td><center>{{ $sub ? round($sub->subject_1) > 0 ? round($sub->subject_1) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_2) > 0 ? round($sub->subject_2) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_3) > 0 ? round($sub->subject_3) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_4) > 0 ? round($sub->subject_4) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_5) > 0 ? round($sub->subject_5) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_6) > 0 ? round($sub->subject_6) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_7) > 0 ? round($sub->subject_7) : '' : ''  }}</center></td>
                                {{-- <td><center>{{  round($sub->subject_8) }}</center></td> --}}
                                <td>
                                    <center>                                                
                                        <?php
                                            $formattedNum = number_format(round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7)/7), 0);
                                            echo $formattedNum;
                                        ?>
                                    </center>
                                </td>

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
                                        
                                                                    
                                

                            @elseif($NumberOfSubject->class_subject_order == 8)
                                <td>{{ $key + 1 }}.</td>
                                <td>{{$sub->student_name}}</td>
                                <td><center>{{ $sub ? round($sub->subject_1) > 0 ? round($sub->subject_1) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_2) > 0 ? round($sub->subject_2) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_3) > 0 ? round($sub->subject_3) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_4) > 0 ? round($sub->subject_4) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_5) > 0 ? round($sub->subject_5) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_6) > 0 ? round($sub->subject_6) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_7) > 0 ? round($sub->subject_7) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_8) > 0 ? round($sub->subject_8) : '' : ''  }}</center></td>
                                {{-- <td><center>{{$sub->subject_9}}</center></td> --}}
                                <td>
                                    <center>                                                
                                        <?php
                                            $formattedNum = number_format(round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7 + $sub->subject_8 )/8), 0);
                                            echo $formattedNum;
                                        ?>
                                    </center>
                                </td>

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
                                <td>{{ $key + 1 }}.</td>
                                <td>{{$sub->student_name}}</td>
                                <td><center>{{ $sub ? round($sub->subject_1) > 0 ? round($sub->subject_1) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_2) > 0 ? round($sub->subject_2) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_3) > 0 ? round($sub->subject_3) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_4) > 0 ? round($sub->subject_4) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_5) > 0 ? round($sub->subject_5) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_6) > 0 ? round($sub->subject_6) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_7) > 0 ? round($sub->subject_7) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_8) > 0 ? round($sub->subject_8) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_9) > 0 ? round($sub->subject_9) : '' : ''  }}</center></td>

                                <td>
                                    <center>                                                
                                        <?php
                                            $formattedNum = number_format(round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7 + $sub->subject_8 +$sub->subject_9)/9), 0);
                                            echo $formattedNum;
                                        ?>
                                    </center>
                                </td>

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
                            
                            @if($NumberOfSubject->class_subject_order == 7)
                                <td>{{ $key + 1 }}.</td>
                                <td>{{$sub->student_name}}</td>
                                <td><center>{{ $sub ? round($sub->subject_1) > 0 ? round($sub->subject_1) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_2) > 0 ? round($sub->subject_2) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_3) > 0 ? round($sub->subject_3) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_4) > 0 ? round($sub->subject_4) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_5) > 0 ? round($sub->subject_5) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_6) > 0 ? round($sub->subject_6) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_7) > 0 ? round($sub->subject_7) : '' : ''  }}</center></td>
                                {{-- <td><center>{{ $sub ? round($sub->subject_8) > 0 ? round($sub->subject_8) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_9) > 0 ? round($sub->subject_9) : '' : ''  }}</center></td> --}}
                                
                                <td>
                                    <center>                                                
                                        <?php
                                            $formattedNum = number_format(round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7)/7), 0);
                                            echo $formattedNum;
                                        ?>
                                    </center>
                                </td>

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
                                        
                                                                    
                                

                            @elseif($NumberOfSubject->class_subject_order == 8)
                                <td>{{ $key + 1 }}.</td>
                                <td>{{$sub->student_name}}</td>
                                <td><center>{{ $sub ? round($sub->subject_1) > 0 ? round($sub->subject_1) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_2) > 0 ? round($sub->subject_2) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_3) > 0 ? round($sub->subject_3) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_4) > 0 ? round($sub->subject_4) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_5) > 0 ? round($sub->subject_5) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_6) > 0 ? round($sub->subject_6) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_7) > 0 ? round($sub->subject_7) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_8) > 0 ? round($sub->subject_8) : '' : ''  }}</center></td>
                                {{-- <td><center>{{ $sub ? round($sub->subject_9) > 0 ? round($sub->subject_9) : '' : ''  }}</center></td> --}}
                                {{-- <td><center>{{$sub->subject_9}}</center></td> --}}
                                <td>
                                    <center>                                                
                                        <?php
                                            $formattedNum = number_format(round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7 + $sub->subject_8 )/8), 0);
                                            echo $formattedNum;
                                        ?>
                                    </center>
                                </td>

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
                                <td>{{ $key + 1 }}.</td>
                                <td>{{$sub->student_name}}</td>
                                <td><center>{{ $sub ? round($sub->subject_1) > 0 ? round($sub->subject_1) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_2) > 0 ? round($sub->subject_2) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_3) > 0 ? round($sub->subject_3) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_4) > 0 ? round($sub->subject_4) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_5) > 0 ? round($sub->subject_5) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_6) > 0 ? round($sub->subject_6) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_7) > 0 ? round($sub->subject_7) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_8) > 0 ? round($sub->subject_8) : '' : ''  }}</center></td>
                                <td><center>{{ $sub ? round($sub->subject_9) > 0 ? round($sub->subject_9) : '' : ''  }}</center></td>

                                <td>
                                    <center>                                                
                                        <?php
                                            $formattedNum = number_format(round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7 + $sub->subject_8 +$sub->subject_9)/9), 0);
                                            echo $formattedNum;
                                        ?>
                                    </center>
                                </td>

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
                                        
                                                                
                                
                            @endif
                            
                        </tr>             
                        @endforeach 
                    @endif
            
                @else
                @if($quarter=="Second")
                @foreach($GradeSheetMale as $key => $sub)
                <tr>
                        {{-- $ClassSubjectDetail->grade_level . ' ' .$ClassSubjectDetail->section
                    @if($ClassSubjectDetail->grade_level == 12 && $ClassSubjectDetail->section == '') --}}
                    @if($NumberOfSubject->class_subject_order == 7)
                        <td>{{ $key + 1 }}.</td>
                        <td>{{$sub->student_name}}</td>
                        <td style="text-align:center">
                                <?php                                                    
                                    echo $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                ?>
                            </td>
                            <td><center>{{ round($sub->subject_1) }}</center></td>                                            
                            <td style="text-align:center">
                                <?php 
                                    echo $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                ?>
                            </td>
                            <td style="text-align:center">
                                <?php                                                    
                                    echo $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                ?>
                            </td>
                            <td><center>{{ round($sub->subject_2) }}</center></td>                                            
                            <td style="text-align:center">
                                <?php 
                                    echo $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                    ?>
                            </td>
                            <td><center>{{ round($sub->subject_3) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                    ?>
                            </td>
                            <td><center>{{ round($sub->subject_4) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                    ?>
                            </td>
                            
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                    ?>
                            </td>
                            <td><center>{{ round($sub->subject_5) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                    ?>
                            </td>
                            <td><center>{{  round($sub->subject_6) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                    ?>
                            </td>
                            <td><center>{{  round($sub->subject_7) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                    ?>
                            </td>
                                                                        

                            <td>
                                    <center>                                                
                                            <?php
                                                $formattedNum = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7)/7, 2);
                                                echo $formattedNum;
                                            ?>
                                    </center>
                            </td>
                            

                            <td>
                                <center>                                                
                                    <?php
                                        $formattedNum = number_format(round($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7)/7), 0);
                                        echo $formattedNum;
                                    ?>
                                </center>
                            </td>

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
                                
                                                            
                        

                    @elseif($NumberOfSubject->class_subject_order == 8)
                        <td>{{ $key + 1 }}.</td>
                        <td>{{$sub->student_name}}</td>
                        <td style="text-align:center">
                                <?php                                                    
                                    echo $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                ?>
                            </td>
                            <td><center>{{ round($sub->subject_1) }}</center></td>                                            
                            <td style="text-align:center">
                                <?php 
                                    echo $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                ?>
                            </td>
                            <td style="text-align:center">
                                <?php                                                    
                                    echo $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                ?>
                            </td>
                            <td><center>{{ round($sub->subject_2) }}</center></td>                                            
                            <td style="text-align:center">
                                <?php 
                                    echo $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                    ?>
                            </td>
                            <td><center>{{ round($sub->subject_3) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                    ?>
                            </td>
                            <td><center>{{ round($sub->subject_4) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                    ?>
                            </td>
                            
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                    ?>
                            </td>
                            <td><center>{{ round($sub->subject_5) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                    ?>
                            </td>
                            <td><center>{{  round($sub->subject_6) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                    ?>
                            </td>
                            <td><center>{{  round($sub->subject_7) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject8 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                    ?>
                            </td>
                            <td><center>{{  round($sub->subject_8) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg8 = round(($sub->subject_8 + $subject8) / 2);
                                    ?>
                            </td>
                        

                            <td>
                                    <center>                                                
                                            <?php
                                                $formattedNum = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8)/8, 2);
                                                echo $formattedNum;
                                            ?>
                                    </center>
                            </td>
                            

                            <td>
                                <center>                                                
                                    <?php
                                        $formattedNum = number_format(round($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8)/8), 0);
                                        echo $formattedNum;
                                    ?>
                                </center>
                            </td>

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
                        <td>{{ $key + 1 }}.</td>
                        <td>{{$sub->student_name}}</td>
                        <td style="text-align:center">
                            <?php                                                    
                                echo $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                            ?>
                        </td>
                        <td><center>{{ round($sub->subject_1) }}</center></td>                                            
                        <td style="text-align:center">
                            <?php 
                                echo $fg1 = round(($sub->subject_1 + $subject1) / 2);
                            ?>
                        </td>
                        <td style="text-align:center">
                            <?php                                                    
                                echo $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                            ?>
                        </td>
                        <td><center>{{ round($sub->subject_2) }}</center></td>                                            
                        <td style="text-align:center">
                            <?php 
                                echo $fg2 = round(($sub->subject_2 + $subject2) / 2);
                            ?>
                        </td>
                        <td style="text-align:center">
                                <?php                                                    
                                    echo $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                ?>
                        </td>
                        <td><center>{{ round($sub->subject_3) }}</center></td>
                        <td style="text-align:center">
                                <?php 
                                    echo $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                ?>
                        </td>
                        <td style="text-align:center">
                                <?php                                                    
                                    echo $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                ?>
                        </td>
                        <td><center>{{ round($sub->subject_4) }}</center></td>
                        <td style="text-align:center">
                                <?php 
                                    echo $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                ?>
                        </td>
                        
                        <td style="text-align:center">
                                <?php                                                    
                                    echo $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                ?>
                        </td>
                        <td><center>{{ round($sub->subject_5) }}</center></td>
                        <td style="text-align:center">
                                <?php 
                                    echo $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                ?>
                        </td>
                        <td style="text-align:center">
                                <?php                                                    
                                    echo $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                ?>
                        </td>
                        <td><center>{{  round($sub->subject_6) }}</center></td>
                        <td style="text-align:center">
                                <?php 
                                    echo $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                ?>
                        </td>
                        <td style="text-align:center">
                                <?php                                                    
                                    echo $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                ?>
                        </td>
                        <td><center>{{  round($sub->subject_7) }}</center></td>
                        <td style="text-align:center">
                                <?php 
                                    echo $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                ?>
                        </td>
                        <td style="text-align:center">
                                <?php                                                    
                                    echo $subject8 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                ?>
                        </td>
                        <td><center>{{  round($sub->subject_8) }}</center></td>
                        <td style="text-align:center">
                                <?php 
                                    echo $fg8 = round(($sub->subject_8 + $subject8) / 2);
                                ?>
                        </td>
                        <td style="text-align:center">
                                <?php                                                    
                                    echo $subject9 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_9);
                                ?>
                        </td>
                        <td><center>{{  round($sub->subject_9) }}</center></td>
                        <td style="text-align:center">
                                <?php 
                                    echo $fg9 = round(($sub->subject_9 + $subject9) / 2);
                                ?>
                        </td>

                        <td>
                                <center>                                                
                                        <?php
                                            $formattedNum = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8 +$fg9)/9, 2);
                                            echo $formattedNum;
                                        ?>
                                </center>
                        </td>
                        

                        <td>
                            <center>                                                
                                <?php
                                    $formattedNum = number_format(round($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8 +$fg9)/9), 0);
                                    echo $formattedNum;
                                ?>
                            </center>
                        </td>

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
                    
                    @if($NumberOfSubject->class_subject_order == 7)
                        <td>{{ $key + 1 }}.</td>
                        <td>{{$sub->student_name}}</td>
                        <td style="text-align:center">
                                <?php                                                    
                                    echo $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                ?>
                            </td>
                            <td><center>{{ round($sub->subject_1) }}</center></td>                                            
                            <td style="text-align:center">
                                <?php 
                                    echo $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                ?>
                            </td>
                            <td style="text-align:center">
                                <?php                                                    
                                    echo $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                ?>
                            </td>
                            <td><center>{{ round($sub->subject_2) }}</center></td>                                            
                            <td style="text-align:center">
                                <?php 
                                    echo $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                    ?>
                            </td>
                            <td><center>{{ round($sub->subject_3) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                    ?>
                            </td>
                            <td><center>{{ round($sub->subject_4) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                    ?>
                            </td>
                            
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                    ?>
                            </td>
                            <td><center>{{ round($sub->subject_5) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                    ?>
                            </td>
                            <td><center>{{  round($sub->subject_6) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                    ?>
                            </td>
                            <td><center>{{  round($sub->subject_7) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                    ?>
                            </td>
                                                                        

                            <td>
                                    <center>                                                
                                            <?php
                                                $formattedNum = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7)/7, 2);
                                                echo $formattedNum;
                                            ?>
                                    </center>
                            </td>
                            

                            <td>
                                <center>                                                
                                    <?php
                                        $formattedNum = number_format(round($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7)/7), 0);
                                        echo $formattedNum;
                                    ?>
                                </center>
                            </td>

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
                                
                                                            
                        

                    @elseif($NumberOfSubject->class_subject_order == 8)
                        <td>{{ $key + 1 }}.</td>
                        <td>{{$sub->student_name}}</td>
                        <td style="text-align:center">
                                <?php                                                    
                                    echo $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                ?>
                            </td>
                            <td><center>{{ round($sub->subject_1) }}</center></td>                                            
                            <td style="text-align:center">
                                <?php 
                                    echo $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                ?>
                            </td>
                            <td style="text-align:center">
                                <?php                                                    
                                    echo $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                ?>
                            </td>
                            <td><center>{{ round($sub->subject_2) }}</center></td>                                            
                            <td style="text-align:center">
                                <?php 
                                    echo $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                    ?>
                            </td>
                            <td><center>{{ round($sub->subject_3) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                    ?>
                            </td>
                            <td><center>{{ round($sub->subject_4) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                    ?>
                            </td>
                            
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                    ?>
                            </td>
                            <td><center>{{ round($sub->subject_5) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                    ?>
                            </td>
                            <td><center>{{  round($sub->subject_6) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                    ?>
                            </td>
                            <td><center>{{  round($sub->subject_7) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject8 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                    ?>
                            </td>
                            <td><center>{{  round($sub->subject_8) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg8 = round(($sub->subject_8 + $subject8) / 2);
                                    ?>
                            </td>
                        

                            <td>
                                    <center>                                                
                                            <?php
                                                $formattedNum = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8)/8, 2);
                                                echo $formattedNum;
                                            ?>
                                    </center>
                            </td>
                            

                            <td>
                                <center>                                                
                                    <?php
                                        $formattedNum = number_format(round($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8)/8), 0);
                                        echo $formattedNum;
                                    ?>
                                </center>
                            </td>

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
                        <td>{{ $key + 1 }}.</td>
                        <td>{{$sub->student_name}}</td>
                        <td style="text-align:center">
                                <?php                                                    
                                    echo $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                ?>
                            </td>
                            <td><center>{{ round($sub->subject_1) }}</center></td>                                            
                            <td style="text-align:center">
                                <?php 
                                    echo $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                ?>
                            </td>
                            <td style="text-align:center">
                                <?php                                                    
                                    echo $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                ?>
                            </td>
                            <td><center>{{ round($sub->subject_2) }}</center></td>                                            
                            <td style="text-align:center">
                                <?php 
                                    echo $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                    ?>
                            </td>
                            <td><center>{{ round($sub->subject_3) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                    ?>
                            </td>
                            <td><center>{{ round($sub->subject_4) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                    ?>
                            </td>
                            
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                    ?>
                            </td>
                            <td><center>{{ round($sub->subject_5) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                    ?>
                            </td>
                            <td><center>{{  round($sub->subject_6) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                    ?>
                            </td>
                            <td><center>{{  round($sub->subject_7) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject8 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                    ?>
                            </td>
                            <td><center>{{  round($sub->subject_8) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg8 = round(($sub->subject_8 + $subject8) / 2);
                                    ?>
                            </td>
                            <td style="text-align:center">
                                    <?php                                                    
                                        echo $subject9 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_9);
                                    ?>
                            </td>
                            <td><center>{{  round($sub->subject_9) }}</center></td>
                            <td style="text-align:center">
                                    <?php 
                                        echo $fg9 = round(($sub->subject_9 + $subject9) / 2);
                                    ?>
                            </td>

                            <td>
                                    <center>                                                
                                            <?php
                                                $formattedNum = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8 +$fg9)/9, 2);
                                                echo $formattedNum;
                                            ?>
                                    </center>
                            </td>
                            

                            <td>
                                <center>                                                
                                    <?php
                                        $formattedNum = number_format(round($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8 +$fg9)/9), 0);
                                        echo $formattedNum;
                                    ?>
                                </center>
                            </td>

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
                                
                                                        
                        
                    @endif
                    
                    </tr>             
                    @endforeach 
                
                @else

                    @foreach($GradeSheetMale as $key => $sub)
                    <tr>
                            {{-- $ClassSubjectDetail->grade_level . ' ' .$ClassSubjectDetail->section
                        @if($ClassSubjectDetail->grade_level == 12 && $ClassSubjectDetail->section == '') --}}
                        @if($NumberOfSubject->class_subject_order == 7)
                            <td>{{ $key + 1 }}.</td>
                            <td>{{$sub->student_name}}</td>
                            <td><center>{{ round($sub->subject_1) }}</center></td>
                            <td><center>{{ round($sub->subject_2) }}</center></td>
                            <td><center>{{ round($sub->subject_3) }}</center></td>
                            <td><center>{{ round($sub->subject_4) }}</center></td>
                            <td><center>{{ round($sub->subject_5) }}</center></td>
                            <td><center>{{  round($sub->subject_6) }}</center></td>
                            <td><center>{{  round($sub->subject_7) }}</center></td>
                            {{-- <td><center>{{  round($sub->subject_8) }}</center></td> --}}
                            <td>
                                <center>                                                
                                    <?php
                                        $formattedNum = number_format(round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7)/7), 0);
                                        echo $formattedNum;
                                    ?>
                                </center>
                            </td>

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
                                    
                                                                
                            

                        @elseif($NumberOfSubject->class_subject_order == 8)
                            <td>{{ $key + 1 }}.</td>
                            <td>{{$sub->student_name}}</td>
                            <td><center>{{ round($sub->subject_1) }}</center></td>
                            <td><center>{{ round($sub->subject_2) }}</center></td>
                            <td><center>{{ round($sub->subject_3) }}</center></td>
                            <td><center>{{ round($sub->subject_4) }}</center></td>
                            <td><center>{{ round($sub->subject_5) }}</center></td>
                            <td><center>{{  round($sub->subject_6) }}</center></td>
                            <td><center>{{  round($sub->subject_7) }}</center></td>
                            <td><center>{{  round($sub->subject_8) }}</center></td>
                            {{-- <td><center>{{$sub->subject_9}}</center></td> --}}
                            <td>
                                <center>                                                
                                    <?php
                                        $formattedNum = number_format(round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7 + $sub->subject_8 )/8), 0);
                                        echo $formattedNum;
                                    ?>
                                </center>
                            </td>

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
                            <td>{{ $key + 1 }}.</td>
                            <td>{{$sub->student_name}}</td>
                            <td><center>{{ round($sub->subject_1) }}</center></td>
                            <td><center>{{ round($sub->subject_2) }}</center></td>
                            <td><center>{{ round($sub->subject_3) }}</center></td>
                            <td><center>{{ round($sub->subject_4) }}</center></td>
                            <td><center>{{ round($sub->subject_5) }}</center></td>
                            <td><center>{{  round($sub->subject_6) }}</center></td>
                            <td><center>{{  round($sub->subject_7) }}</center></td>
                            <td><center>{{  round($sub->subject_8) }}</center></td>
                            <td><center>{{  round($sub->subject_9) }}</center></td>

                            <td>
                                <center>                                                
                                    <?php
                                        $formattedNum = number_format(round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7 + $sub->subject_8 +$sub->subject_9)/9), 0);
                                        echo $formattedNum;
                                    ?>
                                </center>
                            </td>

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
                        
                        @if($NumberOfSubject->class_subject_order == 7)
                            <td>{{ $key + 1 }}.</td>
                            <td>{{$sub->student_name}}</td>
                            <td><center>{{ round($sub->subject_1) }}</center></td>
                            <td><center>{{ round($sub->subject_2) }}</center></td>
                            <td><center>{{ round($sub->subject_3) }}</center></td>
                            <td><center>{{ round($sub->subject_4) }}</center></td>
                            <td><center>{{ round($sub->subject_5) }}</center></td>
                            <td><center>{{  round($sub->subject_6) }}</center></td>
                            <td><center>{{  round($sub->subject_7) }}</center></td>
                            
                            <td>
                                <center>                                                
                                    <?php
                                        $formattedNum = number_format(round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7)/7), 0);
                                        echo $formattedNum;
                                    ?>
                                </center>
                            </td>

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
                                    
                                                                
                            

                        @elseif($NumberOfSubject->class_subject_order == 8)
                            <td>{{ $key + 1 }}.</td>
                            <td>{{$sub->student_name}}</td>
                            <td><center>{{ round($sub->subject_1) }}</center></td>
                            <td><center>{{ round($sub->subject_2) }}</center></td>
                            <td><center>{{ round($sub->subject_3) }}</center></td>
                            <td><center>{{ round($sub->subject_4) }}</center></td>
                            <td><center>{{ round($sub->subject_5) }}</center></td>
                            <td><center>{{  round($sub->subject_6) }}</center></td>
                            <td><center>{{  round($sub->subject_7) }}</center></td>
                            <td><center>{{  round($sub->subject_8) }}</center></td>
                            {{-- <td><center>{{$sub->subject_9}}</center></td> --}}
                            <td>
                                <center>                                                
                                    <?php
                                        $formattedNum = number_format(round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7 + $sub->subject_8 )/8), 0);
                                        echo $formattedNum;
                                    ?>
                                </center>
                            </td>

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
                            <td>{{ $key + 1 }}.</td>
                            <td>{{$sub->student_name}}</td>
                            <td><center>{{ round($sub->subject_1) }}</center></td>
                            <td><center>{{ round($sub->subject_2) }}</center></td>
                            <td><center>{{ round($sub->subject_3) }}</center></td>
                            <td><center>{{ round($sub->subject_4) }}</center></td>
                            <td><center>{{ round($sub->subject_5) }}</center></td>
                            <td><center>{{  round($sub->subject_6) }}</center></td>
                            <td><center>{{  round($sub->subject_7) }}</center></td>
                            <td><center>{{  round($sub->subject_8) }}</center></td>
                            <td><center>{{  round($sub->subject_9) }}</center></td>

                            <td>
                                <center>                                                
                                    <?php
                                        $formattedNum = number_format(round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7 + $sub->subject_8 +$sub->subject_9)/9), 0);
                                        echo $formattedNum;
                                    ?>
                                </center>
                            </td>

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
                                    
                                                            
                            
                        @endif
                        
                    </tr>             
                    @endforeach 
                @endif
                @endif
    </table>
</div>