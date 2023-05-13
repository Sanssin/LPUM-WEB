<div id="add-user-manual-modal" class="modal fade" tabindex="-1" aria-labelledby="add-user-manual-modal" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="add-user-manual-label">
                    Tambahkan User Manual
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Masukkan data user menggunakan form di bawah ini.</h4>

                @if ($errors->any())
                    <div class="alert customize-alert border-danger text-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="" method="post" class="form-horizontal" wire:submit.prevent='submit'
                    id="add-user-form">
                    {{-- Nama depan --}}
                    <div class="row mb-2 align-items-center @error('first_name') has-danger @enderror">
                        <label for="first-name" class="col-lg-4 control-label col-form-label">Nama Depan</label>
                        <div class="col-lg-8">
                            <input type="text" name="first-name" id="first-name"
                                class="form-control form-control-sm @error('first_name') form-control-danger @enderror"
                                wire:model.defer='first_name'>
                        </div>
                    </div>
                    {{-- Nama Belakang --}}
                    <div class="row mb-2 align-items-center @error('last_name') has-danger @enderror">
                        <label for="last-name" class="col-lg-4 control-label col-form-label">Nama Belakang</label>
                        <div class="col-lg-8">
                            <input type="text" name="last-name" id="last-name"
                                class="form-control form-control-sm @error('last_name') form-control-danger @enderror"
                                wire:model.defer='last_name'>
                        </div>
                    </div>
                    {{-- Surel --}}
                    <div class="row mb-2 align-items-center @error('email') has-danger @enderror">
                        <label for="email" class="col-lg-4 control-label col-form-label">Surel</label>
                        <div class="col-lg-8">
                            <input type="email" name="email" id="email"
                                class="form-control form-control-sm form-control-danger @error('email') form-control-danger @enderror"
                                wire:model.defer='email'>
                        </div>
                    </div>
                    {{-- Program Studi --}}
                    <div class="row mb-2 align-items-center @error('study_program') has-danger @enderror">
                        <label for="prodi" class="col-lg-4 control-label col-form-label">Program Studi</label>
                        <div class="col-lg-8">
                            <select class="form-select @error('study_program') is-invalid @enderror" id="prodiSelect"
                                wire:model.defer='study_program'>
                                <option selected value="null">Pilih...</option>
                                <option value="1">Teknokimia Nuklir</option>
                                <option value="2">Elektronika Instrumentasi</option>
                                <option value="3">ElektroMekanika</option>
                            </select>
                        </div>
                    </div>
                    {{-- NIM --}}
                    <div class="row mb-2 align-items-center @error('nim') has-danger @enderror">
                        <label for="nim" class="col-lg-4 control-label col-form-label">NIM</label>
                        <div class="col-lg-8">
                            <input type="text" name="nim" id="nim"
                                class="form-control form-control-sm @error('nim') form-control-danger @enderror"
                                wire:model.defer='nim'>
                        </div>
                    </div>

                    {{-- angkatan --}}
                    <div class="row mb-2 align-items-center @error('angkatan') has-danger @enderror">
                        <label for="angkatan" class="col-lg-4 control-label col-form-label">Angkatan</label>
                        <div class="col-lg-8">
                            <input type="text" name="angkatan" id="angkatan"
                                class="form-control form-control-sm @error('angkatan') form-control-danger @enderror"
                                wire:model.defer='angkatan'>
                        </div>
                    </div>

                    <input type="checkbox" id="admin" name="is_admin" value="1"
                        class="material-inputs chk-col-teal" wire:model.defer='is_admin'>
                    <label for="admin">Admin</label>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger text-danger font-weight-medium waves-effect"
                    data-bs-dismiss="modal">
                    Tutup
                </button>
                <button type="submit" form="add-user-form"
                    class="btn btn-light-success text-success font-weight-medium waves-effect">
                    Submit
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
