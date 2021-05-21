<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('adminlte/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
        <span class="brand-text font-weight-light">Mercado</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image mt-2">
                <img src="{{ asset('adminlte/img/no-img.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info d-flex flex-column">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                <a href="#" class="d-block up">
                    <small>
                  {{ auth()->user()->roles->count() ?'  '.auth()->user()->roles->first()->display_name : '' }}
                    </small>
                </a>
            </div>
        </div>

      <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Buscar Conductor
                        </p>
                    </a>
                </li>

                @if (auth()->user()->hasRoles(['admin', 'cobrador']))
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="nav-icon far fa-circle"></i>
                                <p>
                                    Dashboard Sisa
                                </p>
                            </a>
                        </li>
                        @if (auth()->user()->hasRoles(['admin', 'cobrador']))
                        <li class="nav-item">
                            <a href="{{ route('dashboard.banio') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard Baño</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if (auth()->user()->hasRoles(['admin', 'cobrador']))
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Conductores
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('conductores.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listar Conductores</p>
                            </a>
                        </li>
                        @if (auth()->user()->hasRoles(['admin', 'secretaria']))
                        <li class="nav-item">
                            <a href="{{ route('users.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear Conductor</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if (auth()->user()->hasRoles(['admin', 'secretaria']))
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-university"></i>
                        <p>
                            Puestos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('puestos.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listar Puestos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('puestos.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear Puesto</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (auth()->user()->hasRoles(['admin']))
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-restroom"></i>
                        <p>
                          Baños
                          <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('banios.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nuevo Ticket</p>
                              </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('banios.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tickets Del Día</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (auth()->user()->hasRoles(['admin', 'secretaria']))
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-ad"></i>
                        <p>
                            Promociones
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('promociones.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lista Promociones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('promociones.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nueva Promoción</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (auth()->user()->hasRoles(['admin', 'secretaria']))
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-random"></i>
                        <p>
                            N. Operación
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('operaciones.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sisa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('operacion.banio.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Baño</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (auth()->user()->hasRoles(['admin', 'secretaria']))
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Reportes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('reporte.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reporte Sisa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reporte.banio.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reporte Baños</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (auth()->user()->hasRoles(['admin', 'secretaria']))
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-map-marker-alt"></i>
                        <p>
                          Ubicaciones
                          <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('ubicaciones.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listar Ubicaciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ubicaciones.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear Ubicación</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (auth()->user()->hasRoles(['admin', 'secretaria']))
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Actividades
                            <i class="right fas fa-angle-left"></i>
                          </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('actividades.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listar Actividades</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('actividades.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear Actividad</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (auth()->user()->hasRoles(['admin']))
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Usuarios del Sistema
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lista usuarios sistema</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.create') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear usuario sistema</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

