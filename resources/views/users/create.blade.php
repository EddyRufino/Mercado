@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-3">
                    @include('partials.card-header', [
                        'title' => 'Crear Usuario - Conductor',
                        'link' => 'users.index'
                    ])
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                            @include('forms.formUser', [
                                'user' => new App\User,
                                'btn' => 'Crear Usuario'
                                ])

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label font-weight-normal font-weight-normal text-md-right">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label font-weight-normal text-md-right">Repite Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary text-white">
                                        Cancelar
                                    </a>
                                </div>
                            </div>
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
