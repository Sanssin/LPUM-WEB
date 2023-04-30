@extends('Template.Dashboard.layouts')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="text-white mb-0">Kelola Kandidat Pemilihan</h4>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Kandidat Pejabat</h4>
                        <button class="btn btn-info"><span class="mdi mdi-plus-circle-outline"></span> Tambah</button>
                    </div>

                    @if ($candidates->isEmpty())
                        <p>Belum ada</p>
                    @else
                        <div class="row">
                            <strong>Saat ini tersimpan</strong>
                            <div class="row justify-content-center justify-content-lg-start">
                                @foreach ($candidates as $candidate)
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <img src="{{ $candidate->candidate_image ? asset('storage/' . $candidate->candidate_image) : asset('assets/images/default-image/candidate.jpg') }}"
                                                class="rounded-3" style="max-width: 400px" alt="fotocalon">
                                            <div class="card-body">
                                                <div class="text-center ">
                                                    <span
                                                        class="badge {{ $candidate->number ? 'bg-primary' : 'bg-warning' }}">
                                                        Nomor {{ $candidate->number ?? 'Belum ada nomor' }}
                                                    </span>
                                                </div>
                                                <div
                                                    class="d-flex d-lg-block flex-wrap justify-content-center justify-content-lg-start">
                                                    <h5 class="text-primary">{{ $candidate->lead_position }}</h5>
                                                    <h6>{{ $candidate->leader->first_name . ' ' . $candidate->leader->last_name }}
                                                    </h6>
                                                    @if ($candidate->coleader_id)
                                                        <h5 class="text-primary">{{ $candidate->colead_position }}</h5>
                                                        <h6>{{ $candidate->coleader->first_name . ' ' . $candidate->coleader->last_name }}
                                                        </h6>
                                                    @endif
                                                </div>
                                                <div>
                                                    <div>
                                                        <strong>Visi</strong>
                                                        <p>{{ $candidate->vision }}
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <strong>Misi</strong>
                                                        <p>{{ $candidate->mission }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-footer d-lg-flex justify-content-lg-between">
                                                <button class="btn btn-sm btn-primary">Ubah nomor</button>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="deleteButton({{ $candidate->id }})">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    @endif
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
                title: `Hapus kandidat ?`,
                showCancelButton: true,
                confirmButtonText: 'Lanjutkan',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {
                    $.ajax({
                        type: "delete",
                        url: "{{ route('admin.deleteCandidate') }}",
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
                                text: response.message,
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
