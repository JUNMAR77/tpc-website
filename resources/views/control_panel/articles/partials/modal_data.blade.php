<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="js-form_subject_details">
                {{ csrf_field() }}
                @if ($Article)
                    <input type="hidden" name="id" value="{{ $Article->id }}">
                @endif
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        {{ $Article ? 'Edit Article' : 'Add Article' }}
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Article Type</label>
                        <select name="article_type" id="article_type" class="form-control">
                            <option value="1" {{ ($Article ? ($Article->article_type == 1 ? 'selected' : '') : '') }}>News</option>
                            <option value="2" {{ ($Article ? ($Article->article_type == 2 ? 'selected' : '') : '') }}>Events</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Article Status</label> <span class="text-muted"></span>
                        <select name="article_status" id="article_status" data-placeholder="Select article status" class="form-control">
                            <?php
                                $status = App\Article::ARTICLE_STATUS;
                                array_shift($status);
                            ?>
                            @foreach ($status as $key => $val)
                                <option {{ ($Article ? ($Article->status == $key + 1 ? 'selected' : '') : '') }} value="{{ $key + 1 }}"> {{ $val }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Featured Image (Optional) </label>
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <input name="featured_image" id="featured_image"  type="file" class="file-input hidden">
                                    
                                    <button type="button" id="js-btn_featured_image" class="btn btn-default btn-flat btn-sm btn-block">
                                        <i class="fa fa-file"></i>
                                        Click to upload featured image <span id="js-uploaded_file"> - <i>{{ ($Article ? ($Article->featured_image ? 'Has uploaded image file' : 'Not yet set') : 'Not yet set') }}</i></span>
                                    </button>
                                    
                                </div>
                            </div>
                            <p>JPG/JPEG/PNG only; max. size of 1MB</p>
                        <div class="help-block text-center" id="featured_image-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Posting Date</label> <span class="text-red">(Required)</span>
                        <div class="input-group">
                            <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control" name="posting_date" id="posting_date" value="{{ ($Article ? Carbon\Carbon::parse($Article->posting_date)->format('Y-m-d') : '') }}" placeholder="YYYY-MM-DD" >
                        </div>
                        <div class="help-block text-center" id="posting_date-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Article Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $Article ? $Article->title : '' }}">
                            <div class="help-block text-red text-center" id="title-error">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Article Content</label> <span class="text-red">(Required)</span>
                        {{-- <input type="text" class="form-control" name="description" id="description" value="{{ ($HomePageCarousel ? $HomePageCarousel->description : '') }}" placeholder="Description"> --}}
                        <textarea placeholder="Content" style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="content" id="content" cols="30" rows="10" class="js-wysiwyg_editor">{{ ($Article ? $Article->content : '') }}</textarea>
                        <div class="help-block text-center" id="content-error"></div>
                    </div>
                
                    <div class="form-group">
                        <label>Level</label> <span class="text-red">(Required)</span> <span class="pull-right"><label for=""><input type="checkbox" name="all_level" id="all_level"> Select All</label></span>
                        <?php
                            $article_levels = ($Article ? explode(',',$Article->level) : []);
                        ?>
                        <select name="level" id="level" style="width: 100%;" data-placeholder="Select level" class="form-control js-select2-multiple_level" multiple="multiple">
                            @foreach (App\Article::LEVEL as $key => $val)
                                <option value="{{ $key }}" {{ (in_array($key, $article_levels) ? 'selected' : '') }}>
                                    {{ $val }}
                                </option>
                            @endforeach
                        </select>
                        <div class="help-block text-center" id="level-error"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->