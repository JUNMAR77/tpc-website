@include('control_panel.layouts.header')


<body class="hold-transition skin-black sidebar-mini fixed skin-red-light">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="{{ asset('/img/sja-logo.png') }}" style="height: 35px;"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
      {{--  <img src="{{ asset('/img/sja-logo.png') }}" style="height: 35px; margin: -5px 10px 0 -10px;">  --}}
      <b>St. John</b> Academy</span>
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
                    {{-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> --}}
                    <span class="hidden-xs">{{ \Auth::user()->get_user_data()->first_name . ' ' . \Auth::user()->get_user_data()->last_name }}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{ \Auth::user()->get_user_data()->photo ? \File::exists(public_path('/img/account/photo/'. \Auth::user()->get_user_data()->photo)) ? asset('/img/account/photo/'. \Auth::user()->get_user_data()->photo) : asset('/img/account/photo/blank-user.gif') : asset('/img/account/photo/blank-user.gif') }}" class="img-circle" alt="User Image">
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
        <li class="header">STUDENT NAVIGATION</li>
          <li><a href="{{ route('student.dashboard') }}"><i class="fa fa-home fa-fw fa-lg"></i>&nbsp;&nbsp;&nbsp; <span>Home</span></a></li>
          <li><a href="{{ route('student.class_schedule.index') }}"><i class="fa fa-calendar fa-lgx"></i>&nbsp;&nbsp;&nbsp; <span>Class Schedule</span></a></li>
          <li><a href="{{ route('student.grade_sheet.index') }}"><i class="fa fa-file-text-o fa-lg"></i>&nbsp;&nbsp;&nbsp; <span>Grade Sheet</span></a></li>
          {{--  <li><a href="{{ route('admin.faculty_information') }}"><i class="fa fa-circle-o"></i> <span>Balances</span></a></li>  --}}
          <li><a href="{{ route('student.my_account.index') }}"><i class="fa fa-user fa-lg"></i>&nbsp;&nbsp;&nbsp;  <span>My Profile</span></a></li>
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