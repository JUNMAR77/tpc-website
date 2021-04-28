<div class="modal fade" id="modal-tor" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="js-form_transcript" autocomplete="off">
                @if ($TrascriptArhieve)
                    <input type="hidden" name="id" value="{{$TrascriptArhieve->id}}">
                @endif
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        Transcript of Record Archieve
                    </h4>
                </div>
                {{--  {{ base64_decode(\decrypt('eyJpdiI6IlZsdmtpenBLYjVqRTVPSW05cENlc3c9PSIsInZhbHVlIjoiaFwvODluVmsybEg0ZFU3K1lTdjBYM2dKODZXTEM3NktjYjk5OGh2am5ldTIyWWR6M3oxQlNJeDVvQTNJeVdFRjdlbHhFZlF2UEFLbUVLVTBieEpEbXVGNWpya3dOMVl5WTRWS0w2ZGx6eGNnPSIsIm1hYyI6IjNlMzBiMDQ1NjhlNTA2ZDUwZWMxNmI4OTYwNzkxZTVhYTgzNjgxMzg5OGIyZGM1MzIxMzIyYzFlOTZhYzVmMWUifQ==')) }}  --}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">First name</label>
                        <input type="text" class="form-control" name="first_name" value="{{ $TrascriptArhieve ? $TrascriptArhieve->first_name : '' }}" autoComplete="off">
                    <div class="help-block" id="msg-first_name"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Middle name</label>
                        <input type="text" class="form-control" name="middle_name" value="{{ $TrascriptArhieve ? $TrascriptArhieve->middle_name : '' }}" autoComplete="off">
                    <div class="help-block" id="msg-middle_name"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Last name</label>
                        <input type="text" class="form-control" name="last_name" value="{{ $TrascriptArhieve ? $TrascriptArhieve->last_name : '' }}" autoComplete="off">
                    <div class="help-block" id="msg-last_name"></div>
                    </div>
                    <div class="form-group">
                        <label for="">School Year</label>
                        <input type="text" class="form-control" name="school_year_graduated" value="{{ $TrascriptArhieve ? $TrascriptArhieve->school_year_graduated : '' }}" autoComplete="off">
                    <div class="help-block" id="msg-school_year_graduated"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Upload TOR</label>
                        <button type="button" class="btn btn-primary btn-block" id="btn-upload-tor">Upload TOR</button>
                        <input type="file" class="hidden" name="tor" id="tor">
                        <div class="help-block" id="msg-tor"></div>
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