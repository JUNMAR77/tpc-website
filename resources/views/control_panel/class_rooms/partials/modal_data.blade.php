<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="js-form_subject_details">
                {{ csrf_field() }}
                @if ($Room)
                    <input type="hidden" name="id" value="{{ $Room->id }}">
                @endif
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        {{ $Room ? 'Edit Class Room' : 'Add Class Room' }}
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Room Code</label>
                        <input type="text" class="form-control" name="room_code" value="{{ $Room ? $Room->room_code : '' }}">
                        <div class="help-block text-red text-center" id="js-room_code">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Room Description</label>
                        <input type="text" class="form-control" name="room_description" value="{{ $Room ? $Room->room_description : '' }}">
                        <div class="help-block text-red text-center" id="js-room_description">
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