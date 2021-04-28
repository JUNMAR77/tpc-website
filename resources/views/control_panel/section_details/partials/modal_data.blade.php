<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="js-form_subject_details">
                {{ csrf_field() }}
                @if ($SectionDetail)
                    <input type="hidden" name="id" value="{{ $SectionDetail->id }}">
                @endif
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        {{ $SectionDetail ? 'Edit Section Details' : 'Add Section Details' }}
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Section Name</label>
                        <input type="text" class="form-control" name="section" value="{{ $SectionDetail ? $SectionDetail->section : '' }}">
                        <div class="help-block text-red text-center" id="js-section">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Grade Level</label>
                        <select name="grade_level" id="grade_level" class="form-control">
                            <option value="">Select a Grade Level</option>
                            @foreach ($GradeLevel as $gl) 
                                <option value="{{$gl->grade}}" {{ $SectionDetail ? $SectionDetail->grade_level == $gl->grade ? 'selected' : '' : '' }}>Grade {{ $gl->grade }}</option>
                            @endforeach
                        </select>
                        <div class="help-block text-red text-center" id="js-grade_level">
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