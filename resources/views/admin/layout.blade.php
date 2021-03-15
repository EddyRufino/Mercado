<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Mercado</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('css/mio.css') }}">
  {{-- <link rel="stylesheet" href="/css/app.css"> --}}

  {{-- <link rel="stylesheet" href="/adminlte/plugins/datatables-select/css/select.bootstrap4.min.css"> --}}
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        {{-- <a href="#" class="nav-link">Contact</a> --}}
      </li>
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                {{-- <img src="img/avatars/6.jpg" class="img-avatar"> --}}
                <span class="d-md-down-none">{{ auth()->user()->name }} </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                {{-- <div class="dropdown-header text-center">
                    <strong>{{ auth()->user()->roles->count() ?'  '.auth()->user()->roles->first()->display_name : '' }}</strong>
                </div> --}}
                <a class="dropdown-item" href="{{ route('usuarios.show', auth()->user()->id) }}">
                  <i class="fa fa-user"></i> Perfil
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                 <i class="fa fa-lock"></i>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

            </div>
        </li>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  @include('partials/nav')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper overflow-auto">
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
 {{-- mt-4 le quite --}}
    <div class="container">
      @include('partials.session')
    </div>

    @yield('content')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Sub Gerencia de Transportes y Seguridad Vial</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>

<script src="{{ asset('adminlte/plugins/datatables-select/css/select.bootstrap4.min.js') }}"></script>

</body>
</html>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
  // para licencias
  $('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#datepicker2').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#datepicker3').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('.select2').select2({
      tags: true
    });

  // Para vehículo
  $('#datepickerv1').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#datepickerv2').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#datepickerv3').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });

  // Para certificados
  $('#datepickerc1').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#datepickerc2').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });

  // Para soats
  $('#datepickers1').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#datepickers2').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#datepickers3').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#datepickers4').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#datepickers5').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });

  //Paradero
  $('#datepickerp1').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#datepickerp2').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#datepickerp3').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#datepickerp4').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });

</script>

<script type="text/javascript">

function desactivaBoton(id) {
   document.getElementById(id).disabled=true;
}

</script>
