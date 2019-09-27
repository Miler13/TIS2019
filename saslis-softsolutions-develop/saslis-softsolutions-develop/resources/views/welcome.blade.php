<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SoftSolutions | Home</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/lte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/lte/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/lte/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/lte/dist/css/AdminLTE.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="/lte/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="/lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="/lte/plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="/lte/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="/lte/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/lte/bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/lte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/lte/dist/css/skins/_all-skins.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="/lte/dist/css/skins/skin-blue.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            @if(!Auth::check())
            <a href="/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>Sft</b>SL</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Soft</b>SOLUTIONS
                </span>
            </a>
            @endif

            @if(Auth::check())
            <a href="../{{ Auth::user()->cargo }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>Sft</b>SL</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Soft</b>SOLUTIONS
                </span>
            </a>
            @endif

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button |  Icono de despliegue de opciones -->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                @if(!Auth::check())
                <div class="navbar-custom-menu" style="height: 30px;">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a class="dropdown-toggle" href="{{ url('estudiante/registrar') }}">
                                <button type="button" class="btn btn-block btn-success">Registrarse</button>
                            </a>
                        </li>
                    </ul>
                </div>
                @else
                <!-- Navbar Right Menu | Registrarse como estudiante -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="/lte/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{{ Auth::user()->nombre }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="/lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                    <p>
                                        @if(Auth::user()->cargo == 'admin')
                                        <strong style="color: white; text-transform: uppercase;">{{ Auth::user()->cargo }}ISTRADOR</strong>
                                        @endif
                                        @if(Auth::user()->cargo != 'admin')
                                        <strong style="color: white; text-transform: uppercase;">{{ Auth::user()->cargo }}</strong>
                                        <h5 style="color: white;">{{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}</h5>
                                        @endif
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        @if(Auth::user()->cargo == 'admin')
                                        <a href="{{ url('admin/logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out text-info"></i>Cerrar Sesion
                                        </a>
                                        <form id="logout-form" method="POST" action="{{ url('admin/logout') }}">
                                            {{ csrf_field() }}
                                        </form>
                                        @endif
                                        @if(Auth::user()->cargo == 'docente')
                                        <a href="{{ url('docente/logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out text-info"></i>Cerrar Sesion
                                        </a>
                                        <form id="logout-form" method="POST" action="{{ url('docente/logout') }}">
                                            {{ csrf_field() }}
                                        </form>
                                        @endif
                                        @if(Auth::user()->cargo == 'auxiliar')
                                        <a href="{{ url('auxiliar/logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out text-info"></i>Cerrar Sesion
                                        </a>
                                        <form id="logout-form" method="POST" action="{{ url('auxiliar/logout') }}">
                                            {{ csrf_field() }}
                                        </form>
                                        @endif
                                        @if(Auth::user()->cargo == 'estudiante')
                                        <a href="{{ url('estudiante/logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out text-info"></i> Cerrar Sesion
                                        </a>
                                        <form id="logout-form" method="POST" action="{{ url('estudiante/logout') }}">
                                            {{ csrf_field() }}
                                        </form>
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                @endif

            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                @if(!Auth::check())
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="https://www.laguia.bo/sites/default/files/empresas/logos/universidad_mayor_de_san_simon_-_logo.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>UMSS-FCyT</p>
                        <!-- Status -->
                        <p><i class="fa fa-circle text-success"></i> INVITADO</p>
                    </div>
                </div>
                @endif

                @if(Auth::check())
                <div>
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="/lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>UMSS-FCyT</p>
                            <!-- Status -->
                            @if(Auth::user()->cargo == 'admin')
                            <p style="text-transform: uppercase;"><i class="fa fa-circle text-success"></i>{{ Auth::user()->cargo }}ISTRADOR</p>
                            @endif
                            @if(Auth::user()->cargo != 'admin')
                            <p style="text-transform: uppercase;"><i class="fa fa-circle text-success"></i>{{ Auth::user()->cargo }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                <!-- Sidebar Menu -->
                <!-- Se muestra this sidebar if is not logged user -->
                @if(!Auth::check())
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">INICIAR SESION COMO:</li>
                    <li><a href="{{ route('admin.login') }}"><i class="fa fa-sign-in"></i> <span>Administrador</span></a></li>
                    <li><a href="{{ url('docente/login') }}"><i class="fa fa-sign-in"></i> <span>Docente</span></a></li>
                    <li><a href="{{ url('auxiliar/login') }}"><i class="fa fa-sign-in"></i> <span>Auxiliar</span></a></li>
                    <li class="active"><a href="{{ url('estudiante/login') }}"><i class="fa fa-sign-in"></i> <span>Estudiante</span></a></li>
                </ul>
                @endif

                <!-- Sidebar menu of ADMIN -->
                @if(Auth::check() && Auth::user()->cargo == 'admin')
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU DE ADMINISTRADOR:</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="treeview">
                        <a href="#"><i class="fa fa-user"></i> <span>Docentes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('docente.registrar') }}"><i class="fa fa-plus-circle"></i>Crear Docente</a></li>
                            <li><a href="{{ route('docente.lista') }}"><i class="fa fa-users"></i>Ver Docentes</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-user"></i> <span>Auxiliares</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('auxiliar.registrar') }}"><i class="fa fa-plus-circle"></i>Crear Auxiliar</a></li>
                            <li><a href="{{ route('auxiliar.lista') }}"><i class="fa fa-users"></i>Ver Auxiliares</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-user"></i> <span>Estudiantes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('estudiantes.registrados.lista') }}"><i class="fa fa-users"></i>Ver Estudiantes Registrados</a></li>
                            <li><a href="{{ route('estudiantes.habilitados') }}"><i class="fa fa-users"></i>Ver Estudiantes Habilitdos</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-tasks"></i> <span>Gestiones</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('gestion.registrar') }}"><i class="fa fa-plus-circle"></i>Crear Gestion</a></li>
                            <li><a href="{{ route('gestion.lista') }}"><i class="fa fa-list"></i>Ver Gestiones</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-th-large"></i> <span>Materias</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('materia.registrar') }}"><i class="fa fa-plus-circle"></i>Crear Materia</a></li>
                            <li><a href="{{ route('materia.lista') }}"><i class="fa fa-list"></i>Ver Materias</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-th"></i> <span>Grupos De Laboratorio</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('grupolaboratorio.registrar') }}"><i class="fa fa-plus-circle"></i>Crear Grupo</a></li>
                            <li><a href="{{ route('grupolaboratorio.lista') }}"><i class="fa fa-list"></i>Ver Grupos</a></li>
                        </ul>
                    </li>
                </ul>
                @endif
                <!-- /.sidebar-menu ADMIN -->

                <!-- Sidebar menu of DOCENTE -->
                @if(Auth::check() && Auth::user()->cargo == 'docente')
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU DE DOCENTE:</li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-th"></i> <span>Materias</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('docente.materia.lista') }}"><i class="fa fa-plus"></i>Ver Materias</a></li>
                            <li><a href="{{ route('docente.materias.asignadas') }}"><i class="fa fa-list"></i>Ver Mis Materias</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-th"></i> <span>Grupos De Laboratorio</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('docente.grupos.laboratorio') }}"><i class="fa fa-list"></i>Todos Mis Grupos</a></li>
                        </ul>
                    </li>
                </ul>
                @endif
                <!-- /.sidebar-menu DOCENTE -->

                <!-- Sidebar menu of AUXILIAR -->
                @if(Auth::check() && Auth::user()->cargo == 'auxiliar')
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU DE AUXILIAR:</li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-th"></i> <span>Grupos De Laboratorio</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('auxiliar.gruposhabilitados.lista') }}"><i class="fa fa-plus"></i>Ver Todos Los Grupos</a></li>
                            <li><a href="{{ route('auxiliar.grupos.tomados') }}"><i class="fa fa-list"></i>Ver mis Grupos</a></li>
                        </ul>
                    </li>
                </ul>
                @endif
                <!-- /.sidebar-menu AUXILIAR -->

                <!-- Sidebar menu of ESTUDIANTE -->
                @if(Auth::check() && Auth::user()->cargo == 'estudiante')
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU DE ESTUDIANTE:</li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-th-large"></i> <span>Materias</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('estudiante.materia.lista') }}"><i class="fa fa-plus"></i>Inscribirse a materia</a></li>
                            <li><a href="{{ route('estudiante.materias.inscritas') }}"><i class="fa fa-list"></i>Ver mis materias</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-th"></i> <span>Grupos De Laboratorio</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('estudiante.gruposhabilitados.lista') }}"><i class="fa fa-plus"></i>Inscribirse a Grupo</a></li>
                            <li><a href="{{ route('estudiante.gruposhabilitados.inscritos') }}"><i class="fa fa-list"></i>Ver mis Grupos</a></li>
                        </ul>
                    </li>
                </ul>
                @endif
                <!-- /.sidebar-menu ESTUDIANTE -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content container-fluid">

                @yield('content')
                <!--------------------------
                 | Your Page Content Here |
                --------------------------->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Version 1.0
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2019 <a href="#">SoftSolutions</a>.</strong> All rights reserved.
        </footer>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 3 -->
    <script src="/lte/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/lte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/lte/dist/js/adminlte.min.js"></script>
    <!-- Select2 -->
    <script src="/lte/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="/lte/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="/lte/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="/lte/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="/lte/bower_components/moment/min/moment.min.js"></script>
    <script src="/lte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="/lte/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="/lte/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="/lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/lte/plugins/iCheck/icheck.min.js"></script>
    <script src="/lte/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="/lte/dist/js/demo.js"></script>
    <script src="/lte/bower_components/select2/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
</body>

</html>