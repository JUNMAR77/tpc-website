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
                            $gen_average_1sem = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8 + $fg9), 2);
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
                                $gen_average_2sem = number_format($average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 ), 2);
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
                            $gen_average_2sem = number_format($average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 + $fg_8 ), 2);
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
                    $gen_average_2sem = $average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 + $fg_8 + $fg_9);
                    echo round($average_2sem);
                ?>
            </td>

        @endif
    
        <td style="text-align: center">
            <?php 
                // echo round($result_final = ($formattedNum + $result + $thi_result + $fou_result) / 4);
                echo round($result_final = (round($gen_average_1sem) + round($gen_average_2sem) ) / $TotalNumberSubject) ;
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
                                $gen_average_1sem = number_format($average = ($fg1 + $fg2 + $fg3 + $fg4 + $fg5 + $fg6 + $fg7 + $fg8 + $fg9), 2);
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
                                $gen_average_2sem = number_format($average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 ), 2);
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
                                $gen_average_2sem = number_format($average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 + $fg_8 ), 2);
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
                    $gen_average_2sem = $average = ($fg_1 + $fg_2 + $fg_3 + $fg_4 + $fg_5 + $fg_6 + $fg_7 + $fg_8 + $fg_9);
                echo round($average_2sem);
                ?>
            </td>

        @endif

        
            <td style="text-align: center">
                <?php 
                    // echo round($result_final = ($formattedNum + $result + $thi_result + $fou_result) / 4);
                    echo round($result_final = (round($gen_average_1sem) + round($gen_average_2sem) ) / $TotalNumberSubject) ;
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