@extends('Template.Dashboard.layouts')

@section('main')
    <div class="row">
        <div class="col-md-4">
            <div class="card rounded-3 card-hover">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <span class="flex-shrink-0">
                            @switch(auth()->user()->vote_status)
                                @case(1)
                                    <i class="mdi mdi-alert-box display-6 text-danger"></i>
                                @break

                                @case(2)
                                    <i class="mdi mdi-bookmark-check display-6 text-success"></i>
                                @break

                                @default
                                    <i class="mdi mdi-close-box-multiple display-6 text-orange"></i>
                            @endswitch
                        </span>
                        <div class="ms-4">
                            @switch(auth()->user()->vote_status)
                                @case(1)
                                    <h4 class="card-title text-danger">Belum memilih!</h4>
                                    <h6 class="card-subtitle mb-0 fs-2 fw-normal text-danger">
                                        Silakan memilih terlebih dahulu.
                                    </h6>
                                    <span class="fs-2 mt-1 font-weight-medium">Ini tidak akan memakan waktu lama</span>
                                @break

                                @case(2)
                                    <h4 class="card-title text-success">Sudah memilih!</h4>
                                    <h6 class="card-subtitle mb-0 fs-2 fw-normal text-success">
                                        Terima kasih atas partisipasi kamu!
                                    </h6>
                                    <span class="fs-2 mt-1 font-weight-medium">Tidak dapat memilih kembali</span>
                                @break

                                @default
                                    <h4 class="card-title text-orange">Kamu tu gadiajak!</h4>
                                    <h6 class="card-subtitle mb-0 fs-2 fw-normal text-orange">
                                        Kamu bukan pemilih pada pemilihan ini
                                    </h6>
                            @endswitch


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card rounded-3 card-hover">
                <a href="#" class="stretched-link"></a>
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <span class="flex-shrink-0"><i class="mdi mdi-timer-alert-outline display-6 text-info"></i></span>
                        <div class="ms-4">
                            <h4 class="card-title text-dark waktu-mundur">Sisa waktu : <b id="days"></b> hari <b
                                    id="hours"></b>
                                jam <b id="minutes"></b> menit <b id="seconds"></b> detik</h4>
                            <h6 class="card-subtitle mb-0 fs-2 fw-normal">
                                Tidak melakukan pemilihan akan dihitung sebagai golput.
                            </h6>
                            <span class="fs-2 mt-1 font-weight-medium">Pemilihan berakhir pada :
                                {{ $endTime->isoFormat('dddd, D MMMM Y - HH:mm') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Daftar kandidat --}}
    <div class="row justify-content-center">
        @foreach ($candidates as $candidate)
            <div class="col-md-4">
                <div class="card text-center card-hover">
                    <div class="card-body">
                        <img src="{{ asset('storage/' . $candidate->candidate_image) }}" class="rounded-3 img-responsive"
                            style="width: 240px; height:180px">
                        <div class="mt-n2">
                            <span class="badge bg-primary">No {{ $candidate->number }}</span>
                            <h4 class="mt-3">{{ $candidate->leader->first_name . ' ' . $candidate->leader->last_name }}
                            </h4>
                            @if ($candidate->coleader)
                                <h6 class="card-subtitle">Basuki</h6>
                            @endif
                        </div>
                        <div class="row mt-3 justify-content-between">
                            <div class="col-6">
                                <button type="button"
                                    class="justify-content-between w-100 btn btn-rounded btn-light text-dark font-weight-medium d-flex text-dark align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#paslon-{{ $candidate->id }}-modal">
                                    <span class="mdi mdi-comment-text"></span>
                                    <span>
                                        Visi & Misi
                                    </span>
                                </button>
                                <span class="text-muted" style="font-size: 12px">Klik untuk lebih detail</span>
                            </div>
                            @if (now() <= $endTime && auth()->user()->vote_status == 1)
                                <div class="col-6">
                                    <button type="button" value="{{ $candidate->number }}"
                                        class="justify-content-center w-100 btn btn-rounded btn-primary font-weight-medium d-flex align-items-center coblos-button">
                                        <span class="mdi mdi-pin"></span>
                                        <span>
                                            Coblos
                                        </span>
                                    </button>
                                </div>
                            @elseif (auth()->user()->vote_status == 2)
                                <div class="col-6">
                                    <button class="btn btn-purple text-white" disabled>Sudah memilih</button>
                                </div>
                            @elseif(now() > $endTime)
                                <div class="col-6"><button class="btn btn-purple text-white" disabled>Bukan
                                        periode</button></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @foreach ($candidates as $candidate)
        <div id="paslon-{{ $candidate->id }}-modal" class="modal fade" tabindex="-1"
            aria-labelledby="paslon-{{ $candidate->id }}-modalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-info text-white">
                        <h4 class="modal-title" id="paslon-{{ $candidate->id }}-modalLabel">
                            Calon nomor urut {{ $candidate->number }}
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>{{ $candidate->leader->first_name }} {{ $candidate->leader->last_name }}</h5>
                        <h5 class="mt-0">Visi</h5>
                        <p>
                            {!! $candidate->vision !!}
                        </p>
                        <h5 class="mt-0">Misi</h5>
                        <p>
                            {!! $candidate->mission !!}
                        </p>

                        @if ($candidate->slogan)
                            <blockquote class="blockquote text-center">"{{ $candidate->slogan }}"</blockquote>
                        @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection

@push('vendorScript')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(".coblos-button").click(function(e) {
            e.preventDefault();
            var opt = $(this).val();

            Swal.fire({
                title: `Coblos nomor ${opt} ?`,
                text: 'Pilihan tidak dapat diubah',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Lanjutkan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "{{ route('vote.store') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            data: opt,
                            election: {{ $id }}
                        },
                        dataType: "json",
                        beforeSend: () => {
                            Swal.fire({
                                title: 'Tunggu...',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                showConfirmButton: false,
                                didOpen: () => {
                                    Swal.showLoading()
                                }
                            })
                        },
                        success: function(response) {
                            let timerInterval
                            Swal.fire({
                                title: 'Sukses!',
                                icon: 'success',
                                text: `${response.message}`,
                                html: 'Halaman akan diperbarui dalam <b></b> milliseconds.',
                                timer: 2500,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading()
                                    const b = Swal.getHtmlContainer()
                                        .querySelector('b')
                                    timerInterval = setInterval(() => {
                                        b.textContent = Swal
                                            .getTimerLeft()
                                    }, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            }).then((result) => {
                                location.reload();
                            })
                        },
                        error: function(response) {
                            console.log(response.message);
                        }
                    });
                }
            })
        });
    </script>

    <script>
        (function() {
            const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;

            let today = new Date(),
                dd = String(today.getDate()).padStart(2, "0"),
                mm = String(today.getMonth() + 1).padStart(2, "0"),
                yyyy = today.getFullYear(),
                endElection = "{{ $endTime->isoFormat('M/D/Y HH:mm:ss') }}";

            const countDown = new Date(endElection).getTime(),
                x = setInterval(function() {
                    const now = new Date().getTime(),
                        distance = countDown - now;
                    (document.getElementById("days").innerText = Math.floor(distance / day)),
                    (document.getElementById("hours").innerText = Math.floor(
                        (distance % day) / hour
                    )),
                    (document.getElementById("minutes").innerText = Math.floor(
                        (distance % hour) / minute
                    )),
                    (document.getElementById("seconds").innerText = Math.floor(
                        (distance % minute) / second
                    ));
                    //do something later when date is reached
                    if (distance < 0) {
                        $(".waktu-mundur").removeClass("text-dark");
                        $(".waktu-mundur").addClass("text-danger");
                        $(".waktu-mundur").html("Pemilunya dah selesai");
                        clearInterval(x);
                    }
                    //seconds
                }, 0);
        })();
    </script>
@endpush
