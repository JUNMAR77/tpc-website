
    <table class="table no-margin table-striped table-bordered" style="font-size: 13px">
        <thead>
            <tr>
                @if($quarter == 'First - Second')
                    <tr>
                        <th  rowspan="2" style="padding-left: 2px !important; padding-right: 2px !important; text-align: center"">#</th>
                        <th rowspan="2">
                            <center>
                                Student<br/> Name
                            </center>
                        </th>     
                        <td colspan="{{$Totalsubject_1st_sem}}">
                            <center>
                                <b>First Sem</b>
                            </center>
                        </td>
                        <td colspan="{{$Totalsubject_2nd_sem}}">
                            <center>
                                <b>Second Sem</b>
                            </center>
                        </td>
                        {{-- <td colspan="2"></td> --}}
                        <th rowspan="2" style=" text-align: center">
                            <center>GENERAL<br/> AVERAGE</center>
                        </th>
                        <th rowspan="2" style=" text-align: center">REMARKS</th>
                    </tr>
                    
                    @foreach ($Subject_1stsem as $key => $sub)                                     
                        <th style="padding-left: 2px !important; padding-right: 2px !important; text-align: center">{{ $sub->subject_code }} </th>                                                                  
                    @endforeach
                    
                    @foreach ($Subject_2ndsem as $key => $sub)                                     
                        <th style="padding-left: 2px !important; padding-right: 2px !important; text-align: center">{{ $sub->subject_code }} </th>                                                                  
                    @endforeach
                @else                    
                    <th style="width: 80px; text-align: center">First Semester</th>
                    <th style="width: 80px; text-align: center">Second Semester</th>
                @endif                
                </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="{{$Totalsubject_1st_sem + $Totalsubject_2nd_sem + 4}}">
                    <b>Male</b>
                </td>
            </tr>

            @foreach($GradeSheetMale as $key => $sub)
                            <?php
                                
                                $SchoolYear = \App\SchoolYear::where('current', 1)->where('status', 1)->first();
                                
                                $Enrollment1 = \App\Enrollment::join('class_details', 'class_details.id', '=', 'enrollments.class_details_id')
                                    ->join('class_subject_details', 'class_subject_details.class_details_id', '=', 'class_details.id')
                                    ->join('rooms', 'rooms.id', '=', 'class_details.room_id')
                                    ->join('faculty_informations', 'faculty_informations.id', '=', 'class_subject_details.faculty_id')
                                    ->join('section_details', 'section_details.id', '=', 'class_details.section_id')
                                    ->join('subject_details', 'subject_details.id', '=', 'class_subject_details.subject_id')                                
                                    ->select(\DB::raw("
                                        enrollments.id as enrollment_id,
                                        enrollments.class_details_id as cid,
                                        enrollments.attendance_first,
                                        enrollments.attendance_second,
                                        enrollments.j_lacking_unit,
                                        enrollments.s1_lacking_unit,
                                        class_details.grade_level,
                                        class_subject_details.id as class_subject_details_id,
                                        class_subject_details.class_days,
                                        class_subject_details.class_time_from,
                                        class_subject_details.class_time_to,
                                        class_subject_details.status as grade_status,
                                        class_subject_details.class_subject_order,
                                        class_subject_details.class_details_id,
                                        CONCAT(faculty_informations.last_name, ', ', faculty_informations.first_name, ' ', faculty_informations.middle_name) as faculty_name,
                                        subject_details.id AS subject_id,
                                        subject_details.subject_code,
                                        subject_details.subject,
                                        rooms.room_code,
                                        section_details.section
                                        
                                    "))
                                    ->where('enrollments.student_information_id', $sub->student_informations_id)
                                    ->where('class_subject_details.status', '!=', 0)
                                    ->where('enrollments.status', 1)
                                    ->where('class_details.status', 1)
                                    ->where('class_subject_details.sem', 1)
                                    ->where('class_details.school_year_id', $SchoolYear->id)
                                    ->orderBy('class_subject_details.class_subject_order', 'ASC')
                                    ->get();

                                    $Enrollment2 = \App\Enrollment::join('class_details', 'class_details.id', '=', 'enrollments.class_details_id')
                                            ->join('class_subject_details', 'class_subject_details.class_details_id', '=', 'class_details.id')
                                            ->join('rooms', 'rooms.id', '=', 'class_details.room_id')
                                            ->join('faculty_informations', 'faculty_informations.id', '=', 'class_subject_details.faculty_id')
                                            ->join('section_details', 'section_details.id', '=', 'class_details.section_id')
                                            ->join('subject_details', 'subject_details.id', '=', 'class_subject_details.subject_id')                                
                                            ->select(\DB::raw("
                                                enrollments.id as enrollment_id,
                                                enrollments.class_details_id as cid,
                                                enrollments.attendance_first,
                                                enrollments.attendance_second,
                                                enrollments.j_lacking_unit,
                                                enrollments.s1_lacking_unit,
                                                class_details.grade_level,
                                                class_subject_details.id as class_subject_details_id,
                                                class_subject_details.class_days,
                                                class_subject_details.class_time_from,
                                                class_subject_details.class_time_to,
                                                class_subject_details.status as grade_status,
                                                class_subject_details.class_subject_order,
                                                class_subject_details.class_details_id,
                                                CONCAT(faculty_informations.last_name, ', ', faculty_informations.first_name, ' ', faculty_informations.middle_name) as faculty_name,
                                                subject_details.id AS subject_id,
                                                subject_details.subject_code,
                                                subject_details.subject,
                                                rooms.room_code,
                                                section_details.section
                                                
                                            "))
                                            ->where('enrollments.student_information_id', $sub->student_informations_id)
                                            ->where('class_subject_details.status', '!=', 0)
                                            ->where('enrollments.status', 1)
                                            ->where('class_details.status', 1)
                                            ->where('class_subject_details.sem', 2)
                                            ->where('class_details.school_year_id', $SchoolYear->id)
                                            ->orderBy('class_subject_details.class_subject_order', 'ASC')
                                            ->get();

                                            $total_sem1 = 0;
                                            $total_sem2 = 0;
 
                            ?>
                            <tr>
                                <td>{{ $key + 1 }}.</td>
                                <td>{{ $sub->student_name }}</td>
                                @foreach($Enrollment1 as $key => $data)
                                    <td>
                                        <center>
                                        <?php
                                            $first_sem = \App\StudentEnrolledSubject::where('enrollments_id', $data->enrollment_id)
                                                ->where('subject_id', $data->subject_id)
                                                ->where('sem', 1)
                                                ->first();

                                                if($first_sem)
                                                {
                                                    
                                                    echo round($final_ave = (round($first_sem->fir_g) + round($first_sem->sec_g)) / 2);
                                                    $total_sem1 += round($final_ave) ;   
                                                }      
                                        ?>  
                                        </center>
                                    </td>
                                @endforeach
                               
                                @foreach($Enrollment2 as $key => $data)
                                    <td>
                                        <center>
                                        <?php 
                                                $second_sem = \App\StudentEnrolledSubject::where('enrollments_id', $data->enrollment_id)
                                                    ->where('subject_id', $data->subject_id)
                                                    ->where('sem', 2)
                                                    ->first();

                                                    if($second_sem)
                                                    {
                                                        
                                                            echo round($final_ave = (round($second_sem->thi_g) + round($second_sem->fou_g)) / 2);
                                                            $total_sem2 += round($final_ave) ;   
                                                    }      
                                            ?>
                                        </center>
                                    </td>
                                @endforeach
                                <td>
                                    <center>
                                    <?php 
                                        $subject = $Totalsubject_1st_sem + $Totalsubject_2nd_sem;
                                        $total_ave = $total_sem1 + $total_sem2;
                                        $final_ave = ($total_ave / $subject);
                                        
                                        echo round($final_ave);                                        
                                    ?>
                                    </center>
                                </td>
                                
                                @if(round($final_ave) >= 75 && round($final_ave) <= 89)
                                    <td>
                                        <center>Passed</center>
                                    </td>
                                @elseif(round($final_ave) >= 90 && round($final_ave) <= 94)
                                    <td>
                                        <center>with honors</center>
                                    </td>
                                @elseif(round($final_ave)>= 95 && round($final_ave) <= 97)
                                    <td>
                                        <center>with high honors</center>
                                    </td>
                                @elseif(round($final_ave) >= 98 && round($final_ave) <= 100)
                                    <td>
                                        <center>with highest honors</center>
                                    </td>
                                @elseif(round($final_ave) < 75)
                                    <td>
                                        <center>Failed</center>
                                    </td>
                                @endif
                            </tr>
            @endforeach
                            
            <tr>
                <td colspan="{{$Totalsubject_1st_sem + $Totalsubject_2nd_sem + 4}}">
                    <b>Female</b>
                </td>
            </tr>
            @foreach($GradeSheetFeMale as $key => $sub)
                <?php
                                    
                                $SchoolYear = \App\SchoolYear::where('current', 1)->where('status', 1)->first();
                                
                                $Enrollment1 = \App\Enrollment::join('class_details', 'class_details.id', '=', 'enrollments.class_details_id')
                                    ->join('class_subject_details', 'class_subject_details.class_details_id', '=', 'class_details.id')
                                    ->join('rooms', 'rooms.id', '=', 'class_details.room_id')
                                    ->join('faculty_informations', 'faculty_informations.id', '=', 'class_subject_details.faculty_id')
                                    ->join('section_details', 'section_details.id', '=', 'class_details.section_id')
                                    ->join('subject_details', 'subject_details.id', '=', 'class_subject_details.subject_id')                                
                                    ->select(\DB::raw("
                                        enrollments.id as enrollment_id,
                                        enrollments.class_details_id as cid,
                                        enrollments.attendance_first,
                                        enrollments.attendance_second,
                                        enrollments.j_lacking_unit,
                                        enrollments.s1_lacking_unit,
                                        class_details.grade_level,
                                        class_subject_details.id as class_subject_details_id,
                                        class_subject_details.class_days,
                                        class_subject_details.class_time_from,
                                        class_subject_details.class_time_to,
                                        class_subject_details.status as grade_status,
                                        class_subject_details.class_subject_order,
                                        class_subject_details.class_details_id,
                                        CONCAT(faculty_informations.last_name, ', ', faculty_informations.first_name, ' ', faculty_informations.middle_name) as faculty_name,
                                        subject_details.id AS subject_id,
                                        subject_details.subject_code,
                                        subject_details.subject,
                                        rooms.room_code,
                                        section_details.section
                                        
                                    "))
                                    ->where('enrollments.student_information_id', $sub->student_informations_id)
                                    ->where('class_subject_details.status', '!=', 0)
                                    ->where('enrollments.status', 1)
                                    ->where('class_details.status', 1)
                                    ->where('class_subject_details.sem', 1)
                                    ->where('class_details.school_year_id', $SchoolYear->id)
                                    ->orderBy('class_subject_details.class_subject_order', 'ASC')
                                    ->get();

                                $Enrollment2 = \App\Enrollment::join('class_details', 'class_details.id', '=', 'enrollments.class_details_id')
                                        ->join('class_subject_details', 'class_subject_details.class_details_id', '=', 'class_details.id')
                                        ->join('rooms', 'rooms.id', '=', 'class_details.room_id')
                                        ->join('faculty_informations', 'faculty_informations.id', '=', 'class_subject_details.faculty_id')
                                        ->join('section_details', 'section_details.id', '=', 'class_details.section_id')
                                        ->join('subject_details', 'subject_details.id', '=', 'class_subject_details.subject_id')                                
                                        ->select(\DB::raw("
                                            enrollments.id as enrollment_id,
                                            enrollments.class_details_id as cid,
                                            enrollments.attendance_first,
                                            enrollments.attendance_second,
                                            enrollments.j_lacking_unit,
                                            enrollments.s1_lacking_unit,
                                            class_details.grade_level,
                                            class_subject_details.id as class_subject_details_id,
                                            class_subject_details.class_days,
                                            class_subject_details.class_time_from,
                                            class_subject_details.class_time_to,
                                            class_subject_details.status as grade_status,
                                            class_subject_details.class_subject_order,
                                            class_subject_details.class_details_id,
                                            CONCAT(faculty_informations.last_name, ', ', faculty_informations.first_name, ' ', faculty_informations.middle_name) as faculty_name,
                                            subject_details.id AS subject_id,
                                            subject_details.subject_code,
                                            subject_details.subject,
                                            rooms.room_code,
                                            section_details.section
                                            
                                        "))
                                        ->where('enrollments.student_information_id', $sub->student_informations_id)
                                        ->where('class_subject_details.status', '!=', 0)
                                        ->where('enrollments.status', 1)
                                        ->where('class_details.status', 1)
                                        ->where('class_subject_details.sem', 2)
                                        ->where('class_details.school_year_id', $SchoolYear->id)
                                        ->orderBy('class_subject_details.class_subject_order', 'ASC')
                                        ->get();

                                        $total_sem1 = 0;
                                        $total_sem2 = 0;

                ?>
            <tr>
                <td>{{ $key + 1 }}.</td>
                <td>{{ $sub->student_name }}</td>
                @foreach($Enrollment1 as $key => $data)
                    <td>
                        <center>
                        <?php
                            $first_sem = \App\StudentEnrolledSubject::where('enrollments_id', $data->enrollment_id)
                                ->where('subject_id', $data->subject_id)
                                ->where('sem', 1)
                                ->first();

                                if($first_sem)
                                {

                                    echo round($final_ave = (round($first_sem->fir_g) + round($first_sem->sec_g)) / 2);
                                    $total_sem1 += round($final_ave) ;   
                                }      
                        ?>  
                        </center>
                    </td>
                @endforeach
                
                @foreach($Enrollment2 as $key => $data)
                    <td>
                        <center>
                        <?php 
                            $second_sem = \App\StudentEnrolledSubject::where('enrollments_id', $data->enrollment_id)
                                ->where('subject_id', $data->subject_id)
                                ->where('sem', 2)
                                ->first();

                            if($second_sem)
                            {
                                echo round($final_ave = (round($second_sem->thi_g) + round($second_sem->fou_g)) / 2);
                                $total_sem2 += round($final_ave) ;   
                            }      
                        ?>
                        </center>
                    </td>
                @endforeach
                    <td>
                        <center>
                        <?php 
                            $subject = $Totalsubject_1st_sem + $Totalsubject_2nd_sem;
                            $total_ave = $total_sem1 + $total_sem2;
                            $final_ave = ($total_ave / $subject);
                            
                            echo round($final_ave);                                        
                        ?>
                        </center>
                    </td>
                    
                    @if(round($final_ave) >= 75 && round($final_ave) <= 89)
                        <td>
                            <center>Passed</center>
                        </td>
                    @elseif(round($final_ave) >= 90 && round($final_ave) <= 94)
                        <td>
                            <center>with honors</center>
                        </td>
                    @elseif(round($final_ave)>= 95 && round($final_ave) <= 97)
                        <td>
                            <center>with high honors</center>
                        </td>
                    @elseif(round($final_ave) >= 98 && round($final_ave) <= 100)
                        <td>
                            <center>with highest honors</center>
                        </td>
                    @elseif(round($final_ave) < 75)
                        <td>
                            <center>Failed</center>
                        </td>
                    @endif
            </tr>
            @endforeach



        </tbody>
    </table>
</div>