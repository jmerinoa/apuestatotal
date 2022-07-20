<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APUESTA TOTAL</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/validacion.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/mis_estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/bootstrap/css/bootstrap.min.css') }}">
  

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white ">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-sort-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">jhon<br>
                            <font style="font-weight: bold">player</font>
                        </span>

                        <div class="dropdown-divider"></div>
                        <form method="POST" action="">
                            {{ csrf_field() }}
                            <button class="dropdown-item dropdown-footer">
                                Cerrar Sesión <i class="fas fa-sign-out-alt" style="margin-left: 1em"></i></button>
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-dark elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
             
                <img src="fotoempresa" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
            
                <span class="brand-text font-weight-light">
                  
                        <font style="font-weight: bold; color: #6d6d6d; font-size: 0.8em;">empresa</font>
                 
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        {{-- @if (auth()->user()->foto != '')
                            <img src="{{ asset('Imagen/' . auth()->user()->foto) }}" class="img-circle elevation-2"
                                alt="User Image">
                        @endif --}}
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            {{-- @php($nombre = explode(' ', auth()->user()->nombres))
                            @if (count($nombre) > 1)
                                {{ $nombre[0] }} {{ $nombre[1] }}
                            @else
                                {{auth()->user()->nombres}}
                            @endif --}}
                        </a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar   flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                   
                        <li class="nav-item">
                            <a href="{{ asset('panel-secretaria') }}" class="nav-link
                                    {{ 'panel-secretaria' == request()->segment(1) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Panel de Control
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                        </li>       
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link {{ 'mantenimiento' == request()->segment(1) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>
                                    Mantenimiento
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ asset('mantenimiento/player') }}"
                                        class="nav-link {{ 'player' == request()->segment(2) ? 'bg-info' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jugador</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ asset('mantenimiento/administrador') }}"
                                        class="nav-link {{ 'administrador' == request()->segment(2) ? 'bg-info' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Administrador</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ asset('mantenimiento/registro') }}"
                                        class="nav-link {{ 'registro' == request()->segment(2) ? 'bg-info' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Registro</p>
                                    </a>
                                </li>
                            </ul>
                        </li>          
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('encabezado')
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('contenido')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            {{-- <strong>Copyright &copy; 2020-2021 <a href="https://adminlte.io">WIJGSOFT</a>.</strong> --}}
            <strong>Copyright &copy; CWILSOFT <a href="#"></a>.</strong>
            Todos los derechos Reservados
            <div class="float-right d-none d-sm-inline-block">
                <b>APUESTA TOTAL </b>Versión - 2021
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('dist/js/bootstrap-select.min.js')}}"></script>

    <!-- AdminLTE -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    @stack('scripts')
    <script src="{{ asset('dist/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('dist/sweetalert2/eliminar.js') }}"></script>
    <script src="{{ asset('dist/js/pages/formulario.js') }}"></script>
    <script src="{{ asset('dist/js/toastr.min.js') }}"></script>

    {{-- }}}}}}}}}}}}}}}}} --}}
    <!-- Moments -->
    <script src="{{ asset('fullcalendar/moment/moment.main.js') }}"></script>
    <script src="{{ asset('fullcalendar/moment/moment-timezone.js') }}"></script>

    <script src="{{ asset('fullcalendar/main.js') }}"></script>
    <script src="{{ asset('fullcalendar/locales-all.js') }}"></script>

</body>

</html>
