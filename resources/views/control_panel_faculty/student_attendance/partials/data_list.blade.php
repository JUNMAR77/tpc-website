
        
        @if($Semester)
        
        <button class="btn btn-flat btn-danger pull-right" id="js-btn_print" data-id=""><i class="fa fa-file-pdf"></i> Print</button>
        
            @if($Semester->grade_level == '11' || $Semester->grade_level == '12')

                <table class="table no-margin table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th colspan="13" style="text-align:left">Student Name</th>        
                                                            
                                
                            </tr>
                        </thead>
                        <tbody>      
                                                    
                            <tr>
                                <td colspan="16">
                                    <b>Male</b> 
                                </td>
                            </tr>

                            @foreach ($Senior_firstsem_m as $key => $data1) 
                            <tr>
                                <td>{{ $key + 1 }}.</td>
                                <td>
                                    <b style="font-size: 15px">
                                        {{ $data1->student_name }}
                                    </b>

                                    <br/>
                                    <br/>
                                    {{-- {{ $data1->attendance }}  --}}
                                    
                                    @if($data1->attendance_first=="")

                                    @else
                                    <form id = "js-attendance_senior_firstsem">
                                        {{-- <form action="{{ route('faculty.save-class-attendance') }}" method="POST" novalidate="novalidate"> --}}
                                            {{ csrf_field() }}
                                            
                                            {{-- {{ $data1->e_id }}
                                            {{ $data1->c_id }} --}}
                                            <input type="hidden" id="enroll_id" name="enroll_id" value="{{  $data1->e_id }}" />
                                            <input type="hidden" id="class_id" name="class_id" value="{{ encrypt($data1->c_id) }}" />
                                            <table id="mytable" class="table">
                                                <tr>
                                                                                                    
                                                    <?php
                                                    $student_attendance = [];
                                                    $table_header = [
                                                            ['key' => 'Jun',],
                                                            ['key' => 'Jul',],
                                                            ['key' => 'Aug',],
                                                            ['key' => 'Sep',],
                                                            ['key' => 'Oct',],
                                                            
                                                            ['key' => 'total',],
                                                        ];
                                                        
                                                        $attendance_data = json_decode(json_encode([
                                                            'days_of_school' => [
                                                                0, 0, 0, 0, 0, 
                                                            ],
                                                            'days_present' => [
                                                                0, 0, 0, 0, 0,
                                                            ],
                                                            'days_absent' => [
                                                                0, 0, 0, 0, 0,
                                                            ],
                                                            'times_tardy' => [
                                                                0, 0, 0, 0, 0,
                                                            ]
                                                        ]));
                                                        
                                                        
                                                        $attendance_data = json_decode($data1->attendance_first);

                                                        
                                                    //    $attendance_data;

                                                    //     if ($EnrollmentMale[0]->attendance) {
                                                    //         $attendance_data = json_decode($EnrollmentMale[0]->attendance);
                                                    //     }    

                                                        $student_attendance = [
                                                            // 'student_name'      => $EnrollmentMale[0]->student_name,
                                                            'attendance_data'   => $attendance_data,
                                                            'table_header'      => $table_header,
                                                            'days_of_school_total' => array_sum($attendance_data->days_of_school),
                                                            'days_present_total' => array_sum($attendance_data->days_present),
                                                            'days_absent_total' => array_sum($attendance_data->days_absent),
                                                            'times_tardy_total' => array_sum($attendance_data->times_tardy),
                                                        ];

                                                        
                                                        ?>
                                                        
                                                        
                                                    

                                                        <th>
                                                                <i style="font-size: 16px; color: red">First Semester</i>
                                                        </th>
                                                            @foreach ($student_attendance['table_header'] as $data)
                                                                    <th>{{ $data['key'] }}</th> 
                                                            {{-- / {{ json_encode($data) }}  --}}
                                                            @endforeach
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Days of School
                                                        </th>
                                                        @foreach ($student_attendance['attendance_data']->days_of_school as $key => $data)
                                                            <th style="width:">
                                                                <input type="text" class="form-control days_of_school"  min="0" max="30" id="days_of_school{{ $key }}" name="days_of_school[]"  value="{{ $data }}" />
                                                            </th>                                                                        
                                                        @endforeach
                                                        <th class="days_of_school_total">
                                                            {{ $student_attendance['days_of_school_total'] }}
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Days Present
                                                        </th>
                                                        @foreach ($student_attendance['attendance_data']->days_present as $key => $data)
                                                            <th style="width:15%">
                                                                <input type="text" class="form-control days_present" min="0" max="30" id="days_present{{ $key }}" name="days_present[]" value="{{ $data }}" />    
                                                            </th>
                                                        @endforeach
                                                        <th class="days_present_total">
                                                            {{ $student_attendance['days_present_total'] }}
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Days Absent
                                                        </th>
                                                        @foreach ($student_attendance['attendance_data']->days_absent as $key => $data)
                                                            <th style="width:7%">
                                                                <input type="text" class="form-control days_absent" min="0" max="30" id="days_present{{ $key }}" name="days_absent[]" value="{{ $data }}" />    
                                                            </th>
                                                        @endforeach
                                                        <th class="days_absent_total">
                                                            {{ $student_attendance['days_absent_total'] }}
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Times Tardy
                                                        </th>
                                                        @foreach ($student_attendance['attendance_data']->times_tardy as $key => $data)
                                                            <th style="width:7%">
                                                                <input type="text" class="form-control times_tardy" min="0" max="30" id="days_present{{ $key }}" name="times_tardy[]" value="{{ $data }}" />    
                                                            </th>
                                                        @endforeach
                                                        <th class="times_tardy_total">
                                                            {{ $student_attendance['times_tardy_total'] }}
                                                        </th>
                                                    </tr>
                                                </table>
                            
                                            
                                                {{-- <button type="button" class="btn btn-default btn-flat pull-right" data-dismiss="modal">Close</button> --}}
                                                <button type="submit" id="btn_save1" class="btn btn-primary btn-flat pull-right">Save</button>
                                                {{-- <input type="button" id="btn_save" class="btn btn-primary pull-right" value="SAVE"> --}}
                                        </form>
                                    
                                    
                                        <form id = "js-attendance_senior_secondsem">
                                                {{-- <form action="{{ route('faculty.save-class-attendance') }}" method="POST" novalidate="novalidate"> --}}
                                                    {{ csrf_field() }}
                                                    
                                                    {{-- {{ $data1->e_id }}
                                                    {{ $data1->c_id }} --}}
                                                    <input type="hidden" id="enroll_id" name="enroll_id" value="{{  $data1->e_id }}" />
                                                    <input type="hidden" id="class_id" name="class_id" value="{{ encrypt($data1->c_id) }}" />
                                                    <table id="mytable" class="table">
                                                        <tr>
                                                                                                            
                                                            <?php
                                                            $student_attendance = [];
                                                            $table_header = [
                                                                    ['key' => 'Nov',],
                                                                    ['key' => 'Dec',],
                                                                    ['key' => 'Jan',],
                                                                    ['key' => 'Feb',],
                                                                    ['key' => 'Mar',],
                                                                    ['key' => 'Apr',],
                                                                    
                                                                    ['key' => 'total',],
                                                                ];
                                                                
                                                                $attendance_data = json_decode(json_encode([
                                                                    'days_of_school' => [
                                                                        0, 0, 0, 0, 0, 
                                                                    ],
                                                                    'days_present' => [
                                                                        0, 0, 0, 0, 0,
                                                                    ],
                                                                    'days_absent' => [
                                                                        0, 0, 0, 0, 0,
                                                                    ],
                                                                    'times_tardy' => [
                                                                        0, 0, 0, 0, 0,
                                                                    ]
                                                                ]));
                                                                
                                                                
                                                                $attendance_data = json_decode($data1->attendance_second);
            
                                                                
                                                            //    $attendance_data;
            
                                                            //     if ($EnrollmentMale[0]->attendance) {
                                                            //         $attendance_data = json_decode($EnrollmentMale[0]->attendance);
                                                            //     }    
            
                                                                $student_attendance = [
                                                                    // 'student_name'      => $EnrollmentMale[0]->student_name,
                                                                    'attendance_data'   => $attendance_data,
                                                                    'table_header'      => $table_header,
                                                                    'days_of_school_total' => array_sum($attendance_data->days_of_school),
                                                                    'days_present_total' => array_sum($attendance_data->days_present),
                                                                    'days_absent_total' => array_sum($attendance_data->days_absent),
                                                                    'times_tardy_total' => array_sum($attendance_data->times_tardy),
                                                                ];
            
                                                                
                                                                ?>
                                                                
                                                                
                                                            
            
                                                                <th style="width: 19%">
                                                                    <i style="font-size: 16px; color: red">Second Semester</i>
                                                                </th>
                                                                    @foreach ($student_attendance['table_header'] as $data)
                                                                            <th>{{ $data['key'] }}</th> 
                                                                    {{-- / {{ json_encode($data) }}  --}}
                                                                    @endforeach
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Days of School
                                                                </th>
                                                                @foreach ($student_attendance['attendance_data']->days_of_school as $key => $data)
                                                                    <th style="width:">
                                                                        <input type="text" class="form-control days_of_school"  min="0" max="30" id="days_of_school{{ $key }}" name="days_of_school[]"  value="{{ $data }}" />
                                                                    </th>                                                                        
                                                                @endforeach
                                                                <th class="days_of_school_total">
                                                                    {{ $student_attendance['days_of_school_total'] }}
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Days Present
                                                                </th>
                                                                @foreach ($student_attendance['attendance_data']->days_present as $key => $data)
                                                                    <th style="width:12.5%">
                                                                        <input type="text" class="form-control days_present" min="0" max="30" id="days_present{{ $key }}" name="days_present[]" value="{{ $data }}" />    
                                                                    </th>
                                                                @endforeach
                                                                <th class="days_present_total">
                                                                    {{ $student_attendance['days_present_total'] }}
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Days Absent
                                                                </th>
                                                                @foreach ($student_attendance['attendance_data']->days_absent as $key => $data)
                                                                    <th style="width:7%">
                                                                        <input type="text" class="form-control days_absent" min="0" max="30" id="days_present{{ $key }}" name="days_absent[]" value="{{ $data }}" />    
                                                                    </th>
                                                                @endforeach
                                                                <th class="days_absent_total">
                                                                    {{ $student_attendance['days_absent_total'] }}
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Times Tardy
                                                                </th>
                                                                @foreach ($student_attendance['attendance_data']->times_tardy as $key => $data)
                                                                    <th style="width:7%">
                                                                        <input type="text" class="form-control times_tardy" min="0" max="30" id="days_present{{ $key }}" name="times_tardy[]" value="{{ $data }}" />    
                                                                    </th>
                                                                @endforeach
                                                                <th class="times_tardy_total">
                                                                    {{ $student_attendance['times_tardy_total'] }}
                                                                </th>
                                                            </tr>
                                                        </table>
                                    
                                                    
                                                        {{-- <button type="button" class="btn btn-default btn-flat pull-right" data-dismiss="modal">Close</button> --}}
                                                        <button type="submit" id="btn_save1" class="btn btn-primary btn-flat pull-right">Save</button>
                                                        {{-- <input type="button" id="btn_save" class="btn btn-primary pull-right" value="SAVE"> --}}
                                                </form>
                                @endif
                                </td>
                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="16">
                                    <b>Female</b>
                                </td>
                            </tr>

                            @foreach ($Senior_firstsem_f as $key => $data1) 
                            <tr>
                                <td>{{ $key + 1 }}.</td>
                                <td>
                                    <b style="font-size: 15px">
                                        {{ $data1->student_name }}
                                    </b>

                                    <br/>
                                    <br/>
                                    {{-- {{ $data1->attendance }}  --}}
                                    {{-- <form action="{{ route('faculty.save-class-attendance') }}" method="POST" novalidate="novalidate"> --}}
                                    @if($data1->attendance_first=="")

                                    @else
                                    <form id = "js-attendance_senior_firstsem">
                                        {{ csrf_field() }}
                                            
                                            {{-- {{ $data1->e_id }}
                                            {{ $data1->c_id }} --}}
                                            <input type="hidden" id="enroll_id" name="enroll_id" value="{{  $data1->e_id }}" />
                                            <input type="hidden" id="class_id" name="class_id" value="{{ encrypt($data1->c_id) }}" />
                                            <table class="table">
                                                <tr>
                                                                                                    
                                                        <?php
                                                        $student_attendance = [];
                                                        $table_header = [
                                                                ['key' => 'Jun',],
                                                                ['key' => 'Jul',],
                                                                ['key' => 'Aug',],
                                                                ['key' => 'Sep',],
                                                                ['key' => 'Oct',],
                                                                
                                                                ['key' => 'total',],
                                                            ];
                                                            
                                                            $attendance_data = json_decode(json_encode([
                                                                'days_of_school' => [
                                                                    0, 0, 0, 0, 0, 
                                                                ],
                                                                'days_present' => [
                                                                    0, 0, 0, 0, 0,
                                                                ],
                                                                'days_absent' => [
                                                                    0, 0, 0, 0, 0,
                                                                ],
                                                                'times_tardy' => [
                                                                    0, 0, 0, 0, 0,
                                                                ]
                                                            ]));
                                                            
                                                            
                                                            $attendance_data = json_decode($data1->attendance_first);
                                                        //    $attendance_data;
        
                                                        //     if ($EnrollmentMale[0]->attendance) {
                                                        //         $attendance_data = json_decode($EnrollmentMale[0]->attendance);
                                                        //     }    
        
                                                            $student_attendance = [
                                                                // 'student_name'      => $EnrollmentMale[0]->student_name,
                                                                'attendance_data'   => $attendance_data,
                                                                'table_header'      => $table_header,
                                                                'days_of_school_total' => array_sum($attendance_data->days_of_school),
                                                                'days_present_total' => array_sum($attendance_data->days_present),
                                                                'days_absent_total' => array_sum($attendance_data->days_absent),
                                                                'times_tardy_total' => array_sum($attendance_data->times_tardy),
                                                            ];
        
                                                            
                                                            ?>
                                                        
                                                        
                                                    

                                                        <th>
                                                                <i style="font-size: 16px; color: red">First Semester</i>
                                                        </th>
                                                            @foreach ($student_attendance['table_header'] as $data)
                                                                    <th>{{ $data['key'] }}</th> 
                                                            {{-- / {{ json_encode($data) }}  --}}
                                                            @endforeach
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Days of School
                                                        </th>
                                                        @foreach ($student_attendance['attendance_data']->days_of_school as $key => $data)
                                                            <th style="width:15.%">
                                                                <input type="text" class="form-control days_of_school"  min="0" max="30" id="days_of_school{{ $key }}" name="days_of_school[]"  value="{{ $data }}" />
                                                            </th>                                                                        
                                                        @endforeach
                                                        <th class="days_of_school_total">
                                                            {{ $student_attendance['days_of_school_total'] }}
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Days Present
                                                        </th>
                                                        @foreach ($student_attendance['attendance_data']->days_present as $key => $data)
                                                            <th style="width:15%">
                                                                <input type="text" class="form-control days_present" min="0" max="30" id="days_present{{ $key }}" name="days_present[]" value="{{ $data }}" />    
                                                            </th>
                                                        @endforeach
                                                        <th class="days_present_total">
                                                            {{ $student_attendance['days_present_total'] }}
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Days Absent
                                                        </th>
                                                        @foreach ($student_attendance['attendance_data']->days_absent as $key => $data)
                                                            <th style="width:7%">
                                                                <input type="text" class="form-control days_absent" min="0" max="30" id="days_present{{ $key }}" name="days_absent[]" value="{{ $data }}" />    
                                                            </th>
                                                        @endforeach
                                                        <th class="days_absent_total">
                                                            {{ $student_attendance['days_absent_total'] }}
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Times Tardy
                                                        </th>
                                                        @foreach ($student_attendance['attendance_data']->times_tardy as $key => $data)
                                                            <th style="width:7%">
                                                                <input type="text" class="form-control times_tardy" min="0" max="30" id="days_present{{ $key }}" name="times_tardy[]" value="{{ $data }}" />    
                                                            </th>
                                                        @endforeach
                                                        <th class="times_tardy_total">
                                                            {{ $student_attendance['times_tardy_total'] }}
                                                        </th>
                                                    </tr>
                                                </table>
                            
                                            
                                                {{-- <button type="button" class="btn btn-default btn-flat pull-right" data-dismiss="modal">Close</button> --}}
                                                <button type="submit" id="btn_save1" class="btn btn-primary btn-flat pull-right">Save</button>
                                                {{-- <input type="button" id="btn_save" class="btn btn-primary pull-right" value="SAVE"> --}}
                                        </form>

                                        <form id = "js-attendance_senior_secondsem">
                                                {{-- <form action="{{ route('faculty.save-class-attendance') }}" method="POST" novalidate="novalidate"> --}}
                                                    {{ csrf_field() }}
                                                    
                                                    {{-- {{ $data1->e_id }}
                                                    {{ $data1->c_id }} --}}
                                                    <input type="hidden" id="enroll_id" name="enroll_id" value="{{  $data1->e_id }}" />
                                                    <input type="hidden" id="class_id" name="class_id" value="{{ encrypt($data1->c_id) }}" />
                                                    <table id="mytable" class="table">
                                                        <tr>
                                                                                                            
                                                            <?php
                                                            $student_attendance = [];
                                                            $table_header = [
                                                                ['key' => 'Nov',],
                                                                    ['key' => 'Dec',],
                                                                    ['key' => 'Jan',],
                                                                    ['key' => 'Feb',],
                                                                    ['key' => 'Mar',],
                                                                    ['key' => 'Apr',],
                                                                    
                                                                    ['key' => 'total',],
                                                                ];
                                                                
                                                                $attendance_data = json_decode(json_encode([
                                                                    'days_of_school' => [
                                                                        0, 0, 0, 0, 0, 
                                                                    ],
                                                                    'days_present' => [
                                                                        0, 0, 0, 0, 0,
                                                                    ],
                                                                    'days_absent' => [
                                                                        0, 0, 0, 0, 0,
                                                                    ],
                                                                    'times_tardy' => [
                                                                        0, 0, 0, 0, 0,
                                                                    ]
                                                                ]));
                                                                
                                                                
                                                                $attendance_data = json_decode($data1->attendance_second);
            
                                                                
                                                            //    $attendance_data;
            
                                                            //     if ($EnrollmentMale[0]->attendance) {
                                                            //         $attendance_data = json_decode($EnrollmentMale[0]->attendance);
                                                            //     }    
            
                                                                $student_attendance = [
                                                                    // 'student_name'      => $EnrollmentMale[0]->student_name,
                                                                    'attendance_data'   => $attendance_data,
                                                                    'table_header'      => $table_header,
                                                                    'days_of_school_total' => array_sum($attendance_data->days_of_school),
                                                                    'days_present_total' => array_sum($attendance_data->days_present),
                                                                    'days_absent_total' => array_sum($attendance_data->days_absent),
                                                                    'times_tardy_total' => array_sum($attendance_data->times_tardy),
                                                                ];
            
                                                                
                                                            ?>
                                                                
                                                                
                                                            
            
                                                                <th style="width: 19%">
                                                                    <i style="font-size: 16px; color: red">Second Semester</i>
                                                                </th>
                                                                    @foreach ($student_attendance['table_header'] as $data)
                                                                            <th>{{ $data['key'] }}</th> 
                                                                    {{-- / {{ json_encode($data) }}  --}}
                                                                    @endforeach
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Days of School
                                                                </th>
                                                                @foreach ($student_attendance['attendance_data']->days_of_school as $key => $data)
                                                                    <th style="width:">
                                                                        <input type="text" class="form-control days_of_school"  min="0" max="30" id="days_of_school{{ $key }}" name="days_of_school[]"  value="{{ $data }}" />
                                                                    </th>                                                                        
                                                                @endforeach
                                                                <th class="days_of_school_total">
                                                                    {{ $student_attendance['days_of_school_total'] }}
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Days Present
                                                                </th>
                                                                @foreach ($student_attendance['attendance_data']->days_present as $key => $data)
                                                                    <th style="width:12.5%">
                                                                        <input type="text" class="form-control days_present" min="0" max="30" id="days_present{{ $key }}" name="days_present[]" value="{{ $data }}" />    
                                                                    </th>
                                                                @endforeach
                                                                <th class="days_present_total">
                                                                    {{ $student_attendance['days_present_total'] }}
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Days Absent
                                                                </th>
                                                                @foreach ($student_attendance['attendance_data']->days_absent as $key => $data)
                                                                    <th style="width:7%">
                                                                        <input type="text" class="form-control days_absent" min="0" max="30" id="days_present{{ $key }}" name="days_absent[]" value="{{ $data }}" />    
                                                                    </th>
                                                                @endforeach
                                                                <th class="days_absent_total">
                                                                    {{ $student_attendance['days_absent_total'] }}
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Times Tardy
                                                                </th>
                                                                @foreach ($student_attendance['attendance_data']->times_tardy as $key => $data)
                                                                    <th style="width:7%">
                                                                        <input type="text" class="form-control times_tardy" min="0" max="30" id="days_present{{ $key }}" name="times_tardy[]" value="{{ $data }}" />    
                                                                    </th>
                                                                @endforeach
                                                                <th class="times_tardy_total">
                                                                    {{ $student_attendance['times_tardy_total'] }}
                                                                </th>
                                                            </tr>
                                                        </table>
                                    
                                                    
                                                        {{-- <button type="button" class="btn btn-default btn-flat pull-right" data-dismiss="modal">Close</button> --}}
                                                        <button type="submit" id="btn_save1" class="btn btn-primary btn-flat pull-right">Save</button>
                                                        {{-- <input type="button" id="btn_save" class="btn btn-primary pull-right" value="SAVE"> --}}
                                                </form>
                                    @endif
                                
                                </td>
                            </tr>
                            @endforeach
                            
                </table>
                

            @else        
            
                <table class="table no-margin table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th colspan="13" style="text-align:left">Student Name</th>        
                                                            
                                
                            </tr>
                        </thead>
                        <tbody>      
                                                    
                            <tr>
                                <td colspan="16">
                                    <b>Male</b> 
                                </td>
                            </tr>


                            @foreach ($attendance_male as $key => $data1) 
                            <tr>
                                <td>{{ $key + 1 }}.</td>
                                <td>
                                    <b style="font-size: 15px">
                                        {{ $data1->student_name }}
                                    </b>

                                    <br/>
                                    <br/>
                                    {{-- {{ $data1->attendance }}  --}}
                                    
                                    @if($data1->attendance=="")

                                    @else
                                    <form id = "js-attendance">
                                        {{-- <form action="{{ route('faculty.save-class-attendance') }}" method="POST" novalidate="novalidate"> --}}
                                            {{ csrf_field() }}
                                            
                                            {{-- {{ $data1->e_id }}
                                            {{ $data1->c_id }} --}}
                                            <input type="hidden" id="enroll_id" name="enroll_id" value="{{  $data1->e_id }}" />
                                            <input type="hidden" id="class_id" name="class_id" value="{{ encrypt($data1->c_id) }}" />
                                            <table id="mytable" class="table">
                                                <tr>
                                                                                                    
                                                    <?php
                                                    $student_attendance = [];
                                                    $table_header = [
                                                            ['key' => 'Jun',],
                                                            ['key' => 'Jul',],
                                                            ['key' => 'Aug',],
                                                            ['key' => 'Sep',],
                                                            ['key' => 'Oct',],
                                                            ['key' => 'Nov',],
                                                            ['key' => 'Dec',],
                                                            ['key' => 'Jan',],
                                                            ['key' => 'Feb',],
                                                            ['key' => 'Mar',],
                                                            ['key' => 'Apr',],
                                                            ['key' => 'total',],
                                                        ];
                                                        
                                                        $attendance_data = json_decode(json_encode([
                                                            'days_of_school' => [
                                                                0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                                                            ],
                                                            'days_present' => [
                                                                0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                                                            ],
                                                            'days_absent' => [
                                                                0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                                                            ],
                                                            'times_tardy' => [
                                                                0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                                                            ]
                                                        ]));
                                                        
                                                        
                                                        $attendance_data = json_decode($data1->attendance);
                                                    //    $attendance_data;

                                                    //     if ($EnrollmentMale[0]->attendance) {
                                                    //         $attendance_data = json_decode($EnrollmentMale[0]->attendance);
                                                    //     }    

                                                        $student_attendance = [
                                                            // 'student_name'      => $EnrollmentMale[0]->student_name,
                                                            'attendance_data'   => $attendance_data,
                                                            'table_header'      => $table_header,
                                                            'days_of_school_total' => array_sum($attendance_data->days_of_school),
                                                            'days_present_total' => array_sum($attendance_data->days_present),
                                                            'days_absent_total' => array_sum($attendance_data->days_absent),
                                                            'times_tardy_total' => array_sum($attendance_data->times_tardy),
                                                        ];

                                                        
                                                        ?>
                                                        
                                                        
                                                    

                                                        <th>
                                                            TITLE
                                                        </th>
                                                            @foreach ($student_attendance['table_header'] as $data)
                                                                    <th>{{ $data['key'] }}</th> 
                                                            {{-- / {{ json_encode($data) }}  --}}
                                                            @endforeach
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Days of School
                                                        </th>
                                                        @foreach ($student_attendance['attendance_data']->days_of_school as $key => $data)
                                                            <th style="width:7%">
                                                                <input type="text" class="form-control days_of_school"  min="0" max="30" id="days_of_school{{ $key }}" name="days_of_school[]"  value="{{ $data }}" />
                                                            </th>                                                                        
                                                        @endforeach
                                                        <th class="days_of_school_total">
                                                            {{ $student_attendance['days_of_school_total'] }}
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Days Present
                                                        </th>
                                                        @foreach ($student_attendance['attendance_data']->days_present as $key => $data)
                                                            <th style="width:7%">
                                                                <input type="text" class="form-control days_present" min="0" max="30" id="days_present{{ $key }}" name="days_present[]" value="{{ $data }}" />    
                                                            </th>
                                                        @endforeach
                                                        <th class="days_present_total">
                                                            {{ $student_attendance['days_present_total'] }}
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Days Absent
                                                        </th>
                                                        @foreach ($student_attendance['attendance_data']->days_absent as $key => $data)
                                                            <th style="width:7%">
                                                                <input type="text" class="form-control days_absent" min="0" max="30" id="days_present{{ $key }}" name="days_absent[]" value="{{ $data }}" />    
                                                            </th>
                                                        @endforeach
                                                        <th class="days_absent_total">
                                                            {{ $student_attendance['days_absent_total'] }}
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Times Tardy
                                                        </th>
                                                        @foreach ($student_attendance['attendance_data']->times_tardy as $key => $data)
                                                            <th style="width:7%">
                                                                <input type="text" class="form-control times_tardy" min="0" max="30" id="days_present{{ $key }}" name="times_tardy[]" value="{{ $data }}" />    
                                                            </th>
                                                        @endforeach
                                                        <th class="times_tardy_total">
                                                            {{ $student_attendance['times_tardy_total'] }}
                                                        </th>
                                                    </tr>
                                                </table>
                            
                                            
                                                {{-- <button type="button" class="btn btn-default btn-flat pull-right" data-dismiss="modal">Close</button> --}}
                                                <button type="submit" id="btn_save1" class="btn btn-primary btn-flat pull-right">Save</button>
                                                {{-- <input type="button" id="btn_save" class="btn btn-primary pull-right" value="SAVE"> --}}
                                        </form>
                                @endif
                                </td>
                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="16">
                                    <b>Female</b>
                                </td>
                            </tr>

                            @foreach ($attendance_female as $key => $data1) 
                            <tr>
                                <td>{{ $key + 1 }}.</td>
                                <td>
                                    <b style="font-size: 15px">
                                        {{ $data1->student_name }}
                                    </b>

                                    <br/>
                                    <br/>
                                    {{-- {{ $data1->attendance }}  --}}
                                    {{-- <form action="{{ route('faculty.save-class-attendance') }}" method="POST" novalidate="novalidate"> --}}
                                    @if($data1->attendance=="")

                                    @else
                                    <form id = "js-attendance">
                                        {{ csrf_field() }}
                                            
                                            {{-- {{ $data1->e_id }}
                                            {{ $data1->c_id }} --}}
                                            <input type="hidden" id="enroll_id" name="enroll_id" value="{{  $data1->e_id }}" />
                                            <input type="hidden" id="class_id" name="class_id" value="{{ encrypt($data1->c_id) }}" />
                                            <table class="table">
                                                <tr>
                                                                                                    
                                                    <?php
                                                    $student_attendance = [];
                                                    $table_header = [
                                                            ['key' => 'Jun',],
                                                            ['key' => 'Jul',],
                                                            ['key' => 'Aug',],
                                                            ['key' => 'Sep',],
                                                            ['key' => 'Oct',],
                                                            ['key' => 'Nov',],
                                                            ['key' => 'Dec',],
                                                            ['key' => 'Jan',],
                                                            ['key' => 'Feb',],
                                                            ['key' => 'Mar',],
                                                            ['key' => 'Apr',],
                                                            ['key' => 'total',],
                                                        ];
                                                        
                                                        $attendance_data = json_decode(json_encode([
                                                            'days_of_school' => [
                                                                0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                                                            ],
                                                            'days_present' => [
                                                                0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                                                            ],
                                                            'days_absent' => [
                                                                0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                                                            ],
                                                            'times_tardy' => [
                                                                0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                                                            ]
                                                        ]));

                                                        if ($data1->attendance) {
                                                            $attendance_data = json_decode($data1->attendance);
                                                        }
                                                        
                                                        
                                                        
                                                    //    $attendance_data;

                                                    //     if ($EnrollmentMale[0]->attendance) {
                                                    //         $attendance_data = json_decode($EnrollmentMale[0]->attendance);
                                                    //     }    

                                                        $student_attendance = [
                                                            // 'student_name'      => $EnrollmentMale[0]->student_name,
                                                            'attendance_data'   => $attendance_data,
                                                            'table_header'      => $table_header,
                                                            'days_of_school_total' => array_sum($attendance_data->days_of_school),
                                                            'days_present_total' => array_sum($attendance_data->days_present),
                                                            'days_absent_total' => array_sum($attendance_data->days_absent),
                                                            'times_tardy_total' => array_sum($attendance_data->times_tardy),
                                                        ];

                                                        
                                                        ?>
                                                        
                                                        
                                                    

                                                        <th>
                                                            TITLE
                                                        </th>
                                                            @foreach ($student_attendance['table_header'] as $data)
                                                                    <th>{{ $data['key'] }}</th> 
                                                            {{-- / {{ json_encode($data) }}  --}}
                                                            @endforeach
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Days of School
                                                        </th>
                                                        @foreach ($student_attendance['attendance_data']->days_of_school as $key => $data)
                                                            <th style="width:7%">
                                                                <input type="text" class="form-control days_of_school"  min="0" max="30" id="days_of_school{{ $key }}" name="days_of_school[]"  value="{{ $data }}" />
                                                            </th>                                                                        
                                                        @endforeach
                                                        <th class="days_of_school_total">
                                                            {{ $student_attendance['days_of_school_total'] }}
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Days Present
                                                        </th>
                                                        @foreach ($student_attendance['attendance_data']->days_present as $key => $data)
                                                            <th style="width:7%">
                                                                <input type="text" class="form-control days_present" min="0" max="30" id="days_present{{ $key }}" name="days_present[]" value="{{ $data }}" />    
                                                            </th>
                                                        @endforeach
                                                        <th class="days_present_total">
                                                            {{ $student_attendance['days_present_total'] }}
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Days Absent
                                                        </th>
                                                        @foreach ($student_attendance['attendance_data']->days_absent as $key => $data)
                                                            <th style="width:7%">
                                                                <input type="text" class="form-control days_absent" min="0" max="30" id="days_present{{ $key }}" name="days_absent[]" value="{{ $data }}" />    
                                                            </th>
                                                        @endforeach
                                                        <th class="days_absent_total">
                                                            {{ $student_attendance['days_absent_total'] }}
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Times Tardy
                                                        </th>
                                                        @foreach ($student_attendance['attendance_data']->times_tardy as $key => $data)
                                                            <th style="width:7%">
                                                                <input type="text" class="form-control times_tardy" min="0" max="30" id="days_present{{ $key }}" name="times_tardy[]" value="{{ $data }}" />    
                                                            </th>
                                                        @endforeach
                                                        <th class="times_tardy_total">
                                                            {{ $student_attendance['times_tardy_total'] }}
                                                        </th>
                                                    </tr>
                                                </table>
                            
                                            
                                                {{-- <button type="button" class="btn btn-default btn-flat pull-right" data-dismiss="modal">Close</button> --}}
                                                <button type="submit" id="btn_save1" class="btn btn-primary btn-flat pull-right">Save</button>
                                                {{-- <input type="button" id="btn_save" class="btn btn-primary pull-right" value="SAVE"> --}}
                                        </form>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                                                            
                                
                            
                </table>
            @endif
            {{-- <h3 style=" text-align: center"><i style="color:red;">Sorry, Not Available.</i></h3> --}}
        @else
            <h3 style=" text-align: center"><i style="color:red;">Sorry, Not Available.</i></h3>
        @endif

