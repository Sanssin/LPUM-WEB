<div class="card-body">
    <div class="alert alert-info">
        Memberi centang pada kolom "tampilkan", berarti pengguna lain dapat melihat informasi anda
        mengenai kolom terkait.
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form-horizontal form-material" wire:submit.prevent='submit'>

        {{-- Nama depan --}}
        <div class="mb-3">
            <label class="col-md-12">Nama Depan</label>
            <div class="col-md-12">
                <input type="text" value="{{ auth()->user()->first_name }}" class="form-control form-control-line"
                    wire:model.defer='first_name' />
                <div class="d-flex justify-content-start">
                    <small id="name1"
                        class="badge badge-default text-info font-weight-medium bg-light-info form-text">Wajib
                        diisi</small>
                </div>
            </div>
        </div>

        {{-- Nama belakang --}}
        <div class="mb-3">
            <label class="col-md-12">Nama Belakang</label>
            <div class="col-md-12">
                <input type="text" value="{{ auth()->user()->last_name }}" class="form-control form-control-line"
                    wire:model.defer='last_name' />
                <div class="d-flex justify-content-start">
                    <small id="name1"
                        class="badge badge-default text-info font-weight-medium bg-light-info form-text">Wajib
                        diisi</small>
                </div>
            </div>
        </div>

        {{-- Surel --}}
        <div class="mb-3">
            <label for="email" class="col-md-12">Surel</label>
            <div class="col-md-12">
                <input type="email" class="form-control form-control-line" value="{{ auth()->user()->email }}"
                    id="email" wire:model.defer='email' />
                <div class="d-flex justify-content-start">
                    <small id="name1"
                        class="badge badge-default text-info font-weight-medium bg-light-info form-text">Wajib
                        diisi</small>
                </div>
            </div>
        </div>

        {{-- NIM --}}
        <div class="mb-3">
            <label for="nim" class="col-md-12">NIM</label>
            <div class="col-md-12">
                <input type="text" class="form-control form-control-line" value="{{ auth()->user()->nim }}"
                    id="nim" wire:model.defer='nim' />
                <div class="d-flex justify-content-start">
                    <small id="name1"
                        class="badge badge-default text-info font-weight-medium bg-light-info form-text">Wajib
                        diisi</small>
                </div>
            </div>
        </div>

        {{-- No HP --}}
        <div class="mb-3">
            <label class="col-md-12">Nomor HP</label>
            <div class="col-md-12">
                <input type="text" value="{{ auth()->user()->phone }}" class="form-control form-control-line"
                    wire:model.defer='phone' />
            </div>
        </div>

        {{-- Tampilkan nomor --}}
        <div class="mb-3">
            <input type="checkbox" id="show_phone" name="show_phone" value="1"
                class="material-inputs chk-col-orange" @if ($show_phone) checked @endif
                wire:model.defer='show_phone'>
            <label for="show_phone">Tampilkan No. Telp</label>
        </div>

        {{-- Alamat --}}
        <div class="mb-3">
            <label class="col-md-12">Alamat</label>
            <div class="col-md-12">
                <input type="text" value="{{ auth()->user()->address }}" class="form-control form-control-line"
                    wire:model.defer='address' />
            </div>
        </div>

        {{-- Tampilkan alamat --}}
        <div class="mb-3">
            <input type="checkbox" id="show_address" name="show_address" value="1"
                class="material-inputs chk-col-orange" @if ($show_address) checked @endif
                wire:model.defer='show_address'>
            <label for="show_address">Tampilkan Alamat</label>
        </div>

        {{-- Instagram --}}
        <div class="mb-3">
            <label class="col-md-12">Instagram</label>
            <div class="col-md-12">
                <input type="text" class="form-control form-control-line" wire:model.defer='instagram' />
            </div>
        </div>

        {{-- Twitter --}}
        <div class="mb-3">
            <label class="col-md-12">Twitter</label>
            <div class="col-md-12">
                <input type="text" class="form-control form-control-line" wire:model.defer='twitter' />
            </div>
        </div>

        {{-- LinkedIn --}}
        <div class="mb-3">
            <label class="col-md-12">LinkedIn</label>
            <div class="col-md-12">
                <input type="text" class="form-control form-control-line" wire:model.defer='linkedin' />
            </div>
        </div>

        {{-- Tampilkan medsos --}}
        <div class="mb-3">
            <input type="checkbox" id="show_socmed" name="show_socmed" value="1"
                class="material-inputs chk-col-orange" @if ($show_socmed) checked @endif
                wire:model.defer='show_socmed'>
            <label for="show_socmed">Tampilkan Media sosial</label>
        </div>

        <div class="mb-3">
            <label class="col-md-12">Tentang</label>
            <div class="form-group">
                <textarea class="form-control" rows="3" style="height: 80px" wire:model.defer='description'></textarea>
            </div>
        </div>

        <div class="mb-3">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success">
                    Update Profil
                </button>
            </div>
        </div>
    </form>
</div>
