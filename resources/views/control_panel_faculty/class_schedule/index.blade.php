@extends('control_panel.layouts.master')

@section ('styles') 
@endsection

@section ('content_title')
    Class Schedules
@endsection

@section ('content')
    <div class="box">
        <div class="overlay hidden" id="js-loader-overlay"><i class="fa fa-refresh fa-spin"></i></div>
        <div class="box-body">
            <div class="js-data-container">
                <button id="js-btn_print" class="btn btn-primary btn-flat pull-right"><i class="fa fa-file-pdf"></i> Print</button>
                <table class="table no-margin">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Days</th>
                            <th>Subject</th>
                            <th>Room</th>
                            <th>Grade & Section</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($ClassSubjectDetail)
                            @foreach ($ClassSubjectDetail as $key => $data)
                                <tr>
                                    <td>{{ $data->class_time_from . ' -  ' . $data->class_time_to }}</td>
                                    <td>{{ $data->class_days }}</td>
                                    <td>{{ $data->subject_code . ' ' . $data->subject }}</td>
                                    <td>{{ 'Room' . $data->room_code }}</td>
                                    <td>{{ $data->grade_level . ' ' . $data->section }}</td>
                                </tr>
                            @endforeach
                        @else
                            
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
                url : "{{ route('faculty.subject_class.list_students_by_class') }}",
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
            $('body').on('change', '#search_sy', function () {
                $.ajax({
                    url : "{{ route('faculty.subject_class.list_class_subject_details') }}",
                    type : 'POST',
                    {{--  dataType    : 'JSON',  --}}
                    data        : {_token: '{{ csrf_token() }}', search_sy: $('#search_sy').val()},
                    success     : function (res) {

                        $('#search_class_subject').html(res);
                    }
                })
            })
            
            $('body').on('click', '#js-btn_print', function (e) {
                e.preventDefault()
                window.open("{{ route('faculty.faculty_class_schedules.class_schedules_print') }}", '', 'height=800,width=800')
            })
        });
    </script>
@endsection