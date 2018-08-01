<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>iPaQue - @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }} ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }} ">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }} ">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('bower_components/morris.js/morris.css') }} ">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/datatables.css') }}">
  <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>CPA</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>iPaQue</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <!-- <div class="pull-middle image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div> -->
        <div>
          <p style="color: #fff; font-weight: 400;">{{ Auth::user()->first_name}}</p>
          <a href="#">{{ Auth::user()->email }}</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="{{ url('/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        @if(Auth::user()->is_admin)
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Pets</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class="active"><a href="{{ url('/dashboard/admin/pets') }}"><i class="fa fa-circle-o"></i> List</a></li>
             <li><a href="{{ url('/dashboard/admin/pets/request') }}"><i class="fa fa-circle-o"></i> Request <small class="label pull-right bg-green">{{ \App\Pet::where('is_accepted', 0)->count() }}</small></a></li>
            <li><a href="{{ url('/dashboard/admin/pets/create') }}"><i class="fa fa-circle-o"></i> Register</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-institution"></i> <span>Impound</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class="active"><a href="{{ url('/dashboard/admin/impoundList') }}"><i class="fa fa-circle-o"></i> List</a></li>
            <li><a href="{{ url('/dashboard/admin/impoundRequest') }}"><i class="fa fa-circle-o"></i> Request <small class="label pull-right bg-green">{{ \App\Impound::where('is_accepted', 0)->count() }}</small></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-history"></i> <span>Adoptions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class="active"><a href="{{ url('/dashboard/admin/adoptList') }}"><i class="fa fa-circle-o"></i> List</a></li>
            <li><a href="{{ url('/dashboard/admin/adoptRequest') }}"><i class="fa fa-circle-o"></i> Request <small class="label pull-right bg-green">{{ \App\Adopt::where('is_accepted', 0)->count() }}</small></a></li>
          </ul>
        </li>
        <li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-history"></i> <span>Service Schedules</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li class="active"><a href="{{ url('/dashboard/admin/serviceSchedules') }}"><i class="fa fa-circle-o"></i> List</a></li>
            <li><a href="{{ url('/dashboard/admin/serviceSchedules/request') }}"><i class="fa fa-circle-o"></i> Request <small class="label pull-right bg-green">{{ \App\PetService::where('status', 'Request')->count() }}</small></a></li>
          </ul>
        </li>
        
        @else
          <li class="treeview">
            <a href="#">  
              <i class="fa fa-cubes"></i> <span>Doctors</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li class="active"><a href="{{ url('/dashboard/doctors') }}"><i class="fa fa-circle-o"></i> Registered Doctor</a></li>
            </ul>
            <ul class="treeview-menu" style="display: none;">
              <li class="active"><a href="{{ url('/dashboard/doctors') }}"><i class="fa fa-circle-o"></i> Schedules </a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-cubes"></i> <span>Schedules</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-cubes"></i> <span>Queue Info</span>
            </a>
          </li>
        @endif
        <li class="active">
          <a href="{{ url('/logout') }}">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>F
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
    <!-- Content Header (Page header) -->
  </div>




  <!-- /.content-wrapper -->
  <footer class="main-footer"><center>
    <strong>©2018 iPaQue.</strong> All rights
    reserved.
  </center></footer>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@yield('javascript')
<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

<script src="{{ asset('dist/js/demo.js') }}"></script>

<!-- DATA TABLES -->
<script src="{{ asset('js/datatables.js') }}"></script>

<!-- TOASTR -->
<script src="{{ asset('js/toastr.js') }}"></script>

</body>
</html>
