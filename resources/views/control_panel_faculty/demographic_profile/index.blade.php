@extends('control_panel.layouts.master')

@section ('content_title')
    Student Demographic Profile
@endsection

@section ('content')

    <div class="box">
                    <div class="overlay hidden" id="js-loader-overlay"><i class="fa fa-refresh fa-spin"></i></div>
                    <div class="box-body">
                        @if($ClassSubjectDetail)                        
                            <h4><b>Year and Section: <i style="color: red">Grade:{{ $ClassSubjectDetail->grade_level }} - {{ $ClassSubjectDetail->section }}</i></b></h4>     
                        @else
                            <h4><b>Year and Section: <i style="color: red">Not Available</i></b></h4>     
                        @endif
                        <div class="js-data-container1">
                                <button class="btn btn-flat btn-danger pull-right" id="js-btn_print" data-id=""><i class="fa fa-file-pdf"></i> Print</button>
                                
                                
                                        <table class="table no-margin table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 30px">#</th>
                                                        <th style="width: ">Student Name</th>   
                                                        <th style="width: 180px; text-align:center">Birthdate</th>
                                                        <th style="width: 90px; text-align:center">Age June</th>
                                                        <th style="width: 90px; text-align:center">Age May</th>
                                                        <th style="text-align:center" >Address</th>
                                                        {{-- <th>Gender</th> --}}
                                                        <th style="text-align:center" >Guardian</th>
                                                        {{-- <th>Father Name</th> --}}
                                                        {{-- <th>Mother Name</th>    --}}
                                                        <th style="text-align:center" >Action</th>                                 
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>      
                                                                               
                                                    <tr>
                                                        <td colspan="16">
                                                            <b>Male</b> 
                                                        </td>
                                                    </tr>
        
                                                    @foreach ($EnrollmentMale as $key => $data) 
                                                        {{-- <form action="{{ route('faculty.save-class-demographic') }}" method="POST" novalidate="novalidate"> --}}
                                                        <form id="js_demographic">
                                                                {{ csrf_field() }}
                                                            <tr>
                                                                <td>{{ $key + 1 }}.</td>
                                                                <td>{{ $data->student_name }}</td>
                                                                <td>
                                                                    <input type="hidden" id="stud_id" name="stud_id" value="{{  $data->student_information_id }}" />
                                                                        {{-- {{  $data->c_address }} --}}
                                                                    <div class="input-group date">
                                                                        <div class="input-group-addon">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                        <input type="text" name="birthdate" class="datepicker form-control pull-right" id="datepicker" placeholder="DOB" value="{{ $data ? date_format(date_create( $data->birthdate), 'm/d/Y') : '' }}">
                                                                    </div>
                                                                    <div class="help-block text-red text-center" id="js-birthdate">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="age_june" value="{{ $data ? $data->age_june : '' }}" placeholder="Age">
                                                                    <div class="help-block text-red text-center" id="js-age_june">
                                                                    </div>                                                    
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="age_may" value="{{ $data ? $data->age_may : '' }}" placeholder="Age">
                                                                    <div class="help-block text-red text-center" id="js-age_may">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="address" value="{{ $data ? $data->c_address : '' }}" placeholder="Address">
                                                                    <div class="help-block text-red text-center" id="js-address">
                                                                    </div>
                                                                </td>
                                                                {{-- <td> <select name="gender" id="gender" class="form-control">
                                                                        <option value="">Select gender</option>
                                                                        <option value="1" {{ $data ? $data->gender == 1 ? 'selected' : '' : '' }}>Male</option>
                                                                        <option value="2" {{ $data ? $data->gender == 2 ? 'selected' : '' : '' }}>Female</option>
                                                                    </select>
                                                                </td> --}}
                                                                <td>
                                                                    <input type="text" class="form-control" name="guardian" value="{{ $data ? $data->guardian : '' }}" placeholder="Guardian name">
                                                                    <div class="help-block text-red text-center" id="js-guardian">
                                                                    </div>
                                                                </td>
                                                                {{-- <td>{{ $data->father_name }}</td> --}}
                                                                {{-- <td>{{ $data->mother_name }}</td> --}}
                                                                <td>
                                                                    <center>
                                                                    <button type="submit" class="btn btn-sm btn-primary save">save</button>
                                                                    </center>
                                                                </td>
                                                                
                                                            </tr>
                                                        </form>
                                                        
                                                    @endforeach
                    
                                                    <tr>
                                                        <td colspan="16">
                                                            <b>Female</b>
                                                        </td>
                                                    </tr>
                    
                                                    
                                                    @foreach ($EnrollmentFemale as $key => $data) 
                                                    {{-- <form action="{{ route('faculty.save-class-demographic') }}" method="POST" novalidate="novalidate"> --}}
                                                        <form id="js_demographic">
                                                                {{ csrf_field() }}
                                                            <tr>
                                                                <td>{{ $key + 1 }}.</td>
                                                                <td>{{ $data->student_name }}</td>
                                                                <td>
                                                                        <input type="hidden" id="stud_id" name="stud_id" value="{{  $data->student_information_id }}" />
                                                                    {{-- {{  $data->c_address }} --}}
                                                                    
                                                                    <div class="input-group date">
                                                                        <div class="input-group-addon">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                        <input type="text" name="birthdate" class="datepicker form-control pull-right datails_input" id="datepicker{{ $key + 1 }}" value="{{ $data ? date_format(date_create( $data->birthdate), 'm/d/Y') : '' }}" placeholder="DOB">
                                                                    </div>
                                                                    
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control input-sm datails_input" name="age_june" id="age_june_{{ $data->id }}" value="{{ $data ? $data->age_june : '' }}" placeholder="Age">
                                                                    {{-- <div class="help-block text-red text-center" id="js-age_june">
                                                                    </div>                                                     --}}
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control input-sm datails_input" name="age_may" value="{{ $data ? $data->age_may : '' }}" placeholder="Age">
                                                                    {{-- <div class="help-block text-red text-center" id="js-age_may">
                                                                    </div> --}}
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control input-sm datails_input" name="address" value="{{ $data ? $data->c_address : '' }}" placeholder="Address">
                                                                    {{-- <div class="help-block text-red text-center" id="js-address">
                                                                    </div> --}}
                                                                </td>
                                                                {{-- <td> <select name="gender" id="gender" class="form-control">
                                                                        <option value="">Select gender</option>
                                                                        <option value="1" {{ $data ? $data->gender == 1 ? 'selected' : '' : '' }}>Male</option>
                                                                        <option value="2" {{ $data ? $data->gender == 2 ? 'selected' : '' : '' }}>Female</option>
                                                                    </select>
                                                                </td> --}}
                                                                <td>
                                                                    <input type="text" class="form-control input-sm datails_input" name="guardian" value="{{ $data ? $data->guardian : '' }}" placeholder="Guardian name">
                                                                    {{-- <div class="help-block text-red text-center" id="js-guardian">
                                                                    </div> --}}
                                                                </td>
                                                                {{-- <td>{{ $data->father_name }}</td> --}}
                                                                {{-- <td>{{ $data->mother_name }}</td> --}}
                                                                <td>
                                                                    <button type="submit" class="btn btn-sm btn-primary" >save</button>
                                                                </td>
                                                                
                                                            </tr>
                                                        </form>
                                                    @endforeach                                    
                                                        
                                                    
                                        </table>
                                
                                                       
                        </div>
                    </div>
                 
                   
            
            
            
    </div>       
                
                
@endsection

@section ('scripts')
    <script src="{{ asset('cms/plugins/datepicker1/bootstrap-datepicker1.js') }}"></script>
    <script>
    
    $('.datepicker').each(function () {
           $(this).removeClass('hasDatepicker').datepicker();
    });


    // $( "#datepicker" ).datepicker();
    $('body').on('submit', '#js_demographic', function (e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url         : "{{ route('faculty.save_demographic') }}",
                    type        : 'POST',
                    data        : formData,
                    processData : false,
                    contentType : false,
                    success     : function (res) {
                        $('.help-block').html('');
                        if (res.res_code == 1)
                        {
                            show_toast_alert({
                                heading : 'Error',
                                message : res.res_msg,
                                type    : 'error'
                            });
                        }
                        else
                        {
                            show_toast_alert({
                                heading : 'Success',
                                message : res.res_msg,
                                type    : 'success'
                            });                        
                
                            // fetch_data ();
                            loader_overlay();
                            setTimeout(function() {
                                location.reload();
                                }, 15);
                        }
                    }
                });
            });
    
    </script>   
@endsection