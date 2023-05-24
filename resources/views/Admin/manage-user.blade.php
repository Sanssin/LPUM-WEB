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
                            Manage User
                        </li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Kelola User</h1>
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
                        <h4>Data calon pemilih</h4>
                        <div class="ms-auto">
                            <div class="btn-group">
                                <button type="button"
                                    class="btn btn-light-primary text-primary font-weight-medium rounded-pill px-4"
                                    data-bs-toggle="modal" data-bs-target="#createmodel">
                                    Tambah user
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
                                    <th>Nama</th>
                                    <th>Prodi</th>
                                    <th>NIM</th>
                                    <th>Angkatan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" value="{{ $user->id }}"
                                                    name="user_id" />
                                                <label class="form-check-label"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="fw-normal mb-0">{{ $user->full_name }}</span><br>
                                            <span
                                                class="fs-1 {{ __('core.' . $user->activation_status . '.class') }} mt-0">{{ __('core.' . $user->activation_status . '.text') }}</span>
                                        </td>
                                        <td class="text-center">{{ $user->study_program->study_program_name }}</td>
                                        <td class="text-center">{{ $user->nim }}</td>
                                        <td>
                                            <span
                                                class="badge bg-light-info text-info font-weight-medium">{{ $user->angkatan }}</span>
                                        </td>
                                        <td class="text-center">
                                            @if ($user->vote_status)
                                                <span class="mdi mdi-check-circle-outline text-success"></span>
                                            @else
                                                <span class="mdi mdi-close-outline text-danger"></span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                                                class="btn btn-sm btn-orange text-white">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h4 class="mb-0">Menu Operasi</h4>
                    <button class="btn btn-primary mt-2" id="verifyButton" onclick="userToElection()">Verifikasi</button>
                    <button class="btn btn-primary mt-2" id="unverifyButton">Hapus Verifikasi</button>
                    <button class="btn btn-danger mt-2" id="deleteButton">Hapus User</button>
                    <button type="button" class="btn btn-orange text-white mt-2" onclick="sendActivation()">Kirim email
                        aktivasi
                        akun</button>
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
                    @if ($not_activate)
                        <div class="alert alert-danger">
                            {{ $not_activate }} belum melakukan aktivasi akun / perubahan password.
                            <form action="{{ route('admin.truncateActivation') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-warning">Reset data</button>
                            </form>
                        </div>
                    @endif
                    <div class="list-group mt-1">
                        <a href="{{ route('admin.manageUser') }}" class="list-group-item text-center"><i
                                data-feather="list" class="feather-sm fill-white me-2"></i>
                            Semua User</a>
                    </div>
                    <form action="" method="get" class="list-group">
                        <button type="submit" name="active" value=1 class="list-group-item"><i
                                class="mdi mdi-check-decagram me-2"></i>
                            Pemilih Aktif</button>
                        <button type="submit" name="active" value=0 class="list-group-item"><i
                                class="mdi mdi-close-octagon-outline me-2"></i>
                            Bukan Pemilih</button>
                    </form>
                    <h4 class="mt-4">Program Studi</h4>
                    <form action="" method="get" class="list-group">
                        <button type="submit" name="prodi" value="1"
                            class="list-group-item d-flex align-items-center"><i class="mdi mdi-numeric-1-circle me-2"></i>
                            Teknokimia Nuklir
                            <span
                                class="badge bg-light-success text-success font-weight-medium rounded-pill ms-auto">{{ isset($prodi_count[1]) ? $prodi_count[1] : '0' }}</span>
                        </button>
                        <button type="submit" name="prodi" value="2"
                            class="list-group-item d-flex align-items-center"><i
                                class="mdi mdi-numeric-2-circle me-2"></i>
                            Elektronika Instrumentasi
                            <span
                                class="badge bg-warning ms-auto">{{ isset($prodi_count[2]) ? $prodi_count[2] : '0' }}</span>
                        </button>

                        <button type="submit" name="prodi" value="3"
                            class="list-group-item d-flex align-items-center"><i
                                class="mdi mdi-numeric-3-circle me-2"></i>
                            Elektromekanika
                            <span
                                class="badge bg-light-danger rounded-pill text-danger font-weight-medium ms-auto">{{ isset($prodi_count[3]) ? $prodi_count[3] : '0' }}</span>
                        </button>
                    </form>
                    <h4 class="mt-4 text-muted">Dikembangkan</h4>
                    <div class="list-group">
                        <a href="javascript:void(0)" class="list-group-item" disabled>
                            <span class="badge bg-warning text-white me-2"><i data-feather="upload"
                                    class="feather-sm fill-white"></i></span>
                            Export
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                            <span class="badge bg-danger me-2"><i data-feather="trash-2"
                                    class="feather-sm fill-white"></i></span>
                            Hapus semua data
                        </a>
                    </div>
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
                            data-bs-toggle="modal" data-bs-target="#add-user-manual-modal">
                            Tambah Manual
                        </button>
                        <button type="button" class="btn btn-light-info text-primary btn-lg px-4 fs-4"
                            data-bs-toggle="modal" data-bs-target="#uploadFileModal">
                            Tambah dengan file
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                            class="btn btn-light-danger text-danger font-weight-medium rounded-pill px-4"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- sample modal content -->
    @livewire('add-user-component')

    <!-- sample modal content -->
    <div id="uploadFileModal" class="modal fade" tabindex="-1" aria-labelledby="uploadFileModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myModalLabel">
                        Tambahkan User
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Unggah File</h4>
                    <p>
                        File yang di dukung hanya yang berformat CSV, XLSX, XLS.
                    </p>
                    <form method="post" action="{{ route('user.upload') }}" id="uploadUserForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="hidden" name="id" value="12">
                            <button type="button" class="btn btn-info">
                                <i data-feather="upload" class="feather-sm fil-white"></i>
                            </button>
                            <div class="custom-file">
                                <input type="file" class="form-control" id="inputGroupFile01" name="users_excel" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger text-danger font-weight-medium waves-effect"
                        data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary waves-effect" form="uploadUserForm">Submit</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
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

        $("#unverifyButton").click(function(e) {
            e.preventDefault();
            var arr = [];

            $.each($("input[name='user_id']:checked"), function() {
                arr.push($(this).val());
            });

            if (arr.length == 0) {
                Swal.fire(
                    'Error',
                    'Anda belum memilih user',
                    'error'
                );
            } else {
                Swal.fire({
                    title: `Hapus verifikasi ${arr.length} user ?`,
                    showCancelButton: true,
                    confirmButtonText: 'Lanjutkan',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: "{{ route('admin.unverify') }}",
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
                            success: function(response) {
                                let timerInterval
                                Swal.fire({
                                    title: 'Sukses!',
                                    icon: 'success',
                                    html: `Hapus verifikasi ${response.message} user <br>Halaman akan diperbarui dalam <b></b> milliseconds.`,
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

        $("#deleteButton").click(function(e) {
            e.preventDefault();

            var arr = [];

            $.each($("input[name='user_id']:checked"), function() {
                arr.push($(this).val());
            });

            if (arr.length == 0) {
                Swal.fire(
                    'Error',
                    'Kamu belum memilih user',
                    'error'
                );
            } else {
                Swal.fire({
                    title: 'Perhatian!',
                    text: 'akan menghapus user yang dipilih?',
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
                                            title: `Hapus ${arr.length} user ?`,
                                            showCancelButton: true,
                                            confirmButtonText: 'Lanjutkan',
                                        }).then((result) => {
                                            /* Read more about isConfirmed, isDenied below */
                                            if (result.isConfirmed) {
                                                $.ajax({
                                                    type: "delete",
                                                    url: "{{ route('user.delete') }}",
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
                                                            text: 'Menghapus pengguna',
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

    {{-- Send request --}}
    <script>
        function sendVerify(users, election_id) {
            Swal.fire({
                title: `Verifikasi ${users.length} user ?`,
                text: `Akan ditautkan ke pemilihan ID-${election_id}`,
                showCancelButton: true,
                confirmButtonText: 'Lanjutkan',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "{{ route('admin.verify') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            users: users,
                            election: election_id
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
                                // text: 'Memverifikasi user yang dipilih',
                                html: `Memverifikasi ${response.message} user <br>Halaman akan diperbarui dalam <b></b> milliseconds.`,
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
                            var message = JSON.parse(response.responseText);

                            Swal.fire(
                                'Gagal',
                                `${message.message}`,
                                'error'
                            );

                        }
                    });
                }
            })
        }
    </script>

    {{-- Input ID Pemilihan --}}
    <script>
        async function userToElection() {
            var arr = [];

            $.each($("input[name='user_id']:checked"), function() {
                arr.push($(this).val());
            });

            if (arr.length == 0) {
                Swal.fire(
                    'Error',
                    'Anda belum memilih user untuk diverifikasi',
                    'error'
                );
                return
            }

            const {
                value: idElection
            } = await Swal.fire({
                title: 'Tautkan ke Pemilihan',
                text: 'Masukkan ID Pemilihan yang ingin ditautkan untuk user yang dipilih',
                icon: 'question',
                input: 'text',
                inputLabel: 'ID Pemilihan',
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

            if (idElection) {
                sendVerify(arr, idElection);
            }
        };
    </script>

    <script>
        function sendActivation() {
            let arr = [];

            $.each($("input[name='user_id']:checked"), function() {
                arr.push($(this).val());
            });

            if (arr.length == 0) {
                Swal.fire(
                    'Error',
                    'Kamu belum memilih user',
                    'error'
                );
            } else {
                Swal.fire({
                    title: `Kirim aktivasi kepada ${arr.length} user ?`,
                    showCancelButton: true,
                    confirmButtonText: 'Lanjutkan',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: "{{ route('admin.activate') }}",
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
                            success: function(response) {
                                let timerInterval
                                Swal.fire({
                                    title: 'Sukses!',
                                    icon: 'success',
                                    // text: 'Memverifikasi user yang dipilih',
                                    html: `Mengirim aktivasi kepada ${response.count} user <br>Halaman akan diperbarui dalam <b></b> milliseconds.`,
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
                            error: (response) => {
                                Swal.fire('Gagal!', `${response.responseJSON.message}`, 'error')
                            }
                        });
                    }
                })
            }
        }
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
