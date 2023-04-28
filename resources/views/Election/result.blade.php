@extends('Template.Dashboard.layouts')

@section('main')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success">
                    <h5 class="mb-0 text-white">Hasil Pemilu aktif</h5>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        @foreach ($elections as $election)
                            <div class="col-12 col-lg-8">
                                <div class="card">
                                    <img class="card-img-top img-responsive mw-50"
                                        src="{{ asset('storage/' . $election->election_image) }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $election->election_name }}</h4>
                                        <p class="card-text">
                                            {{ $election->description }}
                                        </p>
                                        <a href="{{ route('election.show', ['id' => $election->id]) }}"
                                            class="btn btn-info my-1 d-block">Detail</a>
                                        @if (now() < $election->resultTime[0]->agenda->start_event)
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-purple text-white" disabled>Belum periode
                                                    pengumuman</button>
                                            </div>
                                        @else
                                            <a href="{{ route('election.result.show') }}"
                                                class="btn btn-primary d-block">Lihat
                                                hasil</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row mb-1">
                <div class="col">
                    <div class="card mb-1">
                        <div class="card-body pb-1">
                            <h6 class="card-title">Statistik Partisipasi</h6>
                            <div id="election-stats"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card overflow-hidden my-1">
                        <div class="d-flex flex-row">
                            <div class="p-3 bg-light-info d-flex align-items-center justify-content-center">
                                <h3 class="text-info box mb-0 d-flex align-items-center">
                                    <i class="mdi mdi-group display-8"></i>
                                </h3>
                            </div>
                            <div class="p-3">
                                <h3 class="text-info mb-0">12 x</h3>
                                <span class="text-muted">Total Pemilu</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card overflow-hidden my-1">
                        <div class="d-flex flex-row">
                            <div class="p-3 bg-light-purple d-flex align-items-center justify-content-center">
                                <h3 class="text-purple box mb-0 d-flex align-items-center">
                                    <i class="mdi mdi-group display-8"></i>
                                </h3>
                            </div>
                            <div class="p-3">
                                <h3 class="text-purple mb-0">250 orang</h3>
                                <span class="text-muted">Total Pemilih aktif</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card overflow-hidden my-1">
                        <div class="d-flex flex-row">
                            <div class="p-3 bg-light-purple d-flex align-items-center justify-content-center">
                                <h3 class="text-purple box mb-0 d-flex align-items-center">
                                    <i class="mdi mdi-group display-8"></i>
                                </h3>
                            </div>
                            <div class="p-3">
                                <h3 class="text-purple mb-0">250 orang</h3>
                                <span class="text-muted">Total Pemilih aktif</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card overflow-hidden my-1">
                        <div class="d-flex flex-row">
                            <div class="p-3 bg-light-purple d-flex align-items-center justify-content-center">
                                <h3 class="text-purple box mb-0 d-flex align-items-center">
                                    <i class="mdi mdi-group display-8"></i>
                                </h3>
                            </div>
                            <div class="p-3">
                                <h3 class="text-purple mb-0">250 orang</h3>
                                <span class="text-muted">Total Pemilih aktif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('vendorScript')
    <script src="{{ asset('dist/js/apexcharts.min.js') }}"></script>
@endpush

@section('scripts')
    <script>
        $(function() {
            // Basic Bar Chart -------> BAR CHART
            var options = {
                series: [250, 420],
                labels: ['Partisipan', 'Golput'],
                chart: {
                    type: 'donut',
                },
                plotOptions: {
                    pie: {
                        startAngle: -90,
                        endAngle: 90,
                        offsetY: 10
                    }
                },
                grid: {
                    padding: {
                        bottom: -80
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 340
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };


            var chart_bar_basic = new ApexCharts(
                document.querySelector("#election-stats"),
                options
            );
            chart_bar_basic.render();
        });
    </script>
@endsection
