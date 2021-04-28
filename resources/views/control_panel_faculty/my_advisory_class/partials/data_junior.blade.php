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