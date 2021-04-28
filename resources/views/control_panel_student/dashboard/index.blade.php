@extends('control_panel_student.layouts.master')

@section ('content_title')
    Home
@endsection

@section ('content')
    <div class="row">
    <div class="col-sm-12 col-md-12">
        {{-- <div class="info-box bg-green">
            <span class="info-box-icon ">
                <i class="fab fa-audible"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Current Entrolled Subjects</span>
                 <span class="info-box-number">{{ $StudentInformation_all->student_count }}</span> 
            </div>
        </div> --}}
        <div class="box">
        <div class="overlay hidden" id="js-loader-overlay"><i class="fa fa-refresh fa-spin"></i></div>
            <div class="box-body">
                                               
                <h2 style="text-align: center"><b>Welcome, {{ $StudentInformation->first_name.' '.$StudentInformation->middle_name.' '.$StudentInformation->last_name }}</b></h2>
            
                <center>
                        <img class="img-responsive  img-responsive img-circle" src="{{ asset('img/sja-logo.png') }}" style="width:150px; height:150px;  border-radius:50%;">
                </center> 
                <br/>
                <br/>
              
            </div>
        </div>
        </div>
    </div>

    
@endsection