  <div class="row d-flex justify-content-around mt-3">
      <h4 class="text-secondary font-weight-bold">{{ $title }}
        @if (auth()->user()->hasRoles(['admin', 'secretaria']))
          <a href="{{ route($linkCreate) }}" data-toggle="tooltip" data-placement="top" title="Agregar">
            <i class="fas fa-plus-square"></i>
          </a>
        @endif
        <a href="{{ route($linkPDF) }}" class="text-danger" data-toggle="tooltip" data-placement="top" title="Exportar PDF">
          <i class="fas fa-file-pdf"></i>
        </a>
        <a href="{{ route($linkEXCEL) }}" class="text-success" data-toggle="tooltip" data-placement="top" title="Exportar EXCEL">
          <i class="fas fa-file-excel"></i>
        </a>
      </h4>
      <div class="">
          <form method="GET" action="{{ route($linkAction) }}" class="form-inline">
              @csrf
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" name="search" type="search" placeholder="Buscar apellidos o puesto" aria-label="Search" required>
              <div class="input-group-append">
                <button class="btn btn-navbar bg-primary" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>

            {{-- <a href="{{ route('puestos.query', ['search' => request('search')]) }}">Query</a> --}}
          </form>
      </div>
  </div>
