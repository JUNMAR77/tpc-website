                        

                        <h4>Subject : <span class="text-red"><i>{{ $ClassSubjectDetail->subject }}</i></span> 
                        {{--  Time : <span class="text-red"><i>{{ strftime('%r',strtotime($ClassSubjectDetail->class_time_from)) . ' - ' . strftime('%r',strtotime($ClassSubjectDetail->class_time_to)) }}</i></span> Days : <span class="text-red"><i>{{ $ClassSubjectDetail->class_days }}</i></span>  --}}
                        
                        </h4>
                        <h4>Grade & Section : <span class="text-red"><i>{{ $ClassSubjectDetail->grade_level . ' ' .$ClassSubjectDetail->section }}</i></span></h4>
                        <div class="pull-right">
                            {{ $Enrollment ? $Enrollment->links() : '' }}
                        </div>
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($Enrollment)
                                    @foreach ($Enrollment as $key => $data)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $data->student_name }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>