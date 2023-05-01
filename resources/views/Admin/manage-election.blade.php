@extends('Template.Dashboard.layouts')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="text-white mb-0">Kelola Semua Pemilu</h4>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5>Daftar Agenda Pemilu</h5>
                        <a href="{{ route('election.create') }}" class="btn btn-info"><span
                                class="mdi mdi-plus-circle-outline"></span> Tambah</a>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <p>Berikut adalah agenda pemilihan yang telah disimpan di sistem. Untuk mengatur pemilu lebih lengkap,
                        gunakan tombol pada kolom paling kanan di tabel.</p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th>No</th>
                                    <th>Kegiatan</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Status</th>
                                    <th>Hasil terlihat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($elections as $election)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $election->election_name }} <br><span
                                                class="badge bg-light-primary text-primary fw-bold">ID -
                                                {{ $election->id }}</span></td>
                                        <td>{{ $election->start_election->isoFormat('dddd, D MMMM Y H:mm') }}</td>
                                        <td>{{ $election->end_election->isoFormat('dddd, D MMMM Y H:mm') }}</td>
                                        <td><span
                                                class="badge {{ __('core.' . $election->election_status . '.class') }}">{{ __("core.$election->election_status.text") }}</span>
                                        </td>
                                        <td>
                                            @if ($election->result_visibility)
                                                <span
                                                    class="badge rounded-pill bg-light-primary text-primary">Terlihat</span>
                                            @else
                                                <span
                                                    class="badge rounded-pill bg-light-secondary text-secondary">Tidak</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="justify-content-center">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-light-info text-info font-weight-medium btn-sm dropdown-toggle"
                                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Aksi
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Edit data</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('admin.manageElectionAgenda', ['id' => $election->id]) }}">Kelola
                                                                Agenda</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('candidate.show', ['id' => $election->id]) }}">Kelola
                                                                Kandidat</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li>
                                                            <button type="button" class="dropdown-item text-danger"
                                                                onclick="deleteButton({{ $election->id }})">Hapus</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div>
                                                    <form action="{{ route('election.changeStatus') }}" id="activateForm"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $election->id }}">
                                                        <button type="submit" value="active" name="status"
                                                            class="btn btn-sm btn-success my-1 @if ($election->election_status == 'active') d-none @endif">Aktifkan</button>
                                                        <button type="submit" value="inactive" name="status"
                                                            class="btn btn-sm btn-orange text-white my-1 @if ($election->election_status == 'inactive') d-none @endif">Non-aktifkan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Belum ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('vendorScript')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('scripts')
    <script>
        function deleteButton(id) {
            Swal.fire({
                title: `Hapus data pemilihan ?`,
                showCancelButton: true,
                confirmButtonText: 'Lanjutkan',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {
                    $.ajax({
                        type: "delete",
                        url: "{{ route('election.delete') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            data: id
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
    </script>
@endsection
