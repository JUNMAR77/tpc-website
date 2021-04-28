<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="width: 95%;">
        <div class="modal-content">
            <form id="js-form_attendance">
                {{ csrf_field() }}
                <input type="hidden" name="c" value="{{ encrypt($class_id) }}" />
                <input type="hidden" name="enr" value="{{ encrypt($e_id) }}" />
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        Manage Attendance
                    </h4>
                </div>
                <div class="modal-body">                    
                    <table class="table">
                        <tr>
                            <th>
                                
                            </th>
                                @foreach ($student_attendance['table_header'] as $data)
                                        <th>{{ $data['key'] }}</th>
                                {{--  {{ json_encode($data) }}  --}}
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->