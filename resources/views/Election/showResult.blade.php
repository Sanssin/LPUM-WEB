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
                                                <td>{{ $stats->total_voter }}</td>
                                                <td>{{ $stats->voted }}</td>
                                                <td>{{ $stats->golput }}</td>
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
                                        @switch($election->election_status)
                                            @case('active')
                                                <li class="text-success">Status Pemilu : Masih aktif</li>
                                            @break

                                            @case('done')
                                                <li class="text-purple">Status Pemilu : Selesai</li>
                                            @break

                                            @default
                                                <li class="text-danger">Status Pemilu : Tidak aktif</li>
                                        @endswitch

                                        <li class="text-primary">Hasil Pemilu : <strong>
                                                {{ $election->result_visibility == 0 ? 'Tertutup' : 'Terbuka' }} </strong>
                                        </li>
                                    </ul>
                                    @role('Admin')
                                        <hr class="text-muted">
                                        <div class="d-flex justify-content-evenly">
                                            @if ($election->election_status !== 'done')
                                                <button class="btn btn-cyan" id="end-election">Selesaikan</button>
                                            @endif
                                            @if ($election->result_visibility == 0)
                                                <button class="btn btn-purple text-white" id="open-result">Buka hasil</button>
                                            @else
                                                <button class="btn btn-orange text-white" id="close-result">Tutup hasil</button>
                                            @endif
                                        </div>
                                    @endrole
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 justify-content-center">
                            @if ($election->result_visibility == 0)
                                <h1 class="font-weight-bold">Hasil belum dapat dilihat ya</h1>
                            @else
                                <div id="chart-bar-basic"></div>
                            @endif
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
                    data: @json($voteNumber),
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
                colors: ["#01c0c8"],
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
                    categories: @json($candidatePairs),
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

    {{-- End & open result --}}
    <script>
        $("#end-election").click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: `Selesaikan pemilihan ?`,
                showCancelButton: true,
                confirmButtonText: 'Lanjutkan',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "{{ route('election.end') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            data: {{ $id }}
                        },
                        dataType: "json",
                        beforeSend: () => {
                            Swal.fire({
                                title: 'Tunggu...',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                showConfirmButton: false,
                                didOpen: () => {
                                    Swal.showLoading()
                                }
                            })
                        },
                        success: function(response) {
                            let timerInterval
                            Swal.fire({
                                title: 'Sukses!',
                                icon: 'success',
                                text: `${response.message}`,
                                html: 'Halaman akan diperbarui dalam <b></b> milliseconds.',
                                timer: 2500,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading()
                                    const b = Swal.getHtmlContainer()
                                        .querySelector('b')
                                    timerInterval = setInterval(() => {
                                        b.textContent = Swal
                                            .getTimerLeft()
                                    }, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    });
                }
            })
        });

        $("#open-result").click(function(e) {
            e.preventDefault();
            var condition = '{{ $election->election_status }}';

            if (condition == 'active') {
                Swal.fire(
                    'Gagal',
                    'Pemilihan masih berjalan',
                    'error'
                );
            } else {
                Swal.fire({
                    title: `Buka hasil pemilihan ?`,
                    showCancelButton: true,
                    confirmButtonText: 'Lanjutkan',
                    cancelButtonText: 'Batal'
                }).then((result) => {

                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: "{{ route('election.openResult') }}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                data: {{ $id }}
                            },
                            dataType: "json",
                            beforeSend: () => {
                                Swal.fire({
                                    title: 'Tunggu...',
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    showConfirmButton: false,
                                    didOpen: () => {
                                        Swal.showLoading()
                                    }
                                })
                            },
                            success: function(response) {
                                let timerInterval
                                Swal.fire({
                                    title: 'Sukses!',
                                    icon: 'success',
                                    text: `${response.message}`,
                                    html: 'Halaman akan diperbarui dalam <b></b> milliseconds.',
                                    timer: 2500,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading()
                                        const b = Swal.getHtmlContainer()
                                            .querySelector('b')
                                        timerInterval = setInterval(() => {
                                            b.textContent = Swal
                                                .getTimerLeft()
                                        }, 100)
                                    },
                                    willClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                }).then((result) => {
                                    location.reload();
                                })
                            }
                        });
                    }
                })
            }
        });
    </script>
@endsection
