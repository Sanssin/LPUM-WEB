@extends('Template.Dashboard.layouts')

@section('main')
    <div class="row">
        <div class="col-md-4">
            <div class="card rounded-3 card-hover">
                <div class="card-body animate__animated animate__pulse animate__infinite">
                    <div class="d-flex align-items-center">
                        <span class="flex-shrink-0"><i class="mdi mdi-alert-box display-6 text-danger"></i></span>
                        <div class="ms-4">
                            <h4 class="card-title text-danger">Belum memilih!</h4>
                            <h6 class="card-subtitle mb-0 fs-2 fw-normal text-danger">
                                Silakan memilih terlebih dahulu.
                            </h6>
                            <span class="fs-2 mt-1 font-weight-medium">Ini tidak akan memakan waktu lama</span>
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
                            <span class="fs-2 mt-1 font-weight-medium">Pemilihan berakhir pada : 14 Mei 2023 - 14:00
                                WIB</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        @foreach ($candidates as $candidate)
            <div class="col-md-4">
                <div class="card text-center card-hover">
                    <div class="card-body">
                        <img src="https://source.unsplash.com/random/500x500/?ferrari" class="rounded-3 img-responsive"
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
                                    data-bs-toggle="modal" data-bs-target="#paslon-{{ $candidate->number }}-modal">
                                    <span class="mdi mdi-comment-text"></span>
                                    <span>
                                        Visi & Misi
                                    </span>
                                </button>
                                <span class="text-muted" style="font-size: 12px">Klik untuk lebih detail</span>
                            </div>
                            @if (now() > $endTime)
                                <div class="col-6">
                                    <button type="button" value="{{ $candidate->number }}"
                                        class="justify-content-center w-100 btn btn-rounded btn-primary font-weight-medium d-flex align-items-center coblos-button">
                                        <span class="mdi mdi-pin"></span>
                                        <span>
                                            Coblos
                                        </span>
                                    </button>
                                </div>
                            @else
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
        <div id="paslon-{{ $candidate->number }}-modal" class="modal fade" tabindex="-1"
            aria-labelledby="paslon-{{ $candidate->number }}-modalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-info text-white">
                        <h4 class="modal-title" id="paslon-{{ $candidate->number }}-modalLabel">
                            Calon nomor urut {{ $candidate->number }}
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>{{ $candidate->leader->first_name }} {{ $candidate->leader->last_name }}</h5>
                        <h5 class="mt-0">Visi</h5>
                        <p>
                            {{ $candidate->vision }}
                        </p>
                        <h5 class="mt-0">Misi</h5>
                        <p>
                            {{ $candidate->mission }}
                        </p>
                        <blockquote class="blockquote text-center">"{{ $candidate->slogan }}"</blockquote>
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

            Swal.fire(
                `Coblos nomor ${opt} ?`,
                'Pilihan tidak dapat di ubah',
                'question'
            );
        });
    </script>

    <script>
        (function() {
            const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;
            //I'm adding this section so I don't have to keep updating this pen every year :-)
            //remove this if you don't need it
            let today = new Date(),
                dd = String(today.getDate()).padStart(2, "0"),
                mm = String(today.getMonth() + 1).padStart(2, "0"),
                yyyy = today.getFullYear(),
                birthday = "{{ $endTime->isoFormat('M/D/Y HH:mm:ss') }}";
            // birthday = "4/28/2023 22:59:00";
            //end
            const countDown = new Date(birthday).getTime(),
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
