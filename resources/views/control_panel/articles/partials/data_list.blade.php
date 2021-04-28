                        <div class="pull-right">
                            {{ $Article ? $Article->links() : '' }}
                        </div>
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>Posting Date</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($Article)
                                    @foreach ($Article as $data)
                                        <tr>
                                            <td>{{ Carbon\Carbon::parse($data->posting_date)->format('Y-m-d') }}</td>
                                            <td>{{ str_limit($data->title, 50) }}</td>
                                            <td>
                                                <span class="label {{ App\Article::ARTICLE_TYPE_DESIGN[$data->article_type] }}">{{ App\Article::ARTICLE_TYPE[$data->article_type] }}</span>
                                            </td> 
                                            <td>
                                                <span class="label {{ App\Article::ARTICLE_STATUS_DESIGN[$data->status] }}">{{ App\Article::ARTICLE_STATUS[$data->status] }}</span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action
                                                        <span class="fa fa-caret-down"></span></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#" class="js-btn_update_sy" data-id="{{ $data->id }}">Edit</a></li>
                                                        <li><a href="#" class="js-btn_deactivate" data-id="{{ $data->id }}">Deactivate</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>