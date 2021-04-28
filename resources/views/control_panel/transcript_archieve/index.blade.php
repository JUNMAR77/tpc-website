@extends('control_panel.layouts.master')

@section ('content_title')
    Transcript of Record Archive
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('cms/plugins/datepicker/datepicker3.css')}}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2/select2.min.css') }}">
    <style>
        .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
            border: 1px solid #d2d6de;
            border-radius: 0;
            padding: 6px 12px;
            height: 34px;
        }
        .select2-results__option[aria-selected] {
            cursor: pointer;
            padding: 0 1em;
        }
        .transcript-table .form-group {
            margin-bottom: 0;
        }
    </style>
@endsection

@section ('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Search</h3>
            <form id="js-form_search">
                {{ csrf_field() }}
                <div class="form-group col-sm-12 col-md-3">
                    <select name="search_sy" id="search_sy" class="form-control">
                        <option value="">select year graduated</option>
                        @for ($i=1990;$i<=2018;$i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div id="js-form_search" class="form-group col-sm-12 col-md-3" style="padding-left:0;padding-right:0">
                    <input type="text" class="form-control" name="search" placeholder="search...">
                </div>
                <button type="submit" class="btn btn-flat btn-success">Search</button>
                <button type="button" class="pull-right btn btn-flat btn-danger btn-sm" id="js-button-add"><i class="fa fa-plus"></i> Add</button>
            </form>
        </div>
        <div class="overlay hidden" id="js-loader-overlay"><i class="fa fa-refresh fa-spin"></i></div>
        <div class="box-body">
            <div class="js-data-container">
                @include('control_panel.transcript_archieve.partials.data_list')
            </div>
        </div>
    </div>
@endsection

@section ('scripts')
    <script src="{{ asset('cms/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('cms/plugins/select2/select2.min.js') }}"></script>
    <script>
        

        var page = 1;
        function fetch_data () {
            var formData = new FormData($('#js-form_search')[0]);
            formData.append('page', page);
            loader_overlay();
            $.ajax({
                url : "{{ route('admin.transcript_archieve') }}",
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
            $('body').on('click', '#btn-upload-tor', function (e) {
                e.preventDefault()
                $('#tor').click()
            })
            $('body').on('change', '#tor', function(e) {
                const val = e.target.value.split('\\')
                if (val.length > 1) {
                    $('#btn-upload-tor').text(val[val.length - 1])
                } else {
                    $('#btn-upload-tor').text('Upload TOR')
                }
            })
            $('body').on('click', '#js-button-add, .js-btn_update_sy', function (e) {
                e.preventDefault();
                {{--  loader_overlay();  --}}
                var id = $(this).data('id');
                $.ajax({
                    url : "{{ route('admin.transcript_archieve.modal_data') }}",
                    type : 'POST',
                    data : { _token : '{{ csrf_token() }}', id : id },
                    success : function (res) {
                        $('.js-modal_holder').html(res);
                        $('.js-modal_holder .modal').modal({ backdrop : 'static' }).on('shown.bs.modal', function () {
                            {{--  $('.select2').select2({
                                dropdownParent: $("#js-form_transcript")
                            })
                            $('#birthday').datepicker({
                                autoclose: true
                            })  --}}
                        });
                    }
                });
            });
            
            $('body').on('click', '.js-btn_download', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                var file = $(this).data('file');
                $.ajax({
                    url : "{{ route('admin.transcript_archieve.download_tor') }}",
                    type : 'POST',
                    data : { _token : '{{ csrf_token() }}', id : id, file_name: file },
                    success : function (res) {
                        if (res.res_code == 1) {
                            show_toast_alert({
                                heading : 'Error',
                                message : res.res_msg,
                                type    : 'error'
                            });
                        } else {
                            show_toast_alert({
                                heading : 'Success',
                                message : res.res_msg,
                                type    : 'success'
                            });
                            console.log(res)
                            window.location = res.file_path;
                        }
                    }
                });
            });
            

            $('body').on('submit', '#js-form_transcript', function (e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url         : "{{ route('admin.transcript_archieve.save_transcript') }}",
                    type        : 'POST',
                    data        : formData,
                    processData : false,
                    contentType : false,
                    success     : function (res) {
                        console.log(res)
                        $('.help-block').html('');
                        if (res.res_code == 1)
                        {
                            for (var err in res.res_error_msg)
                            {
                                $('#msg-' + err).html('<code> '+ res.res_error_msg[err] +' </code>');
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

            $('body').on('submit', '#js-form_search', function (e) {
                e.preventDefault();
                fetch_data();
            });
            $('body').on('click', '.pagination a', function (e) {
                e.preventDefault();
                page = $(this).attr('href').split('=')[1];
                fetch_data();
            });
            $('body').on('click', '.js-btn_delete', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                alertify.defaults.transition = "slide";
                alertify.defaults.theme.ok = "btn btn-primary btn-flat";
                alertify.defaults.theme.cancel = "btn btn-danger btn-flat";
                alertify.confirm('Confirmation', 'Are you sure you want to deactivate?', function(){  
                    $.ajax({
                        url         : "{{ route('admin.transcript_archieve.delete_data') }}",
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

            $('body').on('click', '.js-btn_view_additional_info', function (e) {
                e.preventDefault()
                var id = $(this).data('id');
                $.ajax({
                    url : "{{ route('admin.faculty_information.additional_information') }}",
                    type : 'POST',
                    data : { _token : '{{ csrf_token() }}', id : id },
                    success : function (res) {
                        $('.js-modal_holder').html(res);
                        $('.js-modal_holder .modal').modal({ backdrop : 'static' });
                    }
                });
            })
        });
    </script>
@endsection