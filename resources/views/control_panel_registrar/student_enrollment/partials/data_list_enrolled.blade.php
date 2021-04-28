                       

                          
                           
                           @if($ClassDetail->grade_level == 11 || $ClassDetail->grade_level == 12)                   
                                <div class="pull-right">
                                    <button type="button" style="margin-right:2px" class="btn btn-danger js-btn_re_enroll_all_student" aria-expanded="true">
                                        Re-Enroll All (2nd Semester)
                                    </button>
                                    {{ $Enrollment ? $Enrollment->links() : '' }}
                                </div>

                                <table class="table no-margin">
                                    <thead>
                                        <tr>
                                            <th>Student Number</th>
                                            <th>Student Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($Enrollment)
                                            @foreach ($Enrollment as $key => $data)
                                                <tr>
                                                    <td> {{ $key + 1 }}.</td>
                                                    <td>{{ $data->username }}</td>
                                                    <td>{{ $data->fullname }}</td>
                                                    <td>
                                                        <div class="input-group-btn pull-left text-left">
                                                            @if($ClassDetail->grade_level == 11 || $ClassDetail->grade_level == 12)
                                                                <button type="button" style="margin-right:2px" class="btn btn-danger js-btn_cancel_enroll_student" data-id="{{ $data->enrollment_id }}" aria-expanded="true">
                                                                    Cancel Enroll
                                                                </button>
                                                                <button type="button" style="margin-right:2px" class="btn btn-danger js-btn_re_enroll_student" data-id="{{ $data->enrollment_id }}" aria-expanded="true">
                                                                    Re-Enroll
                                                                </button>
                                                            @else
                                                            
                                                                <button type="button" style="margin-right:2px" class="btn btn-danger js-btn_cancel_enroll_student" data-id="{{ $data->enrollment_id }}" aria-expanded="true">
                                                                    Cancel Enroll
                                                                </button>
    
                                                                <button type="button" style="margin-right:2px" class="btn btn-danger js-btn_re_enroll_student" data-id="{{ $data->enrollment_id }}" aria-expanded="true">
                                                                    Re-Enroll
                                                                </button>
                                                            @endif
                                                                <!-- {{--  <span class="fa fa-caret-down"></span></button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#" class="js-btn_update" data-id="{{ $data->id }}">Edit</a></li>
                                                                <li><a href="#" class="js-btn_manage_subjects" data-id="{{ $data->id }}">Manage Subjects</a></li>
                                                                <li><a href="#" class="js-btn_deactivate" data-id="{{ $data->id }}">Deactivate</a></li>
                                                            </ul>  --}} -->
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>

                            @else
                                <div class="pull-right">
                                    <button type="button" style="margin-right:2px" class="btn btn-danger js-btn_re_enroll_all_student" aria-expanded="true">
                                        Re-Enroll All
                                    </button>
                                    {{ $Enrollment ? $Enrollment->links() : '' }}
                                </div> 

                                <table class="table no-margin">
                                    <thead>
                                        <tr>
                                            <th>Student Number</th>
                                            <th>Student Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($Enrollment)
                                            @foreach ($Enrollment as  $key => $data)
                                                <tr>
                                                    <td>{{ $key + 1 }}.</td>
                                                    <td>{{ $data->username }}</td>
                                                    <td>{{ $data->fullname }}</td>
                                                    <td>
                                                        <div class="input-group-btn pull-left text-left">
                                                            @if($ClassDetail->grade_level == 11 || $ClassDetail->grade_level == 12)
                                                                <button type="button" style="margin-right:2px" class="btn btn-danger js-btn_cancel_enroll_student" data-id="{{ $data->enrollment_id }}" aria-expanded="true">
                                                                    Cancel Enroll
                                                                </button>
                                                                <button type="button" style="margin-right:2px" class="btn btn-danger js-btn_re_enroll_student" data-id="{{ $data->enrollment_id }}" aria-expanded="true">
                                                                    Re-Enroll
                                                                </button>
                                                            @else
                                                            
                                                                <button type="button" style="margin-right:2px" class="btn btn-danger js-btn_cancel_enroll_student" data-id="{{ $data->enrollment_id }}" aria-expanded="true">
                                                                    Cancel Enroll
                                                                </button>
    
                                                                <button type="button" style="margin-right:2px" class="btn btn-danger js-btn_re_enroll_student" data-id="{{ $data->enrollment_id }}" aria-expanded="true">
                                                                    Re-Enroll
                                                                </button>
                                                            @endif
                                                                <!-- {{--  <span class="fa fa-caret-down"></span></button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#" class="js-btn_update" data-id="{{ $data->id }}">Edit</a></li>
                                                                <li><a href="#" class="js-btn_manage_subjects" data-id="{{ $data->id }}">Manage Subjects</a></li>
                                                                <li><a href="#" class="js-btn_deactivate" data-id="{{ $data->id }}">Deactivate</a></li>
                                                            </ul>  --}} -->
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>

                            @endif
                             

                            
               