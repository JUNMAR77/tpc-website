<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="js-form_subject_details">
                {{ csrf_field() }}
                @if ($SubjectDetail)
                    <input type="hidden" name="id" value="{{ $SubjectDetail->id }}">
                @endif
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        {{ $SubjectDetail ? 'Edit Subject Details' : 'Add Subject Details' }}
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Subject Code</label>
                        <input type="text" class="form-control" name="subject_code" value="{{ $SubjectDetail ? $SubjectDetail->subject_code : '' }}">
                        <div class="help-block text-red text-center" id="js-subject_code">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Subject</label>
                        <input type="text" class="form-control" name="subject" value="{{ $SubjectDetail ? $SubjectDetail->subject : '' }}">
                        <div class="help-block text-red text-center" id="js-subject">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Subject Abbreviation</label>
                        <input type="text" class="form-control" name="subject_abbr" value="{{ $SubjectDetail ? $SubjectDetail->subject_abbr : '' }}">
                        <div class="help-block text-red text-center" id="js-subject_abbr">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Unit(s)</label>
                        <input type="number" step="any" class="form-control" name="units" value="{{ $SubjectDetail ? $SubjectDetail->units : '' }}">
                        <div class="help-block text-red text-center" id="js-units">
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