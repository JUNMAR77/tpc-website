@extends('control_panel.layouts.master')

@section ('content_title')
    My Account
@endsection
@section ('styles')
    <link rel="stylesheet" href="{{ asset('cms/plugins/datepicker/datepicker3.css')}}">
@endsection
@section ('content')

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">User Profile</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-flat btn-box-tool btn--update-photo" title="Chane photo">
                            <i class="fa fa-image"></i>
                        </button>
                        <form class="hidden" id="form_user_photo_uploader">
                            <input type="file" id="user--photo" name="user_photo">
                            <button type="submit">fsdfasd</button>
                        </form>
                        <button type="button" class="btn btn-flat btn-box-tool btn--update-profile" title="Update info">
                            <i class="fa fa-wrench"></i>
                        </button>
                    </div>
                </div>
                <div class="overlay hidden" id="js-loader-overlay"><i class="fa fa-refresh fa-spin"></i></div>
                <div class="box-body">
                    <img class="profile-user-img img-responsive img-circle" id="img--user_photo" src="{{ $Profile->photo ? \File::exists(public_path('/img/account/photo/'.$Profile->photo)) ? asset('/img/account/photo/'.$Profile->photo) : asset('/img/account/photo/blank-user.gif') : asset('/img/account/photo/blank-user.gif') }}" alt="User profile picture">
                    <h3 class="profile-username text-center" id="display__full_name">{{ $Profile->first_name . ' ' . $Profile->middle_name . ' ' .  $Profile->last_name }}</h3>
                    <p class="text-muted text-center">Faculty Member</p>
                    <div class="form-group">
                        <label for="">Department</label>
                        <div class="form-control">{{ collect(\App\FacultyInformation::DEPARTMENTS)->firstWhere('id', $Profile->department_id)['department_name'] }}</div>
                    </div>
                    <div class="form-group">
                        <label for="">Contact Number</label>
                        <div class="form-control" id="display__contact_number">{{ $Profile->contact_number }}</div>
                    </div>
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <div class="form-control" id="display__email">{{ $Profile->email }}</div>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <div class="form-control" id="display__address">{{ $Profile->address }}</div>
                    </div>
                    <div class="form-group">
                        <label for="">Birthday</label>
                        <div class="form-control" id="display__birthday">{{ $Profile->birthday }}</div>
                    </div>
                </div>
            </div>

            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">User Account</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-flat btn-box-tool btn-change-password" title="change password">
                            <i class="fa fa-wrench"></i>
                        </button>
                    </div>
                </div>
                

                <div class="overlay hidden" id="js-loader-overlay"><i class="fa fa-refresh fa-spin"></i></div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="">Username</label>
                        <div class="form-control">{{ $User->username }}</div>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <div class="form-control">******</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-12 col-md-6 col-lg-8">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Educational Attainment</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-flat btn-box-tool btn-add-educ" title="Add eductational attainment">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div> 
                

                <div class="overlay hidden" id="js-loader-overlay-education"><i class="fa fa-refresh fa-spin"></i></div>
                <div class="box-body">
                    <table class="table table-bordered table-condensed text-center">
                        <tr>
                            <th>Course</th>
                            <th>School</th>
                            <th>Years</th>
                            <th>Awards</th>
                            <th>Actions</th>
                        </tr>
                        <tbody id="education_attainment_container">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-sm-12 col-md-6 col-lg-8">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Trainings and Seminars</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-flat btn-box-tool btn-trainings_seminars" title="Add eductational attainment">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div> 
                

                <div class="overlay hidden" id="js-loader-overlay-trainings_seminars"><i class="fa fa-refresh fa-spin"></i></div>
                <div class="box-body">
                    <table class="table table-bordered table-condensed text-center">
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Venue</th>
                            <th>Sponsor</th>
                            <th>Facilitator</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                        <tbody id="trainings_seminars_container">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-change-pw-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form--change-password">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">
                            Change Password
                        </h4>
                    </div>
                    <div class="modal-body">   
                                
                        <div class="form-group">
                            <label for="">Old Password</label>
                            <input type="password" class="form-control" name="old_password">
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation">
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
    
    <div class="modal fade modal-update-profile" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form--update-profile">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">
                            Update Profile
                        </h4>
                    </div>
                    <div class="modal-body">   
                                
                        <div class="form-group">
                            <label for="">First name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name">
                        </div>
                        <div class="form-group">
                            <label for="">Middle name</label>
                            <input type="text" class="form-control" name="middle_name" id="middle_name">
                        </div>
                        <div class="form-group">
                            <label for="">Last name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name">
                        </div>
                        <div class="form-group">
                            <label for="">Contact Number</label>
                            <input type="text" class="form-control" name="contact_number" id="contact_number">
                        </div>
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" id="address">
                        </div>
                        <div class="form-group">
                            <label>Birthday</label>
                            <input type="text" name="birthday" id="birthday" class="form-control pull-right">
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


    <div class="modal fade modal-trainings_seminar" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form--training-seminar">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="seminar_id" id="seminar_id">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">
                            Trainings and Seminars
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title" id="title" autocomplete="off">
                            <div class="help-block text-red text-center" id="js-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="">Date from</label>
                            <input type="text" class="form-control date_picker_input" name="seminar_date_from" id="seminar_date_from" autocomplete="off">
                            <div class="help-block text-red text-center" id="js-seminar_date_from"></div>
                        </div>
                        <div class="form-group">
                            <label for="">Date To</label>
                            <input type="text" class="form-control date_picker_input" name="seminar_date_to" id="seminar_date_to" autocomplete="off">
                            <div class="help-block text-red text-center" id="js-seminar_date_to"></div>
                        </div>
                        <div class="form-group">
                            <label for="">Venue</label>
                            <input type="text" class="form-control" name="venue" id="venue" autocomplete="off">
                            <div class="help-block text-red text-center" id="js-venue"></div>
                        </div>
                        <div class="form-group">
                            <label for="">Sponsor</label>

                            <input type="text" class="form-control" name="sponsor" id="sponsor" autocomplete="off">
                            <div class="help-block text-red text-center" id="js-sponsor"></div>
                        </div>
                        <div class="form-group">
                            <label for="">Facilitator</label>
                            <input type="text" class="form-control" name="facilitator" id="facilitator" autocomplete="off">
                            <div class="help-block text-red text-center" id="js-facilitator"></div>
                        </div>

                        <div class="form-group">
                            <label for="">Seminar Type</label>
                            <select class="form-control" name="seminar_type" id="seminar_type">
                                <option value="0">Select a seminar / training type</option>
                                <option value="1">Local</option>
                                <option value="2">National</option>
                                <option value="3">International</option>
                            </select>
                            <div class="help-block text-red text-center" id="js-seminar_type"></div>
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

    <div class="modal fade modal-education-attainment" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form--education-attainment">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="educ_id" id="educ_id" value="">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">
                            Educational Attainment
                        </h4>
                    </div>
                    <div class="modal-body">   
                                
                        <div class="form-group">
                            <label for="">Course</label>
                            <input type="text" class="form-control" name="course" id="course" autocomplete="off">
                            <div class="help-block text-red text-center" id="js-course"></div>
                        </div>
                        <div class="form-group">
                            <label for="">School</label>
                            <input type="text" class="form-control" name="school" id="school" autocomplete="off">
                            <div class="help-block text-red text-center" id="js-school"></div>
                        </div>
                        <div class="form-group">
                            <label for="">Date from</label>
                            <input type="text" class="form-control date_picker_input" name="date_from" id="date_from" autocomplete="off">
                            <div class="help-block text-red text-center" id="js-date_from"></div>
                        </div>
                        <div class="form-group">
                            <label for="">Date To</label>
                            <input type="text" class="form-control date_picker_input" name="date_to" id="date_to" autocomplete="off">
                            <div class="help-block text-red text-center" id="js-date_to"></div>
                        </div>
                        <div class="form-group">
                            <label for="">Awards</label>
                            <input type="text" class="form-control" name="awards" id="awards" autocomplete="off">
                            <div class="help-block text-red text-center" id="js-awards"></div>
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
@endsection

@section ('scripts')
    <script src="{{ asset('cms/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script>
        

        $('#birthday').datepicker({
            autoclose: true
        })
        
        $('.date_picker_input').datepicker({
            autoclose: true
        })
        var page = 1;
        function fetch_data () {
            var formData = new FormData($('#js-form_search')[0]);
            formData.append('page', page);
            loader_overlay();
            $.ajax({
                url : "{{ route('admin.registrar_information') }}",
                type : 'POST',
                data : formData,
                processData : false,
                contentType : false,
                success     : function (res) {
                    loader_overlay();
                    $('.js-data-container').html(res);
                }
            });
        }
        function fetch_educ_attainment () {
            loader_overlay('js-loader-overlay-education');
            $.ajax({
                url : "{{ route('faculty.my_account.educational_attainment') }}",
                type : 'POST',
                data : {_token : '{{ csrf_token() }}'},
                success     : function (res) {
                    loader_overlay('js-loader-overlay-education');
                    $('#education_attainment_container').html(res);
                }
            });
        }
        function fetch_trainings_seminar_attainment () {
            loader_overlay('js-loader-overlay-trainings_seminars');
            $.ajax({
                url : "{{ route('faculty.my_account.trainings_seminars') }}",
                type : 'POST',
                data : {_token : '{{ csrf_token() }}'},
                success     : function (res) {
                    loader_overlay('js-loader-overlay-trainings_seminars');
                    $('#trainings_seminars_container').html(res);
                }
            });
        }
        $(function () {
            fetch_educ_attainment()
            fetch_trainings_seminar_attainment()
            $('body').on('click', '.btn-change-password', function (e) {
                e.preventDefault();
                $('.modal-change-pw-modal').modal({ backdrop : 'static' });
            });

            $('body').on('submit', '#form--change-password', function (e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url : "{{ route('faculty.my_account.change_my_password') }}",
                    type : 'POST',
                    data : formData,
                    processData : false,
                    contentType : false,
                    success : function (res) {
                        if (res.res_code == 0)  
                        {
                            $('.modal-change-pw-modal').modal('hide');
                        }
                        
                        show_toast_alert({
                            heading : res.res_code == 1 ? 'Error' : 'Success',
                            message : res.res_msg,
                            type    : res.res_code == 1 ? 'error' : 'success'
                        });
                    }
                });
            });

            $('body').on('click', '.btn--update-profile', function (e) {
                e.preventDefault();
                $.ajax({
                    url : "{{ route('faculty.my_account.fetch_profile') }}",
                    type : 'POST',
                    data        : {_token: '{{ csrf_token() }}'},
                    success     : function (res) {
                        $('.help-block').html('');
                        $('.modal-update-profile').modal({ backdrop : 'static' });
                        $('#first_name').val(res.Profile.first_name);
                        $('#middle_name').val(res.Profile.middle_name);
                        $('#last_name').val(res.Profile.last_name);
                        $('#contact_number').val(res.Profile.contact_number);
                        $('#email').val(res.Profile.email);
                        $('#address').val(res.Profile.address);
                        $('#birthday').val(res.Profile.birthday);
                        
                    }
                })
            })
            $('body').on('submit', '#form--update-profile', function (e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url : "{{ route('faculty.my_account.update_profile') }}",
                    type : 'POST',
                    data        : formData,
                    processData : false,
                    contentType : false,
                    success     : function (res) {
                        $('.help-block').html('');
                        if (res.res_code == 1)
                        {
                            for (var err in res.res_error_msg)
                            {
                                $('#js-' + err).html('<code> '+ res.res_error_msg[err] +' </code>');
                            }
                        }
                        else
                        {
                            $.ajax({
                                url : "{{ route('faculty.my_account.fetch_profile') }}",
                                type : 'POST',
                                dataType : 'JSON',
                                data        : {_token: '{{ csrf_token() }}'},
                                success     : function (res) {
                                    console.log(res)
                                    $('#display__full_name').text((res.Profile.first_name != null ? res.Profile.first_name : '') + ' ' + (res.Profile.middle_name != null ? res.Profile.middle_name : '') + ' '  + (res.Profile.last_name != null ? res.Profile.last_name : ''));
                                    $('#display__contact_number').text((res.Profile.contact_number != null ? res.Profile.contact_number : ''));
                                    $('#display__email').text((res.Profile.email != null ? res.Profile.email : ''));
                                    $('#display__address').text((res.Profile.address != null ? res.Profile.address : ''));
                                    $('#display__birthday').text((res.Profile.birthday != null ? res.Profile.birthday : ''));
                                }
                            })
                            $('.modal-update-profile').modal('hide');
                        }
                        
                        show_toast_alert({
                            heading : res.res_code == 1 ? 'Error' : 'Success',
                            message : res.res_msg,
                            type    : res.res_code == 1 ? 'error' : 'success'
                        });
                    }
                });
            })


            $('body').on('submit', '#js-form_subject_details', function (e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url         : "{{ route('admin.registrar_information.save_data') }}",
                    type        : 'POST',
                    data        : formData,
                    processData : false,
                    contentType : false,
                    success     : function (res) {
                        $('.help-block').html('');
                        if (res.res_code == 1)
                        {
                            for (var err in res.res_error_msg)
                            {
                                $('#js-' + err).html('<code> '+ res.res_error_msg[err] +' </code>');
                            }
                        }
                        else
                        {
                            $('.js-modal_holder .modal').modal('hide');
                            fetch_data();
                        }
                    }
                });
            });

            
            $('body').on('click', '.btn--update-photo', function (e) {
                $('#user--photo').click()
            })
            $('body').on('change', '#user--photo', function (e) {
                readURL($(this))
                

                {{--  $('body').on('submit', '#form_user_photo_uploader', function (frm) {
                    frm.preventDefault();  --}}
                {{--  })  --}}
            })

            function readURL(input) {
                var url = input[0].value;
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input[0].files && input[0].files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img--user_photo').attr('src', e.target.result);
                        
                        var formData = new FormData($('#form_user_photo_uploader')[0]);
                        {{--  formData.append('user_photo', $('#user--photo'));  --}}
                        formData.append('_token', '{{ csrf_token() }}');
                        console.log(formData)
                        $.ajax({
                            url : "{{ route('faculty.my_account.change_my_photo') }}",
                            type : 'POST',
                            data : formData,
                            processData : false,
                            contentType : false,
                            success     : function (res) {
                                console.log(res)
                            }
                        })
                    }

                    reader.readAsDataURL(input[0].files[0]);
                }else{
                    $('#img--user_photo').attr('src', '/assets/no_preview.png');
                }
            }


            $('body').on('click', '.btn-add-educ', function (e) {
                e.preventDefault()
                $('.modal-education-attainment').modal({ backdrop : 'static' })
                $('#educ_id').val('');
                $('#course').val('');
                $('#school').val('');
                $('#date_from').val('');
                $('#date_to').val('');
                $('#awards').val('');
            })

            $('body').on('submit', '#form--education-attainment', function (e) {
                e.preventDefault()
                var frm = $(this);
                var formData = new FormData(frm[0]);
                formData.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    url : "{{ route('faculty.my_account.educational_attainment_save') }}",
                    type : 'POST',
                    data : formData,
                    processData : false,
                    contentType : false,
                    success     : function (res) {
                        $('.help-block').html('');
                        if (res.res_code == 1)
                        {
                            for (var err in res.res_error_msg)
                            {
                                $('#js-' + err).html('<code> '+ res.res_error_msg[err] +' </code>');
                            }
                        } else {
                            frm[0].reset();
                            $('.modal-education-attainment').modal('hide')
                            fetch_educ_attainment()
                        }
                    }
                })
            })

            {{--  $('body').on('click', '.js-btn_educ_edit', function (e) {
                e.preventDefault()
                var educ_id = $(this).data('id');
                
                $.ajax({
                    url : "{{ route('faculty.my_account.educational_attainment_fetch_by_id') }}",
                    type : 'POST',
                    data : { _token : '{{ csrf_token() }}', educ_id : educ_id },
                    success     : function (res) {
                        $('.modal-education-attainment').modal({ backdrop : 'static' });
                        $('#educ_id').val(educ_id);
                        $('#course').val(res.FacultyEducation.course);
                        $('#school').val(res.FacultyEducation.school);
                        $('#date_from').val(res.FacultyEducation.from);
                        $('#date_to').val(res.FacultyEducation.to);
                        $('#awards').val(res.FacultyEducation.awards);
                    }
                })
            })  --}}
            
            $('body').on('click', '.js-btn_educ_edit', function (e) {
                e.preventDefault()
                var educ_id = $(this).data('id');
                
                $.ajax({
                    url : "{{ route('faculty.my_account.educational_attainment_fetch_by_id') }}",
                    type : 'POST',
                    data : { _token : '{{ csrf_token() }}', educ_id : educ_id },
                    success     : function (res) {
                        $('.modal-education-attainment').modal({ backdrop : 'static' });
                        $('#educ_id').val(educ_id);
                        $('#course').val(res.FacultyEducation.course);
                        $('#school').val(res.FacultyEducation.school);
                        $('#date_from').val(res.FacultyEducation.from);
                        $('#date_to').val(res.FacultyEducation.to);
                        $('#awards').val(res.FacultyEducation.awards);
                    }
                })
            })
            
            $('body').on('click', '.js-btn_educ_delete', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                alertify.defaults.transition = "slide";
                alertify.defaults.theme.ok = "btn btn-primary btn-flat";
                alertify.defaults.theme.cancel = "btn btn-danger btn-flat";
                alertify.confirm('Confirmation', 'Are you sure you want to delete?', function(){  
                    $.ajax({
                        url         : "{{ route('faculty.my_account.educational_attainment_delete_by_id') }}",
                        type        : 'POST',
                        data        : { _token : '{{ csrf_token() }}', educ_id : id },
                        success     : function (res) {
                            $('.help-block').html('');
                            if (res.res_code == 1)
                            {
                                show_toast_alert({
                                    heading : 'Error',
                                    message : res.res_msg,
                                    type    : 'error'
                                });
                            }
                            else
                            {
                                show_toast_alert({
                                    heading : 'Success',
                                    message : res.res_msg,
                                    type    : 'success'
                                });
                                $('.js-modal_holder .modal').modal('hide');
                                fetch_educ_attainment() 
                            }
                        }
                    });
                }, function(){  

                });   
            })  

            $('body').on('click', '.btn-trainings_seminars', function (e) {
                e.preventDefault();
                const training_seminar_id = $(this).data('id')
                if (training_seminar_id) {
                    $.ajax({
                        url : "{{ route('faculty.my_account.fetch_training_seminar_by_id') }}",
                        type : 'POST',
                        data : { _token:'{{ csrf_token() }}', id : training_seminar_id },
                        success : function (res) {
                            if (res.res_code) {
                                show_toast_alert({
                                    heading : 'Invalid',
                                    message : res.res_msg,
                                    type    : 'error'
                                });
                            } else {
                                $('#seminar_id').val(res.FacultySeminar.id)
                                $('#title').val(res.FacultySeminar.title)
                                $('#seminar_date_from').val(res.FacultySeminar.date_from)
                                $('#seminar_date_to').val(res.FacultySeminar.date_to)
                                $('#venue').val(res.FacultySeminar.venue)
                                $('#sponsor').val(res.FacultySeminar.sponsor)
                                $('#facilitator').val(res.FacultySeminar.facilitator)
                                $('#seminar_type').val(res.FacultySeminar.type)
                                $('.modal-trainings_seminar').modal({ backdrop:'static' })
                            }
                        }
                    })
                } else {
                    $('#seminar_id').val('')
                    $('#title').val('')
                    $('#seminar_date_from').val('')
                    $('#seminar_date_to').val('')
                    $('#venue').val('')
                    $('#sponsor').val('')
                    $('#facilitator').val('')
                    $('#seminar_type').val('')
                    $('.modal-trainings_seminar').modal({ backdrop:'static' })
                }
            })
            $('body').on('submit', '#form--training-seminar', function (e) {
                e.preventDefault()
                const seminar_id = $('#seminar_id').val()
                const frm = $(this)
                const formData = new FormData(frm[0])
                $.ajax({
                    url : "{{ route('faculty.my_account.save_training_seminar') }}",
                    type : 'POST',
                    data : formData,
                    processData : false,
                    contentType : false,
                    success : function (res) {
                        $('.help-block').html('');
                        if (res.res_code) {
                            show_toast_alert({
                                heading : 'Invalid',
                                message : res.res_msg,
                                type    : 'error'
                            });
                            
                            for (var err in res.res_error_msg)
                            {
                                $('#js-' + err).html('<code> '+ res.res_error_msg[err] +' </code>');
                            }
                        } else {
                            show_toast_alert({
                                heading : 'Success',
                                message : res.res_msg,
                                type    : 'success'
                            });
                            $('.modal-trainings_seminar').modal('hide')
                            frm[0].reset();
                            fetch_trainings_seminar_attainment()
                        }
                    }
                })
            })
            
            
            $('body').on('click', '.btn-seminar_delete', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                alertify.defaults.transition = "slide";
                alertify.defaults.theme.ok = "btn btn-primary btn-flat";
                alertify.defaults.theme.cancel = "btn btn-danger btn-flat";
                alertify.confirm('Confirmation', 'Are you sure you want to delete?', function(){  
                    $.ajax({
                        url         : "{{ route('faculty.my_account.delete_training_seminar_by_id') }}",
                        type        : 'POST',
                        data        : { _token : '{{ csrf_token() }}', id : id },
                        success     : function (res) {
                            $('.help-block').html('');
                            if (res.res_code == 1)
                            {
                                show_toast_alert({
                                    heading : 'Error',
                                    message : res.res_msg,
                                    type    : 'error'
                                });
                            }
                            else
                            {
                                show_toast_alert({
                                    heading : 'Success',
                                    message : res.res_msg,
                                    type    : 'success'
                                });
                                $('.js-modal_holder .modal').modal('hide');
                                fetch_trainings_seminar_attainment()
                            }
                        }
                    });
                }, function(){  

                });   
            })  
        });


        
    </script>
@endsection