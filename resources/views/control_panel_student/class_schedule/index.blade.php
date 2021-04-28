@extends('control_panel_student.layouts.master')

@section ('styles') 
@endsection

@section ('content_title')
    Schedules
@endsection

@section ('content')
    <div class="box">
        <div class="overlay hidden" id="js-loader-overlay"><i class="fa fa-refresh fa-spin"></i></div>
        <div class="box-body">
            <div class="js-data-container">
                <table class="table no-margin">
                    <thead>
                        <tr>
                            <th>Schedule</th>
                            <th>Subject</th>
                            <th>Room</th>
                            <th>Grade & Section</th>
                            <th>Faculty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($Enrollment)
                            @foreach ($Enrollment as $key => $data)
                                <?php
                                    $days = $data ? $data->class_schedule ? explode(';', rtrim($data->class_schedule,";")) : [] : [];
                                    $daysObj = [];
                                    $daysDisplay = '';
                                    if ($days) 
                                    {
                                        foreach($days as $day)
                                        {
                                            $day_sched = explode('@', $day);
                                            $day = '';
                                            if ($day_sched[0] == 1) {
                                                $day = 'M';
                                            } else if ($day_sched[0] == 2) {
                                                $day = 'T';
                                            } else if ($day_sched[0] == 3) {
                                                $day = 'W';
                                            } else if ($day_sched[0] == 4) {
                                                $day = 'TH';
                                            } else if ($day_sched[0] == 5) {
                                                $day = 'F';
                                            }
                                            $t = explode('-', $day_sched[1]);
                                            $daysDisplay .= $day . '@' . $t[0] . '-' . $t[1] . '/';
                                        }
                                    }

                                ?>
                                <tr>
                                    <td>{{ rtrim($daysDisplay, '/') }}</td>
                                    <td>{{ $data->subject_code . ' ' . $data->subject }}</td>
                                    <td>{{ 'Room' . $data->room_code }}</td>
                                    <td>{{ $data->grade_level . ' ' . $data->section }}</td>
                                    <td>{{ $data->faculty_name }}</td>
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
        });
    </script>
@endsection