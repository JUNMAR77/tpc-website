@extends('control_panel.layouts.master')

@section ('content_title')
    Student Remarks and Print Class Card
@endsection

@section ('content')

    <div class="box">
        <div class="overlay hidden" id="js-loader-overlay"><i class="fa fa-refresh fa-spin"></i></div>
        <div class="box-body">
            <div class="js-data-container1">                                                        
            </div>
        </div>
        
        <div class="overlay hidden" id="js-loader-overlay"><i class="fa fa-refresh fa-spin"></i></div>
        <div class="box-body">
            <div class="js-data-container">
                @include('control_panel_faculty.encode_remarks.partials.data_list')                            
            </div>
        </div>            
    </div>                       
                
@endsection

@section ('scripts')
    <script src="{{ asset('cms/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script>
    $( ".tbdatepicker" ).datepicker();
    
    var page = 1;
        function fetch_data () {
            var formData = new FormData($('#js-form_search')[0]);
            formData.append('page', page);
            loader_overlay();
            $.ajax({
                url : "{{ route('faculty.encode-remarks.index') }}",
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

        $('body').on('click', '#js-btn_print', function (e) {
                e.preventDefault();
                {{--  loader_overlay();  --}}
                var id = $(this).attr('rel');
                var print_sy = $('#print_sy').val();
                
                window.open("{{ route('faculty.AdvisoryClass.print_grades') }}?id="+id+"&cid="+print_sy, '', 'height=800,width=800')
        })
        
            $('body').on('submit', '#js_lacking_units_jr', function (e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url         : "{{ route('faculty.encode-remarks.save') }}",
                    type        : 'POST',
                    data        : formData,
                    processData : false,
                    contentType : false,
                    success     : function (res) {
                        // $('.help-block').html('');
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
                
                            // fetch_data ();
                            loader_overlay();
                            setTimeout(function() {
                                location.reload();
                                }, 15);
                        }
                    }
                });
            });
            
            
            $('body').on('submit', '#js_lacking_units_jr_fem', function (e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url         : "{{ route('faculty.encode-remarks.save') }}",
                    type        : 'POST',
                    data        : formData,
                    processData : false,
                    contentType : false,
                    success     : function (res) {
                        // $('.help-block').html('');
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
                
                            // fetch_data ();
                            loader_overlay();
                            setTimeout(function() {
                                location.reload();
                                }, 15);
                        }
                    }
                });
            });

            $('body').on('submit', '#js_lacking_units_sr', function (e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url         : "{{ route('faculty.encode-remarks.save') }}",
                    type        : 'POST',
                    data        : formData,
                    processData : false,
                    contentType : false,
                    success     : function (res) {
                        // $('.help-block').html('');
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
                
                            // fetch_data ();
                            loader_overlay();
                            setTimeout(function() {
                                location.reload();
                                }, 15);
                        }
                    }
                });
            });

            $('body').on('submit', '#js_lacking_units_sr_fem', function (e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url         : "{{ route('faculty.encode-remarks.save') }}",
                    type        : 'POST',
                    data        : formData,
                    processData : false,
                    contentType : false,
                    success     : function (res) {
                        // $('.help-block').html('');
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
                
                            // fetch_data ();
                            loader_overlay();
                            setTimeout(function() {
                                location.reload();
                                }, 15);
                        }
                    }
                });
            });
    
    </script>   
@endsection