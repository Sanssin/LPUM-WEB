<div class="card-body">
    <div class="alert alert-info">
        Kata sandi minimum 8 digit. Pastikan memilih kata sandi yang mudah diingat!
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

    @if ($successful)
        <div class="alert alert-success">
            Sukses mengubah kata sandi!
        </div>
    @endif

    <form action="" wire:submit.prevent='submit'>
        <div class="mb-3">
            <label for="currentPassword">Kata sandi sekarang</label>
            <input type="password" name="currentPassword" id="currentPassword" wire:model.defer='currentPassword'
                class="form-control @error('currentPassword') is-invalid @enderror">
        </div>
        <div class="mb-3">
            <label for="currentPassword">Kata sandi baru</label>
            <input type="password" name="newPassword" id="newPassword" wire:model.defer='newPassword'
                class="form-control @error('newPassword') is-invalid @enderror">
        </div>
        <div class="mb-3">
            <label for="currentPassword">Konfirmasi kata sandi baru</label>
            <input type="password" name="newPasswordConfirmation" id="newPasswordConfirmation"
                wire:model.defer='newPassword_confirmation'
                class="form-control @error('newPassword_confirmation') is-invalid @enderror">
        </div>

        <button type="submit" class="btn btn-success">Kirim</button>
    </form>
</div>
