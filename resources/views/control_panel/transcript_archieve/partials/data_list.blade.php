                        <div class="pull-right">
                            {{ $TrascriptArhieve ? $TrascriptArhieve->links() : '' }}
                        </div>
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>School Year Graduated</th>
                                    <th>TOR Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($TrascriptArhieve)
                                    @foreach ($TrascriptArhieve as $data)
                                        <tr>
                                            <td>{{ $data->last_name . ' ' .$data->first_name . ' ' . $data->middle_name }}</td>
                                            <td>{{ $data->school_year_graduated }}</td>
                                            {{--  <td>{{ (collect(\App\TrascriptArhieve::DEPARTMENTS)->firstWhere('id', $data->department_id)['department_name']) }}</td>  --}}
                                            <td>{{ $data->file_name ? 'Available' : 'Not Available' }}</td>
                                            <td>
                                                <div class="input-group-btn pull-left text-left">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action
                                                        <span class="fa fa-caret-down"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#" class="js-btn_update_sy" data-id="{{ $data->id }}"><i class="fa fa-pencil"></i> Edit</a></li>
                                                        <li><a href="#" class="js-btn_delete" data-id="{{ $data->id }}"><i class="fa fa-trash"></i> Delete</a></li>
                                                        <li><a href="#" class="js-btn_download" data-id="{{ $data->id }}" data-file="{{ $data->file_name }}"><i class="fa fa-download"></i> Download TOR</a></li>
                                                    </ul>>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>