@extends('control_panel_student.layouts.master')

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
                    <h3 class="box-title">Personal Information</h3>
                    <div class="box-tools pull-right">
                        {{-- <button type="button" class="btn btn-flat btn-box-tool btn--update-photo" title="Change photo">
                            <i class="fa fa-image"></i>
                        </button> --}}
                        <form class="hidden" id="form_user_photo_uploader">
                            <input type="file" id="user--photo" name="user_photo">
                            <button type="submit">fsdfasd</button>
                        </form>
                        {{-- <button type="button" class="btn btn-flat btn-box-tool btn--update-profile" title="Update info">
                            <i class="fa fa-wrench"></i>
                        </button> --}}
                    </div>
                </div>
                <div class="overlay hidden" id="js-loader-overlay"><i class="fa fa-refresh fa-spin"></i></div>
                <div class="box-body">
                    <img class="profile-user-img img-responsive img-circle" id="img--user_photo" src="{{ $Profile->photo ? \File::exists(public_path('/img/account/photo/'.$Profile->photo)) ? asset('/img/account/photo/'.$Profile->photo) : asset('/img/account/photo/blank-user.gif') : asset('/img/account/photo/blank-user.gif') }}" alt="User profile picture">
                    <h3 class="profile-username text-center" id="display__full_name">{{ $Profile->first_name . ' ' . $Profile->middle_name . ' ' .  $Profile->last_name }}</h3>
                    <p class="text-muted text-center">Student</p>
                    {{--  <div class="form-group">
                        <label for="">Department</label>
                        <div class="form-control">{{ collect(\App\FacultyInformation::DEPARTMENTS)->firstWhere('id', $Profile->department_id)['department_name'] }}</div>
                    </div>  --}}
                    <div class="form-group">
                        <label for="">Birthday</label>
                        <div class="form-control" id="display__birthday">{{ date('d F Y', strtotime($Profile->birthdate)) }}</div>
                    </div>
                    {{--  <div class="form-group">
                        <label for="">Age</label>
                        <div class="form-control" id="display__age">{{ $Profile->birthday }}</div>
                    </div>  --}}
                    <div class="form-group">
                        <label for="">Gender</label>
                        <div class="form-control" id="display__gender">{{ $Profile->gender == 1 ? 'Male' : 'Female' }}</div>
                    </div>
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <div class="form-control" id="display__email">{{ $Profile->email }}</div>
                    </div>
                    <div class="form-group">
                        <label for="">Contact Number</label>
                        <div class="form-control" id="display__contact_number">{{ $Profile->contact_number }}</div>
                    </div>
                    <div class="form-group">
                        <label for="">Current Address</label>
                        <div class="form-control" id="display__current_address">{{ $Profile->c_address }}</div>
                    </div>
                    <div class="form-group">
                        <label for="">Permanent Address</label>
                        <div class="form-control" id="display__permanent_address">{{ $Profile->p_address }}</div>
                    </div>
                    <div class="form-group">
                        <label for="">Father's name</label>
                        <div class="form-control" id="display__father_name">{{ $Profile->father_name }}</div>
                    </div>
                    <div class="form-group">
                        <label for="">Mother's name</label>
                        <div class="form-control" id="display__mother_name">{{ $Profile->mother_name }}</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">User Account</h3>
                    <div class="box-tools pull-right">
                        {{-- <button type="button" class="btn btn-flat btn-box-tool btn-change-password" title="change password">
                            <i class="fa fa-wrench"></i>
                        </button> --}}
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
                            <label for="">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Select a gender</option>
                                <option value="2">Female</option>
                                <option value="1">Male</option>
                            </select>
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
                            <label>Birthday</label>
                            <input type="text" name="birthday" id="birthday" class="form-control pull-right">
                        </div>
                        <div class="form-group">
                            <label for="">Current Address</label>
                            <input type="text" class="form-control" name="c_address" id="c_address">
                        </div>
                        <div class="form-group">
                            <label for="">Permanent Address</label>
                            <input type="text" class="form-control" name="p_address" id="p_address">
                        </div>
                        <div class="form-group">
                            <label for="">Father's name</label>
                            <input type="text" class="form-control" name="father_name" id="father_name">
                        </div>
                        <div class="form-group">
                            <label for="">Mother's name</label>
                            <input type="text" class="form-control" name="mother_name" id="mother_name">
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
        $(function () {
            $('body').on('click', '.btn-change-password', function (e) {
                e.preventDefault();
                $('.modal-change-pw-modal').modal({ backdrop : 'static' });
            });

            $('body').on('submit', '#form--change-password', function (e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url : "{{ route('student.my_account.change_my_password') }}",
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
                    url : "{{ route('student.my_account.fetch_profile') }}",
                    type : 'POST',
                    data        : {_token: '{{ csrf_token() }}'},
                    success     : function (res) {
                        const bday = new Date(res.Profile.birthdate)
                        $('.help-block').html('');
                        $('.modal-update-profile').modal({ backdrop : 'static' });
                        $('#first_name').val(res.Profile.first_name);
                        $('#middle_name').val(res.Profile.middle_name);
                        $('#last_name').val(res.Profile.last_name);
                        $('#contact_number').val(res.Profile.contact_number);
                        $('#email').val(res.Profile.email);
                        $('#c_address').val(res.Profile.c_address);
                        $('#p_address').val(res.Profile.p_address);
                        $('#birthday').val((bday.getMonth() + 1).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}) + `/` + bday.getDate().toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}) +`/` + bday.getFullYear());
                        $('#father_name').val(res.Profile.father_name);     
                        $('#mother_name').val(res.Profile.mother_name);    
                        $('#gender').val(res.Profile.gender);
                    }
                })
            })
            $('body').on('submit', '#form--update-profile', function (e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url : "{{ route('student.my_account.update_profile') }}",
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
                                url : "{{ route('student.my_account.fetch_profile') }}",
                                type : 'POST',
                                dataType : 'JSON',
                                data        : {_token: '{{ csrf_token() }}'},
                                success     : function (res) {
                                    console.log(res)
                                    let bday = ''
                                    if (res.Profile.birthdate) {
                                        bday = new Date(res.Profile.birthdate)
                                    }
                                    $('#display__full_name').text((res.Profile.first_name != null ? res.Profile.first_name : '') + ' ' + (res.Profile.middle_name != null ? res.Profile.middle_name : '') + ' '  + (res.Profile.last_name != null ? res.Profile.last_name : ''));
                                    $('#display__contact_number').text((res.Profile.contact_number != null ? res.Profile.contact_number : ''));
                                    $('#display__email').text((res.Profile.email != null ? res.Profile.email : ''));
                                    $('#display__address').text((res.Profile.address != null ? res.Profile.address : ''));
                                    $('#display__birthday').text((res.Profile.birthdate != null ?  bday.getDate() + ' ' + bday.toLocaleString('en-US', {month: "long"}) + ' ' + bday.getFullYear()  : ''));
                                    {{--  $('#display__age').text((res.Profile.age != null ? res.Profile.age : ''));  --}}
                                    $('#display__current_address').text((res.Profile.c_address != null ? res.Profile.c_address : ''));
                                    $('#display__permanent_address').text((res.Profile.p_address != null ? res.Profile.p_address : ''));
                                    $('#display__father_name').text((res.Profile.father_name != null ? res.Profile.father_name : ''));
                                    $('#display__mother_name').text((res.Profile.mother_name != null ? res.Profile.mother_name : ''));
                                    $('#display__gender').text((res.Profile.gender == 1 ? 'Male' : 'Female'));
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
                            url : "{{ route('student.my_account.change_my_photo') }}",
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
        });
    </script>
@endsection