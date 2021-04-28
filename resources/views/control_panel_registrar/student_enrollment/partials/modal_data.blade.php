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
                                       
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                        <label>Time</label>

                        <div class="input-group">
                            <input type="text" class="form-control timepicker" name="subject_time">

                            <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->