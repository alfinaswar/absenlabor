<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Sistem Absen Labor') }}</title>
    <!-- Tell the browser to be responsive to screen width -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Absen Labor adalah aplikasi untuk manajemen kehadiran laboratorium." />
    <meta name="keywords" content="absen, laboratorium, sistem absen, kehadiran, aplikasi, labor, admin, dashboard" />
    <meta name="author" content="Labor Admin" />
    <!-- v4.1.3 -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/et-line-font/et-line-font.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/simple-lineicon/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/css/dataTables.bootstrap.min.css') }}">

</head>

<body class="skin-blue sidebar-mini">
    <div class="wrapper boxed-wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="index.html" class="logo blue-bg">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="assets/img/logo-small.png" alt=""></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><img src="assets/img/logo.png" alt=""></span> </a>
            <!-- Header Navbar -->
            <nav class="navbar blue-bg navbar-static-top">
                <!-- Sidebar toggle button-->
                <ul class="nav navbar-nav pull-left">
                    <li><a class="sidebar-toggle" data-toggle="push-menu" href=""></a> </li>
                </ul>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages -->

                        <!-- Notifications  -->

                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <div class="sidebar">
                <div class="user-panel">
                    <div class="image text-center">
                        <img src="assets/img/img1.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="info">
                        <p>{{ Auth::user()->name }}</p>



                    </div>
                </div>

                <!-- sidebar menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">DATA MASTER</li>
                    <li>
                        <a href="{{ route('siswa.index') }}"><i class="fa fa-users"></i> <span>Siswa</span></a>
                    </li>
                    <li>
                        <a href="{{ route('guru.index') }}"><i class="fa fa-user"></i> <span>Guru</span></a>
                    </li>
                    <li>
                        <a href="{{ route('kelas.index') }}"><i class="fa fa-building"></i> <span>Kelas</span></a>
                    </li>
                    <li>
                        <a href="{{ route('labor.index') }}"><i class="fa fa-flask"></i> <span>Labor</span></a>
                    </li>
                    <li class="header">MENU LAINNYA</li>
                    <li>
                        <a href="{{ route('absen.index') }}"><i class="fa fa-calendar-check-o"></i>
                            <span>Absen</span></a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header sty-one">
                <h1>Blank page</h1>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Pages</a></li>
                    <li><i class="fa fa-angle-right"></i> Blank page</li>
                </ol>
            </div>

            <!-- Main content -->
            <div class="content">
                @yield('content')
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">Version 1.0</div>
            Copyright © 2018 Yourdomian. All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab"></div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- template -->
    <script src="{{ asset('assets/js/bizadmin.js') }}"></script>

    <!-- for demo purposes -->
    <script src="{{ asset('assets/js/demo.js') }}"></script>

    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#example1').DataTable();
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            });
        });
    </script>
    @stack('scripts')
</body>

</html>