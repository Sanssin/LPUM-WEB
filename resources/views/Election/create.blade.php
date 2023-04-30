@extends('Template.Dashboard.layouts')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="text-white mb-0">Tambah agenda pemilihan</h4>
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
                    <form action="{{ route('election.store') }}" id="addElectionForm" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <label for="election_name">Judul</label>
                                <div class="mb-2">
                                    <input type="text" class="form-control @error('election_name') is-invalid @enderror"
                                        name="election_name" value="{{ old('election_name') }}">
                                    <small class="form-control-feedback">Minimum 8 karakter</small>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="election_period">Periode</label>
                                <div class="mb-2 w-50">
                                    <input type="text"
                                        class="form-control @error('election_period') is-invalid @enderror"
                                        name="election_period" value="{{ old('election_period') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-3">
                                <label for="start_election">Waktu Mulai</label>
                                <div class="form-group">
                                    <input type="datetime-local"
                                        class="form-control  @error('start_election') is-invalid @enderror"
                                        name="start_election" value="{{ old('start_election') }}">
                                    <small class="form-control-feedback">Minimum hari ini</small>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <label for="end_election">Waktu Akhir</label>
                                <div class="form-group">
                                    <input type="datetime-local"
                                        class="form-control  @error('end_election') is-invalid @enderror"
                                        name="end_election" value="{{ old('end_election') }}">
                                    <small class="form-control-feedback">Minimum setelah waktu mulai</small>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <label for="electionImage">Poster Pemilu</label>
                                <input type="file" name="election_image" id="electionImage"
                                    class="form-control form-control-file  @error('election_image') is-invalid @enderror">
                                <small class="form-control-feedback">Gambar maksimum berukuran 2MB</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mt-2">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description" style="display:none" id="description"></textarea>
                                    <div id="editor" style="height: 300px;">
                                        {{ old('description') }}
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
        var quill = new Quill("#editor", {
            theme: "snow",
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            $("#description").val(quill.root.innerHTML);
        });
    </script>

    <script></script>
@endsection
