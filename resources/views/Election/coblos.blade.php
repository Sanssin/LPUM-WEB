@extends('Template.Dashboard.layouts')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <div class="card-header bg-success">
                    <h4 class="mb-0 text-white">Pemilu aktif</h4>
                </div>
                <div class="card-body">
                    <div class="alert customize-alert border-success text-success" role="alert">
                        <h4 class="alert-heading">Keterangan</h4>
                        <p>
                            Pemilu aktif adalah pemilu yang sedang berada pada masa pencoblosan. Semua pengguna dapat
                            melihat detail pemilihan beserta calon-calon pejabat yang sedang bertarung dalam kontestasi
                            politik tersebut. Namun, hanya sebagian pengguna yang berhak memberikan suara di setiap
                            pemilihan. Informasi lebih lengkap tentang pemilu yang telah/sedang dilaksanakan dapat dilihat
                            <span class="fw-bold"><a class="text-primary" href="#"> DI SINI <i
                                        class="mdi mdi-arrow-right"></i></a></span>
                        </p>
                        <hr class="text-success">
                        <p class="mb-0">
                            Jika kamu merasa merupakan bagian dari pemilih, tetapi tidak bisa memilih. Silakan hubungi admin
                            melalui link ini (WA)
                        </p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-4">
                            <div class="card">
                                <img class="card-img-top img-responsive mw-50"
                                    src="{{ asset('assets/images/contoh-poster.jpg') }}" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Pemilihan Ketua Poster 2023</h4>
                                    <p class="card-text">
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod voluptas laborum,
                                        voluptatum totam
                                        amet expedita?
                                    </p>
                                    <a href="{{ route('election.show') }}" class="btn btn-info my-1 d-block">Detail</a>
                                    <a href="{{ route('election.votePage') }}" class="btn btn-primary d-block">Coblos
                                        sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection