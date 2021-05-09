<div class="row justify-content-center mt-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-secondary">{{ $title }}</div>

            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route($link) }}" class="form-inline">
                            @csrf
                          <div class="input-group input-group-md">

                            <input class="form-control form-control-navbar" name="search" type="search" placeholder="{{ $placeholder }}" aria-label="Search" required>

                            <div class="input-group-append">
                              <button class="btn btn-navbar bg-primary" type="submit">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
