<div id="change-photo-modal" wire:ignore.self class="modal fade" tabindex="-1" aria-labelledby="change-photo-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">
                    Ganti foto profil
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Unggah Foto</h4>
                <p>
                    Maksimum ukuran gambar 2 MB
                </p>
                @error('photo')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <form method="post" id="changePictureForm" wire:submit.prevent='submit' enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="hidden" name="id" value="12">
                        <button type="button" class="btn btn-info">
                            <i class="mdi mdi-upload"></i>
                        </button>
                        <div class="custom-file">
                            <input type="file" class="form-control" id="inputGroupFile01" name="photo"
                                wire:model.defer='photo' />
                        </div>
                        <div wire:loading>
                            Memroses...
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger text-danger font-weight-medium waves-effect"
                    data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary waves-effect" form="changePictureForm">Submit</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
