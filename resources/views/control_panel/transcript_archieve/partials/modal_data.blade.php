<div class="modal fade" id="modal-tor" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="js-form_transcript" autocomplete="off">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        Transcript of Record Archieve
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Personal Information</a></li>
                            <li><a data-toggle="tab" href="#menu1">Grade Information</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <div class="form-group">
                                    <label for="">First name</label>
                                    <input type="text" class="form-control" name="first_name" value="{{ $FacultyInformation ? $FacultyInformation->first_name : '' }}" autoComplete="off">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">Middle name</label>
                                    <input type="text" class="form-control" name="middle_name" value="{{ $FacultyInformation ? $FacultyInformation->middle_name : '' }}" autoComplete="off">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">Last name</label>
                                    <input type="text" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">School Year</label>
                                    <input type="text" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off">
                                    
                                </div>
                                <div class="form-group">
                                    <label>Birthday</label>
                                    <input type="text" name="birthday" id="birthday" class="form-control pull-right" autoComplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="">Parent or Guardian</label>
                                    <input type="text" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">Parent or Guardian Occupation</label>
                                    <input type="text" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">Address of Parent or Guardian</label>
                                    <input type="text" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">Intermediate Course Completed</label>
                                    <input type="text" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">Total no. of years in school to complete Elem Course</label>
                                    <input type="text" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off">
                                    
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="form-group">
                                    <label for="">School Year</label>
                                    <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected">2011-2012</option>
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">General Average</label>
                                    <input type="text" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off">
                                </div>
                                
                                <div class="box">
                                    <div class="box-header no-border">
                                        <h3 class="box-title">First Year</h3>
                                        <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="">Total no. of years in school to date</label>
                                                    <input type="text" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="">School Year</label>
                                                    <select class="form-control select2" style="width: 100%;">
                                                        <option selected="selected">2011-2012</option>
                                                        </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="">School</label>
                                                    <input type="text" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <table class="table transcript-table">
                                             
                                                <thead>
                                                    <tr>
                                                        <th style="min-width:250px">Subject</th>
                                                        <th>Final Rating</th>
                                                        <th>Action Taken</th>
                                                        <th>Units Earned</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="form-control select2" name="first_year_subject[]" style="width: 100%;">
                                                                    <option selected="selected">FILIPINO I</option>
                                                                    <option >ENGLISH I</option>
                                                                    <option >MATHEMATICS I</option>
                                                                    <option >SCIENCE I</option>
                                                                    <option >Araling Panlipunan I</option>
                                                                    <option >TLE I</option>
                                                                    <option >MAPEH I</option>
                                                                    <option >EP I</option>
                                                                    <option >COMPUTER EDUCATION I</option>
                                                                    <option >RELIGION I</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="first_year_subject_rating[]" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select name="" id="" class="form-control">
                                                                    <option value="Passed">Passed</option>
                                                                    <option value="Failed">Failed</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="first_year_subject_action_taken[]" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="form-control select2" style="width: 100%;">
                                                                    <option >FILIPINO I</option>
                                                                    <option selected="selected">ENGLISH I</option>
                                                                    <option >MATHEMATICS I</option>
                                                                    <option >SCIENCE I</option>
                                                                    <option >Araling Panlipunan I</option>
                                                                    <option >TLE I</option>
                                                                    <option >MAPEH I</option>
                                                                    <option >EP I</option>
                                                                    <option >COMPUTER EDUCATION I</option>
                                                                    <option >RELIGION I</option>
                                                                </select>
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="first_year_subject_units_earned[]" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select name="" id="" class="form-control">
                                                                    <option value="Passed">Passed</option>
                                                                    <option value="Failed">Failed</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="form-control select2" style="width: 100%;">
                                                                    <option >FILIPINO I</option>
                                                                    <option >ENGLISH I</option>
                                                                    <option selected="selected">MATHEMATICS I</option>
                                                                    <option >SCIENCE I</option>
                                                                    <option >Araling Panlipunan I</option>
                                                                    <option >TLE I</option>
                                                                    <option >MAPEH I</option>
                                                                    <option >EP I</option>
                                                                    <option >COMPUTER EDUCATION I</option>
                                                                    <option >RELIGION I</option>
                                                                </select>
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select name="" id="" class="form-control">
                                                                    <option value="Passed">Passed</option>
                                                                    <option value="Failed">Failed</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="form-control select2" style="width: 100%;">
                                                                    <option >FILIPINO I</option>
                                                                    <option >ENGLISH I</option>
                                                                    <option >MATHEMATICS I</option>
                                                                    <option selected="selected">SCIENCE I</option>
                                                                    <option >Araling Panlipunan I</option>
                                                                    <option >TLE I</option>
                                                                    <option >MAPEH I</option>
                                                                    <option >EP I</option>
                                                                    <option >COMPUTER EDUCATION I</option>
                                                                    <option >RELIGION I</option>
                                                                </select>
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select name="" id="" class="form-control">
                                                                    <option value="Passed">Passed</option>
                                                                    <option value="Failed">Failed</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="form-control select2" style="width: 100%;">
                                                                    <option >FILIPINO I</option>
                                                                    <option >ENGLISH I</option>
                                                                    <option >MATHEMATICS I</option>
                                                                    <option >SCIENCE I</option>
                                                                    <option selected="selected">Araling Panlipunan I</option>
                                                                    <option >TLE I</option>
                                                                    <option >MAPEH I</option>
                                                                    <option >EP I</option>
                                                                    <option >COMPUTER EDUCATION I</option>
                                                                    <option >RELIGION I</option>
                                                                </select>
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select name="" id="" class="form-control">
                                                                    <option value="Passed">Passed</option>
                                                                    <option value="Failed">Failed</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="form-control select2" style="width: 100%;">
                                                                    <option >FILIPINO I</option>
                                                                    <option >ENGLISH I</option>
                                                                    <option >MATHEMATICS I</option>
                                                                    <option >SCIENCE I</option>
                                                                    <option >Araling Panlipunan I</option>
                                                                    <option selected="selected">TLE I</option>
                                                                    <option >MAPEH I</option>
                                                                    <option >EP I</option>
                                                                    <option >COMPUTER EDUCATION I</option>
                                                                    <option >RELIGION I</option>
                                                                </select>
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select name="" id="" class="form-control">
                                                                    <option value="Passed">Passed</option>
                                                                    <option value="Failed">Failed</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="form-control select2" style="width: 100%;">
                                                                    <option >FILIPINO I</option>
                                                                    <option >ENGLISH I</option>
                                                                    <option >MATHEMATICS I</option>
                                                                    <option >SCIENCE I</option>
                                                                    <option >Araling Panlipunan I</option>
                                                                    <option >TLE I</option>
                                                                    <option selected="selected">MAPEH I</option>
                                                                    <option >EP I</option>
                                                                    <option >COMPUTER EDUCATION I</option>
                                                                    <option >RELIGION I</option>
                                                                </select>
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select name="" id="" class="form-control">
                                                                    <option value="Passed">Passed</option>
                                                                    <option value="Failed">Failed</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="form-control select2" style="width: 100%;">
                                                                    <option >FILIPINO I</option>
                                                                    <option >ENGLISH I</option>
                                                                    <option >MATHEMATICS I</option>
                                                                    <option >SCIENCE I</option>
                                                                    <option >Araling Panlipunan I</option>
                                                                    <option >TLE I</option>
                                                                    <option >MAPEH I</option>
                                                                    <option selected="selected">EP I</option>
                                                                    <option >COMPUTER EDUCATION I</option>
                                                                    <option >RELIGION I</option>
                                                                </select>
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select name="" id="" class="form-control">
                                                                    <option value="Passed">Passed</option>
                                                                    <option value="Failed">Failed</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="form-control select2" style="width: 100%;">
                                                                    <option >FILIPINO I</option>
                                                                    <option >ENGLISH I</option>
                                                                    <option >MATHEMATICS I</option>
                                                                    <option >SCIENCE I</option>
                                                                    <option >Araling Panlipunan I</option>
                                                                    <option >TLE I</option>
                                                                    <option >MAPEH I</option>
                                                                    <option >EP I</option>
                                                                    <option selected="selected">COMPUTER EDUCATION I</option>
                                                                    <option >RELIGION I</option>
                                                                </select>
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select name="" id="" class="form-control">
                                                                    <option value="Passed">Passed</option>
                                                                    <option value="Failed">Failed</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="form-control select2" style="width: 100%;">
                                                                    <option >FILIPINO I</option>
                                                                    <option >ENGLISH I</option>
                                                                    <option >MATHEMATICS I</option>
                                                                    <option >SCIENCE I</option>
                                                                    <option >Araling Panlipunan I</option>
                                                                    <option >TLE I</option>
                                                                    <option >MAPEH I</option>
                                                                    <option >EP I</option>
                                                                    <option >COMPUTER EDUCATION I</option>
                                                                    <option selected="selected">RELIGION I</option>
                                                                </select>
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select name="" id="" class="form-control">
                                                                    <option value="Passed">Passed</option>
                                                                    <option value="Failed">Failed</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" name="last_name" value="{{ $FacultyInformation ? $FacultyInformation->last_name : '' }}" autoComplete="off"  min="60.00" step="any">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="box">
                                    <div class="box-header no-border">
                                        <h3 class="box-title">Second Year</h3>
                                        <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        </div>
                                    </div>
                                    <div class="box-body">

                                    </div>
                                </div>
                            </div>
                        </div>
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