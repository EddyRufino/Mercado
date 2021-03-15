  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="/adminlte/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Mercado</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/adminlte/img/no-img.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            @auth
               @if (auth()->user()->hasRoles(['admin', 'recep']))
               <li class="nav-item has-treeview ">
                 <a href="#" class="nav-link ">
                   <i class="nav-icon fa fa-university"></i>
                   <p>
                     Paraderos
                     <i class="right fas fa-angle-left"></i>
                   </p>
                 </a>
                 <ul class="nav nav-treeview">
                   <li class="nav-item">
                     <a href="#" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Listar Paraderos</p>
                     </a>
                   </li>
                   <li class="nav-item">
                     <a href="#" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Crear Paradero</p>
                     </a>
                   </li>
                 </ul>
               </li>
               @endif
            @endauth


            @auth
            @if (auth()->user()->hasRoles(['admin', 'recep']))
            <li class="nav-item has-treeview ">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Listado de Socios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar Socios</p>
                  </a>
                </li>
              </ul>
            </li>
            @endif
         @endauth


        @auth
          @if (auth()->user()->hasRoles(['admin', 'recep']))
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Integrantes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Integrantes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Integrante</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        @endauth

          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}

        @auth
          @if (auth()->user()->hasRoles(['admin', 'recep']))
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Licencias
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Licencias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Licencia</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        @endauth

        @auth
          @if (auth()->user()->hasRoles(['admin', 'recep']))
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Vehículos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Vehículos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Vehículos</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        @endauth

        @auth
          @if (auth()->user()->hasRoles(['admin', 'recep']))
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Certificados
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Certificados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Certificados</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        @endauth

        @auth
          @if (auth()->user()->hasRoles(['admin', 'recep']))
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Soats
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Soats</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Soats</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        @endauth

          @auth
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

              </ul>
            </li>
            @endif
          @endauth

          {{-- <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Autorización
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('autorizaciones.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Autorizaciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('autorizaciones.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subir Autorización</p>
                </a>
              </li>
            </ul>
          </li> --}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  {{-- <section class="aside-extra">
    <h1>xD</h1>
  </section> --}}
