@extends('Template.Dashboard.layouts')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="text-white mb-0">Kelola Situs</h4>
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

                    <form action="" method="post">
                        @csrf
                        <div class="alert alert-info">
                            Selain kolom deskripsi, boleh dikosongkan.
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                {{-- Instagram --}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="instagram">Akun Instagram</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white"
                                                    id="basic-addon1">@</span>
                                                <input type="text" class="form-control" placeholder="instagram"
                                                    aria-label="instagram">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="instagram_link">Link Instagram</label>
                                            <input type="text" class="form-control" placeholder="instagram link">
                                        </div>
                                    </div>
                                </div>

                                {{-- Whatsapp --}}
                                <div class="mb-3">
                                    <label for="whatsapp">Whatsapp</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">+62</span>
                                        <input type="text" class="form-control" placeholder="whatsapp"
                                            aria-label="whatsapp">
                                    </div>
                                </div>

                                {{-- Linkedin --}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="linkedin">LinkedIn</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white" id="basic-addon1">
                                                    Akun</span>
                                                <input type="text" class="form-control" placeholder="linkedin"
                                                    aria-label="linkedin">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="linkedin_link">Link Linkedin</label>
                                            <input type="text" class="form-control" placeholder="linkedin link">
                                        </div>
                                    </div>
                                </div>

                                {{-- Facebook --}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="facebook">Facebook</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white"
                                                    id="basic-addon1">Akun</span>
                                                <input type="text" class="form-control" placeholder="facebook"
                                                    aria-label="facebook">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="facebook_link">Link Facebook</label>
                                            <input type="text" class="form-control" placeholder="linkedin link">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <div class="col-lg-6">
                                <label for="description">Deskripsi LPUM</label>
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" placeholder="Tulis disini..."></textarea>
                                    <small id="textHelp" class="form-text text-muted">Akan ditampilkan di landing
                                        page</small>
                                    <small id="name1"
                                        class="badge badge-default text-info font-weight-medium bg-light-info form-text">Wajib
                                        diisi</small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
