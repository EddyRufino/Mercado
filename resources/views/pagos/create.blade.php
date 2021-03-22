@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    @include('partials.card-header', [
                        'title' => 'Crear Pago',
                        'link' => 'home'
                    ])
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pagos.store') }}">
                        @csrf


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
