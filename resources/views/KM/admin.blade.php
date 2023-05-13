@extends('Template.Dashboard.layouts')

@push('vendorStyle')
    <link rel="stylesheet" href="{{ asset('dist/css/dataTables.bootstrap5.min.css') }}">
    @livewireStyles
@endpush



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
                        <li class="breadcrumb-item active" aria-current="page">
                            Manage Organization
                        </li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Kelola Organisasi</h1>
            </div>
        </div>
    </div>

    <!-- ============================================================= -->
    <!-- Start Page Content -->
    <!-- ============================================================= -->
    <div class="row">
        <!-- Column kiri -->
        <div class="col-lg-8 col-xl-9 col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center mb-4">
                        <h4>Data Organisasi</h4>
                        <div class="ms-auto">
                            <div class="btn-group">
                                <button type="button"
                                    class="btn btn-light-primary text-primary font-weight-medium rounded-pill px-4"
                                    data-bs-toggle="modal" data-bs-target="#createmodel">
                                    Tambah data
                                </button>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="file_export" class="table table-bordered nowrap display">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" class="form-check-input" /></th>
                                    <th>Nama Organisasi</th>
                                    <th>Nama Lengkap</th>
                                    <th>Periode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($organizations as $org)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" value="{{ $org->id }}"
                                                    name="id" />
                                                <label class="form-check-label"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="fw-normal mb-0">{{ $org->organization_name }}</span><br>
                                        </td>
                                        <td>
                                            <span class="fw-normal mb-0">{{ $org->organization_full_name }}</span><br>
                                        </td>
                                        <td>
                                            <span
                                                class="badge bg-light-info text-info font-weight-medium">{{ $org->organization_period }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('km.edit', ['organization' => $org->id]) }}"
                                                class="btn btn-sm btn-orange text-white">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h4 class="mb-0">Menu Operasi</h4>
                    <button class="btn btn-danger mt-2" id="deleteButton">Hapus Data</button>
                </div>
            </div>
        </div>

        </form>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-4 col-xl-3 col-md-3">
            <div class="card">
                <div class="border-bottom p-3">
                    <h4 class="mb-0">Filter Data</h4>
                </div>

                <div class="card-body">
                    <div class="list-group mt-1">
                        <a href="{{ route('km.manage') }}" class="list-group-item text-center"><i data-feather="list"
                                class="feather-sm fill-white me-2"></i>
                            Semua Organisasi</a>
                    </div>
                    <form action="" method="get" class="list-group">
                        @foreach ($periods as $period)
                            <button type="submit" name="period" value={{ $period }} class="list-group-item">
                                {{ $period }}</button>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- ============================================================= -->
    <!-- End PAge Content -->
    <!-- ============================================================= -->

    <!-- Create Modal -->
    <div class="modal fade" id="createmodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header modal-colored-header d-flex align-items-center bg-primary text-white">
                        <h5 class="modal-title" id="createModalLabel">
                            <i class="mdi mdi-plus-box-multiple me-2"></i> Pilih metode
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">
                            <p>Terdapat dua metode untuk menambahkan user. Menggunakan file (dapat menambahkan lebih dari 1
                                user) atau menambahkan manual (mengisi satu persatu)</p>
                        </div>
                        <button type="button" class="btn btn-light-primary text-primary btn-lg px-4 fs-4"
                            data-bs-toggle="modal" data-bs-target="#add-organization-modal">
                            Tambah Manual
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-danger text-danger font-weight-medium rounded-pill px-4"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- sample modal content -->
    @livewire('add-organization-component')

@endsection

@push('vendorScript')
    @livewireScripts
    <script src="{{ asset('dist/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/datatable-advanced.init.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.simple-checkbox-table.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $("table").simpleCheckboxTable();
        });


        $("#deleteButton").click(function(e) {
            e.preventDefault();

            var arr = [];

            $.each($("input[name='id']:checked"), function() {
                arr.push($(this).val());
            });

            if (arr.length == 0) {
                Swal.fire(
                    'Error',
                    'Kamu belum memilih data',
                    'error'
                );
            } else {
                Swal.fire({
                    title: 'Perhatian!',
                    text: 'akan menghapus organisasi yang dipilih?',
                    showCancelButton: true,
                    icon: 'error',
                    confirmButtonText: 'Yakin',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Apa kamu yakin?',
                            showCancelButton: true,
                            icon: 'error',
                            confirmButtonText: 'Yakin',
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Apa kamu benar benar yakin?',
                                    showCancelButton: true,
                                    icon: 'error',
                                    confirmButtonText: 'Ya! Lanjut',
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        Swal.fire({
                                            title: `Hapus ${arr.length} organisasi ?`,
                                            showCancelButton: true,
                                            confirmButtonText: 'Lanjutkan',
                                        }).then((result) => {
                                            /* Read more about isConfirmed, isDenied below */
                                            if (result.isConfirmed) {
                                                $.ajax({
                                                    type: "delete",
                                                    url: "{{ route('km.delete') }}",
                                                    data: {
                                                        _token: "{{ csrf_token() }}",
                                                        data: arr
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
                                                    success: function(
                                                        response) {
                                                        let timerInterval
                                                        Swal.fire({
                                                            title: 'Sukses!',
                                                            icon: 'success',
                                                            text: 'Menghapus organisasi',
                                                            html: 'Halaman akan diperbarui dalam <b></b> milliseconds.',
                                                            timer: 2500,
                                                            timerProgressBar: true,
                                                            didOpen: () => {
                                                                Swal.showLoading()
                                                                const
                                                                    b =
                                                                    Swal
                                                                    .getHtmlContainer()
                                                                    .querySelector(
                                                                        'b'
                                                                    )
                                                                timerInterval
                                                                    =
                                                                    setInterval(
                                                                        () => {
                                                                            b.textContent =
                                                                                Swal
                                                                                .getTimerLeft()
                                                                        },
                                                                        100
                                                                    )
                                                            },
                                                            willClose: () => {
                                                                clearInterval
                                                                    (
                                                                        timerInterval
                                                                    )
                                                            }
                                                        }).then((
                                                            result
                                                        ) => {
                                                            location
                                                                .reload();
                                                        })
                                                    },
                                                    error: (response) => {
                                                        Swal.fire(
                                                            'Gagal!',
                                                            `${response.responseJSON.message}`,
                                                            'error'
                                                        )
                                                    }
                                                });
                                            }
                                        })
                                    }
                                })
                            }
                        })
                    }
                })
            }
        });
    </script>
@endpush

@section('scripts')
    <script>
        window.addEventListener('user-saved', event => {
            let timerInterval
            Swal.fire({
                title: 'Sukses!',
                icon: 'success',
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
        })
    </script>
@endsection
