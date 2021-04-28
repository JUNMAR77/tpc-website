@extends('control_panel.layouts.master')

@section ('styles') 
@endsection

@section ('content_title')
    Encode Students Grades
@endsection

@section ('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Search</h3>
           
                {{--  <div id="js-form_search" class="form-group col-sm-12 col-md-3" style="padding-right:0">
                    <input type="text" class="form-control" name="search">
                </div>  --}}
                
                
                @if($ClassSubjectDetail->grade_level <= 10)
                <form id="js-form_search">
                    {{ csrf_field() }}
                    <div class="form-group col-sm-12 col-md-3" style="padding-right:0">
                        <select name="search_sy" id="search_sy" class="form-control search_sy">
                            <option value="">Select SY</option>
                            @foreach ($SchoolYear as $data)
                                <option value="{{ $data->id }}">{{ $data->school_year }}</option>
                            @endforeach
                        </select>
                    </div> 
                    &nbsp;
                        <div class="form-group col-sm-12 col-md-5" style="padding-right:0">
                            <select name="search_class_subject" id="search_class_subject" class="form-control search_class_subject">
                                <option value="">Select Class Subject</option>
                            </select>
                        </div>
                    &nbsp;
                    <button type="submit" class="btn btn-flat btn-success">Search</button>
                </form>
                @else
                <form id="js-form_search1">
                    {{ csrf_field() }}
                    <div class="form-group col-sm-12 col-md-3" style="padding-right:0">
                        <select name="search_sy1" id="search_sy1" class="form-control search_sy">
                            <option value="">Select SY</option>
                            @foreach ($SchoolYear as $data)
                                <option value="{{ $data->id }}">{{ $data->school_year }}</option>
                            @endforeach
                        </select>
                    </div> 
                    &nbsp;
                        <div class="form-group col-sm-12 col-md-3" style="padding-right:0">
                            <select name="search_semester" id="search_semester" class="form-control search_semester">
                                <option value="">Select Semester</option>
                            </select>
                        </div>
                    &nbsp;
                        <div class="form-group col-sm-12 col-md-5" style="padding-right:0">
                            <select name="search_class_subject_sem" id="search_class_subject_sem" class="form-control search_class_subject">
                                <option value="">Select Class Subject</option>
                            </select>
                        </div>
                    &nbsp;
                    <button type="submit" class="btn btn-flat btn-success">Search</button>
                </form>
                @endif
                
                {{--  <button type="button" class="pull-right btn btn-flat btn-danger btn-sm" id="js-button-add"><i class="fa fa-plus"></i> Add</button>  --}}
            
        </div>
        <div class="overlay hidden" id="js-loader-overlay"><i class="fa fa-refresh fa-spin"></i></div>
        <div class="box-body">
            <div class="js-data-container">
                {{--  @include('control_panel_faculty.student_grade_sheet_details.partials.data_list')  --}}
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
                url : "{{ route('faculty.student_grade_sheet.list_students_by_class') }}",
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

            $('body').on('submit', '#js-form_search', function (e) {
                e.preventDefault();
                if (!$('#search_class_subject').val()) {
                    alert('Please select a subject');
                    return;
                }
                fetch_data();
            });

            $('body').on('click', '.pagination a', function (e) {
                e.preventDefault();
                page = $(this).attr('href').split('=')[1];
                fetch_data();
            });
            $('body').on('change', '#search_sy', function () {
                $.ajax({
                    url : "{{ route('faculty.student_grade_sheet.list_class_subject_details') }}",
                    type : 'POST',
                    {{--  dataType    : 'JSON',  --}}
                    data        : {_token: '{{ csrf_token() }}', search_sy: $('#search_sy').val()},
                    success     : function (res) {

                        $('#search_class_subject').html(res);
                    }
                })
            })
            
            function fetch_data1() {
            var formData = new FormData($('#js-form_search1')[0]);
            formData.append('page', page);
            loader_overlay();
            
            var semester_grades = $('#search_semester').val();
            
                    
            $.ajax({
                url : "{{ route('faculty.student_grade_sheet.list_students_by_class1') }}",
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

            
            $('body').on('submit', '#js-form_search1', function (e) {
                e.preventDefault();
                if (!$('#search_semester').val()) {
                    alert('Please select a semester');
                    return;
                }
                // fetch_data1();
            });
            $('body').on('change', '#search_sy1', function () {
                $.ajax({
                    url : "{{ route('faculty.student_grade_sheet.semester') }}",
                    type : 'POST',
                    {{--  dataType    : 'JSON',  --}}
                    data        : {_token: '{{ csrf_token() }}', search_sy1: $('#search_sy1').val()},
                    success     : function (res) {

                        $('#search_semester').html(res);
                    }
                })
            })
            $('body').on('submit', '#js-form_search1', function (e) {
                e.preventDefault();
                if (!$('#search_class_subject_sem').val()) {
                    alert('Please select Subject!');
                    return;
                }
                fetch_data1();
            });

            
            $('body').on('change', '#search_semester', function () {
                $.ajax({
                    url : "{{ route('faculty.student_grade_sheet.list_class_subject_details1') }}",
                    type : 'POST',
                    {{--  dataType    : 'JSON',  --}}
                    data        : {_token: '{{ csrf_token() }}', search_semester: $('#search_semester').val(), search_sy1: $('#search_sy1').val()},
                    success     : function (res) {

                        $('#search_class_subject_sem').html(res);
                    }
                })
            })

            

            $('body').on('change', '.txt-grade_input', function () {
                const self =  $(this);
                const student_enrolled_subject_id = $(this).parents('tr').data('student_enrolled_subject_id');
                const enrollment_id = self.parents('tr').data('enrollment_id');
                var classSubjectDetailID = $('#classSubjectDetailID').val();
                const grading = self.parents('.input-group').data('grading');
                const grade = self.val()
                const parent_elem = self.parents('tr')
                
                $.ajax({
                    url         : "{{ route('faculty.student_grade_sheet.temporary_save_grade') }}",
                    type        : 'POST',
                    data        : { _token : '{{ csrf_token() }}', student_enrolled_subject_id : student_enrolled_subject_id, enrollment_id : enrollment_id, grade : grade, grading : grading, classSubjectDetailID : classSubjectDetailID },
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
                            
                
                            const input_first_grading = $('#first_grading_' + atob(student_enrolled_subject_id))
                            const input_second_grading = $('#second_grading_' + atob(student_enrolled_subject_id))
                            const input_third_grading = $('#third_grading_' + atob(student_enrolled_subject_id))
                            const input_fourth_grading = $('#fourth_grading_' + atob(student_enrolled_subject_id))
                            const display_final_ratings = $('.final-ratings_' + atob(student_enrolled_subject_id))
                            console.log($('#first_grading_' + atob(student_enrolled_subject_id)))
                            console.log($('#second_grading_' + atob(student_enrolled_subject_id)))
                            console.log($('#third_grading_' + atob(student_enrolled_subject_id)))
                            console.log($('#fourth_grading_' + atob(student_enrolled_subject_id)))
                            console.log(display_final_ratings)
                            let g_ctr = 0
                            let ratings = 0
                            if (input_first_grading.length > 0 && +input_first_grading.val() > 0) {
                                g_ctr++;
                                ratings += +input_first_grading.val() > 0 ? +input_first_grading.val() : 0
                            }
                            
                            if (input_second_grading.length > 0 && +input_second_grading.val() > 0) {
                                g_ctr++;
                                ratings += +input_second_grading.val() > 0 ?  +input_second_grading.val() : 0
                            }
                            
                            if (input_third_grading.length > 0 && +input_third_grading.val() > 0) {
                                g_ctr++;
                                ratings += +input_third_grading.val() > 0 ?  +input_third_grading.val() : 0
                            }
                            
                            if (input_fourth_grading.length > 0 && +input_fourth_grading.val() > 0) {
                                g_ctr++;
                                ratings += +input_fourth_grading.val() > 0 ?  +input_fourth_grading.val() : 0
                            }
                            
                            console.log(g_ctr)
                            console.log(ratings)

                            if (g_ctr > 0) {
                                ratings = ratings / g_ctr
                            }
                            display_final_ratings.html(`<strong>${ratings.toFixed(2)}</strong>`)
                            console.log(ratings)
                        }
                    }
                })
            })

            $('body').on('click', '.btn--save-grade', function (e) {
                e.preventDefault()
                const self =  $(this);
                const student_enrolled_subject_id = $(this).parents('tr').data('student_enrolled_subject_id');
                const enrollment_id = $(this).parents('tr').data('enrollment_id');
                const grading = $(this).data('grading');
                const grade_input = $('#'+grading+'_grading_' + atob(student_enrolled_subject_id))
                const grade = grade_input.val()
                var classSubjectDetailID = $('#classSubjectDetailID').val();
                
                alertify.defaults.transition = "slide";
                alertify.defaults.theme.ok = "btn btn-primary btn-flat";
                alertify.defaults.theme.cancel = "btn btn-danger btn-flat";
                alertify.confirm('Confirmation', 'Are you sure you want to save?', function(){  
                    $.ajax({
                        url         : "{{ route('faculty.student_grade_sheet.save_grade') }}",
                        type        : 'POST',
                        data        : { _token : '{{ csrf_token() }}', student_enrolled_subject_id : student_enrolled_subject_id, enrollment_id : enrollment_id, grade : grade, grading : grading , classSubjectDetailID : classSubjectDetailID},
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
                                
                
                                const input_first_grading = $('#first_grading_' + atob(student_enrolled_subject_id))
                                const input_second_grading = $('#second_grading_' + atob(student_enrolled_subject_id))
                                const input_third_grading = $('#third_grading_' + atob(student_enrolled_subject_id))
                                const input_fourth_grading = $('#fourth_grading_' + atob(student_enrolled_subject_id))
                                const display_final_ratings = $('.final-ratings_' + atob(student_enrolled_subject_id))
                                console.log($('#first_grading_' + atob(student_enrolled_subject_id)))
                                console.log($('#second_grading_' + atob(student_enrolled_subject_id)))
                                console.log($('#third_grading_' + atob(student_enrolled_subject_id)))
                                console.log($('#fourth_grading_' + atob(student_enrolled_subject_id)))
                                console.log(display_final_ratings)
                                let g_ctr = 0
                                let ratings = 0
                                if (input_first_grading.length > 0 && +input_first_grading.val() > 0) {
                                    g_ctr++;
                                    ratings += +input_first_grading.val() > 0 ? +input_first_grading.val() : 0
                                }
                                
                                if (input_second_grading.length > 0 && +input_second_grading.val() > 0) {
                                    g_ctr++;
                                    ratings += +input_second_grading.val() > 0 ?  +input_second_grading.val() : 0
                                }
                                
                                if (input_third_grading.length > 0 && +input_third_grading.val() > 0) {
                                    g_ctr++;
                                    ratings += +input_third_grading.val() > 0 ?  +input_third_grading.val() : 0
                                }
                                
                                if (input_fourth_grading.length > 0 && +input_fourth_grading.val() > 0) {
                                    g_ctr++;
                                    ratings += +input_fourth_grading.val() > 0 ?  +input_fourth_grading.val() : 0
                                }
                                
                                console.log(g_ctr)
                                console.log(ratings)

                                if (g_ctr > 0) {
                                    ratings = ratings / g_ctr
                                }
                                display_final_ratings.html(`<strong>${ratings.toFixed(2)}</strong>`)
                                console.log(ratings)
                                self.prop('disabled', true)
                                grade_input.prop('readonly', true) 
                            }
                        }
                    });
                }, function(){  

                });
            })
            
            $('body').on('click', '#js-btn_finalize', function (e) {
                e.preventDefault()
                const id = $(this).data('id')
                alertify.defaults.transition = "slide";
                alertify.defaults.theme.ok = "btn btn-primary btn-flat";
                alertify.defaults.theme.cancel = "btn btn-danger btn-flat";
                alertify.confirm('Confirmation', 'Are you sure you want to finalize?', function(){  
                    $.ajax({
                        url         : "{{ route('faculty.student_grade_sheet.finalize_grade') }}",
                        type        : 'POST',
                        data        : { _token : '{{ csrf_token() }}', id:id },
                        success     : function (res) {
                            
                            show_toast_alert({
                                heading : res.res_code == 0 ? 'Success' : 'Invalid',
                                message : res.res_msg,
                                type    : res.res_code == 0 ? 'success' : 'error'
                            });
                            fetch_data();
                        }
                    });
                }, function(){  

                });
            })
            $('body').on('click', '#js-btn_print', function (e) {
                e.preventDefault()
                const search_class_subject = $('.search_class_subject').val()
                const search_sy = $('.search_sy').val()
                window.open("{{ route('faculty.student_grade_sheet.list_students_by_class_print') }}?search_class_subject="+search_class_subject+'&search_sy='+search_sy, '', 'height=800,width=800')
            })
            // $('body').on('click', '#js-btn_print1', function (e) {
            //     e.preventDefault()
            //     const search_class_subject_sem = $('#search_class_subject_sem').val()
            //     const search_sy1 = $('#search_sy1').val()
            //     window.open("{{ route('faculty.student_grade_sheet.list_students_by_class_print1') }}?search_class_subject_sem="+search_class_subject_sem+'&search_sy1='+search_sy1, '', 'height=800,width=800')
            // })
            $('body').on('click', '#js-btn_print_sem1', function (e) {
                e.preventDefault()
                const search_class_subject_sem = $('.search_class_subject').val()
                const search_sy1 = $('#search_sy1').val()
                window.open("{{ route('faculty.student_grade_sheet.list_students_by_class_print1') }}?search_class_subject_sem="+search_class_subject_sem+'&search_sy1='+search_sy1, '', 'height=800,width=800')
            })
            $('body').on('click', '#js-btn_print_sem2', function (e) {
                e.preventDefault()
                const search_class_subject_sem = $('.search_class_subject').val()
                const search_sy1 = $('#search_sy').val()
                window.open("{{ route('faculty.student_grade_sheet.list_students_by_class_print1') }}?search_class_subject_sem="+search_class_subject_sem+'&search_sy1='+search_sy1, '', 'height=800,width=800')
            })
        });
    </script>
@endsection