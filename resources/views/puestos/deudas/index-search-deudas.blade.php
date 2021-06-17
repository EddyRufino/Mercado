@extends('admin.layout')

@section('content')
    <div class="container">
        @if (auth()->user()->hasRoles(['admin', 'cobrador', 'secretaria']))
            <div class="">
                <div class="accordion" id="accordionExample">
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="col-md-8 m-auto">
                                <li class="list-group mt-3">

                                @forelse ($deudas as $deuda)
                                    <div class="list-group-item list-group-item-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span class="text-secondary font-weight-bold" style="font-size: 1.1rem">
                                                    {{ $deuda->puesto->user->name }} {{ $deuda->puesto->user->apellido }}
                                                </span>
                                            </div>
                                            <div class="col-sm-12 col-md-7 d-flex justify-content-between">
                                                <span class="text-secondary">
                                                    @include('icons.icon-home')
                                                    Puesto {{ $deuda->puesto->lists->pluck('num_puesto')->implode(',  ') }}
                                                </span>
                                                <span class="text-secondary">
                                                    @include('icons.icon-date')
                                                    {{ $deuda->fecha }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach

                                <div class="overflow-auto mt-1">
                                </div>
                            </div>
                        </div>
                    </div>




                    {{-- AGUA --}}
                    <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="col-md-8 m-auto">
                                @forelse ($aguaDeudas as $deuda)
                                    <li class="list-group-item list-group-item-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span class="text-secondary font-weight-bold" style="font-size: 1.1rem">
                                                    {{ $deuda->puesto->user->name }} {{ $deuda->puesto->user->apellido }}
                                                </span>
                                            </div>
                                            <div class="col-sm-12 col-md-7 d-flex justify-content-between">
                                                <span class="text-secondary">
                                                    @include('icons.icon-home')
                                                    Puesto {{ $deuda->puesto->lists->pluck('num_puesto')->implode(',  ') }}
                                                </span>
                                                <span class="text-secondary">
                                                    @include('icons.icon-date')
                                                    {{ $deuda->fecha }}
                                                </span>
                                            </div>
                                            <div class="col-sm-12 col-md-5 d-flex justify-content-around">
                                                <span class="text-secondary">
                                                    S/. {{ $deuda->monto_agua }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach

                                <div class="overflow-auto mt-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @else
            <h2 class="text-secondary p-2">No Tienes permisos para ver esta vista</h2>
        @endif
            </div>
    </div>
@endsection

@push('scripts')
    <script>
        function showModal() {
            document.getElementById('openModal').style.display = 'block';
        }

        function CloseModal() {
            document.getElementById('openModal').style.display = 'none';
        }
    </script>

    <script>
        function showModalAgua() {
            document.getElementById('openModalAgua').style.display = 'block';
        }

        function CloseModalAgua() {
            document.getElementById('openModalAgua').style.display = 'none';
        }
    </script>
@endpush

@push('styles')
<style>
    .modalDialog {
        position: fixed;
        font-family: Arial, Helvetica, sans-serif;
        top: 15px;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0,0,0,0.5);
        z-index: 99999;
        display:none;
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
        pointer-events: auto;
    }
    .modalDialog > div {
        width: 100%;
        position: relative;
        margin: 10% auto;
        padding: 5px 20px 13px 20px;
        border-radius: 10px;
        background: #fff;
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
    }
    .close {
        background: #606061;
        color: #FFFFFF;
        line-height: 25px;
        position: absolute;
        right: -12px;
        text-align: center;
        top: -10px;
        width: 24px;
        text-decoration: none;
        font-weight: bold;
        -webkit-border-radius: 12px;
        -moz-border-radius: 12px;
        border-radius: 12px;
        -moz-box-shadow: 1px 1px 3px #000;
        -webkit-box-shadow: 1px 1px 3px #000;
        box-shadow: 1px 1px 3px #000;
    }
    .close:hover { background: #00d9ff; }
</style>
@endpush
