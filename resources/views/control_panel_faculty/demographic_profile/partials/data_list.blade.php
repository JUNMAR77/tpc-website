
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
                                    @foreach ($AdvisorySubject as $key => $sub)                                     
                                        <th style="width: 30px; text-align: center">{{$sub->subject}} </th>                                                                  
                                    @endforeach 
                                    
                                    <th style="width: 80px">GENERAL AVERAGE</th>
                                    <th style="width: 80px">REMARKS</th>
                                </tr>
                            </thead>
                            <tbody>                                  
                                <tr>
                                    <td colspan="13">
                                        <b>Male</b> {{ $NumberOfSubject->class_subject_order }}
                                    </td>
                                </tr>
                                @foreach($GradeSheetMale as $key => $sub)
                                <tr>
                                        {{-- $ClassSubjectDetail->grade_level . ' ' .$ClassSubjectDetail->section
                                    @if($ClassSubjectDetail->grade_level == 12 && $ClassSubjectDetail->section == '') --}}
                                    @if($NumberOfSubject->class_subject_order == 7)
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{$sub->student_name}}</td>
                                        <td><center>{{ $sub->subject_1 }}</center></td>
                                        <td><center>{{ $sub->subject_2 }}</center></td>
                                        <td><center>{{$sub->subject_3}}</center></td>
                                        <td><center>{{$sub->subject_4}}</center></td>
                                        <td><center>{{$sub->subject_5}}</center></td>
                                        <td><center>{{$sub->subject_6}}</center></td>
                                        <td><center>{{$sub->subject_7}}</center></td>
                                        {{-- <td><center>{{$sub->subject_8}}</center></td>
                                        <td><center>{{$sub->subject_9}}</center></td> --}}
                                    @elseif($NumberOfSubject->class_subject_order == 8)
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{$sub->student_name}}</td>
                                        <td><center>{{ $sub->subject_1 }}</center></td>
                                        <td><center>{{ $sub->subject_2 }}</center></td>
                                        <td><center>{{$sub->subject_3}}</center></td>
                                        <td><center>{{$sub->subject_4}}</center></td>
                                        <td><center>{{$sub->subject_5}}</center></td>
                                        <td><center>{{$sub->subject_6}}</center></td>
                                        <td><center>{{$sub->subject_7}}</center></td>
                                        <td><center>{{$sub->subject_8}}</center></td>
                                        {{-- <td><center>{{$sub->subject_9}}</center></td> --}}
                                    @else
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{$sub->student_name}}</td>
                                        <td><center>{{ $sub->subject_1 }}</center></td>
                                        <td><center>{{ $sub->subject_2 }}</center></td>
                                        <td><center>{{$sub->subject_3}}</center></td>
                                        <td><center>{{$sub->subject_4}}</center></td>
                                        <td><center>{{$sub->subject_5}}</center></td>
                                        <td><center>{{$sub->subject_6}}</center></td>
                                        <td><center>{{$sub->subject_7}}</center></td>
                                        <td><center>{{$sub->subject_8}}</center></td>
                                        <td><center>{{$sub->subject_9}}</center></td>
                                    @endif
                                    
                                    
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
                                        <td><center>{{ $sub->subject_1 }}</center></td>
                                        <td><center>{{ $sub->subject_2 }}</center></td>
                                        <td><center>{{$sub->subject_3}}</center></td>
                                        <td><center>{{$sub->subject_4}}</center></td>
                                        <td><center>{{$sub->subject_5}}</center></td>
                                        <td><center>{{$sub->subject_6}}</center></td>
                                        <td><center>{{$sub->subject_7}}</center></td>
                                        {{-- <td><center>{{$sub->subject_8}}</center></td>
                                        <td><center>{{$sub->subject_9}}</center></td> --}}
                                    @elseif($NumberOfSubject->class_subject_order == 8)
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{$sub->student_name}}</td>
                                        <td><center>{{ $sub->subject_1 }}</center></td>
                                        <td><center>{{ $sub->subject_2 }}</center></td>
                                        <td><center>{{$sub->subject_3}}</center></td>
                                        <td><center>{{$sub->subject_4}}</center></td>
                                        <td><center>{{$sub->subject_5}}</center></td>
                                        <td><center>{{$sub->subject_6}}</center></td>
                                        <td><center>{{$sub->subject_7}}</center></td>
                                        <td><center>{{$sub->subject_8}}</center></td>
                                        {{-- <td><center>{{$sub->subject_9}}</center></td> --}}
                                    @else
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{$sub->student_name}}</td>
                                        <td><center>{{ $sub->subject_1 }}</center></td>
                                        <td><center>{{ $sub->subject_2 }}</center></td>
                                        <td><center>{{$sub->subject_3}}</center></td>
                                        <td><center>{{$sub->subject_4}}</center></td>
                                        <td><center>{{$sub->subject_5}}</center></td>
                                        <td><center>{{$sub->subject_6}}</center></td>
                                        <td><center>{{$sub->subject_7}}</center></td>
                                        <td><center>{{$sub->subject_8}}</center></td>
                                        <td><center>{{$sub->subject_9}}</center></td>
                                    @endif
                                    
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
                                            
                                    </tr>                                    
                                    @endforeach
                                
                    </table>
            @else

                <h4>Quarter: <span class="text-red"><i>{{ $quarter }}</i></span></h4>
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
                                        <th style="width: 80px; text-align: center">Filipino</th>
                                        <th style="width: 80px; text-align: center">English</th>
                                        <th style="width: 80px; text-align: center">Math</th>
                                        <th style="width: 80px; text-align: center">Science</th>
                                        <th style="width: 80px; text-align: center">Araling<br/> Panlipunan</th>
                                        <th style="width: 80px; text-align: center">ICT</th>
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
                                        <td><center>{{ $sub->filipino }}</center></td>
                                        <td><center>{{$sub->english}}</center></td>
                                        <td><center>{{$sub->math}}</center></td>
                                        <td><center>{{$sub->science}}</center></td>
                                        <td><center>{{$sub->ap}}</center></td>
                                        <td><center>{{$sub->ict}}</center></td>
                                        <td><center>{{$sub->mapeh}}</center></td>
                                        <td><center>{{$sub->esp}}</center></td>
                                        <td><center>{{$sub->religion}}</center></td>
                                        <td>
                                            <center>                                                
                                                <?php
                                                    $formattedNum = number_format(round($average = ($sub->filipino + $sub->english + $sub->math + $sub->science + $sub->ap + $sub->ict + $sub->mapeh + $sub->esp +$sub->religion)/9), 0);
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
                                        <td><center>{{ $sub->filipino }}</center></td>
                                        <td><center>{{$sub->english}}</center></td>
                                        <td><center>{{$sub->math}}</center></td>
                                        <td><center>{{$sub->science}}</center></td>
                                        <td><center>{{$sub->ap}}</center></td>
                                        <td><center>{{$sub->ict}}</center></td>
                                        <td><center>{{$sub->mapeh}}</center></td>
                                        <td><center>{{$sub->esp}}</center></td>
                                        <td><center>{{$sub->religion}}</center></td>
                                        <td>
                                            <center>
                                                <?php
                                                $formattedNum = number_format(round($average = ($sub->filipino + $sub->english + $sub->math + $sub->science + $sub->ap + $sub->ict + $sub->mapeh + $sub->esp +$sub->religion)/9), 0);
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
                                    </tr>
                                    @endforeach
                                    
                                    
                                </tbody>
                        </table>

                    @endif
