@extends('admin.layout')

@section('content')
    <div class="container">
        @if (auth()->user()->hasRoles(['admin', 'cobrador', 'comerciante']))
            <div class="">
                <div class="accordion" id="accordionExample">
                    <div class="card-header">
                        <div class="btn btn-info text-left d-inline"
                            data-toggle="collapse"
                            data-target="#collapseOne"
                            aria-expanded="true"
                            aria-controls="collapseOne"
                        >
                            <span id="headingOne" class="font-weight-bold">
                                Mis Deudas Sisa
                            </span>
                        </div>

                        <div class="btn btn-info text-left d-inline  ml-1"
                            data-toggle="collapse"
                            data-target="#collapseOne"
                            aria-expanded="true"
                            aria-controls="collapseOne"
                        >
                            <span id="headingOne">
                                <a class="text-white font-weight-bold" href="{{ route('my-debts-agua') }}">
                                    Mis Deudas Agua
                                </a>
                            </span>
                        </div>
                    </div>

                    <div id="collapseOne"
                        class="collapse show"
                        aria-labelledby="headingOne"
                        data-parent="#accordionExample"
                    >

                        @include('MyDebts.debt-sisa')

                    </div>
                </div>

        @else
            <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
        @endif
            </div>
    </div>
@endsection

