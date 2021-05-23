@extends('admin.layout')

@section('content')
    <div class="container">
    @if (auth()->user()->hasRoles(['admin', 'cobrador']))
        <div class="row mt-2">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info" style="height: 6rem;">
                    <div class="inner">
                        <h3>S/. {{ $payMonthSisa }}</h3>

                        <p>Total Sisa <strong>-</strong> {{ today()->format('m/y') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning" style="height: 6rem;">
                    <div class="inner">
                        <h3>S/. {{ $payMonthBanio }}</h3>

                        <p>Total Baño <strong>-</strong> {{ today()->format('m/y') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-secondary" style="height: 6rem;">
                    <div class="inner">
                        <h3>S/. {{ $payMonthPromo }}</h3>

                        <p>Total Promoción <strong>-</strong> {{ today()->format('m/y') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger" style="height: 6rem;">
                    <div class="inner">
                        <h3>S/. {{ $payMonthDeuda }}</h3>

                        <p>Total Deuda <strong>-</strong> {{ today()->format('m/y') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
            </div>
        </div>

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
