<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="js-form_subject_details">
                {{ csrf_field() }}
                @if ($ClassSubjectDetail)
                    <input type="hidden" name="id" value="{{ $ClassSubjectDetail->id }}">
                @endif
                
                <input type="hidden" name="class_details_id" value="{{ $class_details_id }}">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        {{ $ClassSubjectDetail ? 'Edit Class Subject' : 'Add Class Subject' }}
                    </h4>
                </div>
                <div class="modal-body">                    
                        
                       
                    <input type="hidden" name="section_id" value="{{ $ClassDetail->section_id }}">

                    <div class="form-group">
                        <label for="">Faculty</label>
                        <select name="faculty" id="faculty" class="form-control">
                            <option value="">Select faculty</option>
                            @foreach ($FacultyInformation as $data) 
                                <option value="{{ $data->id }}" {{ $ClassSubjectDetail ? $ClassSubjectDetail->faculty_id == $data->id ? 'selected' : '' : '' }}>{{ $data->first_name . ' ' . $data->last_name }}</option>
                            @endforeach
                        </select>
                        <div class="help-block text-red text-center" id="js-faculty">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Subject</label>
                        <select name="subject" id="subject" class="form-control">
                            <option value="">Select subject</option>
                            @foreach ($SubjectDetail as $data) 
                                <option value="{{ $data->id }}" {{ $ClassSubjectDetail ? $ClassSubjectDetail->subject_id == $data->id ? 'selected' : '' : '' }}>{{ $data->subject_code . ' ' . $data->subject }}</option>
                            @endforeach
                        </select>
                        <div class="help-block text-red text-center" id="js-subject">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Order</label>
                        <input name="order" id="order" class="form-control" value="{{ $ClassSubjectDetail ? $ClassSubjectDetail->class_subject_order : '' }}" />
                        <div class="help-block text-red text-center" id="js-order">
                        </div>
                    </div>
                    {{--  <div class="row no-margin">
                        <div class="col-md-6  no-padding">
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                <label>Class Time (<i>from</i>)</label>

                                <div class="input-group">
                                    <input type="text" class="form-control timepicker" name="subject_time_from" value="{{ $ClassSubjectDetail ? strftime('%r',strtotime($ClassSubjectDetail->class_time_from)) : '' }}">

                                    <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                <label>Class Time (<i>to</i>)</label>

                                <div class="input-group">
                                    <input type="text" class="form-control timepicker" name="subject_time_to" value="{{ $ClassSubjectDetail ? strftime('%r',strtotime($ClassSubjectDetail->class_time_to)) : '' }}">

                                    <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>  --}}
                    {{--  <div class="form-group">
                        <label for="">Schedule</label>
                    </div>
                    <div class="checkbox">
                        <label>
                        <input id="check_all_days" type="checkbox" data-checked-all="true"> Check All days
                        </label>
                    </div>
                    <div class="form-inline">
                        <div class="checkbox">
                            <label>
                            <input name="sched_mon" id="sched_mon" class="sched_days" type="checkbox"> Monday
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                            <input name="sched_tue" id="sched_tue" class="sched_days" type="checkbox"> Tuesday
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                            <input name="sched_wed" id="sched_wed" class="sched_days" type="checkbox"> Wednesday
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                            <input name="sched_thu" id="sched_thu" class="sched_days" type="checkbox"> Thursday
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                            <input name="sched_fri" id="sched_fri" class="sched_days" type="checkbox"> Friday
                            </label>
                        </div>
                    </div>  --}}

                    

                    <?php
                        $days = $ClassSubjectDetail ? $ClassSubjectDetail->class_schedule ? explode(';', rtrim($ClassSubjectDetail->class_schedule,";")) : [] : [];
                        $daysObj = [];
                        if ($days) 
                        {
                            foreach($days as $day) 
                            {
                                $day_sched = explode('@', $day);
                                $d = $day_sched[0];
                                $t = explode('-', $day_sched[1]);
                                $daysObj[$d]['from'] = $t[0];
                                $daysObj[$d]['to'] = $t[1];
                            }
                        }
                    ?>
                        
                    <table class="table table-bordered">
                        <tr>
                            <td>Day</td>
                            <td>Time From</td>
                            <td>Time To</td>
                        </tr>
                        <tr>
                            <td>
                            
                                <label for="sched_mon" role="button">
                                    <input name="sched_mon" id="sched_mon" class="sched_days" {{ isset($daysObj[1]) ? $daysObj[1] ? 'checked' : '' : '' }} type="checkbox"> Monday
                                </label>
                            </td>
                            <td>
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" name="subject_time_from_mon" value="{{ isset($daysObj[1]) ? $daysObj[1] ? strftime('%r',strtotime($daysObj[1]['from'])) : '' : '' }}">

                                            <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" name="subject_time_to_mon" value="{{ isset($daysObj[1]) ? $daysObj[1] ? strftime('%r',strtotime($daysObj[1]['to'])) : '' : '' }}">

                                            <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label for="sched_tue" role="button">
                                    <input name="sched_tue" id="sched_tue" class="sched_days" {{ isset($daysObj[2]) ? $daysObj[2] ? 'checked' : '' : '' }} type="checkbox"> Tuesday
                                </label>
                            </td>
                            <td>
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" name="subject_time_from_tue" value="{{ isset($daysObj[2]) ? $daysObj[2] ? strftime('%r',strtotime($daysObj[2]['from'])) : '': '' }}">

                                            <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" name="subject_time_to_tue" value="{{ isset($daysObj[2]) ? $daysObj[2] ? strftime('%r',strtotime($daysObj[2]['to'])) : '': '' }}">

                                            <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="sched_wed" role="button">
                                    <input name="sched_wed" id="sched_wed" class="sched_days" {{ isset($daysObj[3]) ? $daysObj[3] ? 'checked' : '' : '' }} type="checkbox"> Wednesday
                                </label>
                            </td>
                            <td>
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" name="subject_time_from_wed" value="{{ isset($daysObj[3]) ? $daysObj[3] ? strftime('%r',strtotime($daysObj[3]['from'])) : '' : '' }}">

                                            <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" name="subject_time_to_wed" value="{{ isset($daysObj[3]) ? $daysObj[3] ? strftime('%r',strtotime($daysObj[3]['to'])) : '' : '' }}">

                                            <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="sched_thur" role="button">
                                    <input name="sched_thur" id="sched_thur" class="sched_days" {{ isset($daysObj[4]) ? $daysObj[4] ? 'checked' : '' : '' }} type="checkbox"> Thursday
                                </label>
                            </td>
                            <td>
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" name="subject_time_from_thur" value="{{ isset($daysObj[4]) ? $daysObj[4] ? strftime('%r',strtotime($daysObj[4]['from'])) : '' : '' }}">

                                            <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" name="subject_time_to_thur" value="{{ isset($daysObj[4]) ? $daysObj[4] ? strftime('%r',strtotime($daysObj[4]['to'])) : '' : '' }}">

                                            <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="sched_fri" role="button">
                                    <input name="sched_fri" id="sched_fri" class="sched_days" {{ isset($daysObj[5]) ? $daysObj[5] ? 'checked' : '' : '' }} type="checkbox"> Friday
                                </label>
                            </td>
                            <td>
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" name="subject_time_from_fri" value="{{ isset($daysObj[5]) ? $daysObj[5] ? strftime('%r',strtotime($daysObj[5]['from'])) : '' : '' }}">

                                            <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" name="subject_time_to_fri" value="{{ isset($daysObj[5]) ? $daysObj[5] ? strftime('%r',strtotime($daysObj[5]['to'])) : '' : '' }}">

                                            <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </td>
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
