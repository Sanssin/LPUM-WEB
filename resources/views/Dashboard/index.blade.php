@extends('Template.Dashboard.layouts')

@push('vendorScript')
    <script src="{{ asset('dist/js/jquery.sparkline.min.js') }}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('dist/js/apexcharts.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('dist/js/dashboard1.js') }}"></script>
@endpush


@section('main')
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-6">
            <div class="card welcome-card overflow-hidden bg-light-info border-0">
                <div class="card-body">
                    <h3 class="text-primary position-relative">
                        Sugeng Rawuh, {{ auth()->user()->full_name }} ! <br> <span class="fs-2">Jangan ketinggalan
                            informasi pemilihan.</span>
                    </h3>
                    <a href="{{ route('election.index') }}" class="btn btn-info mt-3 position-relative">Lesgooo! <span
                            class="mdi mdi-arrow-right"></span></a>
                </div>
            </div>

            {{-- Statistik --}}
            <div class="row d-none d-md-block">
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <span
                                class="
                            btn btn-xl btn-light-info
                            text-info
                            btn-circle
                            d-flex
                            align-items-center
                            justify-content-center
                          ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </span>
                            <h3 class="mt-3 pt-1 mb-0">
                                {{ $stats['users_count'] }}
                            </h3>
                            <h6 class="text-muted mb-0 fw-normal">User terdaftar</h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <span
                                class="
                            btn btn-xl btn-light-warning
                            text-warning
                            btn-circle
                            d-flex
                            align-items-center
                            justify-content-center
                          mdi mdi-calendar">
                            </span>
                            <h3 class="mt-3 pt-1 mb-0">
                                {{ $stats['votes']->elect_count }} x
                            </h3>
                            <h6 class="text-muted mb-0 fw-normal fs-2">Pemilu diselenggarakan</h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <span
                                class="
                            btn btn-xl btn-light-danger
                            text-danger
                            btn-circle
                            d-flex
                            align-items-center
                            justify-content-center
                          mdi mdi-skull">
                            </span>
                            <h3 class="mt-3 pt-1 mb-0 d-flex align-items-center">
                                {{ $stats['votes']->total_golput ?? '0' }} orang
                            </h3>
                            <h6 class="text-muted mb-0 fw-normal">Golput</h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <span
                                class="
                            btn btn-xl btn-light-success
                            text-success
                            btn-circle
                            d-flex
                            align-items-center
                            justify-content-center
                          mdi mdi-emoticon-excited-outline">
                            </span>
                            <h3 class="mt-3 pt-1 mb-0">
                                {{ $stats['votes']->total_vote ?? '0' }} orang
                            </h3>
                            <h6 class="text-muted mb-0 fw-normal">Partisipan</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="alert alert-primary bg-primary text-white border-0">
                    <strong>PERHATIAN - </strong> Akses fitur-fitur lain menggunakan tombol menu di pojok kiri atas.
                    <br>Untuk mengakses halaman profil dan melakukan <strong>log out</strong> gunakan tombol di pojok kanan
                    atas.
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-lg-6">
            <div class="card border-start border-orange">
                <div class="card-header bg-orange">
                    <h4 class="text-white mb-0">Terbaru!</h4>
                </div>
                <div class="card-body">
                    @if ($latest_election)
                        <div class="row">
                            <div class="col-md-5 d-flex justify-content-center">
                                <img src="{{ asset('storage/' . $latest_election->election->election_image) }}"
                                    style="max-width: 200px" alt="Poster pemilu" class="rounded rounded-lg">
                            </div>
                            <div class="col-md-7">
                                <h3>{{ $latest_election->election->full_name }}</h3>
                                <h3><small class="text-muted">{{ $latest_election->event->event_name }}</small> <span
                                        class="badge bg-primary">{{ $latest_election->method }}</span></h3>
                                <hr class="text-muted">
                                <p><strong>Lokasi : {{ $latest_election->location }}</strong></p>
                                <p>Mulai {{ $latest_election->start_event->isoFormat('dddd D MMMM Y - HH:mm') }} WIB sampai
                                    dengan
                                    {{ $latest_election->end_event->isoFormat('dddd D MMMM Y - HH:mm') }}</p>
                                <a href="{{ route('election.show', ['id' => $latest_election->election->id]) }}"
                                    class="btn btn-info btn-sm">Cek sekarang!</a>
                            </div>
                        </div>
                    @else
                        <p>Belum ada data</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
@endsection
