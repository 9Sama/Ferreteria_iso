<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Ferretería UNT</title>

    <!-- Bootstrap -->
    <link href="/adminlte/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/adminlte/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/adminlte/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/adminlte/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="/adminlte/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/adminlte/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="/adminlte/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/adminlte/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ route('bienvenido') }}" class="site_title"> <span>Ferretería</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_info">
                            <span>Bienvenido, <h2>{{ auth()->user()->name }}</h2></span>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Sistema Personal <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ URL::to('/area') }}">Areas</a></li>
                                        <li><a href="#">Puestos</a></li>
                                        <li><a href="#">Plazas</a></li>
                                        <li><a href="#">Base Evaluación</a></li>
                                        <li><a href="{{ URL::to('/postulante') }}">Postulantes</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-home"></i> Sistema de Ventas <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
                                        <li><a href="{{ route('ventas.index') }}">Ventas</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-home"></i> Sistema de Compras <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('proveedores.index') }}">Proveedores</a></li>
                                        <li><a href="{{ route('compras.index') }}">Compras</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    {{ auth()->user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;"> Profile</a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">Help</a>
                                    <a class="dropdown-item" href="{{ route('user.logout') }}"><i
                                            class="fa fa-sign-out pull-right"></i>
                                        Cerrar Sesión</a>
                                </div>
                            </li>


                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <section class="right_col" role="main">
                @yield('contenido')

            </section>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Sistema Web Ferreteria <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="/adminlte/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/adminlte/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="/adminlte/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/adminlte/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="/adminlte/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="/adminlte/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/adminlte/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/adminlte/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="/adminlte/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="/adminlte/vendors/Flot/jquery.flot.js"></script>
    <script src="/adminlte/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="/adminlte/vendors/Flot/jquery.flot.time.js"></script>
    <script src="/adminlte/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="/adminlte/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/adminlte/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/adminlte/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/adminlte/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="/adminlte/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="/adminlte/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="/adminlte/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/adminlte/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/adminlte/vendors/moment/min/moment.min.js"></script>
    <script src="/adminlte/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/adminlte/build/js/custom.min.js"></script>

    @yield('js')

</body>

</html>

