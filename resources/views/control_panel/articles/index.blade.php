@extends('control_panel.layouts.master')

@section ('content_title')
    Announcement
@endsection

@section ('styles')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/iCheck/flat/orange.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/iCheck/all.css') }}">
    <!-- bootstrap3 wysihtml5 -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css') }}">
    <style>
        .table td{
            vertical-align: middle !important;
        }
    </style>
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
                <button type="button" class="pull-right btn btn-flat btn-danger btn-sm" id="js-button-add"><i class="fa fa-plus"></i> Add</button>
            </form>
        </div>
        <div class="overlay hidden" id="js-loader-overlay"><i class="fa fa-refresh fa-spin"></i></div>
        <div class="box-body">
            <div class="js-data-container">
                @include('control_panel.articles.partials.data_list')
            </div>
        </div>
    </div>
@endsection

@section ('scripts')
    {{--  <script src="http://loc.student-management-system/cms/plugins/datepicker/bootstrap-datepicker.js"></script>  --}}
    <script src="{{ asset('cms/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('cms/plugins/iCheck/icheck.min.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    {{--  <script src="http://loc.everestacademy/cms/plugins/iCheck/icheck.min.js"></script>  --}}
    <!-- bootstrap3 wysihtml5 -->
    <script src="{{ asset('cms/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
    <script>

        //iCheck was checked 
        $('body').on('ifChecked', '#all_level', function(e){
            select2level.val([1,2,3,4]).trigger('change');
        });
        
        var page = 1;
        function fetch_data () {
            var formData = new FormData($('#js-form_search')[0]);
            formData.append('page', page);
            loader_overlay();
            $.ajax({
                url : "{{ route('admin.articles') }}",
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
                    url : "{{ route('admin.articles.modal_data') }}",
                    type : 'POST',
                    data : { _token : '{{ csrf_token() }}', id : id },
                    success : function (res) {
                        $('.js-modal_holder').html(res);
                        $('.js-modal_holder .modal').modal({ backdrop : 'static' });
                        $('.js-modal_holder .modal').on('shown.bs.modal', function () {
                            //Date picker
                            $('#posting_date').datepicker({
                                autoclose: true,
                                format  : 'yyyy-mm-dd'
                            }).datepicker("setDate", new Date());

                            //iCheck
                            $('#all_level, #link_to_article').iCheck({                                
                                checkboxClass: 'icheckbox_flat-orange'
                            });
                            select2level = $(".js-select2-multiple_level").select2();

                            //wisywightml5
                            $(".js-wysiwyg_editor").wysihtml5({
                                toolbar: {
                                    "font-styles": true, // Font styling, e.g. h1, h2, etc.
                                    "emphasis": true, // Italics, bold, etc.
                                    "lists": false, // (Un)ordered lists, e.g. Bullets, Numbers.
                                    "html": false, // Button which allows you to edit the generated HTML.
                                    "link": false, // Button to insert a link.
                                    "image": false, // Button to insert an image.
                                    "color": false, // Button to change color of font
                                    "blockquote": true, // Blockquote
                                    "size":'sm' // options are xs, sm, lg
                                }
                            });
                        });
                    }
                });
            });

            $('body').on('submit', '#js-form_subject_details', function (e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                    formData.append('multiple_level', select2level.val());
                $.ajax({
                    url         : "{{ route('admin.articles.save_data') }}",
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
                                $('#' + err +'-error').html('<code> '+ res.res_error_msg[err] +' </code>');
                            }
                            show_toast_alert({
                                heading : 'Error',
                                message : res.res_msg,
                                type    : 'error'
                            });
                        }
                        else
                        {
                            $('.js-modal_holder .modal').modal('hide');
                            show_toast_alert({
                                heading : 'Success',
                                message : res.res_msg,
                                type    : 'success'
                            });
                            fetch_data();
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

            //upload featured image button click
            $('body').on('click', '#js-btn_featured_image', function (e){
                e.preventDefault();
                $('#featured_image').click();
            });

            // $('body').on('click', '.js-btn_deactivate', function (e) {
            //     e.preventDefault();
            //     var id = $(this).data('id');
            //     alertify.defaults.transition = "slide";
            //     alertify.defaults.theme.ok = "btn btn-primary btn-flat";
            //     alertify.defaults.theme.cancel = "btn btn-danger btn-flat";
            //     alertify.confirm('Confirmation', 'Are you sure you want to deactivate?', function(){  
            //         $.ajax({
            //             url         : "{{ route('admin.maintenance.classrooms.deactivate_data') }}",
            //             type        : 'POST',
            //             data        : { _token : '{{ csrf_token() }}', id : id },
            //             success     : function (res) {
            //                 $('.help-block').html('');
            //                 if (res.res_code == 1)
            //                 {
            //                     show_toast_alert({
            //                         heading : 'Error',
            //                         message : res.res_msg,
            //                         type    : 'error'
            //                     });
            //                 }
            //                 else
            //                 {
            //                     show_toast_alert({
            //                         heading : 'Success',
            //                         message : res.res_msg,
            //                         type    : 'success'
            //                     });
            //                     $('.js-modal_holder .modal').modal('hide');
            //                     fetch_data();
            //                 }
            //             }
            //         });
            //     }, function(){  

            //     });
            // });
        });
    </script>
@endsection