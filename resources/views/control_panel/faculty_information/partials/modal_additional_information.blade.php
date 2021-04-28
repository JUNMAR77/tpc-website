<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    Faculty Profile
                </h4>
            </div>
            <div class="modal-body">
                <h3>{{ ucfirst($FacultyInformation->last_name) . ', ' . ucfirst($FacultyInformation->first_name) . ' ' . ucfirst($FacultyInformation->middle_name) }}</h3>
                <hr>
                <h4>Basic Information</h4>
                <table class="table table-bordered table-condensed">
                    <tr>
                        <td>Email : <strong>{{ $FacultyInformation->email }}</strong></td>
                        <td>Contact Number : <strong>{{ $FacultyInformation->contact_number }}</strong></td>
                    </tr>
                    <tr>
                        <td>Birthday : <strong>{{ $FacultyInformation->birthday }}</strong></td>
                        <td>Address : <strong>{{ $FacultyInformation->address }}</strong></td></td>
                    </tr>
                </table>
                <hr>
                <h4>Educational Attainment</h4>
                <table class="table table-bordered table-condensed">
                    <tr>
                        <th>Course</th>
                        <th>School</th>
                        <th>Duration</th>
                        <th>Award</th>
                    </tr>
                    <tbody>
                        @foreach ($FacultyEducation as $data) 
                            <tr>
                                <td>{{$data->course}} </td>
                                <td>{{$data->school}} </td>
                                <td>{{$data->from}}  - {{$data->to}}  </td>
                                <td>{{$data->awards}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <hr>

                <h4>Seminars & Trainings Attended</h4>
                <table class="table table-bordered table-condensed">
                    <tr>
                        <th>Title</th>
                        <th>Duration</th>
                        <th>Vunue</th>
                        <th>Sponsor</th>
                        <th>Facilitator</th>
                        <th>Type</th>
                    </tr>
                    <tbody>
                        @foreach ($FacultySeminar as $data) 
                            <tr>
                                <td>{{$data->title}}</td>
                                <td>{{$data->date_from}} - {{$data->date_to}} </td>
                                <td>{{$data->venue}}</td>
                                <td>{{$data->sponsor}}</td>
                                <td>{{$data->facilitator}}</td>
                                <td>{{ ($data->type == 1 ? 'Local' : ($data->type == 2 ? 'National' : ($data->type == 3 ? 'International' : '' ))) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->