<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicons -->
    {{-- <link href="{{ asset('theme/img/favicon.png') }}" rel="icon"> --}}
    {{-- <link href="{{ asset('theme/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
    <!-- Bootstrap CSS File -->
    <link href="{{ asset('theme/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Libraries CSS Files -->
    <link href="{{ asset('theme/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <!-- Main Stylesheet File -->
    <link href="{{ asset('theme/css/style.css?v=1') }}" rel="stylesheet">
    <link href="{{ asset('img/tpc-logo.png') }}" rel=icon>
</head>

<body>
    <header id="header">
        <div class="container-fluid">
            <div id="logo" class="pull-left">
               <!--<h1><a href="{{ route('home_page') }}" class="scrollto">Talibon Polytechnic College</a></h1>-->
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="#intro"><img src="img/tpc-logo.png" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu"><a href="{{ route('home_page') }}">Home</a></li>
                    <li class="menu-has-children"><a href="">About TPC</a>
                        <ul>
                            <li><a href="{{ route('school_profile') }}">School Profile</a></li>
                            <li><a href="{{ route('vision_mission') }}">Vision  Mission Values</a></li>
                            <li><a href="{{ route('history') }}">History</a></li>
                            <li><a href="{{ route('hymn') }}">Hymn</a></li>
                            <li><a href="{{ route('award_recognition') }}">Awards & Recognition</a></li>
                            <li><a href="{{ route('administration_offices') }}">Administration & Offices</a></li>
                            <li><a href="{{ route('faculty_staff') }}">Faculty and Staff</a></li>
                        </ul>
                    </li>
                    <li class="menu-has-children"><a href="">Academics</a>
                        <ul>
                            <li><a href="{{ route('bael') }}">Bachelor of Arts in English Language</a></li>
                            <li><a href="{{ route('baps') }}">Bachelor of Arts in Political Science</a></li>
                            <li><a href="{{ route('bsa') }}">Bachelor of Science in Agriculture</a></li>
                            <li><a href="{{ route('bsais') }}">Bachelor of Science in Accounting Information Systems</a></li>
                            <li><a href="{{ route('bsis') }}">Bachelor of Science in  Information Systems</a></li>
                        </ul>
                    </li>
                    <li class="menu-has-children"><a href="">Admission</a>
                        <ul class="nav-menu">
                            <li class="menu-has-children"><a href="">Student Life</a>
                                <ul>
                                    <li><a href="{{ route('students_organizations') }}">Students Organizations</a></li>
                                    <li><a href="{{ route('publication') }}">Publication</a></li>
                                    <li><a href="{{ route('students_council') }}">Students Council</a></li>
                                    <li><a href="{{ route('students_handbook') }}">Students Handbook</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('students_services') }}">Student Affairs Services</a></li>
                            <li><a href="{{ route('guidance_services') }}">Guidance Center Services</a></li>
                            <li><a href="{{ route('library_services') }}">Library Services</a></li>
                        </ul>
                    </li>
                    <li class="menu"><a href="#">Research and Extension</a>
                    </li>
                    <li class="menu-has-children"><a href="">Alumni</a>
                        <ul>
                            <li><a href="#">Alumni Association</a></li>
                            <li><a href="#">Alumni Achievers</a></li>
                            <li><a href="#">Stay Connected</a></li>
                            {{-- <li><a href="#">Transport & Diploma</a></li> --}}
                        </ul>
                    </li>
                    <li class="menu"><a href="{{ route('login') }}">Login</a></li>
                    {{-- <li class="menu-has-children"><a href="">Links</a>
                        <ul>
                            <li><a href="#">Administration</a></li>
                            <li><a href="#">Faculty</a></li>
                            <li><a href="#">Student</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li class="menu-has-children"><a href="">Drop Down</a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                            <li><a href="#">Drop Down 5</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </nav>
            <!-- #nav-menu-container -->
        </div>
    </header>