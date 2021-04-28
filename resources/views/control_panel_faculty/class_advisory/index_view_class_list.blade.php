@extends('control_panel.layouts.master')

@section ('styles') 
@endsection

@section ('content_title')
    Attendance
@endsection

@section ('content')
    <div class="box">
        <div class="box-header with-border">
            
        </div>
        <div class="overlay hidden" id="js-loader-overlay"><i class="fa fa-refresh fa-spin"></i></div>
        <div class="box-body">
            <div class="js-data-container">
                <table class="table no-margin">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Student Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3"><b>Male</b></td>
                        </tr>
                        @if ($EnrollmentMale)
                            @foreach ($EnrollmentMale as $key => $data)
                                <tr>
                                        {{-- <td>{{ $data->id }}</td> --}}
                                    <td>{{ $key+1 }}.</td>
                                    <td>{{ $data->username }}</td>
                                    <td>{{ $data->student_name }}</td>                                    
                                    
                                    <td>
                                        <div class="input-group-btn pull-left text-left">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action
                                                <span class="fa fa-caret-down"></span></button>
                                            <ul class="dropdown-menu">
                                                <input name="print_sy" id="print_sy" value="{{ $class_id}}" type="hidden" />

                                                <li><a href="{{ route('faculty.advisory_class.demographic_profile') }}?c={{ encrypt($data->id) }}" class="js-btn_manage_demographic" data-id="{{ encrypt($data->id) }}">Demographic Profile</a></li>
                                                
                                                <li><a href="{{ route('faculty.advisory_class.manage_attendance') }}?c={{ encrypt($data->e_id) }}" class="js-btn_manage" data-id="{{ encrypt($data->e_id) }}">Manage Attendance</a></li>
                                                
                                                <li><a style="cursor: pointer;" rel="{{ $data->id }}" class="printGrade" data-id="{{ encrypt($data->id) }}">Print Grade</a></li>
                                            
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                          
                            <tr>
                                <td colspan="3"><b>Female</b></td>
                            </tr>
                            @foreach ($EnrollmentFemale as $key => $data)
                                <tr>
                                        {{-- <td>{{ $data->id }}</td> --}}
                                    <td>{{ $key+1 }}.</td>
                                    <td>{{ $data->username }}</td>
                                    <td>{{ $data->student_name }}</td>
                                    
                                    
                                    <td>
                                        <div class="input-group-btn pull-left text-left">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action
                                                <span class="fa fa-caret-down"></span></button>
                                            <ul class="dropdown-menu">
                                                <input name="print_sy" id="print_sy" value="{{ $class_id}}" type="hidden" />

                                                <li><a href="{{ route('faculty.advisory_class.manage_attendance') }}?c={{ encrypt($data->e_id) }}" class="js-btn_manage" data-id="{{ encrypt($data->e_id) }}">Manage Attendance</a></li>
                                                
                                                <li><a style="cursor: pointer;" rel="{{ $data->id }}" class="printGrade" data-id="{{ encrypt($data->id) }}">Print Grade</a></li>
                                            
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
@endsection

@section ('scripts')
    <script src="{{ asset('cms/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script>
        var page = 1;
        function fetch_data () {
            var formData = new FormData($('#js-form_search')[0]);
            formData.append('page', page);
            loader_overlay();
            $.ajax({
                url : "{{ route('registrar.class_details') }}",
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
            $('body').on('click', '.js-btn_manage', function (e) {
                e.preventDefault();
                {{--  loader_overlay();  --}}
                var id = $(this).data('id');
                $.ajax({
                    url : "{{ route('faculty.advisory_class.manage_attendance') }}",
                    type : 'POST',
                    data : { _token : '{{ csrf_token() }}', enr : id, c: '{{ encrypt($class_id) }}' },
                    success : function (res) {
                        $('.js-modal_holder').html(res);
                        $('.js-modal_holder .modal').modal({ backdrop : 'static' });
                        $('.js-modal_holder .modal').on('shown.bs.modal', function () {
                            //Timepicker
                            $('.timepicker').timepicker({
                            showInputs: false
                            })
                        })
                    }
                });
            });

        $(function () {
            $('body').on('click', '.js-btn_manage_demographic', function (e) {
                e.preventDefault();
                {{--  loader_overlay();  --}}
                // var id = $(this).data('id');
                $.ajax({
                    url : "{{ route('faculty.advisory_class.demographic_profile') }}",
                    type : 'POST',
                    data : { _token : '{{ csrf_token() }}', c: '{{ encrypt($data->id) }}' },
                    success : function (res) {
                        $('.js-modal_holder').html(res);
                        $('.js-modal_holder .modal').modal({ backdrop : 'static' });
                        $('.js-modal_holder .modal').on('shown.bs.modal', function () {
                            //Timepicker
                            $('.timepicker').timepicker({
                            showInputs: false
                            })
                        })
                    }
                });
            });
        });

            $('body').on('click', '.printGrade', function (e) {
                e.preventDefault();
                {{--  loader_overlay();  --}}
                var id = $(this).attr('rel');
                var print_sy = $('#print_sy').val();
                
                window.open("{{ route('faculty.AdvisoryClass.print_grades') }}?id="+id+"&cid="+print_sy, '', 'height=800,width=800')
            })

           

            $('body').on('change', '.days_of_school', function(e) {
                var days_of_school_total = 0
                $('.days_of_school').each(function (e) {
                    days_of_school_total += +$(this).val()
                })

                $('.days_of_school_total').text(days_of_school_total)
            })

            $('body').on('change', '.days_present', function(e) {
                var days_present_total = 0
                $('.days_present').each(function (e) {
                    days_present_total += +$(this).val()
                })

                $('.days_present_total').text(days_present_total)
            })

            $('body').on('change', '.days_absent', function(e) {
                var days_absent_total = 0
                $('.days_absent').each(function (e) {
                    days_absent_total += +$(this).val()
                })

                $('.days_absent_total').text(days_absent_total)
            })

            $('body').on('change', '.times_tardy', function(e) {
                var times_tardy_total = 0
                $('.times_tardy').each(function (e) {
                    times_tardy_total += +$(this).val()
                })

                $('.times_tardy_total').text(times_tardy_total)
            })


            



            $('body').on('submit', '#js-form_attendance', function (e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url         : "{{ route('faculty.advisory_class.save_attendance') }}",
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
                        }
                    }
                });
            });

            $('body').on('submit', '#js-form_search', function (e) {
                e.preventDefault();
                fetch_data();
            });
            $('body').on('click', '.pagination a', function (e) {
                e.preventDefault();
                page = $(this).attr('href').split('=')[1];
                fetch_data();
            });
            $('body').on('click', '.js-btn_deactivate', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                alertify.defaults.transition = "slide";
                alertify.defaults.theme.ok = "btn btn-primary btn-flat";
                alertify.defaults.theme.cancel = "btn btn-danger btn-flat";
                alertify.confirm('Confirmation', 'Are you sure you want to deactivate?', function(){  
                    $.ajax({
                        url         : "{{ route('registrar.class_details.deactivate_data') }}",
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
                                fetch_data();
                            }
                        }
                    });
                }, function(){  

                });
            });
            
            $('body').on('change', '#grade_level', function (e) {
                e.preventDefault();
                $.ajax({
                    url         : "{{ route('registrar.class_details.fetch_section_by_grade_level') }}",
                    type        : 'POST',
                    data        : { _token : '{{ csrf_token() }}', grade_level : $(this).val() },
                    success     : function (res) {
                        console.log(res);
                        $('#section').html(res);
                    }
                });
            });
        });
    </script>
@endsection