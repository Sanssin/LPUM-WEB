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
                            <a href="{{ route('admin.manageElection') }}" class="link">Edit Organization</a>
                        </li>
                        <li class="breadcrumb-item active"> Page</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Ubah data Organisasi</h1>
                <div class="my-0">
                    <a href="{{ route('km.manage') }}" class="btn btn-primary"><span class="mdi mdi-arrow-left"></span>
                        Kembali</a>
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
                            Data tidak diupdate!
                        </div>
                    @endif
                    <form action="{{ route('km.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $organization->id }}">
                        <div class="row">
                            {{-- Nama depan --}}
                            <div class="col-12 col-lg-4">
                                <label for="organization_name">Nama Singkat</label>
                                <div class="mb-2">
                                    <input type="text"
                                        class="form-control @error('organization_name') is-invalid @enderror"
                                        name="organization_name" value="{{ $organization->organization_name }}">
                                    <small class="form-control-feedback">Minimum 3 karakter</small>
                                    <small id="first_name_help"
                                        class="badge badge-default text-primary font-weight-medium bg-light-primary form-text">Harus
                                        diisi</small>
                                </div>
                            </div>

                            {{-- Nama belakang --}}
                            <div class="col-12 col-lg-8">
                                <label for="organization_full_name">Nama Lengkap</label>
                                <div class="mb-2">
                                    <input type="text"
                                        class="form-control @error('organization_full_name') is-invalid @enderror"
                                        name="organization_full_name" value="{{ $organization->organization_full_name }}">
                                    <small id="last_name_help"
                                        class="badge badge-default text-success font-weight-medium bg-light-success form-text">Harus
                                        diisi</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- Periode --}}
                            <div class="col-12 col-lg-4">
                                <label for="organization_period">Periode</label>
                                <input type="text"
                                    class="form-control @error('organization_period') is-invalid @enderror"
                                    name="organization_period" value="{{ $organization->organization_period }}">
                                <small id="nim_help"
                                    class="badge badge-default text-primary font-weight-medium bg-light-primary form-text">Harus
                                    diisi</small>
                            </div>

                            {{-- Periode --}}
                            <div class="col-12 col-lg-4">
                                <label for="organization_image">Foto Organisasi</label>
                                <input type="file" class="form-control @error('organization_image') is-invalid @enderror"
                                    name="organization_image">
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
