                        <h4>Subject : <span class="text-red"><i>{{ $ClassSubjectDetail->subject }}</i></span> Time : <span class="text-red"><i>{{ strftime('%r',strtotime($ClassSubjectDetail->class_time_from)) . ' - ' . strftime('%r',strtotime($ClassSubjectDetail->class_time_to)) }}</i></span> Days : <span class="text-red"><i>{{ $ClassSubjectDetail->class_days }}</i></span></h4>
                        <h4>Grade & Section : <span class="text-red"><i>{{ $ClassSubjectDetail->grade_level . ' ' .$ClassSubjectDetail->section }}</i></span></h4>
                        <div class="pull-right">
                            {{ $Enrollment ? $Enrollment->links() : '' }}
                        </div>
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    {{--  <th>Subject ID</th>  --}}
                                    <th>First Grading</th>
                                    <th>Second Grading</th>
                                    <th>Third Grading</th>
                                    <th>Fourth Grading</th>
                                    <th>Final Grading</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($Enrollment)
                                    @foreach ($Enrollment as $key => $data)
                                        <tr data-student_enrolled_subject_id="{{ $data->student_enrolled_subject_id }}" data-student_id="{{ $data->id }}" data-enrollment_id="{{ $data->enrollment_id }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $data->student_name }}</td>
                                            {{--  <td>{{ $data->student_enrolled_subject_id }}</td>  --}}
                                            <td>
                                                <span class="{{ $data->fir_g >= 75 ? 'text-green' : 'text-red'}}">
                                                    <strong>
                                                        {{ $data->fir_g  }}
                                                    </strong>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="{{ $data->sec_g >= 75 ? 'text-green' : 'text-red'}}">
                                                    <strong>
                                                        {{ $data->sec_g  }}
                                                    </strong>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="{{ $data->thi_g >= 75 ? 'text-green' : 'text-red'}}">
                                                    <strong>
                                                        {{ $data->thi_g  }}
                                                    </strong>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="{{ $data->fou_g >= 75 ? 'text-green' : 'text-red'}}">
                                                    <strong>
                                                        {{ $data->fou_g  }}
                                                    </strong>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-red">
                                                    <strong>
                                                        {{ (($data->fir_g + $data->sec_g + $data->thi_g + $data->fou_g) / 4)  }}
                                                    </strong>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>