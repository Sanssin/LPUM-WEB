@extends('Template.Dashboard.layouts')

@section('main')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Informasi Detail</h4>
                </div>
                <div class="card-body">
                    {{-- Judul --}}
                    <h1 class="text-center">{{ $election->election_name . ' ' . $election->election_period }}</h1>

                    {{-- Kolom utama --}}
                    <div class="row">
                        {{-- Foto --}}
                        <div class="col-lg-4 d-flex justify-content-center">
                            <div style="width: 300px;height:400px;">
                                <img src="{{ asset('storage/' . $election->election_image) }}" alt=""
                                    class="w-100 h-100 rounded-3" style="object-fit: cover; object-position:center center;">
                            </div>
                        </div>
                        {{-- Artikel --}}
                        <div class="col-lg-8">
                            <p class="text-primary fw-bold">{{ $election->start_election->isoFormat('d MMMM Y') }} sampai
                                {{ $election->end_election->isoFormat('d MMMM Y') }}</p>

                            {{-- Candidate button --}}
                            <div>
                                @if ($election->candidate->isNotEmpty())
                                    <a href="{{ route('candidate.show', ['id' => $election->id]) }}"
                                        class="btn btn-info">Lihat
                                        kandidat</a>
                                @else
                                    <button class="btn btn-purple" disabled>Belum ada kandidat</button>
                                @endif
                                @if ($election->result_visibility)
                                    <a href="{{ route('candidate.show', ['id' => $election->id]) }}"
                                        class="btn btn-info">Lihat
                                        kandidat</a>
                                @else
                                    <button class="btn btn-purple" disabled>Belum ada hasil</button>
                                @endif
                            </div>
                            {!! $election->description !!}

                            @if ($election->event->isEmpty())
                                <p>Belum ada data agenda</p>
                            @else
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
                                            @foreach ($election->event as $event)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $event->event_name }}</td>
                                                    <td>{{ $event->agenda->start_event->isoFormat('D MMMM Y') . ' s/d ' . $event->agenda->end_event->isoFormat('D MMMM Y') }}
                                                    </td>
                                                    <td>{{ $event->agenda->location }}</td>
                                                    <td>{{ $event->agenda->method }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
