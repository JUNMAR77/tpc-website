<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="js-form_subject_details">
                {{ csrf_field() }}
                @if ($ClassDetail)
                    <input type="hidden" name="id" value="{{ $ClassDetail->id }}">
                @endif
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        {{ $ClassDetail ? 'Edit Class' : 'Add Class' }}
                    </h4>
                </div>
                <div class="modal-body">                    
                    
                    <!-- {{--  <div class="form-group">
                        <label for="">Faculty</label>
                        <select name="faculty" id="faculty" class="form-control">
                            <option value="">Select faculty</option>
                            @foreach ($FacultyInformation as $faculty) 
                                <option value="{{ $faculty->id }}">{{ $faculty->first_name . ' ' . $faculty->last_name }}</option>
                            @endforeach
                        </select>
                        <div class="help-block text-red text-center" id="js-faculty">
                        </div>
                    </div>  --}}
                    
                    {{--  <div class="form-group">
                        <label for="">Subject</label>
                        <select name="subject" id="subject" class="form-control">
                            <option value="">Select subject</option>
                            @foreach ($SubjectDetail as $data) 
                                <option value="{{ $data->id }}">{{ $data->subject_code . ' ' . $data->subject }}</option>
                            @endforeach
                        </select>
                        <div class="help-block text-red text-center" id="js-subject">
                        </div>
                    </div>  --}} -->
                       
                    <div class="form-group">
                        <label for="">Grade Level</label>
                        <select name="grade_level" id="grade_level" class="form-control">
                            <option value="">Select grade level</option>
                            @foreach ($SectionDetail_grade_levels as $data) 
                                <option value="{{ $data->grade_level }}" {{ $ClassDetail ? $ClassDetail->grade_level == $data->grade_level ? 'selected' : '' : '' }}>Grade {{ $data->grade_level }}</option>
                            @endforeach
                        </select>
                        <div class="help-block text-red text-center" id="js-gradelevel">
                        </div>
                    </div>
                                        
                    <div class="form-group">
                        <label for="">Section</label>
                        <select name="section" id="section" class="form-control">
                            <option value="">Select section</option>
                            @foreach ($SectionDetail as $data) 
                                <option value="{{ $data->id }}" {{ $ClassDetail ? $ClassDetail->section_id == $data->id ? 'selected' : '' : '' }}>{{ $data->section }}</option>
                            @endforeach
                        </select>
                        <div class="help-block text-red text-center" id="js-section">
                        </div>
                    </div>

                    <div class="form-group">
                            <label for="">Strand</label>
                            <select name="strand" id="strand" class="form-control">
                                <option value="">Select strand</option>
                                @foreach ($Strand as $data) 
                                    <option value="{{ $data->id }}" {{ $ClassDetail ? $ClassDetail->strand_id == $data->id ? 'selected' : '' : '' }}>{{ $data->strand }}</option>
                                @endforeach
                            </select>
                            <div class="help-block text-red text-center" id="js-strand">
                            </div>
                    </div>
                                 
                    <div class="form-group">
                        <label for="">Room</label>
                        <select name="room" id="room" class="form-control">
                            <option value="">Select room</option>
                            @foreach ($Room as $data) 
                                <option value="{{ $data->id }}" {{ $ClassDetail ? $ClassDetail->room_id == $data->id ? 'selected' : '' : '' }}>{{ $data->room_code }}</option>
                            @endforeach
                        </select>
                        <div class="help-block text-red text-center" id="js-room">
                        </div>
                    </div>     

                    <div class="form-group">
                        <label for="">Class Adviser</label>
                        <select name="adviser" id="adviser" class="form-control">
                            <option value="">Adviser</option>
                            @foreach ($FacultyInformation as $data) 
                                <option value="{{ $data->id }}" {{ $ClassDetail ? $ClassDetail->adviser_id == $data->id ? 'selected' : '' : '' }}>{{ $data->last_name . ' '  . $data->first_name . ', '  . $data->middle_nam }}</option>
                            @endforeach
                        </select>
                        <div class="help-block text-red text-center" id="js-adviser">
                        </div>
                    </div>
                            
                    <div class="form-group">
                        <label for="">School Year</label>
                        <select name="school_year" id="school_year" class="form-control">
                            <option value="">Select school year</option>
                            @foreach ($SchoolYear as $data) 
                                <option value="{{ $data->id }}" {{ $ClassDetail ? $ClassDetail->school_year_id == $data->id ? 'selected' : '' : '' }}>{{ $data->school_year }}</option>
                            @endforeach
                        </select>
                        <div class="help-block text-red text-center" id="js-school_year">
                        </div>
                    </div>
                    
                    <!-- {{--  <div class="bootstrap-timepicker">
                        <div class="form-group">
                        <label>Time</label>

                        <div class="input-group">
                            <input type="text" class="form-control timepicker">

                            <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                        </div>
                    </div>  --}} -->



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->