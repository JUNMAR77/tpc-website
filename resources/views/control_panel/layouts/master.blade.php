@include('control_panel.layouts.header')


<body class="hold-transition skin-black sidebar-mini fixed skin-red-light">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      {{-- <span class="logo-mini"><img src="{{ asset('frontend/assets/img/mini-logo.jpg') }}" style="height: 35px;"></span> --}}
      <span class="logo-mini"><img src="{{ asset('/img/sja-logo.png') }}" style="height: 35px;"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        {{-- <img src="{{ asset('/img/tpc-logo.png') }}" style="height: 35px; margin: -5px 10px 0 -10px;"> <br/> --}}
      <b>Talibon</b> Polytechnic College</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                    {{-- <span class="hidden-xs">{{ \Auth::user()->get_user_data()->first_name . ' ' . \Auth::user()->get_user_data()->last_name }}</span> --}}
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      {{--}}  <img src="{{ \Auth::user()->get_user_data()->photo ? \File::exists(public_path('/img/account/photo/'. \Auth::user()->get_user_data()->photo)) ? asset('/img/account/photo/'. \Auth::user()->get_user_data()->photo) : asset('/img/account/photo/blank-user.gif') : asset('/img/account/photo/blank-user.gif') }}" class="img-circle" alt="User Image"> --}}
                        <p>
                          <small>{{ \Auth::user()->get_user_role_display() }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        {{--  <div class="pull-left">
                            <a href="#" class="btn btn-default btn-flat js-view_profile">Profile</a>
                        </div>  --}}
                        <div class="pull-right">
                            {{-- <a href="#" class="btn btn-default btn-flat">Sign out</a> --}}
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"
                                class="btn btn-default btn-flat">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
              </li>
          </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        {{--  Admin Menu  --}}
        @if (Auth::user()->role == 1 || Auth::user()->role == 0)
          <li><a href="{{ route('admin.dashboard') }}"><i class="fa  fa-home fa-fw fa-lg"></i>&nbsp;&nbsp;&nbsp; <span>Dashboard</span></a></li>
          <li><a href="{{ route('shared.faculty_class_schedules.index') }}"><i class="fa  fa-file-text-o fa-lg"></i>&nbsp;&nbsp;&nbsp; <span>Faculty Class Schedule</span></a></li>
          <li><a href="{{ route('admin.faculty_information') }}"><i class="fa fa-info-circle fa-lg"></i>&nbsp;&nbsp;&nbsp; <span>Faculty Information</span></a></li>
          <li><a href="{{ route('admin.registrar_information') }}"><i class="fa fa-info-circle fa-lg"></i>&nbsp;&nbsp;&nbsp; <span>Registrar Information</span></a></li>
          <li><a href="{{ route('admin.student.information') }}"><i class="fa fa-info-circle fa-lg"></i>&nbsp;&nbsp;&nbsp; <span>Student Information</span></a></li>
          <li><a href="{{ route('registrar.class_details') }}"><i class="fa fa-list-alt  fa-lg"></i>&nbsp;&nbsp;&nbsp; <span>Class Lists</span></a></li>
          <li><a href="{{ route('admin.transcript_archieve') }}"><i class="fa fa-archive fa-lg"></i>&nbsp;&nbsp;&nbsp; <span>Transcript Archive</span></a></li>
          <li><a href="{{ route('admin.articles') }}"><i class="fa fa-newspaper-o fa-lg"></i>&nbsp;&nbsp;&nbsp; <span>News and Events</span></a></li>
        @endif
        {{--  Admin Menu End  --}}
        
        {{--  Registrar Menu  --}}
        @if (Auth::user()->role == 3)
          <li><a href="{{ route('registrar.dashboard') }}"><i class="fa fa-home fa-fw fa-lg"></i> <span>Dashboard</span></a></li>
          <li><a href="{{ route('shared.faculty_class_schedules.index') }}"><i class="fa fa-file-text-o fa-lg"></i> <span>Faculty Class Schedule</span></a></li>
          <li><a href="{{ route('admin.faculty_information') }}"><i class="fa fa-info-circle fa-lg"></i>&nbsp;&nbsp;&nbsp; <span>Faculty Information</span></a></li>
          <li><a href="{{ route('admin.student.information') }}"><i class="fa fa-info-circle fa-lg"></i>&nbsp;&nbsp;&nbsp; <span>Student Information</span></a></li>
          <li><a href="{{ route('registrar.class_details') }}"><i class="fa fa-list-alt fa-lg "></i>&nbsp;&nbsp;&nbsp; <span>Class Lists</span></a></li>   
        @endif
        
        {{--  Faculty Menu  --}}
        @if (Auth::user()->role == 4)
          <li><a href="{{ route('faculty.dashboard') }}"><i class="fa fa-home fa-fw fa-lg"></i> &nbsp;&nbsp;&nbsp;Dashboard</a></li>
          <li><a href="{{ route('faculty.subject_class') }}"><i class="fa fa-sticky-note-o fa-lg"></i> &nbsp;&nbsp;&nbsp;<span>Subject Class</span></a></li>
          <li><a href="{{ route('faculty.faculty_class_schedules') }}"><i class="fa fa-file-text-o fa-lg"></i> &nbsp;&nbsp;&nbsp;<span>Faculty Class Schedules</span></a></li>
          <li><a href="{{ route('faculty.student_grade_sheet') }}"><i class="fa fa-pencil-square-o fa-lg"></i> &nbsp;&nbsp;&nbsp;<span>Encode Student Grades</span></a></li>
          
          <li><a href="{{ route('faculty.DataStudent') }}"><i class="fa fa-circle-o"></i> <span>Make Data for GradeSheet</span></a></li>
          <li><a href="{{ route('faculty.class-attendance.index') }}"><i class="fa fa-calendar-plus-o fa-lg"></i> &nbsp;&nbsp;&nbsp;<span>Encode Class Attendance</span></a></li>
          <li><a href="{{ route('faculty.encode-remarks.index') }}"><i class="fa fa-pencil-square-o fa-lg"></i> &nbsp;&nbsp;&nbsp;<span>Print Class Card</span></a></li>
          <li><a href="{{ route('faculty.class_demographic_profile.index') }}"><i class="fa fa-info-circle fa-lg"></i> &nbsp;&nbsp;&nbsp;<span>Demographic Profile</span></a></li>
          <li><a href="{{ route('faculty.advisory_class.index') }}"><i class="fa fa-users fa-lg"></i> &nbsp;&nbsp;&nbsp;<span>My Advisory Class</span></a></li>
          
          {{--  <li><a href="{{ route('faculty.my_advisory_class.index') }}"><i class="fa fa-circle-o"></i> <span>My Advisory Class</span></a>  --}}
            
          </li>
        @endif
{{--  
        @if (Auth::user()->role == 3)
        @endif               --}}
          {{--  Registrar Menu End  --}}
        @if (Auth::user()->role == 1 || Auth::user()->role == 0)
          <li class="treeview">
              <a href="#">
                <i class="fa fa-cog fa-lg"></i>&nbsp;&nbsp;&nbsp; 
                <span>Maintenance</span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                  {{--  Admin Menu  --}}
                  <li><a href="{{ route('admin.maintenance.school_year') }}"><i class="fa fa-circle-o"></i>&nbsp;&nbsp;&nbsp; <span>School Year</span></a></li>
                  <li><a href="{{ route('admin.maintenance.semester') }}"><i class="fa fa-circle-o"></i>&nbsp;&nbsp;&nbsp; <span>Semester</span></a></li>
                  <li><a href="{{ route('admin.maintenance.strand') }}"><i class="fa fa-circle-o"></i>&nbsp;&nbsp;&nbsp; <span>Strands</span></a></li>
                  <li><a href="{{ route('admin.maintenance.subjects') }}"><i class="fa fa-circle-o"></i>&nbsp;&nbsp;&nbsp; <span>Subjects</span></a></li>
                  <li><a href="{{ route('admin.maintenance.classrooms') }}"><i class="fa fa-circle-o"></i>&nbsp;&nbsp;&nbsp; <span>Class Rooms</span></a></li>
                  <li><a href="{{ route('admin.maintenance.section_details') }}"><i class="fa fa-circle-o"></i>&nbsp;&nbsp;&nbsp; <span>Section Details</span></a></li>
                  <li><a href="{{ route('admin.maintenance.date_remarks_for_class_card') }}"><i class="fa fa-circle-o"></i>&nbsp;&nbsp;&nbsp; <span>Date of Remarks</span></a></li>
                  {{--  Admin Menu End  --}}
                  
              </ul>
          </li>
        @endif
        <li>
          @if (Auth::user()->role == 3)
            <a href="{{ route('registrar.my_account.index') }}"><i class="fa fa-user fa-lg"></i>&nbsp;&nbsp;&nbsp; <span>My Account</span></a></li>
          @elseif (Auth::user()->role == 4)
            <a href="{{ route('faculty.my_account.index') }}"><i class="fa fa-user fa-lg"></i>&nbsp;&nbsp;&nbsp; <span>My Account</span></a></li>
          @elseif (Auth::user()->role == 0 || Auth::user()->role == 1)
            <a href="{{ route('my_account.index') }}"><i class="fa fa-user fa-lg"></i>&nbsp;&nbsp;&nbsp; <span>My Account</span></a></li>
          @endif
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('content_title')
      </h1>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
          <div class="col-sm-12">
          <div class="row">
              <div class="col-sm-12">
                  <div class="js-messages_holder" style="display:none"></div>
              </div>
          </div>
            @yield('content')
          </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@include('control_panel.layouts.footer')