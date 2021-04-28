@extends('control_panel.layouts.master')

@section ('content_title')
    Dashboard
@endsection

@section ('content')
    <div class="row">
    <div class="col-sm-12 col-md-4">
        <div class="info-box bg-green">
            <span class="info-box-icon ">
                <i class="ion ion-ios-people-outline"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Total Registered Students</span>
                <span class="info-box-number">{{ $StudentInformation_all->student_count }}</span>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-4">
        <div class="info-box bg-red">
            <span class="info-box-icon">
                {{--  <i class="ion ion-male"></i>  --}}
                <i class="fas fa-male"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Registered Male</span>
                <span class="info-box-number">{{ $StudentInformation_all_male->student_count }}</span>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="info-box bg-yellow">
            <span class="info-box-icon">
                <i class="fas fa-female"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Registered Female</span>
                <span class="info-box-number">{{ $StudentInformation_all_female->student_count }}</span>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="info-box bg-orange">
            <span class="info-box-icon">
                <i class="fab fa-audible"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Registrar Count</span>
                <span class="info-box-number">{{ $registrar->registrar_count }}</span>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="info-box bg-blue">
            <span class="info-box-icon">
                <i class="fas fa-diagnoses"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Faculty Count</span>
                <span class="info-box-number">{{ $faculty->faculty_count }}</span>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="info-box bg-teal">
                <span class="info-box-icon">
                    <i class="fas fa-pallet"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Room Count</span>
                    <span class="info-box-number">{{ $rooms->rooms_count }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection