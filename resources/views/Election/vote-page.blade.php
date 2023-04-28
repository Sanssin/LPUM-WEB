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
                            <h4 class="card-title text-dark">Sisa waktu : <b id="days"></b> hari <b id="hours"></b>
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
        @for ($i = 0; $i < 4; $i++)
            <div class="col-md-4">
                <div class="card text-center card-hover">
                    <div class="card-body">
                        <img src="https://source.unsplash.com/random/500x500/?ferrari" class="rounded-3 img-responsive"
                            style="width: 240px; height:180px">
                        <div class="mt-n2">
                            <span class="badge bg-primary">No {{ $i + 1 }}</span>
                            <h4 class="mt-3">Joko widodo</h4>
                            <h6 class="card-subtitle">Basuki</h6>
                        </div>
                        <div class="row mt-3 justify-content-between">
                            <div class="col-6">
                                <button type="button"
                                    class="justify-content-between w-100 btn btn-rounded btn-light text-dark font-weight-medium d-flex text-dark align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#paslon-1-modal">
                                    <span class="mdi mdi-comment-text"></span>
                                    <span>
                                        Visi & Misi
                                    </span>
                                </button>
                                <span class="text-muted" style="font-size: 12px">Klik untuk lebih detail</span>
                            </div>
                            <div class="col-6">
                                <button type="button" value="1"
                                    class="justify-content-center w-100 btn btn-rounded btn-primary font-weight-medium d-flex align-items-center coblos-button">
                                    <span class="mdi mdi-pin"></span>
                                    <span>
                                        Coblos
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>


    <div id="paslon-1-modal" class="modal fade" tabindex="-1" aria-labelledby="paslon-1-modalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div
                    class="
                modal-header modal-colored-header
                bg-info
                text-white
              ">
                    <h4 class="modal-title" id="paslon-1-modalLabel">
                        Calon nomor urut 1
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Jokowi - basuki</h5>
                    <h5 class="mt-0">Visi</h5>
                    <p>
                        Cras mattis consectetur purus sit amet fermentum.
                        Cras justo odio, dapibus ac facilisis in, egestas
                        eget quam. Morbi leo risus, porta ac consectetur
                        ac, vestibulum at eros.
                    </p>
                    <h5 class="mt-0">Misi</h5>
                    <p>
                    <ul>
                        <li>Merdeka</li>
                        <li>sanpapa murah</li>
                        <li>harga bbm turun</li>
                    </ul>
                    </p>
                    <blockquote class="blockquote text-center">"Akan maju sendirinya!"</blockquote>
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
                nextYear = yyyy + 1,
                dayMonth = "10/7/",
                birthday = dayMonth + yyyy + " 20:16:00";
            today = mm + "/" + dd + "/" + yyyy;
            if (today > birthday) {
                birthday = dayMonth + nextYear;
            }
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
                        $(".waktu-mundur").html("Pemilunya dah selesai");
                        if ({{ auth()->user()->vote_status }} == 1) {
                            $(".subtext-waktu").html("Makasih ya &#128516;");
                        } else {
                            $(".subtext-waktu").html("Kamu malah golput anj &#128545;");
                        }
                        clearInterval(x);
                    }
                    //seconds
                }, 0);
        })();
    </script>
@endpush
