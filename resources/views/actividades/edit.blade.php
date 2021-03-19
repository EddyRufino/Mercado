@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-3">
                    <div class="card-header bg-secondary">Editar Actividad</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('actividades.update', $actividade->id) }}">
                        @csrf
                        @method('PUT')

                            @include('forms.formActividades', ['btn' => 'Editar Actividad'])

                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
