<div class="modal fade class_schedules" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="js-form_subject_details">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        Subject Schedule
                    </h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-dark">
                        <tr>
                            <th>Schedule</th>
                            <th>Subject</th>
                            <th>Grade Level</th>
                            <th>Section</th>
                            <th>Room</th>
                            <th>School Year</th>
                        </tr>
                        <tbody>
                            @foreach($ClassSubjectDetail as $data) 
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
                                    <td>{{ $data->subject }}</td>
                                    <td>{{ $data->grade_level }}</td>
                                    <td>{{ $data->section }}</td>
                                    <td>{{ $data->room_code }}</td>
                                    <td>{{ $data->school_year }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->