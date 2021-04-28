@extends('control_panel.layouts.master')

@section ('styles') 
@endsection

@section ('content_title')
    Encode Students Grades
@endsection

@section ('content')
<div class="container-fluid">

    @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{!! session('flash_message_error')!!}</strong>
        </div>
    @endif
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{!! session('flash_message_success')!!}</strong>
        </div>
    @endif

  </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Search</h3>
            {{--  <form id="js-form_search">  --}}
            <form class="form-horizontal" method="post" action="{{ route('faculty.SectionList')}}" novalidate="novalidate">
                {{ csrf_field() }}
                                
                <div class="form-group col-sm-12 col-md-3" style="padding-right:0">
                    <select name="search_sy" id="search_sy" class="form-control">
                        <option value="">Select SY</option>
                        @foreach ($SchoolYear as $data)
                            <option value="{{ $data->id }}">{{ $data->section }} {{ $data->grade_level }}</option>
                        @endforeach
                    </select>
                </div> 
                
                <button type="submit" class="btn btn-flat btn-success">Create</button>
                {{--  <button type="button" class="pull-right btn btn-flat btn-danger btn-sm" id="js-button-add"><i class="fa fa-plus"></i> Add</button>  --}}
            </form>
        </div>
        <div class="overlay hidden" id="js-loader-overlay"><i class="fa fa-refresh fa-spin"></i></div>
        
        
    </div>
@endsection

@section ('scripts')
    <script src="{{ asset('cms/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script>
        {{--  $(function () {
            
            $('body').on('submit', '#js-form_search', function (e) {
                e.preventDefault();
               
                var id = $('#search_sy').val();
                $.ajax({
                    url : "{{ route('faculty.SectionList') }}",
                    type : 'POST',
                    data : { _token : '{{ csrf_token() }}', c : id },
                    success : function (res) {
                        loader_overlay();
                        {{--  $('.js-data-container').html(res);  --}}
                        alert('success!');
                    }
                });
        });  --}}

           
        
    </script>
@endsection