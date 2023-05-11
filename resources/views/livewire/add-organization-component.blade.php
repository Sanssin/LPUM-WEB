<div id="add-organization-modal" class="modal fade" tabindex="-1" aria-labelledby="add-organization-modal"
    aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="add-organization-label">
                    Tambahkan Organisasi
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Masukkan data menggunakan form di bawah ini.</h4>

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
                    id="add-organization-form">
                    {{-- Nama singkat --}}
                    <div class="row mb-2 align-items-center @error('first_name') has-danger @enderror">
                        <label for="organization_name" class="col-lg-4 control-label col-form-label">Nama
                            Singkat</label>
                        <div class="col-lg-8">
                            <input type="text" name="organization_name" id="organization_name"
                                class="form-control form-control-sm @error('organization_name') form-control-danger @enderror"
                                wire:model.defer='organization_name'>
                        </div>
                    </div>
                    {{-- Nama Lengkap --}}
                    <div class="row mb-2 align-items-center @error('organization_full_name') has-danger @enderror">
                        <label for="organization_full_name" class="col-lg-4 control-label col-form-label">Nama
                            Lengkap</label>
                        <div class="col-lg-8">
                            <input type="text" name="organization_full_name" id="organization_full_name"
                                class="form-control form-control-sm @error('organization_full_name') form-control-danger @enderror"
                                wire:model.defer='organization_full_name'>
                        </div>
                    </div>
                    {{-- Periode --}}
                    <div class="row mb-2 align-items-center @error('organization_period') has-danger @enderror">
                        <label for="organization_period" class="col-lg-4 control-label col-form-label">Period</label>
                        <div class="col-lg-8">
                            <input type="text" name="organization_period" id="organization_period"
                                class="form-control form-control-sm form-control-danger @error('organization_period') form-control-danger @enderror"
                                wire:model.defer='organization_period'>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger text-danger font-weight-medium waves-effect"
                    data-bs-dismiss="modal">
                    Tutup
                </button>
                <button type="submit" form="add-organization-form"
                    class="btn btn-light-success text-success font-weight-medium waves-effect">
                    Submit
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
