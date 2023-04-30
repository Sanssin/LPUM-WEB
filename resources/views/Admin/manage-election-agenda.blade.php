@extends('Template.Dashboard.layouts')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="text-white mb-0">Kelola Agenda Pemilihan</h4>
                </div>

                <div class="card-body">
                    <h3>Agenda Pemilihan - {{ $election->election_name . ' ' . $election->election_period }}</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>Agenda tersimpan</h5>
                            @if ($election->event->isEmpty())
                                <p>Belum ada agenda</p>
                            @else
                                <dl class="row">
                                    @foreach ($election->event as $event)
                                        <dt class="col-sm-4">{{ $event->event_name }}</dt>
                                        <dd class="col-sm-8">
                                            <ul>
                                                <li>{{ $event->agenda->method }}</li>
                                                <li>{{ $event->agenda->location }}</li>
                                                <li>{{ $event->agenda->start_event->isoFormat('dddd, D MMMM Y H:mm') }}
                                                    sampai
                                                    {{ $event->agenda->end_event->isoFormat('dddd, D MMMM Y H:mm') }}</li>
                                                @if ($event->agenda->description)
                                                    <li>{{ $event->agenda->description }}</li>
                                                @endif
                                            </ul>
                                        </dd>
                                    @endforeach
                                </dl>
                            @endif
                        </div>
                        <hr class="d-block d-sm-none text-muted">

                        {{-- Form tambah --}}
                        <div class="col-lg-6">
                            <strong>Isi ulang agenda</strong>
                            <div class="alert alert-info">
                                Centang agenda yang diperlukan. Kemudian isi tanggal & waktu, serta kolom-kolom lain yang
                                diperlukan.
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <strong>Centang ulang agenda yang telah dipilih sebelumnya!</strong>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">
                                    Sukses mengupdate agenda!
                                </div>
                            @endif
                            <form action="{{ route('admin.syncAgenda') }}" method="post">
                                @csrf
                                <input type="hidden" name="election_id" value="{{ $election->id }}">
                                {{-- Pendaftaran --}}
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <input type="checkbox" id="pendaftaran" name="event[pendaftaran]"
                                                class="material-inputs chk-col-red" value="1">
                                            <label for="pendaftaran">Pendaftaran</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="start_event[pendaftaran]"
                                                class="form-control form-control-sm @error('start_event.pendaftaran') is-invalid @enderror"
                                                value="{{ old('start_event.pendaftaran') }}">
                                            <small class="form-text text-muted">Tanggal mulai</small>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="end_event[pendaftaran]"
                                                class="form-control form-control-sm  @error('end_event.pendaftaran') is-invalid @enderror"
                                                value="{{ old('end_event.pendaftaran') }}">
                                            <small class="form-text text-muted">Tanggal selesai</small>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-md-8">
                                            <div
                                                class="@error('method.pendaftaran') border border-danger rounded-3 d-flex align-items-center p-2 mb-1 @enderror">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input success" type="radio"
                                                        name="method[pendaftaran]" id="pendaftaran-offline" value="offline">
                                                    <label class="form-check-label"
                                                        for="pendaftaran-offline">Offline</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input warning" type="radio"
                                                        name="method[pendaftaran]" id="pendaftaran-online" value="online">
                                                    <label class="form-check-label" for="pendaftaran-online">Online</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input primary" type="radio"
                                                        name="method[pendaftaran]" id="pendaftaran-hybrid" value="hybrid">
                                                    <label class="form-check-label" for="pendaftaran-hybrid">Hybrid</label>
                                                </div>
                                            </div>
                                            <div>
                                                <input type="text" name="location[pendaftaran]"
                                                    class="form-control form-control-sm @error('location.pendaftaran') is-invalid @enderror"
                                                    value="{{ old('location.pendaftaran') }}">
                                                <small class="form-text text-muted">Lokasi</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- No Urut --}}
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input type="checkbox" id="nourut" name="event[nourut]" value="2"
                                                class="material-inputs chk-col-indigo">
                                            <label for="nourut">Pengambilan No Urut</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="start_event[nourut]"
                                                value="{{ old('start_event.nourut') }}"
                                                class="form-control form-control-sm">
                                            <small class="form-text text-muted">Tanggal mulai</small>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="end_event[nourut]"
                                                value="{{ old('end_event.nourut') }}"
                                                class="form-control form-control-sm @error('end_event.nourut') is-invalid @enderror">
                                            <small class="form-text text-muted">Tanggal selesai</small>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-md-8">
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input success" type="radio"
                                                        name="method[nourut]" id="nourut-offline" value="offline">
                                                    <label class="form-check-label" for="nourut-offline">Offline</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input warning" type="radio"
                                                        name="method[nourut]" id="nourut-online" value="online">
                                                    <label class="form-check-label" for="nourut-online">Online</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input primary" type="radio"
                                                        name="method[nourut]" id="nourut-hybrid" value="hybrid">
                                                    <label class="form-check-label" for="nourut-hybrid">Hybrid</label>
                                                </div>
                                            </div>
                                            <div>
                                                <input type="text" name="location[nourut]"
                                                    class="form-control form-control-sm @error('location.nourut') is-invalid @enderror"
                                                    value="{{ old('location.nourut') }}">
                                                <small class="form-text text-muted">Lokasi</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Kampanye --}}
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input type="checkbox" id="kampanye" name="event[kampanye]" value="3"
                                                class="material-inputs chk-col-teal">
                                            <label for="kampanye">Periode Kampanye</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="start_event[kampanye]"
                                                value="{{ old('start_event.kampanye') }}"
                                                class="form-control form-control-sm">
                                            <small class="form-text text-muted">Tanggal mulai</small>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="end_event[kampanye]"
                                                value="{{ old('end_event.kampanye') }}"
                                                class="form-control form-control-sm @error('end_event.kampanye') is-invalid @enderror">
                                            <small class="form-text text-muted">Tanggal selesai</small>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-md-8">
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input success" type="radio"
                                                        name="method[kampanye]" id="kampanye-offline" value="offline">
                                                    <label class="form-check-label" for="kampanye-offline">Offline</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input warning" type="radio"
                                                        name="method[kampanye]" id="kampanye-online" value="online">
                                                    <label class="form-check-label" for="kampanye-online">Online</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input primary" type="radio"
                                                        name="method[kampanye]" id="kampanye-hybrid" value="hybrid">
                                                    <label class="form-check-label" for="kampanye-hybrid">Hybrid</label>
                                                </div>
                                            </div>
                                            <div>
                                                <input type="text" name="location[kampanye]"
                                                    class="form-control form-control-sm @error('location.kampanye') is-invalid @enderror"
                                                    value="{{ old('location.kampanye') }}">
                                                <small class="form-text text-muted">Lokasi</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Orasi I --}}
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input type="checkbox" id="orasi1" name="event[orasi1]" value="4"
                                                class="material-inputs chk-col-yellow">
                                            <label for="orasi1">Orasi I</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="start_event[orasi1]"
                                                value="{{ old('start_event.orasi1') }}"
                                                class="form-control form-control-sm">
                                            <small class="form-text text-muted">Tanggal mulai</small>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="end_event[orasi1]"
                                                value="{{ old('end_event.orasi1') }}"
                                                class="form-control form-control-sm @error('end_event.orasi1') is-invalid @enderror">
                                            <small class="form-text text-muted">Tanggal selesai</small>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-md-8">
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input success" type="radio"
                                                        name="method[orasi1]" id="orasi1-offline" value="offline">
                                                    <label class="form-check-label" for="orasi1-offline">Offline</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input warning" type="radio"
                                                        name="method[orasi1]" id="orasi1-online" value="online">
                                                    <label class="form-check-label" for="orasi1-online">Online</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input primary" type="radio"
                                                        name="method[orasi1]" id="orasi1-hybrid" value="hybrid">
                                                    <label class="form-check-label" for="orasi1-hybrid">Hybrid</label>
                                                </div>
                                            </div>
                                            <div>
                                                <input type="text" name="location[orasi1]"
                                                    class="form-control form-control-sm @error('location.orasi1') is-invalid @enderror"
                                                    value="{{ old('location.orasi1') }}">
                                                <small class="form-text text-muted">Lokasi</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Orasi II --}}
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input type="checkbox" id="orasi2" name="event[]" value="5"
                                                class="material-inputs chk-col-brown">
                                            <label for="orasi2">Orasi II</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="start_event[orasi2]"
                                                value="{{ old('start_event.orasi2') }}"
                                                class="form-control form-control-sm">
                                            <small class="form-text text-muted">Tanggal mulai</small>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="end_event[orasi2]"
                                                value="{{ old('end_event.orasi2') }}"
                                                class="form-control form-control-sm @error('end_event.orasi2') is-invalid @enderror">
                                            <small class="form-text text-muted">Tanggal selesai</small>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-md-8">
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input success" type="radio"
                                                        name="method[orasi2]" id="orasi2-offline" value="offline">
                                                    <label class="form-check-label" for="orasi2-offline">Offline</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input warning" type="radio"
                                                        name="method[orasi2]" id="orasi2-online" value="online">
                                                    <label class="form-check-label" for="orasi2-online">Online</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input primary" type="radio"
                                                        name="method[orasi2]" id="orasi2-hybrid" value="hybrid">
                                                    <label class="form-check-label" for="orasi2-hybrid">Hybrid</label>
                                                </div>
                                            </div>
                                            <div>
                                                <input type="text" name="location[orasi2]"
                                                    class="form-control form-control-sm @error('location.orasi2') is-invalid @enderror"
                                                    value="{{ old('location.orasi2') }}">
                                                <small class="form-text text-muted">Lokasi</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Debat I --}}
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input type="checkbox" id="debat1" name="event[]" value="6"
                                                class="material-inputs chk-col-purple">
                                            <label for="debat1">Debat I</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="start_event[debat1]"
                                                value="{{ old('start_event.debat1') }}"
                                                class="form-control form-control-sm">
                                            <small class="form-text text-muted">Tanggal mulai</small>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="end_event[debat1]"
                                                value="{{ old('end_event.debat1') }}"
                                                class="form-control form-control-sm @error('end_event.debat1') is-invalid @enderror">
                                            <small class="form-text text-muted">Tanggal selesai</small>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-md-8">
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input success" type="radio"
                                                        name="method[debat1]" id="debat1-offline" value="offline">
                                                    <label class="form-check-label" for="debat1-offline">Offline</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input warning" type="radio"
                                                        name="method[debat1]" id="debat1-online" value="online">
                                                    <label class="form-check-label" for="debat1-online">Online</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input primary" type="radio"
                                                        name="method[debat1]" id="debat1-hybrid" value="hybrid">
                                                    <label class="form-check-label" for="debat1-hybrid">Hybrid</label>
                                                </div>
                                            </div>
                                            <div>
                                                <input type="text" name="location[debat1]"
                                                    class="form-control form-control-sm @error('location.debat1') is-invalid @enderror"
                                                    value="{{ old('location.debat1') }}">
                                                <small class="form-text text-muted">Lokasi</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Debat II --}}
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input type="checkbox" id="debat2" name="event[]" value="7"
                                                class="material-inputs chk-col-light-green">
                                            <label for="debat2">Debat II</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="start_event[debat2]"
                                                value="{{ old('start_event.debat2') }}"
                                                class="form-control form-control-sm">
                                            <small class="form-text text-muted">Tanggal mulai</small>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="end_event[debat2]"
                                                value="{{ old('end_event.debat2') }}"
                                                class="form-control form-control-sm @error('end_event.debat2') is-invalid @enderror">
                                            <small class="form-text text-muted">Tanggal selesai</small>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-md-8">
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input success" type="radio"
                                                        name="method[debat2]" id="debat2-offline" value="offline">
                                                    <label class="form-check-label" for="debat2-offline">Offline</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input warning" type="radio"
                                                        name="method[debat2]" id="debat2-online" value="online">
                                                    <label class="form-check-label" for="debat2-online">Online</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input primary" type="radio"
                                                        name="method[debat2]" id="debat2-hybrid" value="hybrid">
                                                    <label class="form-check-label" for="debat2-hybrid">Hybrid</label>
                                                </div>
                                            </div>
                                            <div>
                                                <input type="text" name="location[debat2]"
                                                    class="form-control form-control-sm @error('location.debat2') is-invalid @enderror"
                                                    value="{{ old('location.debat2') }}">
                                                <small class="form-text text-muted">Lokasi</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Debat III --}}
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input type="checkbox" id="debat3" name="event[]" value="8"
                                                class="material-inputs chk-col-light-blue">
                                            <label for="debat3">Debat III</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="start_event[debat3]"
                                                value="{{ old('start_event.debat3') }}"
                                                class="form-control form-control-sm">
                                            <small class="form-text text-muted">Tanggal mulai</small>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="end_event[debat3]"
                                                value="{{ old('end_event.debat3') }}"
                                                class="form-control form-control-sm @error('end_event.debat3') is-invalid @enderror">
                                            <small class="form-text text-muted">Tanggal selesai</small>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-md-8">
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input success" type="radio"
                                                        name="method[debat3]" id="debat3-offline" value="offline">
                                                    <label class="form-check-label" for="debat3-offline">Offline</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input warning" type="radio"
                                                        name="method[debat3]" id="debat3-online" value="online">
                                                    <label class="form-check-label" for="debat3-online">Online</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input primary" type="radio"
                                                        name="method[debat3]" id="debat3-hybrid" value="hybrid">
                                                    <label class="form-check-label" for="debat3-hybrid">Hybrid</label>
                                                </div>
                                            </div>
                                            <div>
                                                <input type="text" name="location[debat3]"
                                                    class="form-control form-control-sm @error('location.debat3') is-invalid @enderror"
                                                    value="{{ old('location.debat3') }}">
                                                <small class="form-text text-muted">Lokasi</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Coblosan --}}
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input type="checkbox" id="coblosan" name="event[coblosan]" value="9"
                                                class="material-inputs chk-col-orange">
                                            <label for="coblosan">Pencoblosan</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="start_event[coblosan]"
                                                value="{{ old('start_event.coblosan') }}"
                                                class="form-control form-control-sm">
                                            <small class="form-text text-muted">Tanggal mulai</small>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="end_event[coblosan]"
                                                value="{{ old('end_event.coblosan') }}"
                                                class="form-control form-control-sm @error('end_event.coblosan') is-invalid @enderror">
                                            <small class="form-text text-muted">Tanggal selesai</small>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-md-8">
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input success" type="radio"
                                                        name="method[coblosan]" id="coblosan-offline" value="offline">
                                                    <label class="form-check-label" for="coblosan-offline">Offline</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input warning" type="radio"
                                                        name="method[coblosan]" id="coblosan-online" value="online">
                                                    <label class="form-check-label" for="coblosan-online">Online</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input primary" type="radio"
                                                        name="method[coblosan]" id="coblosan-hybrid" value="hybrid">
                                                    <label class="form-check-label" for="coblosan-hybrid">Hybrid</label>
                                                </div>
                                            </div>
                                            <div>
                                                <input type="text" name="location[coblosan]"
                                                    class="form-control form-control-sm @error('location.coblosan') is-invalid @enderror"
                                                    value="{{ old('location.coblosan') }}">
                                                <small class="form-text text-muted">Lokasi</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Pengumuman --}}
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input type="checkbox" id="pengumuman" name="event[pengumuman]"
                                                value="10" class="material-inputs chk-col-blue-grey">
                                            <label for="pengumuman">Pengumuman</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="start_event[pengumuman]"
                                                class="form-control form-control-sm @error('start_event.pengumuman') is-invalid @enderror"
                                                value="{{ old('start_event.pengumuman') }}">
                                            <small class="form-text text-muted">Tanggal mulai</small>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="datetime-local" name="end_event[pengumuman]"
                                                value="{{ old('end_event.pengumuman') }}"
                                                class="form-control form-control-sm @error('end_event.pengumuman') is-invalid @enderror">
                                            <small class="form-text text-muted">Tanggal selesai</small>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-md-8">
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input success" type="radio"
                                                        name="method[pengumuman]" id="pengumuman-offline"
                                                        value="offline">
                                                    <label class="form-check-label"
                                                        for="pengumuman-offline">Offline</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input warning" type="radio"
                                                        name="method[pengumuman]" id="pengumuman-online" value="online">
                                                    <label class="form-check-label" for="pengumuman-online">Online</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input primary" type="radio"
                                                        name="method[pengumuman]" id="pengumuman-hybrid" value="hybrid">
                                                    <label class="form-check-label" for="pengumuman-hybrid">Hybrid</label>
                                                </div>
                                            </div>
                                            <div>
                                                <input type="text" name="location[pengumuman]"
                                                    class="form-control form-control-sm @error('location.pengumuman') is-invalid @enderror"
                                                    value="{{ old('location.pengumuman') }}">
                                                <small class="form-text text-muted">Lokasi</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('vendorScript')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
