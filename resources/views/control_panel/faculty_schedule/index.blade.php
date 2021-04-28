@extends('control_panel.layouts.master')

@section ('content_title')
    Faculty Class Schedule
@endsection

@section ('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Search</h3>
            <form id="js-form_search">
                {{ csrf_field() }}
                <div id="js-form_search" class="form-group col-sm-12 col-md-3" style="padding-left:0;padding-right:0">
                    <input type="text" class="form-control" name="search">
                </div>
                <button type="submit" class="btn btn-flat btn-success">Search</button>
                <button type="button" class="pull-right btn btn-flat btn-danger" id="js-btn_report_all"><i class="fa fa-download"></i> Print</button>
            </form>
        </div>
        <div class="overlay hidden" id="js-loader-overlay"><i class="fa fa-refresh fa-spin"></i></div>
        <div class="box-body">
            <div class="js-data-container">
                @include('control_panel.faculty_schedule.partials.data_list')
            </div>
        </div>
    </div>
@endsection

@section ('scripts')
    <script>
        
        var page = 1;
        function fetch_data () {
            var formData = new FormData($('#js-form_search')[0]);
            formData.append('page', page);
            loader_overlay();
            $.ajax({
                url : "{{ route('shared.faculty_class_schedules.index') }}",
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
            $('body').on('click', '#js-button-add, .js-btn_update_sy', function (e) {
                e.preventDefault();
                {{--  loader_overlay();  --}}
                var id = $(this).data('id');
                $.ajax({
                    url : "{{ route('admin.faculty_information.modal_data') }}",
                    type : 'POST',
                    data : { _token : '{{ csrf_token() }}', id : id },
                    success : function (res) {
                        $('.js-modal_holder').html(res);
                        $('.js-modal_holder .modal').modal({ backdrop : 'static' });
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
            $('body').on('click', '.js-btn_view_class_schedule', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                $.ajax({
                    url         : "{{ route('shared.faculty_class_schedules.get_faculty_class_schedule') }}",
                    type        : 'POST',
                    data        : { _token : '{{ csrf_token() }}', id : id },
                    success     : function (res) {
                        $('.js-modal_holder').html(res);    
                        $('.js-modal_holder .modal').modal({ backdrop : 'static' });
                        {{--  $('.help-block').html('');
                        $('')
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
                        }  --}}
                    }
                });
            });

            $('body').on('click', '.js-btn_report', function (e) {
                e.preventDefault()
                const id = $(this).data('id')
                window.open("{{ route('shared.faculty_class_schedules.print_handled_subject') }}?id=" + id, '', 'height=800,width=800')
            })
            
            $('body').on('click', '#js-btn_report_all', function (e) {
                e.preventDefault()
                window.open("{{ route('shared.faculty_class_schedules.print_handled_subject_all') }}", '', 'height=800,width=800')
            })
        });
    </script>
@endsection