@extends('Template.Dashboard.layouts')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="text-white mb-0">Tambah kandidat</h4>
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
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('candidate.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="election" value="{{ $id }}">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-12 col-lg-8">
                                        <label for="leader_nim">Kandidat Utama</label>
                                        <div class="mb-2">
                                            <input type="text"
                                                class="form-control @error('leader_nim') is-invalid @enderror"
                                                name="leader_nim" value="{{ old('leader_nim') }}" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Pastikan NIM yang dimasukkan benar">
                                            <small id="name1"
                                                class="badge badge-default text-primary font-weight-medium bg-light-primary form-text">Masukkan
                                                NIM</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label for="lead_position">Nama Jabatan</label>
                                        <div class="mb-2">
                                            <input type="text"
                                                class="form-control @error('lead_position') is-invalid @enderror"
                                                name="lead_position" value="{{ old('lead_position') }}"
                                                placeholder="ex:Presiden Mahasiswa">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-lg-8">
                                        <label for="coleader_nim">Wakil Kandidat Utama</label>
                                        <div class="mb-2">
                                            <input type="text"
                                                class="form-control @error('coleader_nim') is-invalid @enderror"
                                                name="coleader_nim" value="{{ old('coleader_nim') }}"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Pastikan NIM yang dimasukkan benar">
                                            <small
                                                class="badge badge-default text-primary font-weight-medium bg-light-primary form-text">Masukkan
                                                NIM</small>
                                            <small
                                                class="badge badge-default text-primary font-weight-medium bg-light-primary form-text">Boleh
                                                dikosongkan jika tidak ada</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label for="colead_position">Nama Jabatan</label>
                                        <div class="mb-2">
                                            <input type="text"
                                                class="form-control @error('colead_position') is-invalid @enderror"
                                                name="colead_position" value="{{ old('colead_position') }}"
                                                placeholder="ex:Wakil">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label for="slogan">Jargon</label>
                                            <div class="form-group">
                                                <textarea id="slogan" name="slogan" class="form-control" rows="2" placeholder="Jargon/slogan"></textarea>
                                                <small id="textHelp" class="form-text text-muted">Boleh dikosongkan. Maks
                                                    255
                                                    karakter</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="mt-2">
                                            <label for="vision">Visi</label>
                                            <textarea name="vision" style="display:none" id="vision"></textarea>
                                            <div id="editorVision">
                                                {{ old('vision') }}
                                            </div>
                                            <small
                                                class="badge badge-default text-info font-weight-medium bg-light-info form-text">Boleh
                                                kosong</small>
                                        </div>
                                        <div class="mt-2">
                                            <label for="mission">Misi</label>
                                            <textarea name="mission" style="display:none" id="mission"></textarea>
                                            <div id="editorMission">
                                                {{ old('mission') }}
                                            </div>
                                            <small
                                                class="badge badge-default text-info font-weight-medium bg-light-info form-text">Boleh
                                                kosong</small>
                                        </div>
                                        <div class="mt-1">
                                            <label for="candidate_image">Foto calon</label>
                                            <input type="file" name="candidate_image" id="candidate_image"
                                                class="form-control form-control-file  @error('candidate_image') is-invalid @enderror">
                                            <small class="form-control-feedback">Gambar maksimum berukuran 2MB</small>
                                        </div>
                                    </div>
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
        var quillVision = new Quill("#editorVision", {
            theme: "snow",
        });

        quillVision.on('text-change', function(delta, oldDelta, source) {
            $("#vision").val(quillVision.root.innerHTML);
        });
    </script>
    <script>
        var quillMission = new Quill("#editorMission", {
            theme: "snow",
        });

        quillMission.on('text-change', function(delta, oldDelta, source) {
            $("#mission").val(quillMission.root.innerHTML);
        });
    </script>

    <script></script>
@endsection
