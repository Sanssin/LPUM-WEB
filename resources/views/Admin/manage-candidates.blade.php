@extends('Template.Dashboard.layouts')

@section('main')
    <div class="page-titles">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-12 align-self-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a href="{{ route('pagu') }}" class="link"><i class="mdi mdi-home fs-5"></i></a>
                        </li>
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a href="{{ route('admin.manageElection') }}" class="link">Manage Candidate</a>
                        </li>
                        <li class="breadcrumb-item active"> Add</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Kandidat Pemilihan</h1>
                <div class="my-0">
                    <a href="{{ url()->previous() }}" class="btn btn-primary"><span class="mdi mdi-arrow-left"></span>
                        Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="text-white mb-0">Data Kandidat Pemilihan</h4>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Kandidat Pejabat</h4>
                        @role('Admin')
                            <a class="btn btn-info" href="{{ route('candidate.create', ['id' => $id]) }}"><span
                                    class="mdi mdi-plus-circle-outline"></span> Tambah</a>
                        @endrole
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            Sukses menambahkan kandidat!
                        </div>
                    @endif

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
                                                        Nomor : {{ $candidate->number ?? 'Belum ada nomor' }}
                                                    </span>
                                                </div>
                                                <div
                                                    class="d-flex d-lg-block flex-wrap justify-content-center justify-content-lg-start">
                                                    <h5 class="text-primary">{{ $candidate->lead_position }}</h5>
                                                    <div>
                                                        <h6>{{ $candidate->leader->full_name }}
                                                        </h6>

                                                        <div>
                                                            <a href="{{ route('user.show', ['user' => $candidate->leader->nim]) }}"
                                                                class="badge bg-primary text-white">Detail Profil</a>
                                                        </div>
                                                    </div>
                                                    @if ($candidate->coleader_id)
                                                        <h5 class="text-primary">{{ $candidate->colead_position }}</h5>
                                                        <h6>{{ $candidate->coleader->full_name }}
                                                        </h6>
                                                        <div>
                                                            <a href="{{ route('user.show', ['user' => $candidate->coleader->nim]) }}"
                                                                class="badge bg-primary text-white">Detail Profil</a>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <div>
                                                        <strong>Visi</strong>
                                                        {!! $candidate->vision ?? '-' !!}
                                                    </div>
                                                    <div>
                                                        <strong>Misi</strong>
                                                        {!! $candidate->mission ?? '-' !!}
                                                    </div>
                                                </div>
                                            </div>

                                            @role('Admin')
                                                <div class="card-footer d-lg-flex justify-content-lg-between">
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        onclick="changeNumber({{ $candidate->id }})">Ubah
                                                        nomor</button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="deleteButton({{ $candidate->id }})">Hapus</button>
                                                </div>
                                            @endrole
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
        async function sendChange(id, number) {
            $.ajax({
                type: "put",
                url: "{{ route('candidate.changeNumber') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    number: number
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
                },
                error: function(response) {
                    console.log(response.message);
                }
            });
        }
    </script>

    <script>
        async function changeNumber(candidate_id) {
            const {
                value: newNumber
            } = await Swal.fire({
                title: 'Ubah nomor kandidat',
                icon: 'question',
                input: 'text',
                inputLabel: 'Nomor baru',
                allowOutsideClick: false,
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) {
                        return 'Tidak boleh kosong!'
                    } else {
                        const number = Number(value);

                        if (isNaN(number)) {
                            return "Masukkan angka!";
                        }
                    }
                }
            });

            if (newNumber) {
                sendChange(candidate_id, newNumber);
            }
        };
    </script>


    {{-- Hapus kandidat --}}
    <script>
        function deleteButton(id) {
            Swal.fire({
                title: `Hapus kandidat ?`,
                text: 'Tidak dapat dikembalikan lagi',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Lanjutkan',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {
                    $.ajax({
                        type: "delete",
                        url: "{{ route('candidate.delete') }}",
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
