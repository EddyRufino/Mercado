@extends('admin.layout')

@section('content')
    <div class="container">
    @if (auth()->user()->hasRoles(['admin', 'cobrador']))
      {{--   <div class="row mt-2">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info" style="height: 6rem;">
                    <div class="inner">
                        <h3>S/. {{ $payDay }}</h3>

                        <p>Sisa Pago Total {{ today()->format('d/m') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning" style="height: 6rem;">
                    <div class="inner">
                        <h3>S/. {{ $payAnticipado }}</h3>

                        <p>Sisa Anticipada  {{ today()->format('d/m') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger" style="height: 6rem;">
                    <div class="inner">
                        <h3>S/. {{ $deuda }}</h3>

                        <p>Deuda Sisa  total  {{ today()->format('d/m') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-md-12">
                {!! $chart->container() !!}

                {!! $chart->script() !!}
            </div>
        </div>
    @endif
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endpush
