<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Control Panel | @yield('content_title')</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('cms/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cms/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('cms/dist/css/skins/_all-skins.min.css') }}">

  <link href="{{ asset('favicon.png') }}" rel=icon>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <link rel="stylesheet" href="{{ asset('cms/plugins/dropzone/min/dropzone.min.css') }}">
  <link href="{{ asset('cms/plugins/alertifyjs/css/alertify.min.css') }}" rel="stylesheet">
  <link href="{{ asset('cms/plugins/alertifyjs/css/themes/bootstrap.min.css') }}" rel="stylesheet">
  <!-- jquery-toast-plugin -->
	<link rel="stylesheet" href="{{ asset('cms/plugins/jquery-toast-plugin/jquery.toast.min.css') }}">
  <!-- alertifyjs -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/alertifyjs/css/alertify.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cms/plugins/alertifyjs/css/themes/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cms/plugins/datepicker/datepicker3.css') }}">
  <link rel="stylesheet" href="{{ asset('cms/plugins/timepicker/bootstrap-timepicker.min.css') }}" />
  @yield('styles')
</head>