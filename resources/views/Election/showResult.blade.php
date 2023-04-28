@extends('Template.Dashboard.layouts')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="mb-0 text-white">Hasil Pemilihan</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0"><span class="mdi mdi-chart-timeline-variant"></span> Statistik</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="text-white text-center">
                                            <tr>
                                                <th class="bg-primary">Total pemilih</th>
                                                <th class="bg-success">Telah memilih</th>
                                                <th class="bg-orange">Golput</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center fw-bold">
                                            <tr style="font-size: 20px">
                                                <td>40</td>
                                                <td>40</td>
                                                <td>40</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0"><span class="mdi mdi-cog"></span>Pengaturan</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="mb-0">
                                        <li class="text-danger">Status Pemilu : Masih aktif</li>
                                        <li class="text-danger">Hasil Pemilu : Tertutup</li>
                                    </ul>
                                    <hr class="text-muted">
                                    <div class="d-flex justify-content-evenly">
                                        <button class="btn btn-cyan" id="end-election">Selesaikan</button>
                                        <button class="btn btn-purple text-white" id="open-result">Buka hasil</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div id="chart-bar-basic"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('vendorScript')
    <script src="{{ asset('dist/js/apexcharts.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('scripts')
    {{-- Grafik --}}
    <script>
        $(function() {
            // Basic Bar Chart -------> BAR CHART
            var options_basic = {
                series: [{
                    name: 'Jumlah suara',
                    data: [25, 120, 3],
                }, ],
                chart: {
                    fontFamily: '"DM Sans", sans-serif',
                    type: "bar",
                    height: 350,
                    toolbar: {
                        show: false,
                    },
                },
                grid: {
                    borderColor: "transparent",
                },
                colors: ["#6993ff"],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: true,
                },
                xaxis: {
                    categories: [
                        "Jokowi-Ahok",
                        "Naruto Sasuke",
                        "Spombob-petrik",
                    ],
                },
                tooltip: {
                    theme: "dark",
                },
            };

            var chart_bar_basic = new ApexCharts(
                document.querySelector("#chart-bar-basic"),
                options_basic
            );
            chart_bar_basic.render();
        });
    </script>

    {{-- Alert --}}
    <script>
        $("#end-election").click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Selesaikan Pemilu?',
                text: 'Data dalam pemilu akan disimpan!',
                showCancelButton: true,
                confirmButtonText: 'Selesaikan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Saved!', '', 'success')
                }
            })
        });

        $("#open-result").click(function(e) {
            e.preventDefault();
            Swal.fire(
                'Error!',
                'Pemilu belum diselesaikan',
                'error'
            );
        });
    </script>
@endsection
