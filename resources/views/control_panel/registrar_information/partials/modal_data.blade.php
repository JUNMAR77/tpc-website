<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="js-form_subject_details">
                {{ csrf_field() }}
                @if ($RegistrarInformation)
                    <input type="hidden" name="id" value="{{ $RegistrarInformation->id }}">
                @endif
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        {{ $RegistrarInformation ? 'Edit Registrar Information' : 'Add Registrar Information' }}
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username" value="{{ $RegistrarInformation ? $RegistrarInformation->user->username : '' }}">
                        <div class="help-block text-red text-center" id="js-username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">First name</label>
                        <input type="text" class="form-control" name="first_name" value="{{ $RegistrarInformation ? $RegistrarInformation->first_name : '' }}">
                        <div class="help-block text-red text-center" id="js-first_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Middle name</label>
                        <input type="text" class="form-control" name="middle_name" value="{{ $RegistrarInformation ? $RegistrarInformation->middle_name : '' }}">
                        <div class="help-block text-red text-center" id="js-middle_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Last name</label>
                        <input type="text" class="form-control" name="last_name" value="{{ $RegistrarInformation ? $RegistrarInformation->last_name : '' }}">
                        <div class="help-block text-red text-center" id="js-last_name">
                        </div>
                    </div>

                    {{--  @if ($RegistrarInformation)
                        @if ($RegistrarInformation->id)
                            <div class="form-group">
                                <label for="">Email address</label>
                                <input type="text" class="form-control" name="email" value="{{ $RegistrarInformation ? $RegistrarInformation->user->email : '' }}">
                                <div class="help-block text-red text-center" id="js-email">
                                </div>
                            </div>
                        @endif
                    @endif  --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->