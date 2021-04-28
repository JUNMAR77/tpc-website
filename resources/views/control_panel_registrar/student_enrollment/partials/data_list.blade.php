                        <div class="pull-right">
                            {{ $StudentInformation ? $StudentInformation->links() : '' }}
                        </div>
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>Student Number</th>
                                    <th>Student Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($StudentInformation)
                                    @foreach ($StudentInformation as $data)
                                        <tr>
                                            <td>{{ $data->username }}</td>
                                            <td>{{ $data->fullname }}</td>
                                            <td>
                                                <div class="input-group-btn pull-left text-left">
                                                    <button type="button" class="btn btn-primary js-btn_enroll_student" data-id="{{ $data->id }}" aria-expanded="true">
                                                        Enroll
                                                    </button>
                                                        {{--  <span class="fa fa-caret-down"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#" class="js-btn_update" data-id="{{ $data->id }}">Edit</a></li>
                                                        <li><a href="#" class="js-btn_manage_subjects" data-id="{{ $data->id }}">Manage Subjects</a></li>
                                                        <li><a href="#" class="js-btn_deactivate" data-id="{{ $data->id }}">Deactivate</a></li>
                                                    </ul>  --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>