<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{--  <form id="js-form_print_student_grade">  --}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        Print Student Grade
                    </h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    @if ($Enrollment)
                        <input name="print_student_id" id="print_student_id" value="{{ $student_id }}" type="hidden" />
                        <div class="form-group">
                        <label>Select School Year</label>
                            <select class="form-control" id="print_sy">
                                <option value="0">Select School Year</option>
                                @foreach ($Enrollment as $e)
                                    <option value="{{ $e->c_id}}">{{ $e->sy }}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <h3>No Class tagged</h3>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    {{--  <button type="submit" class="btn btn-primary btn-flat">Save</button>  --}}
                    @if ($Enrollment)
                        <a class="btn btn-primary btn-flat" id="js-btn_print_student_grade">Print</a>
                    @endif
                </div>
            {{--  </form>  --}}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->