@if($type == 'average')
        
        @if($ClassSubjectDetail->grade_level == 11 || $ClassSubjectDetail->grade_level == 12)
        
       
            <h4>Semester: <span class="text-red"><i>{{ $sem }}</i></span> Quarter: <span class="text-red"><i>{{ $quarter }}</i></span></h4>                        
            <h4>Grade &amp; Section: <span class="text-red"><i>{{ $ClassSubjectDetail->grade_level . ' ' .$ClassSubjectDetail->section }}</i></span></h4>
            <h4>Room: <span class="text-red"><i>{{ $ClassSubjectDetail->room_code . ' ' .$ClassSubjectDetail->room_description }}</i></span></h4>
            <button class="btn btn-flat btn-danger pull-right" id="js-btn_print" data-id="{{ $ClassSubjectDetail->id }}"><i class="fa fa-file-pdf"></i> Print</button>
            
            <table class="table no-margin table-striped table-bordered">
                    <thead>
                        <tr>
                                <th style="width: 30px">#</th>
                                <th style="width: 200px">Student Name</th>                                       

                                @if($quarter == 'First - Second')
                                    <th style="width: 80px; text-align: center">First Quarter</th>
                                    <th style="width: 80px; text-align: center">Second Quarter</th>
                                @else
                                    <th style="width: 80px; text-align: center">First Semester</th>
                                    <th style="width: 80px; text-align: center">Second Semester</th>
                                @endif
    
                                <th style="width: 80px; text-align: center">GENERAL AVERAGE</th>
                                <th style="width: 80px; text-align: center">REMARKS</th>
                        </tr>
                    </thead>
                    <tbody>
                            @if($sem == 'First')
                            
                                @if($NumberOfSubject->class_subject_order == 7)
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
                                            $formattedNum = round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7)/7);
                                            echo $formattedNum;
                                            ?>                                                
                                        </td>
                                        <td style="text-align: center">
                                            <?php
                                                $sec_g = \App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first();
                                                $result = round($average = ($sec_g->subject_1 + $sec_g->subject_2 + $sec_g->subject_3 + $sec_g->subject_4 + $sec_g->subject_5 + $sec_g->subject_6 + $sec_g->subject_7)/7);
                                                echo $result;
                                            ?>    
                                        </td>
                                
                                        <?php                                                    
                                        $subject1 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                
                                        $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                                                                    
                                        $subject2 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                
                                        $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                                                                    
                                        $subject3 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                        
                                        $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                                                                        
                                        $subject4 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                        
                                        $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                                                                        
                                        $subject5 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                    
                                        $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                                                                        
                                        $subject6 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                        
                                        $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                                                                        
                                        $subject7 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                        
                                        $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                                                                        
                                        
                                    ?>
                        
                                    <td>
                                            <center>                                                
                                                    <?php
                                                        $average_1sem = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 )/7, 2);
                                                        echo round($average_1sem);
                                                    ?>
                                            </center>
                                    </td>
                                    
                                    @if(round($average_1sem) >= 75 && round($average_1sem) <= 89)
                                        <td>
                                            <center>Passed</center>
                                        </td>
                                    @elseif(round($average_1sem) >= 90 && round($average_1sem) <= 94)
                                        <td>
                                            <center>with honors</center>
                                        </td>
                                    @elseif(round($average_1sem)>= 95 && round($average_1sem) <= 97)
                                        <td>
                                            <center>with high honors</center>
                                        </td>
                                    @elseif(round($average_1sem) >= 98 && round($average_1sem) <= 100)
                                        <td>
                                            <center>with highest honors</center>
                                        </td>
                                    @elseif(round($average_1sem) < 75)
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
                                                $formattedNum = round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7)/7);
                                                echo $formattedNum;
                                                ?>                                                
                                            </td>
                                            <td style="text-align: center">
                                                <?php
                                                    $sec_g = \App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first();
                                                    $result = round($average = ($sec_g->subject_1 + $sec_g->subject_2 + $sec_g->subject_3 + $sec_g->subject_4 + $sec_g->subject_5 + $sec_g->subject_6 + $sec_g->subject_7)/7);
                                                    echo $result;
                                                ?>    
                                                </td>
                                                <?php                                                    
                                                $subject1 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                        
                                                $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                                                                            
                                                $subject2 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                        
                                                $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                                                                            
                                                $subject3 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                                
                                                $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                                                                                
                                                $subject4 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                
                                                $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                                                                                
                                                $subject5 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                            
                                                $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                                                                                
                                                $subject6 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                
                                                $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                                                                                
                                                $subject7 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                
                                                $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                                                                                
                                                
                                            ?>
                                
                                            <td>
                                                    <center>                                                
                                                            <?php
                                                                $average_1sem = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 )/7, 2);
                                                                echo round($average_1sem);
                                                            ?>
                                                    </center>
                                            </td>
                                            
                                            @if(round($average_1sem) >= 75 && round($average_1sem) <= 89)
                                                <td>
                                                    <center>Passed</center>
                                                </td>
                                            @elseif(round($average_1sem) >= 90 && round($average_1sem) <= 94)
                                                <td>
                                                    <center>with honors</center>
                                                </td>
                                            @elseif(round($average_1sem)>= 95 && round($average_1sem) <= 97)
                                                <td>
                                                    <center>with high honors</center>
                                                </td>
                                            @elseif(round($average_1sem) >= 98 && round($average_1sem) <= 100)
                                                <td>
                                                    <center>with highest honors</center>
                                                </td>
                                            @elseif(round($average_1sem) < 75)
                                                <td>
                                                    <center>Failed</center>
                                                </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                @elseif($NumberOfSubject->class_subject_order == 8)
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
                                            $formattedNum = round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7 + $sub->subject_8)/8);
                                            echo $formattedNum;
                                            ?>                                                
                                        </td>
                                        <td style="text-align: center">
                                            <?php
                                                $sec_g = \App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first();
                                                $result = round($average = ($sec_g->subject_1 + $sec_g->subject_2 + $sec_g->subject_3 + $sec_g->subject_4 + $sec_g->subject_5 + $sec_g->subject_6 + $sec_g->subject_7+$sec_g->subject_8)/8);
                                                echo $result;
                                            ?>    
                                        </td>
                                        
                                        <?php                                                    
                                            $subject1 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                    
                                            $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                                                                        
                                            $subject2 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                    
                                            $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                                                                        
                                            $subject3 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                            
                                            $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                                                                            
                                            $subject4 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                            
                                            $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                                                                            
                                            $subject5 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                        
                                            $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                                                                            
                                            $subject6 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                            
                                            $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                                                                            
                                            $subject7 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                            
                                            $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                                                                            
                                            $subject8 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                            
                                            $fg8 = round(($sub->subject_8 + $subject8) / 2);
                                                                                            
                                            
                                        ?>
                            
                                        <td>
                                                <center>                                                
                                                        <?php
                                                            $average_1sem = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8)/8, 2);
                                                            echo round($average_1sem);
                                                        ?>
                                                </center>
                                        </td>
                                        
                                        @if(round($average_1sem) >= 75 && round($average_1sem) <= 89)
                                            <td>
                                                <center>Passed</center>
                                            </td>
                                        @elseif(round($average_1sem) >= 90 && round($average_1sem) <= 94)
                                            <td>
                                                <center>with honors</center>
                                            </td>
                                        @elseif(round($average_1sem)>= 95 && round($average_1sem) <= 97)
                                            <td>
                                                <center>with high honors</center>
                                            </td>
                                        @elseif(round($average_1sem) >= 98 && round($average_1sem) <= 100)
                                            <td>
                                                <center>with highest honors</center>
                                            </td>
                                        @elseif(round($average_1sem) < 75)
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
                                                $formattedNum = round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7 + $sub->subject_8)/8);
                                                echo $formattedNum;
                                                ?>                                                
                                            </td>
                                            <td style="text-align: center">
                                                <?php
                                                    $sec_g = \App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first();
                                                    $result = round($average = ($sec_g->subject_1 + $sec_g->subject_2 + $sec_g->subject_3 + $sec_g->subject_4 + $sec_g->subject_5 + $sec_g->subject_6 + $sec_g->subject_7+$sec_g->subject_8)/8);
                                                echo $result;
                                                ?>    
                                                </td>

                                        
                                                <?php                                                    
                                                $subject1 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                        
                                                $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                                                                            
                                                $subject2 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                        
                                                $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                                                                            
                                                $subject3 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                                
                                                $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                                                                                
                                                $subject4 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                
                                                $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                                                                                
                                                $subject5 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                            
                                                $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                                                                                
                                                $subject6 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                
                                                $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                                                                                
                                                $subject7 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                
                                                $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                                                                                
                                                $subject8 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                
                                                $fg8 = round(($sub->subject_8 + $subject8) / 2);
                                                                                                
                                                
                                            ?>
                                
                                            <td>
                                                    <center>                                                
                                                            <?php
                                                                $average_1sem = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8 )/8, 2);
                                                                echo round($average_1sem);
                                                            ?>
                                                    </center>
                                            </td>
                                            
                                            @if(round($average_1sem) >= 75 && round($average_1sem) <= 89)
                                                <td>
                                                    <center>Passed</center>
                                                </td>
                                            @elseif(round($average_1sem) >= 90 && round($average_1sem) <= 94)
                                                <td>
                                                    <center>with honors</center>
                                                </td>
                                            @elseif(round($average_1sem)>= 95 && round($average_1sem) <= 97)
                                                <td>
                                                    <center>with high honors</center>
                                                </td>
                                            @elseif(round($average_1sem) >= 98 && round($average_1sem) <= 100)
                                                <td>
                                                    <center>with highest honors</center>
                                                </td>
                                            @elseif(round($average_1sem) < 75)
                                                <td>
                                                    <center>Failed</center>
                                                </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                @else
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
                                            $formattedNum = round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7+ $sub->subject_8+ $sub->subject_9)/9);
                                            echo $formattedNum;
                                            ?>                                                
                                        </td>
                                        <td style="text-align: center">
                                            <?php
                                                $sec_g = \App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first();
                                                $result = round($average = ($sec_g->subject_1 + $sec_g->subject_2 + $sec_g->subject_3 + $sec_g->subject_4 + $sec_g->subject_5 + $sec_g->subject_6 + $sec_g->subject_7 + $sec_g->subject_8 + $sec_g->subject_9)/9);
                                                echo $result;
                                            ?>    
                                        </td>

                                            <?php                                                    
                                            $subject1 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                    
                                            $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                                                                        
                                            $subject2 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                    
                                            $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                                                                        
                                            $subject3 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                            
                                            $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                                                                            
                                            $subject4 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                            
                                            $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                                                                            
                                            $subject5 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                        
                                            $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                                                                            
                                            $subject6 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                            
                                            $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                                                                            
                                            $subject7 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                            
                                            $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                                                                            
                                            $subject8 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                            
                                            $fg8 = round(($sub->subject_8 + $subject8) / 2);
                                                                                            
                                            $subject9 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_9);
                                        
                                            $fg9 = round(($sub->subject_9 + $subject9) / 2);
                                        ?>
                                
                                        <td>
                                                <center>                                                
                                                        <?php
                                                            $average_1sem = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8 + $fg9)/9, 2);
                                                            echo round($average_1sem);
                                                        ?>
                                                </center>
                                        </td>
                                        
                                        @if(round($average_1sem) >= 75 && round($average_1sem) <= 89)
                                            <td>
                                                <center>Passed</center>
                                            </td>
                                        @elseif(round($average_1sem) >= 90 && round($average_1sem) <= 94)
                                            <td>
                                                <center>with honors</center>
                                            </td>
                                        @elseif(round($average_1sem)>= 95 && round($average_1sem) <= 97)
                                            <td>
                                                <center>with high honors</center>
                                            </td>
                                        @elseif(round($average_1sem) >= 98 && round($average_1sem) <= 100)
                                            <td>
                                                <center>with highest honors</center>
                                            </td>
                                        @elseif(round($average_1sem) < 75)
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
                                                $formattedNum = round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7 + $sub->subject_8+ $sub->subject_9)/9);
                                                echo $formattedNum;
                                                ?>                                                
                                            </td>
                                            <td style="text-align: center">
                                                <?php
                                                    $sec_g = \App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first();
                                                    $result = round($average = ($sec_g->subject_1 + $sec_g->subject_2 + $sec_g->subject_3 + $sec_g->subject_4 + $sec_g->subject_5 + $sec_g->subject_6 + $sec_g->subject_7 + $sec_g->subject_8 + $sec_g->subject_9)/9);
                                                    echo $result;
                                                ?>    
                                                </td>
                                            
                                            <?php                                                    
                                                $subject1 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                        
                                                $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                                                                            
                                                $subject2 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                        
                                                $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                                                                            
                                                $subject3 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                                
                                                $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                                                                                
                                                $subject4 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                
                                                $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                                                                                
                                                $subject5 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                            
                                                $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                                                                                
                                                $subject6 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                
                                                $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                                                                                
                                                $subject7 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                
                                                $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                                                                                
                                                $subject8 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                
                                                $fg8 = round(($sub->subject_8 + $subject8) / 2);
                                                                                                
                                                $subject9 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_9);
                                            
                                                $fg9 = round(($sub->subject_9 + $subject9) / 2);
                                            ?>
                                
                                            <td>
                                                    <center>                                                
                                                            <?php
                                                                $average_1sem = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8 + $fg9)/9, 2);
                                                                echo round($average_1sem);
                                                            ?>
                                                    </center>
                                            </td>
                                            
                                            @if(round($average_1sem) >= 75 && round($average_1sem) <= 89)
                                                <td>
                                                    <center>Passed</center>
                                                </td>
                                            @elseif(round($average_1sem) >= 90 && round($average_1sem) <= 94)
                                                <td>
                                                    <center>with honors</center>
                                                </td>
                                            @elseif(round($average_1sem)>= 95 && round($average_1sem) <= 97)
                                                <td>
                                                    <center>with high honors</center>
                                                </td>
                                            @elseif(round($average_1sem) >= 98 && round($average_1sem) <= 100)
                                                <td>
                                                    <center>with highest honors</center>
                                                </td>
                                            @elseif(round($average_1sem) < 75)
                                                <td>
                                                    <center>Failed</center>
                                                </td>
                                            @endif
                                        
                                        </tr>
                                        @endforeach
                                @endif
                                
                            @elseif($sem == 'Second')
                                        
                                    @if($NumberOfSubject->class_subject_order == 7)
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
                                                $formattedNum = round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7)/7);
                                                echo $formattedNum;
                                                ?>                                                
                                            </td>
                                            <td style="text-align: center">
                                                <?php
                                                    $sec_g = \App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first();
                                                    $result = round($average = ($sec_g->subject_1 + $sec_g->subject_2 + $sec_g->subject_3 + $sec_g->subject_4 + $sec_g->subject_5 + $sec_g->subject_6 + $sec_g->subject_7)/7);
                                                    echo $result;
                                                ?>    
                                            </td>
                                            <?php                                                    
                                                    $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                                    $subject_1 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                            
                                                    $fg_1 = round(($subject_1 + $subject1) / 2);
                                                                                                
                                                    $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                                    $subject_2 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                            
                                                    $fg_2 = round(($subject_2 + $subject2) / 2);
                                                                                                
                                                    $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                                    $subject_3 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
        
                                                    $fg_3 = round(($subject_3 + $subject3) / 2);
                                                                                                    
                                                    $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                    $subject_4 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                    
                                                    $fg_4 = round(($subject_4 + $subject4) / 2);
                                                                                                    
                                                    $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                    $subject_5 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                
                                                    $fg_5 = round(($subject_5 + $subject5) / 2);
                                                                                                    
                                                    $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                    $subject_6 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                    
                                                    $fg_6 = round(($subject_6 + $subject6) / 2);
                                                                                                    
                                                    $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                    $subject_7 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                    
                                                    $fg_7 = round(($subject_7 + $subject7) / 2);
                                                                                                    
                                                    
                                            ?>
                                   
                                            <td>
                                                    <center>                                                
                                                            <?php
                                                                $average_2sem = round($average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 )/7, 2);
                                                                echo round($average_2sem);
                                                            ?>
                                                    </center>
                                            </td>
                                            @if(round($average_2sem) >= 75 && round($average_2sem) <= 89)
                                                <td>
                                                    <center>Passed</center>
                                                </td>
                                            @elseif(round($average_2sem) >= 90 && round($average_2sem) <= 94)
                                                <td>
                                                    <center>with honors</center>
                                                </td>
                                            @elseif(round($average_2sem)>= 95 && round($average_2sem) <= 97)
                                                <td>
                                                    <center>with high honors</center>
                                                </td>
                                            @elseif(round($average_2sem) >= 98 && round($average_2sem) <= 100)
                                                <td>
                                                    <center>with highest honors</center>
                                                </td>
                                            @elseif(round($average_2sem) < 75)
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
                                                    $formattedNum = round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7)/7);
                                                    echo $formattedNum;
                                                    ?>                                                
                                                </td>
                                                <td style="text-align: center">
                                                    <?php
                                                        $sec_g = \App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first();
                                                        $result = round($average = ($sec_g->subject_1 + $sec_g->subject_2 + $sec_g->subject_3 + $sec_g->subject_4 + $sec_g->subject_5 + $sec_g->subject_6 + $sec_g->subject_7)/7);
                                                        echo $result;
                                                    ?>    
                                                </td>
                                                    <?php                                                    
                                                    $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                                    $subject_1 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                            
                                                    $fg_1 = round(($subject_1 + $subject1) / 2);
                                                                                                
                                                    $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                                    $subject_2 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                            
                                                    $fg_2 = round(($subject_2 + $subject2) / 2);
                                                                                                
                                                    $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                                    $subject_3 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
        
                                                    $fg_3 = round(($subject_3 + $subject3) / 2);
                                                                                                    
                                                    $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                    $subject_4 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                    
                                                    $fg_4 = round(($subject_4 + $subject4) / 2);
                                                                                                    
                                                    $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                    $subject_5 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                
                                                    $fg_5 = round(($subject_5 + $subject5) / 2);
                                                                                                    
                                                    $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                    $subject_6 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                    
                                                    $fg_6 = round(($subject_6 + $subject6) / 2);
                                                                                                    
                                                    $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                    $subject_7 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                    
                                                    $fg_7 = round(($subject_7 + $subject7) / 2);
                                                                                                    
                                                    
                                            ?>
                                   
                                            <td>
                                                    <center>                                                
                                                            <?php
                                                                $average_2sem = round($average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 )/7, 2);
                                                                echo round($average_2sem);
                                                            ?>
                                                    </center>
                                            </td>
                                            @if(round($average_2sem) >= 75 && round($average_2sem) <= 89)
                                                <td>
                                                    <center>Passed</center>
                                                </td>
                                            @elseif(round($average_2sem) >= 90 && round($average_2sem) <= 94)
                                                <td>
                                                    <center>with honors</center>
                                                </td>
                                            @elseif(round($average_2sem)>= 95 && round($average_2sem) <= 97)
                                                <td>
                                                    <center>with high honors</center>
                                                </td>
                                            @elseif(round($average_2sem) >= 98 && round($average_2sem) <= 100)
                                                <td>
                                                    <center>with highest honors</center>
                                                </td>
                                            @elseif(round($average_2sem) < 75)
                                                <td>
                                                    <center>Failed</center>
                                                </td>
                                            @endif
                                            </tr>
                                            @endforeach
                                    @elseif($NumberOfSubject->class_subject_order == 8)
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
                                                $formattedNum = round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7 + $sub->subject_8)/8);
                                                echo $formattedNum;
                                                ?>                                                
                                            </td>
                                            <td style="text-align: center">
                                                <?php
                                                    $sec_g = \App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first();
                                                    $result = round($average = ($sec_g->subject_1 + $sec_g->subject_2 + $sec_g->subject_3 + $sec_g->subject_4 + $sec_g->subject_5 + $sec_g->subject_6 + $sec_g->subject_7 + $sec_g->subject_8)/8);
                                                    echo $result;
                                                ?>    
                                            </td>
                                            <?php                                                    
                                                    $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                                    $subject_1 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                            
                                                    $fg_1 = round(($subject_1 + $subject1) / 2);
                                                                                                
                                                    $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                                    $subject_2 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                            
                                                    $fg_2 = round(($subject_2 + $subject2) / 2);
                                                                                                
                                                    $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                                    $subject_3 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
        
                                                    $fg_3 = round(($subject_3 + $subject3) / 2);
                                                                                                    
                                                    $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                    $subject_4 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                    
                                                    $fg_4 = round(($subject_4 + $subject4) / 2);
                                                                                                    
                                                    $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                    $subject_5 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                
                                                    $fg_5 = round(($subject_5 + $subject5) / 2);
                                                                                                    
                                                    $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                    $subject_6 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                    
                                                    $fg_6 = round(($subject_6 + $subject6) / 2);
                                                                                                    
                                                    $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                    $subject_7 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                    
                                                    $fg_7 = round(($subject_7 + $subject7) / 2);
                                                                                                    
                                                    $subject8 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                    $subject_8 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                    
                                                    $fg_8 = round(($subject_8 + $subject8) / 2);
                                                                                                    
                                                    
                                            ?>
                                   
                                            <td>
                                                    <center>                                                
                                                            <?php
                                                                $average_2sem = round($average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 + $fg_8 )/8, 2);
                                                                echo round($average_2sem);
                                                            ?>
                                                    </center>
                                            </td>
                                            @if(round($average_2sem) >= 75 && round($average_2sem) <= 89)
                                                <td>
                                                    <center>Passed</center>
                                                </td>
                                            @elseif(round($average_2sem) >= 90 && round($average_2sem) <= 94)
                                                <td>
                                                    <center>with honors</center>
                                                </td>
                                            @elseif(round($average_2sem)>= 95 && round($average_2sem) <= 97)
                                                <td>
                                                    <center>with high honors</center>
                                                </td>
                                            @elseif(round($average_2sem) >= 98 && round($average_2sem) <= 100)
                                                <td>
                                                    <center>with highest honors</center>
                                                </td>
                                            @elseif(round($average_2sem) < 75)
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
                                                    $formattedNum = round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7 + $sub->subject_8)/8);
                                                    echo $formattedNum;
                                                    ?>                                                
                                                </td>
                                                <td style="text-align: center">
                                                    <?php
                                                        $sec_g = \App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first();
                                                        $result = round($average = ($sec_g->subject_1 + $sec_g->subject_2 + $sec_g->subject_3 + $sec_g->subject_4 + $sec_g->subject_5 + $sec_g->subject_6 + $sec_g->subject_7 + $sec_g->subject_8)/8);
                                                    echo $result;
                                                    ?>    
                                                </td>
                                                <?php                                                    
                                                    $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                                    $subject_1 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                            
                                                    $fg_1 = round(($subject_1 + $subject1) / 2);
                                                                                                
                                                    $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                                    $subject_2 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                            
                                                    $fg_2 = round(($subject_2 + $subject2) / 2);
                                                                                                
                                                    $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                                    $subject_3 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
        
                                                    $fg_3 = round(($subject_3 + $subject3) / 2);
                                                                                                    
                                                    $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                    $subject_4 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                    
                                                    $fg_4 = round(($subject_4 + $subject4) / 2);
                                                                                                    
                                                    $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                    $subject_5 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                
                                                    $fg_5 = round(($subject_5 + $subject5) / 2);
                                                                                                    
                                                    $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                    $subject_6 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                    
                                                    $fg_6 = round(($subject_6 + $subject6) / 2);
                                                                                                    
                                                    $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                    $subject_7 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                    
                                                    $fg_7 = round(($subject_7 + $subject7) / 2);
                                                                                                    
                                                    $subject8 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                    $subject_8 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                    
                                                    $fg_8 = round(($subject_8 + $subject8) / 2);
                                                                                                    
                                                    
                                            ?>
                                   
                                            <td>
                                                    <center>                                                
                                                            <?php
                                                                $average_2sem = round($average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 + $fg_8)/8, 2);
                                                                echo round($average_2sem);
                                                            ?>
                                                    </center>
                                            </td>
                                            @if(round($average_2sem) >= 75 && round($average_2sem) <= 89)
                                                <td>
                                                    <center>Passed</center>
                                                </td>
                                            @elseif(round($average_2sem) >= 90 && round($average_2sem) <= 94)
                                                <td>
                                                    <center>with honors</center>
                                                </td>
                                            @elseif(round($average_2sem)>= 95 && round($average_2sem) <= 97)
                                                <td>
                                                    <center>with high honors</center>
                                                </td>
                                            @elseif(round($average_2sem) >= 98 && round($average_2sem) <= 100)
                                                <td>
                                                    <center>with highest honors</center>
                                                </td>
                                            @elseif(round($average_2sem) < 75)
                                                <td>
                                                    <center>Failed</center>
                                                </td>
                                            @endif
                                            </tr>
                                            @endforeach
                                    @else
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
                                                $formattedNum = round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7+ $sub->subject_8+ $sub->subject_9)/9);
                                                echo $formattedNum;
                                                ?>                                                
                                            </td>
                                            <td style="text-align: center">
                                                <?php
                                                    $sec_g = \App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first();
                                                    $result = round($average = ($sec_g->subject_1 + $sec_g->subject_2 + $sec_g->subject_3 + $sec_g->subject_4 + $sec_g->subject_5 + $sec_g->subject_6 + $sec_g->subject_7 + $sec_g->subject_8 + $sec_g->subject_9)/9);
                                                    echo $result;
                                                ?>    
                                            </td>
                                            <?php                                                    
                                                    $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                                    $subject_1 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                            
                                                    $fg_1 = round(($subject_1 + $subject1) / 2);
                                                                                                
                                                    $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                                    $subject_2 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                            
                                                    $fg_2 = round(($subject_2 + $subject2) / 2);
                                                                                                
                                                    $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                                    $subject_3 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
        
                                                    $fg_3 = round(($subject_3 + $subject3) / 2);
                                                                                                    
                                                    $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                    $subject_4 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                    
                                                    $fg_4 = round(($subject_4 + $subject4) / 2);
                                                                                                    
                                                    $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                    $subject_5 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                
                                                    $fg_5 = round(($subject_5 + $subject5) / 2);
                                                                                                    
                                                    $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                    $subject_6 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                    
                                                    $fg_6 = round(($subject_6 + $subject6) / 2);
                                                                                                    
                                                    $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                    $subject_7 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                    
                                                    $fg_7 = round(($subject_7 + $subject7) / 2);
                                                                                                    
                                                    $subject8 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                    $subject_8 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                    
                                                    $fg_8 = round(($subject_8 + $subject8) / 2);
                                                                                                    
                                                    $subject9 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_9);
                                                    $subject_9 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_9);
                                                    
                                                    $fg_9 = round(($subject_9 + $subject9) / 2);
                                            ?>
                                   
                                            <td>
                                                    <center>                                                
                                                            <?php
                                                                $average_2sem = round($average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 + $fg_8 + $fg_9)/9, 2);
                                                                echo round($average_2sem);
                                                            ?>
                                                    </center>
                                            </td>
                                            @if(round($average_2sem) >= 75 && round($average_2sem) <= 89)
                                                <td>
                                                    <center>Passed</center>
                                                </td>
                                            @elseif(round($average_2sem) >= 90 && round($average_2sem) <= 94)
                                                <td>
                                                    <center>with honors</center>
                                                </td>
                                            @elseif(round($average_2sem)>= 95 && round($average_2sem) <= 97)
                                                <td>
                                                    <center>with high honors</center>
                                                </td>
                                            @elseif(round($average_2sem) >= 98 && round($average_2sem) <= 100)
                                                <td>
                                                    <center>with highest honors</center>
                                                </td>
                                            @elseif(round($average_2sem) < 75)
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
                                                    $formattedNum = round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7 + $sub->subject_8 + $sub->subject_9)/9);
                                                    echo $formattedNum;
                                                    ?>                                                
                                                </td>
                                                <td style="text-align: center">
                                                    <?php
                                                        $sec_g = \App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first();
                                                        $result = round($average = ($sec_g->subject_1 + $sec_g->subject_2 + $sec_g->subject_3 + $sec_g->subject_4 + $sec_g->subject_5 + $sec_g->subject_6 + $sec_g->subject_7 + $sec_g->subject_8 + $sec_g->subject_9)/9);
                                                        echo $result;
                                                    ?>    
                                                    </td>
                                                    <?php                                                    
                                                        $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                                        $subject_1 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                                
                                                        $fg_1 = round(($subject_1 + $subject1) / 2);
                                                                                                    
                                                        $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                                        $subject_2 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                                
                                                        $fg_2 = round(($subject_2 + $subject2) / 2);
                                                                                                    
                                                        $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                                        $subject_3 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
            
                                                        $fg_3 = round(($subject_3 + $subject3) / 2);
                                                                                                        
                                                        $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                        $subject_4 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                        
                                                        $fg_4 = round(($subject_4 + $subject4) / 2);
                                                                                                        
                                                        $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                        $subject_5 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                    
                                                        $fg_5 = round(($subject_5 + $subject5) / 2);
                                                                                                        
                                                        $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                        $subject_6 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                        
                                                        $fg_6 = round(($subject_6 + $subject6) / 2);
                                                                                                        
                                                        $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                        $subject_7 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                        
                                                        $fg_7 = round(($subject_7 + $subject7) / 2);
                                                                                                        
                                                        $subject8 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                        $subject_8 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                        
                                                        $fg_8 = round(($subject_8 + $subject8) / 2);
                                                                                                        
                                                        $subject9 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_9);
                                                        $subject_9 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_9);
                                                        
                                                        $fg_9 = round(($subject_9 + $subject9) / 2);
                                                   ?>
                                           
                                               <td>
                                                       <center>                                                
                                                               <?php
                                                                   $average_2sem = round($average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 + $fg_8 + $fg_9)/9, 2);
                                                                   echo round($average_2sem);
                                                               ?>
                                                       </center>
                                               </td>
                                                @if(round($average_2sem) >= 75 && round($average_2sem) <= 89)
                                                    <td>
                                                        <center>Passed</center>
                                                    </td>
                                                @elseif(round($average_2sem) >= 90 && round($average_2sem) <= 94)
                                                    <td>
                                                        <center>with honors</center>
                                                    </td>
                                                @elseif(round($average_2sem)>= 95 && round($average_2sem) <= 97)
                                                    <td>
                                                        <center>with high honors</center>
                                                    </td>
                                                @elseif(round($average_2sem) >= 98 && round($average_2sem) <= 100)
                                                    <td>
                                                        <center>with highest honors</center>
                                                    </td>
                                                @elseif(round($average_2sem) < 75)
                                                    <td>
                                                        <center>Failed</center>
                                                    </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                    @endif
                            @else
                                <tr>
                                    <td colspan="7">
                                        <b>Male</b>
                                    </td>
                                </tr>
                                @foreach($GradeSheetMale as $key => $sub)
                                <tr>
                                    <td>{{ $key + 1 }}.</td>
                                    <td>{{ $sub->student_name }}</td>
                                    
                                    
                                    
                                    
                                        <?php                                                    
                                            $subject1 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                        
                                            $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                                                                            
                                            $subject2 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                        
                                            $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                                                                            
                                            $subject3 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                            
                                            $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                                                                                
                                            $subject4 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                            
                                            $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                                                                                
                                            $subject5 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                            
                                            $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                                                                                
                                            $subject6 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                            
                                            $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                                                                            
                                            $subject7 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                            
                                            $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                                                                                
                                            $subject8 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                            
                                            $fg8 = round(($sub->subject_8 + $subject8) / 2);
                                                                                            
                                            $subject9 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_9);
                                        
                                            $fg9 = round(($sub->subject_9 + $subject9) / 2);
                                            ?>
                                    
                                        <td>
                                                <center>                                                
                                                        <?php
                                                            $average_1sem = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8 + $fg9)/9, 2);
                                                            echo round($average_1sem);
                                                        ?>
                                                </center>
                                        </td>
                                    
                                        @if($NumberOfSubject->class_subject_order == 7)
                                    
                                            <?php                                                    
                                                $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                                $subject_1 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                        
                                                $fg_1 = round(($subject1 + $subject_1) / 2);
                                                                                            
                                                $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                                $subject_2 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                        
                                                $fg_2 = round(($subject_2 + $subject2) / 2);
                                                                                            
                                                $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                                $subject_3 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);

                                                $fg_3 = round(($subject_3 + $subject3) / 2);
                                                                                                
                                                $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                $subject_4 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                
                                                $fg_4 = round(($subject_4 + $subject4) / 2);
                                                                                                
                                                $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                $subject_5 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                            
                                                $fg_5 = round(($subject_5 + $subject5) / 2);
                                                                                                
                                                $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                $subject_6 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                
                                                $fg_6 = round(($subject_6 + $subject6) / 2);
                                                                                                
                                                $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                $subject_7 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                
                                                $fg_7 = round(($subject_7 + $subject7) / 2);                                                                                               
                                                
                                            ?>
                                        
                                            <td>
                                                    <center>                                                
                                                            <?php
                                                                $average_2sem = number_format($average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 )/7, 2);
                                                                echo round($average_2sem);
                                                            ?>
                                                    </center>
                                            </td>

                                        @elseif($NumberOfSubject->class_subject_order == 8)

                                            <?php                                                    
                                                $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                                $subject_1 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                        
                                                $fg_1 = round(($subject1 + $subject_1) / 2);
                                                                                            
                                                $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                                $subject_2 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                        
                                                $fg_2 = round(($subject_2 + $subject2) / 2);
                                                                                            
                                                $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                                $subject_3 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);

                                                $fg_3 = round(($subject_3 + $subject3) / 2);
                                                                                                
                                                $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                $subject_4 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                
                                                $fg_4 = round(($subject_4 + $subject4) / 2);
                                                                                                
                                                $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                $subject_5 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                            
                                                $fg_5 = round(($subject_5 + $subject5) / 2);
                                                                                                
                                                $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                $subject_6 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                
                                                $fg_6 = round(($subject_6 + $subject6) / 2);
                                                                                                
                                                $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                $subject_7 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                
                                                $fg_7 = round(($subject_7 + $subject7) / 2);
                                                                                                
                                                $subject8 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                $subject_8 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                
                                                $fg_8 = round(($subject_8 + $subject8) / 2);
                                            ?>
                            
                                            <td>
                                                    <center>                                                
                                                            <?php
                                                                $average_2sem = number_format($average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 + $fg_8 )/8, 2);
                                                                echo round($average_2sem);
                                                            ?>
                                                    </center>
                                            </td>


                                        @elseif($NumberOfSubject->class_subject_order == 9)
                                            <?php                                                    
                                                $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                                $subject_1 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                            
                                                $fg_1 = round(($subject_1 + $subject1) / 2);
                                                                                                
                                                $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                                $subject_2 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                            
                                                $fg_2 = round(($subject_2 + $subject2) / 2);
                                                                                                
                                                $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                                $subject_3 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);

                                                $fg_3 = round(($subject_3 + $subject3) / 2);
                                                                                                    
                                                $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                $subject_4 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                
                                                $fg_4 = round(($subject_4 + $subject4) / 2);
                                                                                                    
                                                $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                $subject_5 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                
                                                $fg_5 = round(($subject_5 + $subject5) / 2);
                                                                                                    
                                                $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                $subject_6 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                
                                                $fg_6 = round(($subject_6 + $subject6) / 2);
                                                                                                
                                                $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                $subject_7 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                
                                                $fg_7 = round(($subject_7 + $subject7) / 2);
                                                                                                    
                                                $subject8 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                $subject_8 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                
                                                $fg_8 = round(($subject_8 + $subject8) / 2);
                                                                                                
                                                $subject9 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_9);
                                                $subject_9 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_9);
                                                
                                                $fg_9 = round(($subject_9 + $subject9) / 2);
                                            ?>
                                
                                            <td style="text-align: center">
                                                <?php
                                                $average_2sem = $average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 + $fg_8 + $fg_9)/9;
                                                echo round($average_2sem);
                                                ?>
                                            </td>

                                        @endif
                                    
                                        <td style="text-align: center">
                                            <?php 
                                                // echo round($result_final = ($formattedNum + $result + $thi_result + $fou_result) / 4);
                                                echo round($result_final = (round($average_1sem) + round($average_2sem) ) /2) ;
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
                                        
                                    <?php                                                    
                                            $subject1 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                        
                                            $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                                                                            
                                            $subject2 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                        
                                            $fg2 = round(($sub->subject_2 + $subject2) / 2);
                                                                                            
                                            $subject3 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                            
                                            $fg3 = round(($sub->subject_3 + $subject3) / 2);
                                                                                                
                                            $subject4 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                            
                                            $fg4 = round(($sub->subject_4 + $subject4) / 2);
                                                                                                
                                            $subject5 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                            
                                            $fg5 = round(($sub->subject_5 + $subject5) / 2);
                                                                                                
                                            $subject6 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                            
                                            $fg6 = round(($sub->subject_6 + $subject6) / 2);
                                                                                            
                                            $subject7 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                            
                                            $fg7 = round(($sub->subject_7 + $subject7) / 2);
                                                                                                
                                            $subject8 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                            
                                            $fg8 = round(($sub->subject_8 + $subject8) / 2);
                                                                                            
                                            $subject9 = round(\App\Grade_sheet_firstsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_9);
                                        
                                            $fg9 = round(($sub->subject_9 + $subject9) / 2);
                                            ?>
                                    
                                            <td>
                                                    <center>                                                
                                                            <?php
                                                                $average_1sem = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8 + $fg9)/9, 2);
                                                                echo round($average_1sem);
                                                            ?>
                                                    </center>
                                            </td>
                                    
                                            @if($NumberOfSubject->class_subject_order == 7)
                                    
                                            <?php                                                    
                                                $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                                $subject_1 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                        
                                                $fg_1 = round(($subject1 + $subject_1) / 2);
                                                                                            
                                                $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                                $subject_2 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                        
                                                $fg_2 = round(($subject_2 + $subject2) / 2);
                                                                                            
                                                $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                                $subject_3 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);

                                                $fg_3 = round(($subject_3 + $subject3) / 2);
                                                                                                
                                                $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                $subject_4 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                
                                                $fg_4 = round(($subject_4 + $subject4) / 2);
                                                                                                
                                                $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                $subject_5 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                            
                                                $fg_5 = round(($subject_5 + $subject5) / 2);
                                                                                                
                                                $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                $subject_6 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                
                                                $fg_6 = round(($subject_6 + $subject6) / 2);
                                                                                                
                                                $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                $subject_7 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                
                                                $fg_7 = round(($subject_7 + $subject7) / 2);                                                                                               
                                                
                                            ?>
                                        
                                            <td>
                                                    <center>                                                
                                                            <?php
                                                                $average_2sem = number_format($average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 )/7, 2);
                                                                echo round($average_2sem);
                                                            ?>
                                                    </center>
                                            </td>

                                        @elseif($NumberOfSubject->class_subject_order == 8)

                                            <?php                                                    
                                                $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                                $subject_1 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                        
                                                $fg_1 = round(($subject1 + $subject_1) / 2);
                                                                                            
                                                $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                                $subject_2 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                        
                                                $fg_2 = round(($subject_2 + $subject2) / 2);
                                                                                            
                                                $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                                $subject_3 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);

                                                $fg_3 = round(($subject_3 + $subject3) / 2);
                                                                                                
                                                $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                $subject_4 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                
                                                $fg_4 = round(($subject_4 + $subject4) / 2);
                                                                                                
                                                $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                $subject_5 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                            
                                                $fg_5 = round(($subject_5 + $subject5) / 2);
                                                                                                
                                                $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                $subject_6 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                
                                                $fg_6 = round(($subject_6 + $subject6) / 2);
                                                                                                
                                                $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                $subject_7 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                
                                                $fg_7 = round(($subject_7 + $subject7) / 2);
                                                                                                
                                                $subject8 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                $subject_8 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                
                                                $fg_8 = round(($subject_8 + $subject8) / 2);
                                            ?>
                            
                                            <td>
                                                    <center>                                                
                                                            <?php
                                                                $average_2sem = number_format($average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 + $fg_8 )/8, 2);
                                                                echo round($average_2sem);
                                                            ?>
                                                    </center>
                                            </td>


                                        @elseif($NumberOfSubject->class_subject_order == 9)
                                            <?php                                                    
                                                $subject1 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                                $subject_1 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_1);
                                            
                                                $fg_1 = round(($subject_1 + $subject1) / 2);
                                                                                                
                                                $subject2 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                                $subject_2 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_2);
                                            
                                                $fg_2 = round(($subject_2 + $subject2) / 2);
                                                                                                
                                                $subject3 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);
                                                $subject_3 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_3);

                                                $fg_3 = round(($subject_3 + $subject3) / 2);
                                                                                                    
                                                $subject4 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                $subject_4 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_4);
                                                
                                                $fg_4 = round(($subject_4 + $subject4) / 2);
                                                                                                    
                                                $subject5 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                $subject_5 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_5);
                                                
                                                $fg_5 = round(($subject_5 + $subject5) / 2);
                                                                                                    
                                                $subject6 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                $subject_6 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_6);
                                                
                                                $fg_6 = round(($subject_6 + $subject6) / 2);
                                                                                                
                                                $subject7 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                $subject_7 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_7);
                                                
                                                $fg_7 = round(($subject_7 + $subject7) / 2);
                                                                                                    
                                                $subject8 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                $subject_8 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_8);
                                                
                                                $fg_8 = round(($subject_8 + $subject8) / 2);
                                                                                                
                                                $subject9 = round(\App\Grade11_Second_Sem::where('enrollment_id', $sub->enrollment_id)->first()->subject_9);
                                                $subject_9 = round(\App\Grade_sheet_secondsemsecond::where('enrollment_id', $sub->enrollment_id)->first()->subject_9);
                                                
                                                $fg_9 = round(($subject_9 + $subject9) / 2);
                                            ?>
                                
                                            <td style="text-align: center">
                                                <?php
                                                $average_2sem = $average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 + $fg_8 + $fg_9)/9;
                                                echo round($average_2sem);
                                                ?>
                                            </td>

                                        @endif

                                        
                                            <td style="text-align: center">
                                                <?php 
                                                    // echo round($result_final = ($formattedNum + $result + $thi_result + $fou_result) / 4);
                                                    echo round($result_final = (round($average_1sem) + round($average_2sem) ) /2) ;
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
        
        @else
        {{-- Junior Highschool --}}
            <h4>Quarter: <span class="text-red"><span class="text-red"><i>{{ $quarter }}</i></span></h4>
                        
            <h4>Grade &amp; Section: <span class="text-red"><i>{{ $ClassSubjectDetail->grade_level . ' ' .$ClassSubjectDetail->section }}</i></span></h4>
            <h4>Room: <span class="text-red"><i>{{ $ClassSubjectDetail->room_code . ' ' .$ClassSubjectDetail->room_description }}</i></span></h4>
            <button class="btn btn-flat btn-danger pull-right" id="js-btn_print" data-id="{{ $ClassSubjectDetail->id }}"><i class="fa fa-file-pdf"></i> Print</button>
                    
            <table class="table no-margin table-striped table-bordered">
                <thead>
                    <tr>
                            <th style="width: 30px">#</th>
                            <th style="width: 200px">Student Name</th>                                       
                            {{--  @foreach ($AdvisorySubject as $sub)
                            <th><center>{{$sub->subject}} {{$sub->id}}</center></th>                                                                        
                            @endforeach  --}}
                            @if($quarter == 'First - Second')
                                <th style="width: 80px; text-align: center">First Grading</th>
                                <th style="width: 80px; text-align: center">Second Grading</th>
                            @elseif($quarter =='First - Third')
                                <th style="width: 80px; text-align: center">First Grading</th>
                                <th style="width: 80px; text-align: center">Second Grading</th>
                                <th style="width: 80px; text-align: center">Third Grading</th>
                            @elseif($quarter =='First - Fourth')
                                <th style="width: 80px; text-align: center">First Grading</th>
                                <th style="width: 80px; text-align: center">Second Grading</th>
                                <th style="width: 80px; text-align: center">Third Grading</th>
                                <th style="width: 80px; text-align: center">Fourth Grading</th>
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
                                $formattedNum = round($average = ($sub->filipino + $sub->english + $sub->math + $sub->science + $sub->ap + $sub->ict + $sub->mapeh + $sub->esp + $sub->religion)/9);
                                echo round($formattedNum);
                                ?>                                                
                            </td>
                            <td style="text-align: center">
                                <?php
                                    $sec_g = \App\Grade_sheet_second::where('enrollment_id', $sub->enrollment_id)->first();
                                    $sec_result = round($average = ($sec_g->filipino + $sec_g->english + $sec_g->math + $sec_g->science + $sec_g->ap + $sec_g->ict + $sec_g->mapeh + $sec_g->esp +$sec_g->religion)/9);
                                    echo round($sec_result);
                                ?>    
                            </td>
                            <td style="text-align: center">
                                <?php
                                    $thi_g = \App\Grade_sheet_third::where('enrollment_id', $sub->enrollment_id)->first();
                                    $thi_result = round($average = ($thi_g->filipino + $thi_g->english + $thi_g->math + $thi_g->science + $thi_g->ap + $thi_g->ict + $thi_g->mapeh + $thi_g->esp +$thi_g->religion)/9);
                                    echo round($thi_result);
                                ?>    
                            </td>
                            <td style="text-align: center">
                                    <?php
                                        $fou_g = \App\Grade_sheet_fourth::where('enrollment_id', $sub->enrollment_id)->first();
                                        $fou_result = number_format(round($average = ($fou_g->filipino + $fou_g->english + $fou_g->math + $fou_g->science + $fou_g->ap + $fou_g->ict + $fou_g->mapeh + $fou_g->esp +$fou_g->religion)/9), 0);
                                        echo round($fou_result);
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
            
        @endif
                 
@else
               
            @if($ClassSubjectDetail->grade_level == 11 || $ClassSubjectDetail->grade_level == 12)
                        
                    <h4>Semester: <span class="text-red"><i>{{ $sem }}</i></span> Quarter: <span class="text-red"><i>{{ $quarter }}</i></span></h4>
                     
                    <h4>Grade &amp; Section: <span class="text-red"><i>{{ $ClassSubjectDetail->grade_level . ' ' .$ClassSubjectDetail->section }}</i></span></h4>
                    <h4>Room: <span class="text-red"><i>{{ $ClassSubjectDetail->room_code . ' ' .$ClassSubjectDetail->room_description }}</i></span></h4>

                    <button class="btn btn-flat btn-danger pull-right" id="js-btn_print" data-id="{{ $ClassSubjectDetail->id }}"><i class="fa fa-file-pdf"></i> Print</button>
                    <table class="table no-margin table-striped table-bordered">
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
                                                            $fg1 = round(($sub->subject_1 + $subject1) / 2);
                                                            
                                                            if(!$fg1 == 0)
                                                            {
                                                                echo $fg1;
                                                            }
                                                            else 
                                                            {
                                                                echo '';
                                                            }
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
                                                {{-- <td><center>{{ $sub ? round($sub->subject_8) > 0 ? round($sub->subject_8) : '' : ''  }}</center></td>
                                                <td><center>{{ $sub ? round($sub->subject_9) > 0 ? round($sub->subject_9) : '' : ''  }}</center></td> --}}
                                                {{-- <td><center>{{  round($sub->subject_8) }}</center></td> --}}
                                                <td>
                                                    <center>                                                
                                                        <?php
                                                            $formattedNum = number_format(round($average = ($sub->subject_1 + $sub->subject_2 + $sub->subject_3 + $sub->subject_4 + $sub->subject_5 + $sub->subject_6 + $sub->subject_7)/7), 0);
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
                                                    $formattedNum = number_format(round($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8 + $fg9)/9), 0);
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
                                            
                                        @endif
                                        
                                    </tr>             
                                    @endforeach 
                                @endif
                                @endif
                    </table>
            
            @elseif($ClassSubjectDetail->grade_level == 7 || $ClassSubjectDetail->grade_level == 8 || $ClassSubjectDetail->grade_level == 9)
                   
                
                        <h4>Quarter: <span class="text-red"><i>{{ $quarter }}</i></span></h4>
                        <h4>Grade &amp; Section: <span class="text-red"><i>{{ $ClassSubjectDetail->grade_level . ' ' .$ClassSubjectDetail->section }}</i></span></h4>
                        <h4>Room: <span class="text-red"><i>{{ $ClassSubjectDetail->room_code . ' ' .$ClassSubjectDetail->room_description }}</i></span></h4>
            
                                    <button class="btn btn-flat btn-danger pull-right" id="js-btn_print" data-id="{{ $ClassSubjectDetail->id }}"><i class="fa fa-file-pdf"></i> Print</button>
                                    
                                    @if($quarter == 'Fourth')
                                            <table class="table no-margin table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 30px">#</th>
                                                        <th style="width: 200px">Student Name</th>                                       
                                                        {{--  @foreach ($AdvisorySubject as $sub)
                                                        <th><center>{{$sub->subject}} {{$sub->id}}</center></th>                                                                        
                                                        @endforeach  --}}
                                                        <th style="width: 80px; text-align: center" colspan="2">Filipino</th>
                                                        <th style="width: 80px; text-align: center" colspan="2">English</th>
                                                        <th style="width: 80px; text-align: center" colspan="2">Math</th>
                                                        <th style="width: 80px; text-align: center" colspan="2">Science</th>
                                                        <th style="width: 80px; text-align: center" colspan="2">Araling<br/> Panlipunan</th>
                                                        <th style="width: 80px; text-align: center" colspan="2">ESP</th>
                                                        <th style="width: 80px; text-align: center" colspan="2">TLE</th>
                                                        <th style="width: 80px; text-align: center" colspan="2">MAPEH</th>                                                        
                                                        <th style="width: 80px; text-align: center" colspan="2">Religion</th>

                                                        

                                                        <th style="width: 80px; text-align: center" colspan="2">GENERAL AVERAGE</th>
                                                        <th style="width: 80px; text-align: center">REMARKS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                                  
                                                    <tr>
                                                        <td> 
                                                            <b>Male</b>
                                                        </td>
                                                        <td></td>
                                                        <td style="color: red">4TH</td>
                                                        <td style="color: blue">FG</td>
                                                        <td style="color: red">4TH</td>
                                                        <td style="color: blue">FG</td>
                                                        <td style="color: red">4TH</td>
                                                        <td style="color: blue">FG</td>
                                                        <td style="color: red">4TH</td>
                                                        <td style="color: blue">FG</td>
                                                        <td style="color: red">4TH</td>
                                                        <td style="color: blue">FG</td>
                                                        <td style="color: red">4TH</td>
                                                        <td style="color: blue">FG</td>
                                                        <td style="color: red">4TH</td>
                                                        <td style="color: blue">FG</td>
                                                        <td style="color: red">4TH</td>
                                                        <td style="color: blue">FG</td>
                                                        <td style="color: red">4TH</td>
                                                        <td style="color: blue">FG</td>
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
                                        <table class="table no-margin table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 30px">#</th>
                                                        <th style="width: 200px">Student Name</th>                                       
                                                        {{--  @foreach ($AdvisorySubject as $sub)
                                                        <th><center>{{$sub->subject}} {{$sub->id}}</center></th>                                                                        
                                                        @endforeach  --}}
                                                        <th style="width: 80px; text-align: center">Filipino</th>
                                                        <th style="width: 80px; text-align: center">English</th>
                                                        <th style="width: 80px; text-align: center">Mathematics</th>
                                                        <th style="width: 80px; text-align: center">Science</th>
                                                        <th style="width: 80px; text-align: center">Araling<br/> Panlipunan</th>
                                                        <th style="width: 80px; text-align: center">ESP</th>
                                                        <th style="width: 80px; text-align: center">TLE</th>
                                                        <th style="width: 80px; text-align: center">MAPEH</th>                                        
                                                        <th style="width: 80px; text-align: center">Religion</th>
                                                        <th style="width: 80px; text-align: center">GENERAL AVERAGE</th>
                                                        <th style="width: 80px; text-align: center">REMARKS</th>
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
                                @endif
                   


            @else
                
                    <h4>Quarter: <span class="text-red"><i>{{ $quarter }}</i></span></h4>
                            <h4>Grade &amp; Section: <span class="text-red"><i>{{ $ClassSubjectDetail->grade_level . ' ' .$ClassSubjectDetail->section }}</i></span></h4>
                            <h4>Room: <span class="text-red"><i>{{ $ClassSubjectDetail->room_code . ' ' .$ClassSubjectDetail->room_description }}</i></span></h4>

                            <button class="btn btn-flat btn-danger pull-right" id="js-btn_print" data-id="{{ $ClassSubjectDetail->id }}"><i class="fa fa-file-pdf"></i> Print</button>
                            
                            @if($quarter == 'Fourth')
                                <table class="table no-margin table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 30px">#</th>
                                            <th style="width: 200px">Student Name</th>                                       
                                            {{--  @foreach ($AdvisorySubject as $sub)
                                            <th><center>{{$sub->subject}} {{$sub->id}}</center></th>                                                                        
                                            @endforeach  --}}
                                            <th style="width: 80px; text-align: center" colspan="2">Filipino</th>
                                            <th style="width: 80px; text-align: center" colspan="2">English</th>
                                            <th style="width: 80px; text-align: center" colspan="2">Math</th>
                                            <th style="width: 80px; text-align: center" colspan="2">Science</th>
                                            <th style="width: 80px; text-align: center" colspan="2">Araling<br/> Panlipunan</th>
                                            <th style="width: 80px; text-align: center" colspan="2">TLE</th>
                                            <th style="width: 80px; text-align: center" colspan="2">MAPEH</th>
                                            <th style="width: 80px; text-align: center" colspan="2">ESP</th>
                                            <th style="width: 80px; text-align: center" colspan="2">Religion</th>
                                            <th style="width: 80px; text-align: center" colspan="2">GENERAL AVERAGE</th>
                                            <th style="width: 80px; text-align: center">REMARKS</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                  
                                        <tr>
                                            <td> 
                                                <b>Male</b>
                                            </td>
                                            <td></td>
                                            <td style="color: red">4TH</td>
                                            <td style="color: blue">FG</td>
                                            <td style="color: red">4TH</td>
                                            <td style="color: blue">FG</td>
                                            <td style="color: red">4TH</td>
                                            <td style="color: blue">FG</td>
                                            <td style="color: red">4TH</td>
                                            <td style="color: blue">FG</td>
                                            <td style="color: red">4TH</td>
                                            <td style="color: blue">FG</td>
                                            <td style="color: red">4TH</td>
                                            <td style="color: blue">FG</td>
                                            <td style="color: red">4TH</td>
                                            <td style="color: blue">FG</td>
                                            <td style="color: red">4TH</td>
                                            <td style="color: blue">FG</td>
                                            <td style="color: red">4TH</td>
                                            <td style="color: blue">FG</td>
                                            <td style="color: red">4TH</td>
                                            <td style="color: blue">FG</td>
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
                            @else
                                    <table class="table no-margin table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 30px">#</th>
                                                <th style="width: 200px">Student Name</th>                                       
                                                {{--  @foreach ($AdvisorySubject as $sub)
                                                <th><center>{{$sub->subject}} {{$sub->id}}</center></th>                                                                        
                                                @endforeach  --}}
                                                <th style="width: 80px; text-align: center">Filipino</th>
                                                <th style="width: 80px; text-align: center">English</th>
                                                <th style="width: 80px; text-align: center">Math</th>
                                                <th style="width: 80px; text-align: center">Science</th>
                                                <th style="width: 80px; text-align: center">Araling<br/> Panlipunan</th>
                                                <th style="width: 80px; text-align: center">TLE</th>
                                                <th style="width: 80px; text-align: center">MAPEH</th>
                                                <th style="width: 80px; text-align: center">ESP</th>
                                                <th style="width: 80px; text-align: center">Religion</th>
                                                <th style="width: 80px; text-align: center">GENERAL AVERAGE</th>
                                                <th style="width: 80px; text-align: center">REMARKS</th>
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
                                                <td><center>{{ $sub ? round($sub->ict) > 0 ? round($sub->ict) : '' : ''}}</center></td>
                                                <td><center>{{ $sub ? round($sub->mapeh) > 0 ? round($sub->mapeh) : '' : ''}}</center></td>
                                                <td><center>{{ $sub ? round($sub->esp) > 0 ? round($sub->esp) : '' : ''}}</center></td>                                        
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
                                                <td><center>{{ $sub ? round($sub->ict) > 0 ? round($sub->ict) : '' : ''}}</center></td>
                                                <td><center>{{ $sub ? round($sub->mapeh) > 0 ? round($sub->mapeh) : '' : ''}}</center></td>
                                                <td><center>{{ $sub ? round($sub->esp) > 0 ? round($sub->esp) : '' : ''}}</center></td>                                        
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
                            @endif
                            
                
            @endif
 @endif