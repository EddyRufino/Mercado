  <div class="d-flex justify-content-around mt-3">
      <h4 class="text-secondary font-weight-bold">{{ $title }} <a class="btn btn-primary btn-sm" href="{{ route($linkCreate) }}">{{ $titleCreate }}</a>
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
          </form>
      </div>
  </div>
