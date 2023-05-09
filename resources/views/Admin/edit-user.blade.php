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
                            <a href="{{ route('admin.manageElection') }}" class="link">Edit User</a>
                        </li>
                        <li class="breadcrumb-item active"> Page</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Ubah data User</h1>
                <div class="my-0">
                    <a href="{{ route('admin.manageUser') }}" class="btn btn-primary"><span
                            class="mdi mdi-arrow-left"></span> Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="text-white mb-0">Form Edit Data</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert customize-alert border-danger text-danger">
                            <strong>Kesalahan!</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            Data berhasil disimpan!
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            Gagal mengupdate data!
                        </div>
                    @endif
                    <form action="{{ route('admin.updateUser') }}" id="editUserForm" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="row">
                            {{-- Nama depan --}}
                            <div class="col-12 col-lg-6">
                                <label for="first_name">Nama Depan</label>
                                <div class="mb-2">
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                        name="first_name" value="{{ $user->first_name }}">
                                    <small class="form-control-feedback">Minimum 3 karakter</small>
                                    <small id="first_name_help"
                                        class="badge badge-default text-primary font-weight-medium bg-light-primary form-text">Harus
                                        diisi</small>
                                </div>
                            </div>

                            {{-- Nama belakang --}}
                            <div class="col-12 col-lg-6">
                                <label for="last_name">Nama Belakang</label>
                                <div class="mb-2">
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                        name="last_name" value="{{ $user->last_name }}">
                                    <small id="last_name_help"
                                        class="badge badge-default text-success font-weight-medium bg-light-success form-text">Boleh
                                        dikosongkan</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- Prodi --}}
                            <div class="col-12 col-lg-6">
                                <label for="study_program">Program Studi</label>
                                <select class="form-select @error('study_program') is-invalid @enderror"
                                    name="study_program" id="study_program">
                                    <option selected value="">Pilih...</option>
                                    <option value="1" @selected($user->study_program_id == 1)>Teknokimia Nuklir</option>
                                    <option value="2" @selected($user->study_program_id == 2)>Elektronika Instrumentasi</option>
                                    <option value="3" @selected($user->study_program_id == 3)>ElektroMekanika</option>
                                </select>
                                <small id="prodi_help"
                                    class="badge badge-default text-primary font-weight-medium bg-light-primary form-text">Harus
                                    diisi</small>
                            </div>

                            {{-- NIM --}}
                            <div class="col-12 col-lg-6">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim"
                                    value="{{ $user->nim }}">
                                <small id="nim_help"
                                    class="badge badge-default text-primary font-weight-medium bg-light-primary form-text">Harus
                                    diisi</small>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Email --}}
                            <div class="col-12 col-lg-6">
                                <label for="email">Email</label>
                                <div class="mb-2">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $user->email }}">
                                    <small class="form-control-feedback">Harus email valid</small>
                                    <small id="email_help"
                                        class="badge badge-default text-primary font-weight-medium bg-light-primary form-text">Harus
                                        diisi</small>
                                </div>
                            </div>

                            {{-- Nomor telepon --}}
                            <div class="col-12 col-lg-6">
                                <label for="phone">Nomor telepon</label>
                                <div class="mb-2">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ $user->phone }}">
                                    <small id="phone_help"
                                        class="badge badge-default text-primary font-weight-medium bg-light-primary form-text">Harus
                                        diisi</small>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('vendorStyle')
    <link rel="stylesheet" href="{{ asset('dist/css/quill.snow.css') }}">
@endpush

@push('vendorScript')
    <script src="{{ asset('dist/js/quill.min.js') }}"></script>
@endpush

@section('scripts')
    <script>
        var quill = new Quill("#editor", {
            theme: "snow",
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            $("#description").val(quill.root.innerHTML);
        });
    </script>

    <script></script>
@endsection
