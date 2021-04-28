


<h4 style="margin-top: 20px">
    <b>First Semester</b>
</h4>


<div class="table-responsive">
    <table class="table no-margin table-bordered">
        <thead>
            <tr>
                <th style="text-align: center">Subject</th>
                <th style="text-align: center">First Quarter</th>
                <th style="text-align: center">Second Quarter</th>
                <th style="text-align: center">Weighted Average</th>
                <th style="text-align: center">Remarks</th>                                
                <th style="text-align: center">Faculty</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($Enrollment_first_sem as $key => $data)
            <tr>
                <td>
                    <?php
                        $subject = \App\ClassSubjectDetail::where('id', $data->class_subject_details_id)                                        
                            ->orderBY('class_subject_order', 'ASC')->get();
                        echo \App\SubjectDetail::where('id', $subject[0]->subject_id)->first()->subject;                     
                    ?>
                </td>
                
                <td style="text-align: center">
                    <?php 
                        $StudentEnrolledSubject1 = \App\StudentEnrolledSubject::where('enrollments_id', $data->enrollment_id)
                        ->where('subject_id', $data->subject_id)
                        ->where('class_subject_details_id', $data->class_subject_details_id)
                        ->where('sem', 1)
                        ->first(); 
                        
                        if($StudentEnrolledSubject1)
                        {
                            echo $StudentEnrolledSubject1->fir_g ? $StudentEnrolledSubject1->fir_g > 0 ? round($StudentEnrolledSubject1->fir_g) : '' : '';
                        }
                    ?>               
                </td>
                <td style="text-align: center">
                    <?php 
                        $StudentEnrolledSubject1 = \App\StudentEnrolledSubject::where('enrollments_id', $data->enrollment_id)
                        ->where('subject_id', $data->subject_id)
                        ->where('sem', 1)
                        ->first(); 

                        if($StudentEnrolledSubject1)
                        {
                            echo $StudentEnrolledSubject1->sec_g ? $StudentEnrolledSubject1->sec_g > 0 ? round($StudentEnrolledSubject1->sec_g) : '' : '';
                        }
                    ?>                
                </td>
                <td style="text-align: center">
                    <?php 
                        $StudentEnrolledSubject1 = \App\StudentEnrolledSubject::where('enrollments_id', $data->enrollment_id)
                        ->where('subject_id', $data->subject_id)
                        ->where('sem', 1)
                        ->first(); 

                        if($StudentEnrolledSubject1)
                        {
                            if(round($StudentEnrolledSubject1->fir_g) != 0 && round($StudentEnrolledSubject1->sec_g) != 0)
                            {
                                echo round($final_ave = (round($StudentEnrolledSubject1->fir_g) + round($StudentEnrolledSubject1->sec_g)) / 2);
                            }
                            else 
                            {
                                echo "";
                            }    
                        }                                    
                    ?>
                </td>
                @if($StudentEnrolledSubject1)                                
                    @if(round($StudentEnrolledSubject1->fir_g) != 0 && round($StudentEnrolledSubject1->sec_g) != 0) 
                    <td style="color:{{ round($final_ave) >= 75 ? 'green' : 'red' }};">
                        <center>
                            <strong>
                                {{ round($final_ave) >= 75 ? 'Passed' : 'Failed' }}
                            </strong>
                        </center>
                    </td> 
                    @else
                        <td></td>
                    @endif
                @else    
                    <td></td>   
                @endif   
                <td>
                    <?php                                                   
                        $faculty = \App\ClassSubjectDetail::where('id', $data->class_subject_details_id)->first();
                        $faculty_name = \App\FacultyInformation::where('id', $faculty->faculty_id)->first();
                        echo $faculty_name->last_name.', '.$faculty_name->first_name.' '.$faculty_name->middle_name;                                             
                    ?>                
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
    @include('control_panel_student.grade_sheet.partials.grade_panel.senior.first_sem.attendance')
</div>