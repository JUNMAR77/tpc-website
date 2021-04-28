                        <div class="pull-right">
                            {{ $FacultyInformation ? $FacultyInformation->links() : '' }}
                        </div>
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>No. of Handled Subjects</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($FacultyInformation)
                                    @foreach ($FacultyInformation as $data)
                                        <tr>
                                            <td>{{ $data->fullname }}</td>
                                            <td>{{ collect(\App\FacultyInformation::DEPARTMENTS)->firstWhere('id', $data->department_id)['department_name'] }}</td>
                                            <td>{{ $data->subjects_count }}</td>
                                            
                                            <td>
                                                <div class="input-group-btn pull-left text-left">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action
                                                        <span class="fa fa-caret-down"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#" class="js-btn_view_class_schedule" data-id="{{ $data->id }}">View Handled Subjects</a></li>
                                                        <li><a href="#" target="_blank" class="js-btn_report" data-id="{{ $data->id }}">Print Subjects</a></li>
                                                    </ul>>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>