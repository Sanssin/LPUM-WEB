@extends('Template.Dashboard.layouts')

@section('main')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Informasi Detail</h4>
                </div>
                <div class="card-body">
                    <h1 class="text-center">Pemilihan panspos</h1>
                    <div class="row">
                        <div class="col-lg-4 d-flex justify-content-center">
                            <div style="width: 300px;height:400px;">
                                <img src="{{ asset('assets/images/prabowo-sandi.jpg') }}" alt=""
                                    class="w-100 h-100 rounded-3" style="object-fit: cover; object-position:center center;">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda fuga iure officia
                                eligendi quisquam, enim ipsum! Recusandae nesciunt quidem ipsa a tenetur nostrum rerum,
                                voluptates dolores ea quasi error sequi quia officiis corrupti maxime praesentium</p>
                            <p>Agenda yang dilaksanakan antara lain :</p>
                            <span class="mb-0 text-muted">Geser ke kanan untuk lebih detail</span>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="bg-primary text-white">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Kegiatan</th>
                                            <th>Periode</th>
                                            <th>Lokasi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < 6; $i++)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>Pengambilan Nomor urut</td>
                                                <td>23 september 2023 s/d 23 september 2023</td>
                                                <td>RK 7</td>
                                                <td>Belum terlaksana</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
