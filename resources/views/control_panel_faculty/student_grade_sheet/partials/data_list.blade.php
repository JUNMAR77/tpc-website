                        <?php
                                $days = $ClassSubjectDetail ? $ClassSubjectDetail->class_schedule ? explode(';', rtrim($ClassSubjectDetail->class_schedule,";")) : [] : [];
                                $daysObj = [];
                                $daysDisplay = '';
                                if ($days) 
                                {
                                    foreach($days as $day)
                                    {
                                        $day_sched = explode('@', $day);
                                        $day = '';
                                        if ($day_sched[0] == 1) {
                                            $day = 'M';
                                        } else if ($day_sched[0] == 2) {
                                            $day = 'T';
                                        } else if ($day_sched[0] == 3) {
                                            $day = 'W';
                                        } else if ($day_sched[0] == 4) {
                                            $day = 'TH';
                                        } else if ($day_sched[0] == 5) {
                                            $day = 'F';
                                        }
                                        $t = explode('-', $day_sched[1]);
                                        $daysDisplay .= $day . '@' . $t[0] . '-' . $t[1] . '/';
                                    }
                                }

                        ?>

                        <h4>Subject : <span class="text-red"><i>{{ $ClassSubjectDetail->id }} {{ $ClassSubjectDetail->subject }}</i></span> 
                        {{--  Time : <span class="text-red"><i>{{ strftime('%r',strtotime($ClassSubjectDetail->class_time_from)) . ' - ' . strftime('%r',strtotime($ClassSubjectDetail->class_time_to)) }}</i></span> Days : <span class="text-red"><i>{{ $ClassSubjectDetail->class_days }}</i></span>  --}}
                        Schedule : <span class="text-red"><i>{{ rtrim($daysDisplay, '/') }}</i></span>
                        </h4>
                        <h4>Grade & Section : <span class="text-red"><i>{{ $ClassSubjectDetail->grade_level . ' ' .$ClassSubjectDetail->section }}</i></span></h4>
                        <h4>Semester: <span class="text-red"><i>{{ $ClassSubjectDetail ? $ClassSubjectDetail->sem == 1 ? 'First' : 'Second' : '' }}</i></span></h4>
                        {{-- <h4>{{ $semester }}</h4> --}}
                        <div class="pull-right">
                            {{--  {{ $Enrollment ? $Enrollment->links() : '' }}  --}}
                        </div>
                       
                        @if($ClassSubjectDetail->grade_level==11 || $ClassSubjectDetail->grade_level==12)
                            
                            @if($ClassSubjectDetail->sem==1)
                                    <button class="btn btn-flat btn-danger pull-right" id="js-btn_print_sem1" data-id="{{ $ClassSubjectDetail->id }}"><i class="fa fa-file-pdf"></i> Print</button>
                                    <table class="table no-margin">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Student Name</th>
                                               
                                                <th >First Quarter</th>
                                                <th >Second Quarter</th>
                                                {{-- <th>Third Grading</th>
                                                <th>Fourth Grading</th> --}}
                                            {{--  @endif  --}}
                                                <th style="text-align:center">Final Grading</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                                @if ($EnrollmentMale)
                                                    @if ($ClassSubjectDetail->grading_status == 2)
                                                        @foreach ($EnrollmentMale as $key => $data)
                                                            <tr data-student_enrolled_subject_id="{{ base64_encode($data->student_enrolled_subject_id) }}" data-student_id="{{ base64_encode($data->id) }}" data-enrollment_id="{{ base64_encode($data->enrollment_id) }}">
                                                                <td>{{ $key + 1 }}.</td>
                                                                <td>{{ $data->student_name }}</td>
                                                                <td>
                                                                    <center>{{$data->fir_g}}</center>
                                                                </td>
                                                                <td>
                                                                    <center>{{$data->sec_g}}</center>
                                                                </td>
                                                                {{-- <td>
                                                                    <center>{{$data->thi_g}}</center>
                                                                </td>
                                                                <td>
                                                                    <center>{{$data->fou_g}}</center>
                                                                </td> --}}
                                                                <td>
                                                                    <span class="text-red final-ratings_{{ $data->student_enrolled_subject_id }}">
                                                                        <strong>
                                                                                <center>
                                                                                    <?php
                                                                                        $g_ctr = 0;
                                                                                        $g_ctr += $data->fir_g > 0 ? 1 : 0;
                                                                                        $g_ctr += $data->sec_g > 0 ? 1 : 0;
                                                                                        $g_ctr += $data->thi_g > 0 ? 1 : 0;
                                                                                        $g_ctr += $data->fou_g > 0 ? 1 : 0;
                                                                                    ?>
                                                                                    {{ ($g_ctr ? round(($data->fir_g + $data->sec_g + $data->thi_g + $data->fou_g) / $g_ctr) : 0)  }}
                                                                                </center>
                                                                        </strong>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                            <tr>
                                                                <td colspan="7">
                                                                    <b>Male</b>
                                                                </td>
                                                            </tr>
                                                        @foreach ($EnrollmentMale as $key => $data)
                                                            <tr data-student_enrolled_subject_id="{{ base64_encode($data->student_enrolled_subject_id) }}" data-student_id="{{ base64_encode($data->id) }}" data-enrollment_id="{{ base64_encode($data->enrollment_id) }}">
                                                                <td>{{ $key + 1 }}.</td>
                                                                <td>{{ $data->student_name }}</td>
                                                                {{--  <td>{{ $data->student_enrolled_subject_id }}</td>  --}}
                                                                <td>
                                                                    <div class="input-group" data-grading="{{ base64_encode('first') }}">
                                                                        <input style ="text-align: center" type="number" {{ $data->fir_g_status ? "readonly='readonly'" : '' }} class="input-sm txt-grade_input form-control grade-input-{{ $data->student_enrolled_subject_id }}" value="{{ $data->fir_g <= 0.00 ? "" : round($data->fir_g) }}" id="first_grading_{{ $data->student_enrolled_subject_id }}">
                                                                        <input id="classSubjectDetailID" name="classSubjectDetailID" type="hidden" value="{{ $ClassSubjectDetail->id }}">
                                                                        {{--  <span class="input-group-btn">
                                                                            <button class="btn btn-sm btn-primary btn-flat btn--save-grade" data-grading="first" {{ $data->fir_g_status ? "disabled='disabled'" : '' }} title="Save grade and finalize"><i class="fa fa-check"></i> Save</button>
                                                                        </span>  --}}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group" data-grading="{{ base64_encode('second') }}">
                                                                        <input style ="text-align: center" type="number" {{ $data->sec_g_status ? "readonly='readonly'" : '' }}  class="input-sm txt-grade_input form-control" value="{{ $data->fir_g <= 0.00 ? "" : round($data->sec_g) }}" id="second_grading_{{ $data->student_enrolled_subject_id }}">
                                                                        <input id="classSubjectDetailID" name="classSubjectDetailID" type="hidden" value="{{ $ClassSubjectDetail->id }}">
                                                                        {{--  <span class="input-group-btn">
                                                                            <button  class="btn btn-sm bg-purple btn-flat btn--save-grade" data-grading="second" {{ $data->sec_g_status ? "disabled='disabled'" : '' }} title="Save grade and finalize"><i class="fa fa-check"></i> Save</button>
                                                                        </span>  --}}
                                                                    </div>
                                                                </td>
                                                               
                                                                <td>
                                                                    <span class="text-red final-ratings_{{ $data->student_enrolled_subject_id }}">
                                                                        <strong>

                                                                            <center>
                                                                            <?php
                                                                                $g_ctr = 0;
                                                                                $g_ctr += $data->fir_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->sec_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->thi_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->fou_g > 0 ? 1 : 0;
                                                                            ?>
                                                                            {{ ($g_ctr ? round(($data->fir_g + $data->sec_g + $data->thi_g + $data->fou_g) / $g_ctr) : 0)  }}
                                                                            </center>
                                                                        </strong>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                @endif
                                                <tr>
                                                    <td colspan="7">
                                                        <b>Female</b>
                                                    </td>
                                                </tr>
                                                @if ($EnrollmentFemale)
                                                    @if ($ClassSubjectDetail->grading_status == 2)
                                                        @foreach ($EnrollmentFemale as $key => $data)
                                                            <tr data-student_enrolled_subject_id="{{ base64_encode($data->student_enrolled_subject_id) }}" data-student_id="{{ base64_encode($data->id) }}" data-enrollment_id="{{ base64_encode($data->enrollment_id) }}">
                                                                <td>{{ $key + 1 }}.</td>
                                                                <td>{{ $data->student_name }}</td>
                                                                <td>
                                                                    <center>{{$data->fir_g}}</center>
                                                                </td>
                                                                <td>
                                                                    <center>{{$data->sec_g}}</center>
                                                                </td>
                                                                {{-- <td>
                                                                    <center>{{$data->thi_g}}</center>
                                                                </td>
                                                                <td>
                                                                    <center>{{$data->fou_g}}</center>
                                                                </td> --}}
                                                                <td>
                                                                    <span class="text-red final-ratings_{{ $data->student_enrolled_subject_id }}">
                                                                        <strong>
                                                                                <center>
                                                                                    <?php
                                                                                        $g_ctr = 0;
                                                                                        $g_ctr += $data->fir_g > 0 ? 1 : 0;
                                                                                        $g_ctr += $data->sec_g > 0 ? 1 : 0;
                                                                                        $g_ctr += $data->thi_g > 0 ? 1 : 0;
                                                                                        $g_ctr += $data->fou_g > 0 ? 1 : 0;
                                                                                    ?>
                                                                                    {{ ($g_ctr ? (($data->fir_g + $data->sec_g + $data->thi_g + $data->fou_g) / $g_ctr) : 0)  }}
                                                                                </center>
                                                                        </strong>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        @foreach ($EnrollmentFemale as $key => $data)
                                                            <tr data-student_enrolled_subject_id="{{ base64_encode($data->student_enrolled_subject_id) }}" data-student_id="{{ base64_encode($data->id) }}" data-enrollment_id="{{ base64_encode($data->enrollment_id) }}">
                                                                <td>{{ $key + 1 }}.</td>
                                                                <td>{{ $data->student_name }}</td>
                                                                {{--  <td>{{ $data->student_enrolled_subject_id }}</td>  --}}
                                                                <td>
                                                                    <div class="input-group" data-grading="{{ base64_encode('first') }}">
                                                                        <input style ="text-align: center" type="number" {{ $data->fir_g_status ? "readonly='readonly'" : '' }} class="input-sm txt-grade_input form-control grade-input-{{ $data->student_enrolled_subject_id }}" value="{{ $data->fir_g <= 0.00 ? "" : round($data->fir_g) }}" id="first_grading_{{ $data->student_enrolled_subject_id }}">
                                                                        <input id="classSubjectDetailID" name="classSubjectDetailID" type="hidden" value="{{ $ClassSubjectDetail->id }}">
                                                                        {{--  <span class="input-group-btn">
                                                                            <button class="btn btn-sm btn-primary btn-flat btn--save-grade" data-grading="first" {{ $data->fir_g_status ? "disabled='disabled'" : '' }} title="Save grade and finalize"><i class="fa fa-check"></i> Save</button>
                                                                        </span>  --}}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group" data-grading="{{ base64_encode('second') }}">
                                                                        <input style ="text-align: center" type="number" {{ $data->sec_g_status ? "readonly='readonly'" : '' }}  class="input-sm txt-grade_input form-control" value="{{ $data->sec_g <= 0.00 ? "" : round($data->sec_g) }}" id="second_grading_{{ $data->student_enrolled_subject_id }}">
                                                                        <input id="classSubjectDetailID" name="classSubjectDetailID" type="hidden" value="{{ $ClassSubjectDetail->id }}">
                                                                        {{--  <span class="input-group-btn">
                                                                            <button  class="btn btn-sm bg-purple btn-flat btn--save-grade" data-grading="second" {{ $data->sec_g_status ? "disabled='disabled'" : '' }} title="Save grade and finalize"><i class="fa fa-check"></i> Save</button>
                                                                        </span>  --}}
                                                                    </div>
                                                                </td>
                                                               
                                                                <td>
                                                                    <span class="text-red final-ratings_{{ $data->student_enrolled_subject_id }}">
                                                                        <strong>
                                                                            <center>
                                                                            <?php
                                                                                $g_ctr = 0;
                                                                                $g_ctr += $data->fir_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->sec_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->thi_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->fou_g > 0 ? 1 : 0;
                                                                            ?>
                                                                            {{ ($g_ctr ? round(($data->fir_g + $data->sec_g + $data->thi_g + $data->fou_g) / $g_ctr) : 0)  }}
                                                                            </center>
                                                                        </strong>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            {{--  @endif  --}}

                                        </tbody>
                                    </table>
                            @else
                            <button class="btn btn-flat btn-danger pull-right" id="js-btn_print_sem2" data-id="{{ $ClassSubjectDetail->id }}"><i class="fa fa-file-pdf"></i> Print</button>
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name</th>
                                        {{--  <th>Subject ID</th>  --}}
                                        
                                    {{--  @if ($ClassSubjectDetail->grade_level >= 11) 
                                        <th>First Semister</th>
                                        <th>Second Semister</th>
                                    @elseif($ClassSubjectDetail->grade_level <= 10)  --}}
                                        {{-- <th>First Grading</th>
                                        <th>Second Grading</th> --}}
                                        <th>First Quarter</th>
                                        <th>Second Quarter</th>
                                    {{--  @endif  --}}
                                        <th style="text-align:center">Final Grading</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        @if ($EnrollmentMale)
                                            @if ($ClassSubjectDetail->grading_status == 2)
                                                @foreach ($EnrollmentMale as $key => $data)
                                                    <tr data-student_enrolled_subject_id="{{ base64_encode($data->student_enrolled_subject_id) }}" data-student_id="{{ base64_encode($data->id) }}" data-enrollment_id="{{ base64_encode($data->enrollment_id) }}">
                                                        <td>{{ $key + 1 }}.</td>
                                                        <td>{{ $data->student_name }}</td>
                                                        {{-- <td>
                                                            <center>{{$data->fir_g}}</center>
                                                        </td>
                                                        <td>
                                                            <center>{{$data->sec_g}}</center>
                                                        </td> --}}
                                                        <td>
                                                            <center>{{$data->thi_g}}</center>
                                                        </td>
                                                        <td>
                                                            <center>{{$data->fou_g}}</center>
                                                        </td>
                                                        <td>
                                                            <span class="text-red final-ratings_{{ $data->student_enrolled_subject_id }}">
                                                                <strong>
                                                                        <center>
                                                                            <?php
                                                                                $g_ctr = 0;
                                                                                $g_ctr += $data->fir_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->sec_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->thi_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->fou_g > 0 ? 1 : 0;
                                                                            ?>
                                                                            {{ ($g_ctr ? round(($data->fir_g + $data->sec_g + $data->thi_g + $data->fou_g) / $g_ctr) : 0)  }}
                                                                        </center>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                    <tr>
                                                        <td colspan="7">
                                                            <b>Male</b>
                                                        </td>
                                                    </tr>
                                                @foreach ($EnrollmentMale as $key => $data)
                                                    <tr data-student_enrolled_subject_id="{{ base64_encode($data->student_enrolled_subject_id) }}" data-student_id="{{ base64_encode($data->id) }}" data-enrollment_id="{{ base64_encode($data->enrollment_id) }}">
                                                        <td>{{ $key + 1 }}.</td>
                                                        <td>{{ $data->student_name }}</td>
                                                        {{--  <td>{{ $data->student_enrolled_subject_id }}</td>  --}}
                                                       
                                                        <td>
                                                            <div class="input-group" data-grading="{{base64_encode('third')}}">
                                                                <input style ="text-align: center" type="number" {{ $data->thi_g_status ? "readonly='readonly'" : '' }} class="input-sm txt-grade_input form-control" value="{{ $data->thi_g <= 0.00 ? "" : round($data->thi_g) }}" id="third_grading_{{ $data->student_enrolled_subject_id }}">
                                                                <input id="classSubjectDetailID" name="classSubjectDetailID" type="hidden" value="{{ $ClassSubjectDetail->id }}">
                                                                {{--  <span class="input-group-btn">
                                                                    <button class="btn btn-sm bg-orange btn-flat btn--save-grade" data-grading="third" {{ $data->thi_g_status ? "disabled='disabled'" : '' }} title="Save grade and finalize"><i class="fa fa-check"></i> Save</button>
                                                                </span>  --}}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group" data-grading="{{base64_encode('fourth')}}">
                                                            <input style ="text-align: center" type="number" {{ $data->fou_g_status ? "readonly='readonly'" : '' }} class="input-sm txt-grade_input form-control" value="{{ $data->fou_g <= 0.00 ? "" : round($data->fou_g) }}" id="fourth_grading_{{ $data->student_enrolled_subject_id }}">
                                                            <input id="classSubjectDetailID" name="classSubjectDetailID" type="hidden" value="{{ $ClassSubjectDetail->id }}">    
                                                            {{--  <span class="input-group-btn">
                                                                    <button class="btn btn-sm bg-green btn-flat btn--save-grade" data-grading="fourth" {{ $data->fou_g_status ? "disabled='disabled'" : '' }} title="Save grade and finalize"><i class="fa fa-check"></i> Save</button>
                                                                </span>  --}}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="text-red final-ratings_{{ $data->student_enrolled_subject_id }}">
                                                                <strong>
                                                                    <center>
                                                                    <?php
                                                                        $g_ctr = 0;
                                                                        $g_ctr += $data->fir_g > 0 ? 1 : 0;
                                                                        $g_ctr += $data->sec_g > 0 ? 1 : 0;
                                                                        $g_ctr += $data->thi_g > 0 ? 1 : 0;
                                                                        $g_ctr += $data->fou_g > 0 ? 1 : 0;
                                                                    ?>
                                                                    {{ ($g_ctr ? round(($data->fir_g + $data->sec_g + $data->thi_g + $data->fou_g) / $g_ctr) : 0)  }}
                                                                    </center>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endif
                                        <tr>
                                                <td colspan="7">
                                                    <b>Female</b>
                                                </td>
                                            </tr>
                                        @if ($EnrollmentFemale)
                                            @if ($ClassSubjectDetail->grading_status == 2)
                                                @foreach ($EnrollmentFemale as $key => $data)
                                                    <tr data-student_enrolled_subject_id="{{ base64_encode($data->student_enrolled_subject_id) }}" data-student_id="{{ base64_encode($data->id) }}" data-enrollment_id="{{ base64_encode($data->enrollment_id) }}">
                                                        <td>{{ $key + 1 }}.</td>
                                                        <td>{{ $data->student_name }}</td>
                                                        {{-- <td>
                                                            <center>{{$data->fir_g}}</center>
                                                        </td>
                                                        <td>
                                                            <center>{{$data->sec_g}}</center>
                                                        </td> --}}
                                                        <td>
                                                            <center>{{$data->thi_g}}</center>
                                                        </td>
                                                        <td>
                                                            <center>{{$data->fou_g}}</center>
                                                        </td>
                                                        <td>
                                                            <span class="text-red final-ratings_{{ $data->student_enrolled_subject_id }}">
                                                                <strong>
                                                                        <center>
                                                                            <?php
                                                                                $g_ctr = 0;
                                                                                $g_ctr += $data->fir_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->sec_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->thi_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->fou_g > 0 ? 1 : 0;
                                                                            ?>
                                                                            {{ ($g_ctr ? (($data->fir_g + $data->sec_g + $data->thi_g + $data->fou_g) / $g_ctr) : 0)  }}
                                                                        </center>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                @foreach ($EnrollmentFemale as $key => $data)
                                                    <tr data-student_enrolled_subject_id="{{ base64_encode($data->student_enrolled_subject_id) }}" data-student_id="{{ base64_encode($data->id) }}" data-enrollment_id="{{ base64_encode($data->enrollment_id) }}">
                                                        <td>{{ $key + 1 }}.</td>
                                                        <td>{{ $data->student_name }}</td>
                                                        {{--  <td>{{ $data->student_enrolled_subject_id }}</td>  --}}
                                                     
                                                        <td>
                                                            <div class="input-group" data-grading="{{base64_encode('third')}}">
                                                                <input style ="text-align: center" type="number" {{ $data->thi_g_status ? "readonly='readonly'" : '' }} class="input-sm txt-grade_input form-control" value="{{ $data->thi_g <= 0.00 ? "" : round($data->thi_g) }}" id="third_grading_{{ $data->student_enrolled_subject_id }}">
                                                                <input id="classSubjectDetailID" name="classSubjectDetailID" type="hidden" value="{{ $ClassSubjectDetail->id }}">
                                                                {{--  <span class="input-group-btn">
                                                                    <button class="btn btn-sm bg-orange btn-flat btn--save-grade" data-grading="third" {{ $data->thi_g_status ? "disabled='disabled'" : '' }} title="Save grade and finalize"><i class="fa fa-check"></i> Save</button>
                                                                </span>  --}}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group" data-grading="{{base64_encode('fourth')}}">                                                            
                                                            <input style ="text-align: center" type="number" {{ $data->fou_g_status ? "readonly='readonly'" : '' }} class="input-sm txt-grade_input form-control" value="{{ $data->fou_g <= 0.00 ? "" : round($data->fou_g) }}" id="fourth_grading_{{ $data->student_enrolled_subject_id }}">
                                                            <input id="classSubjectDetailID" name="classSubjectDetailID" type="hidden" value="{{ $ClassSubjectDetail->id }}">    
                                                            {{--  <span class="input-group-btn">
                                                                    <button class="btn btn-sm bg-green btn-flat btn--save-grade" data-grading="fourth" {{ $data->fou_g_status ? "disabled='disabled'" : '' }} title="Save grade and finalize"><i class="fa fa-check"></i> Save</button>
                                                                </span>  --}}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="text-red final-ratings_{{ $data->student_enrolled_subject_id }}">
                                                                <strong>
                                                                        <center>
                                                                            <?php
                                                                                $g_ctr = 0;
                                                                                $g_ctr += $data->fir_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->sec_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->thi_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->fou_g > 0 ? 1 : 0;
                                                                            ?>
                                                                            {{ ($g_ctr ? round(($data->fir_g + $data->sec_g + $data->thi_g + $data->fou_g) / $g_ctr) : 0)  }}
                                                                        </center>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endif
                                    {{--  @endif  --}}

                                </tbody>
                            </table>
                            @endif

                            

                        @else

                            <button class="btn btn-flat btn-danger pull-right" id="js-btn_print" data-id="{{ $ClassSubjectDetail->id }}"><i class="fa fa-file-pdf"></i> Print</button>
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name</th>
                                        {{--  <th>Subject ID</th>  --}}
                                        
                                    {{--  @if ($ClassSubjectDetail->grade_level >= 11) 
                                        <th>First Semister</th>
                                        <th>Second Semister</th>
                                    @elseif($ClassSubjectDetail->grade_level <= 10)  --}}
                                        <th>First Grading</th>
                                        <th>Second Grading</th>
                                        <th>Third Grading</th>
                                        <th>Fourth Grading</th>
                                    {{--  @endif  --}}
                                        <th style="text-align:center">Final Grading</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        @if ($EnrollmentMale)
                                            @if ($ClassSubjectDetail->grading_status == 2)
                                                @foreach ($EnrollmentMale as $key => $data)
                                                    <tr data-student_enrolled_subject_id="{{ base64_encode($data->student_enrolled_subject_id) }}" data-student_id="{{ base64_encode($data->id) }}" data-enrollment_id="{{ base64_encode($data->enrollment_id) }}">
                                                        <td>{{ $key + 1 }}.</td>
                                                        <td>{{ $data->student_name }}</td>
                                                        <td>
                                                            <center>{{$data->fir_g}}</center>
                                                        </td>
                                                        <td>
                                                            <center>{{$data->sec_g}}</center>
                                                        </td>
                                                        <td>
                                                            <center>{{$data->thi_g}}</center>
                                                        </td>
                                                        <td>
                                                            <center>{{$data->fou_g}}</center>
                                                        </td>
                                                        <td>
                                                            <span class="text-red final-ratings_{{ $data->student_enrolled_subject_id }}">
                                                                <strong>
                                                                        <center>
                                                                            <?php
                                                                                $g_ctr = 0;
                                                                                $g_ctr += $data->fir_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->sec_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->thi_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->fou_g > 0 ? 1 : 0;
                                                                            ?>
                                                                            {{ ($g_ctr ? round(($data->fir_g + $data->sec_g + $data->thi_g + $data->fou_g) / $g_ctr) : 0)  }}
                                                                        </center>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                    <tr>
                                                        <td colspan="7">
                                                            <b>Male</b>
                                                        </td>
                                                    </tr>
                                                @foreach ($EnrollmentMale as $key => $data)
                                                    <tr data-student_enrolled_subject_id="{{ base64_encode($data->student_enrolled_subject_id) }}" data-student_id="{{ base64_encode($data->id) }}" data-enrollment_id="{{ base64_encode($data->enrollment_id) }}">
                                                            <td>{{ $key + 1 }}.</td>
                                                            <td>{{ $data->student_name }}</td>
                                                            {{--  <td>{{ $data->student_enrolled_subject_id }}</td>  --}}
                                                            <td>
                                                                <div class="input-group" data-grading="{{ base64_encode('first') }}">
                                                                    <input style ="text-align: center" type="number" {{ $data->fir_g_status ? "readonly='readonly'" : '' }} class="input-sm txt-grade_input form-control grade-input-{{ $data->student_enrolled_subject_id }}" value="{{ $data->fir_g <= 0.00 ? "" : round($data->fir_g) }}" id="first_grading_{{ $data->student_enrolled_subject_id }}">
                                                                    <input id="classSubjectDetailID" name="classSubjectDetailID" type="hidden" value="{{ $ClassSubjectDetail->id }}">
                                                                    {{--  <span class="input-group-btn">
                                                                        <button class="btn btn-sm btn-primary btn-flat btn--save-grade" data-grading="first" {{ $data->fir_g_status ? "disabled='disabled'" : '' }} title="Save grade and finalize"><i class="fa fa-check"></i> Save</button>
                                                                    </span>  --}}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group" data-grading="{{ base64_encode('second') }}">
                                                                    <input style ="text-align: center" type="number" {{ $data->sec_g_status ? "readonly='readonly'" : '' }}  class="input-sm txt-grade_input form-control" value="{{ $data->sec_g <= 0.00 ? "" : round($data->sec_g) }}" id="second_grading_{{ $data->student_enrolled_subject_id }}">
                                                                    <input id="classSubjectDetailID" name="classSubjectDetailID" type="hidden" value="{{ $ClassSubjectDetail->id }}">
                                                                    {{--  <span class="input-group-btn">
                                                                        <button  class="btn btn-sm bg-purple btn-flat btn--save-grade" data-grading="second" {{ $data->sec_g_status ? "disabled='disabled'" : '' }} title="Save grade and finalize"><i class="fa fa-check"></i> Save</button>
                                                                    </span>  --}}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group" data-grading="{{base64_encode('third')}}">
                                                                    <input style ="text-align: center" type="number" {{ $data->thi_g_status ? "readonly='readonly'" : '' }} class="input-sm txt-grade_input form-control" value="{{ $data->thi_g <= 0.00 ? "" : round($data->thi_g) }}" id="third_grading_{{ $data->student_enrolled_subject_id }}">
                                                                    <input id="classSubjectDetailID" name="classSubjectDetailID" type="hidden" value="{{ $ClassSubjectDetail->id }}">
                                                                    {{--  <span class="input-group-btn">
                                                                        <button class="btn btn-sm bg-orange btn-flat btn--save-grade" data-grading="third" {{ $data->thi_g_status ? "disabled='disabled'" : '' }} title="Save grade and finalize"><i class="fa fa-check"></i> Save</button>
                                                                    </span>  --}}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group" data-grading="{{base64_encode('fourth')}}">
                                                                <input style ="text-align: center" type="number" {{ $data->fou_g_status ? "readonly='readonly'" : '' }} class="input-sm txt-grade_input form-control" value="{{ $data->fou_g <= 0.00 ? "" : round($data->fou_g) }}" id="fourth_grading_{{ $data->student_enrolled_subject_id }}">
                                                                <input id="classSubjectDetailID" name="classSubjectDetailID" type="hidden" value="{{ $ClassSubjectDetail->id }}">    
                                                                {{--  <span class="input-group-btn">
                                                                        <button class="btn btn-sm bg-green btn-flat btn--save-grade" data-grading="fourth" {{ $data->fou_g_status ? "disabled='disabled'" : '' }} title="Save grade and finalize"><i class="fa fa-check"></i> Save</button>
                                                                    </span>  --}}
                                                                </div>
                                                            </td>
                                                        <td>
                                                            <span class="text-red final-ratings_{{ $data->student_enrolled_subject_id }}">
                                                                <strong>
                                                                        <center>
                                                                            <?php
                                                                                $g_ctr = 0;
                                                                                $g_ctr += $data->fir_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->sec_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->thi_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->fou_g > 0 ? 1 : 0;
                                                                            ?>
                                                                            {{ ($g_ctr ? round(($data->fir_g + $data->sec_g + $data->thi_g + $data->fou_g) / $g_ctr) : 0)  }}
                                                                        </center>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endif
                                        <tr>
                                            <td colspan="7">
                                                <b>Female</b>
                                            </td>
                                        </tr>
                                        @if ($EnrollmentFemale)
                                            @if ($ClassSubjectDetail->grading_status == 2)
                                                @foreach ($EnrollmentFemale as $key => $data)
                                                    <tr data-student_enrolled_subject_id="{{ base64_encode($data->student_enrolled_subject_id) }}" data-student_id="{{ base64_encode($data->id) }}" data-enrollment_id="{{ base64_encode($data->enrollment_id) }}">
                                                        <td>{{ $key + 1 }}.</td>
                                                        <td>{{ $data->student_name }}</td>
                                                        <td>
                                                            <center>{{$data->fir_g}}</center>
                                                        </td>
                                                        <td>
                                                            <center>{{$data->sec_g}}</center>
                                                        </td>
                                                        <td>
                                                            <center>{{$data->thi_g}}</center>
                                                        </td>
                                                        <td>
                                                            <center>{{$data->fou_g}}</center>
                                                        </td>
                                                        <td>
                                                            <span class="text-red final-ratings_{{ $data->student_enrolled_subject_id }}">
                                                                <strong>
                                                                        <center>
                                                                            <?php
                                                                                $g_ctr = 0;
                                                                                $g_ctr += $data->fir_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->sec_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->thi_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->fou_g > 0 ? 1 : 0;
                                                                            ?>
                                                                            {{ ($g_ctr ? (($data->fir_g + $data->sec_g + $data->thi_g + $data->fou_g) / $g_ctr) : 0)  }}
                                                                        </center>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                @foreach ($EnrollmentFemale as $key => $data)
                                                    <tr data-student_enrolled_subject_id="{{ base64_encode($data->student_enrolled_subject_id) }}" data-student_id="{{ base64_encode($data->id) }}" data-enrollment_id="{{ base64_encode($data->enrollment_id) }}">
                                                        <td>{{ $key + 1 }}.</td>
                                                        <td>{{ $data->student_name }}</td>
                                                        {{--  <td>{{ $data->student_enrolled_subject_id }}</td>  --}}
                                                        <td>
                                                            <div class="input-group" data-grading="{{ base64_encode('first') }}">
                                                                <input style ="text-align: center" type="number" {{ $data->fir_g_status ? "readonly='readonly'" : '' }} class="input-sm txt-grade_input form-control grade-input-{{ $data->student_enrolled_subject_id }}" value="{{ $data->fir_g <= 0.00 ? "" : round($data->fir_g) }}" id="first_grading_{{ $data->student_enrolled_subject_id }}">
                                                                <input id="classSubjectDetailID" name="classSubjectDetailID" type="hidden" value="{{ $ClassSubjectDetail->id }}">
                                                                {{--  <span class="input-group-btn">
                                                                    <button class="btn btn-sm btn-primary btn-flat btn--save-grade" data-grading="first" {{ $data->fir_g_status ? "disabled='disabled'" : '' }} title="Save grade and finalize"><i class="fa fa-check"></i> Save</button>
                                                                </span>  --}}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group" data-grading="{{ base64_encode('second') }}">
                                                                <input style ="text-align: center" type="number" {{ $data->sec_g_status ? "readonly='readonly'" : '' }}  class="input-sm txt-grade_input form-control" value="{{ $data->sec_g <= 0.00 ? "" : round($data->sec_g) }}" id="second_grading_{{ $data->student_enrolled_subject_id }}">
                                                                <input id="classSubjectDetailID" name="classSubjectDetailID" type="hidden" value="{{ $ClassSubjectDetail->id }}">
                                                                {{--  <span class="input-group-btn">
                                                                    <button  class="btn btn-sm bg-purple btn-flat btn--save-grade" data-grading="second" {{ $data->sec_g_status ? "disabled='disabled'" : '' }} title="Save grade and finalize"><i class="fa fa-check"></i> Save</button>
                                                                </span>  --}}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group" data-grading="{{base64_encode('third')}}">
                                                                <input style ="text-align: center" type="number" {{ $data->thi_g_status ? "readonly='readonly'" : '' }} class="input-sm txt-grade_input form-control" value="{{ $data->thi_g <= 0.00 ? "" : round($data->thi_g) }}" id="third_grading_{{ $data->student_enrolled_subject_id }}">
                                                                <input id="classSubjectDetailID" name="classSubjectDetailID" type="hidden" value="{{ $ClassSubjectDetail->id }}">
                                                                {{--  <span class="input-group-btn">
                                                                    <button class="btn btn-sm bg-orange btn-flat btn--save-grade" data-grading="third" {{ $data->thi_g_status ? "disabled='disabled'" : '' }} title="Save grade and finalize"><i class="fa fa-check"></i> Save</button>
                                                                </span>  --}}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group" data-grading="{{base64_encode('fourth')}}">
                                                            <input style ="text-align: center" type="number" {{ $data->fou_g_status ? "readonly='readonly'" : '' }} class="input-sm txt-grade_input form-control" value="{{ $data->fou_g <= 0.00 ? "" : round($data->fou_g) }}" id="fourth_grading_{{ $data->student_enrolled_subject_id }}">
                                                            <input id="classSubjectDetailID" name="classSubjectDetailID" type="hidden" value="{{ $ClassSubjectDetail->id }}">    
                                                            {{--  <span class="input-group-btn">
                                                                    <button class="btn btn-sm bg-green btn-flat btn--save-grade" data-grading="fourth" {{ $data->fou_g_status ? "disabled='disabled'" : '' }} title="Save grade and finalize"><i class="fa fa-check"></i> Save</button>
                                                                </span>  --}}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="text-red final-ratings_{{ $data->student_enrolled_subject_id }}">
                                                                <strong>
                                                                        <center>
                                                                            <?php
                                                                                $g_ctr = 0;
                                                                                $g_ctr += $data->fir_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->sec_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->thi_g > 0 ? 1 : 0;
                                                                                $g_ctr += $data->fou_g > 0 ? 1 : 0;
                                                                            ?>
                                                                            {{ ($g_ctr ? round(($data->fir_g + $data->sec_g + $data->thi_g + $data->fou_g) / $g_ctr) : 0)  }}
                                                                        </center>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endif
                                    {{--  @endif  --}}

                                </tbody>
                            </table>
                        @endif