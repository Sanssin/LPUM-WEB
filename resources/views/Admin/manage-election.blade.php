@extends('Template.Dashboard.layouts')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="text-white mb-0">Kelola Semua Pemilu</h4>
                </div>

                <div class="card-body">
                    <h5>Daftar Agenda Pemilu</h5>
                    @if (session('success'))
                        <div class="alert alert-success">
                            Sukses mengubah status pemilihan
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
                                @foreach ($elections as $election)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $election->election_name }}</td>
                                        <td>{{ $election->start_election->isoFormat('dddd, D MMMM Y H:mm') }}</td>
                                        <td>{{ $election->end_election->isoFormat('dddd, D MMMM Y H:mm') }}</td>
                                        <td>{{ $election->election_status }}</td>
                                        <td>{{ $election->result_visibility }}</td>
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
                                                        <li><a class="dropdown-item" href="#">Kelola Kandidat</a></li>
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
                                                    <form action="{{ route('admin.electionStatus') }}" id="activateForm"
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
                                @endforeach
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
                title: 'Yakin ingin menghapus agenda?',
                showCancelButton: true,
                confirmButtonText: 'Yakin',
                cancelButtonText: 'Batal',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Saved!' + id, '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        }
    </script>
@endsection
