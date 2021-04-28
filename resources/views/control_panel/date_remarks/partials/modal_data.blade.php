<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="js-form_school_year">
                {{ csrf_field() }}
                @if ($SchoolYear)
                    <input type="hidden" name="id" value="{{ $SchoolYear->id }}">
                @endif
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        {{ $SchoolYear ? 'Edit School Year' : 'Add School Year' }}                        
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">School Year</label>
                        {{-- <input type="text" class="form-control" name="school_year" value="{{ $SchoolYear ? $SchoolYear->school_year : '' }}"> --}}
                        <select name="school_year_id" id="school_year_id" class="form-control">
                            @foreach($getSchoolYear as $data)
                                <option value="{{ $data->id }}" {{  $SchoolYear ? $SchoolYear->school_year_id == $data->id ? 'selected' : '' : ''}}>{{$data->school_year}}</option>
                            @endforeach
                                {{-- <option value="0" {{ $SchoolYear ? ($SchoolYear->current == 0 ? 'selected' : '')  : 'selected' }}>No</option> --}}
                        </select>
                        {{-- <input type="text" class="form-control" name="school_year" value=""> --}}
                        <div class="help-block text-red text-center" id="js-school_year_id">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Date for Junior</label>
                        <div class="input-group date">                                
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                             <input type="text" name="jdate" class="datepicker1 form-control pull-right" id="tbdatepicker1" placeholder="11/11/2000"
                             value="{{ $SchoolYear ? date_format(date_create($SchoolYear->j_date), 'F d, Y') : '' }}">                             
                        </div>
                        <div class="help-block text-red text-center" id="js-jdate">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Date for Senior 1st Semester</label>
                        <div class="input-group date">                                    
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="sdate1" class="datepicker1 form-control pull-right" id="tbdatepicker2" placeholder="11/11/2000" 
                            value="{{ $SchoolYear ? date_format(date_create($SchoolYear->s_date1), 'F d, Y') : '' }}">
                        </div>
                        <div class="help-block text-red text-center" id="js-sdate1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Date for Senior 2nd Semester</label>
                        <div class="input-group date">                                    
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="sdate2" class="datepicker1 form-control pull-right" id="tbdatepicker3" placeholder="11/11/2000" 
                            value="{{ $SchoolYear ? date_format(date_create($SchoolYear->s_date2), 'F d, Y') : '' }}">
                        </div>
                        <div class="help-block text-red text-center" id="js-sdate2">
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

