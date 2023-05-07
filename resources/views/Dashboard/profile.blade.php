@extends('Template.Dashboard.layouts')

@section('main')
    <!-- ============================================================= -->
    <!-- Start Page Content -->
    <!-- ============================================================= -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="mt-4">
                        <img src="{{ auth()->user()->image ? auth()->user()->image : asset('assets/images/default_profile.png') }}"
                            class="rounded-circle" width="150" />
                        <h4 class="mt-2">{{ auth()->user()->full_name }}</h4>
                        <h6 class="card-subtitle">{{ auth()->user()->study_program->study_program_name }}</h6>
                        <h6 class="card-subtitle">{{ auth()->user()->nim }}</h6>
                    </center>
                </div>
                <div class="card-body pt-0">
                    <small class="text-muted">Surat Elektronik</small>
                    <h6>{{ auth()->user()->email }}</h6>
                    <small class="text-muted pt-4 db">Phone</small>
                    <h6>{{ auth()->user()->phone }}</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card overflow-hidden">
                <!-- Tabs -->
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" href="#last-month"
                            role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="update-profile-tab" data-bs-toggle="pill" href="#update-profile"
                            role="tab" aria-controls="update-profile" aria-selected="false">Pengaturan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="change-password-tab" data-bs-toggle="pill" href="#change-password"
                            role="tab" aria-controls="change-password" aria-selected="false">Ubah Password</a>
                    </li>
                </ul>
                <!-- Tabs -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="last-month" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r">
                                    <strong>Nama Lengkap</strong>
                                    <br />
                                    <p class="text-muted">{{ auth()->user()->full_name }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r">
                                    <strong>Program Studi</strong>
                                    <br />
                                    <p class="text-muted">{{ auth()->user()->study_program->study_program_name }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r">
                                    <strong>Surel</strong>
                                    <br />
                                    <p class="text-muted">{{ auth()->user()->email }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <strong>NIM</strong>
                                    <br />
                                    <p class="text-muted">{{ auth()->user()->nim }}</p>
                                </div>
                            </div>
                            <hr />
                            <p class="mt-4">
                                Donec pede justo, fringilla vel, aliquet nec, vulputate
                                eget, arcu. In enim justo, rhoncus ut, imperdiet a,
                                venenatis vitae, justo. Nullam dictum felis eu pede
                                mollis pretium. Integer tincidunt.Cras dapibus. Vivamus
                                elementum semper nisi. Aenean vulputate eleifend tellus.
                                Aenean leo ligula, porttitor eu, consequat vitae,
                                eleifend ac, enim.
                            </p>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the
                                industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and
                                scrambled it to make a type specimen book. It has
                                survived not only five centuries
                            </p>
                            <p>
                                It was popularised in the 1960s with the release of
                                Letraset sheets containing Lorem Ipsum passages, and
                                more recently with desktop publishing software like
                                Aldus PageMaker including versions of Lorem Ipsum.
                            </p>
                            <h4 class="font-weight-medium mt-4">Organisasi</h4>
                            <hr />
                        </div>
                    </div>

                    {{-- Update Profile --}}
                    <div class="tab-pane fade" id="update-profile" role="tabpanel" aria-labelledby="update-profile-tab">
                        <div class="card-body">
                            <form class="form-horizontal form-material">
                                <div class="mb-3">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Johnathan Doe"
                                            class="form-control form-control-line" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="johnathan@admin.com"
                                            class="form-control form-control-line" name="example-email"
                                            id="example-email" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password" class="form-control form-control-line" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="123 456 7890"
                                            class="form-control form-control-line" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="col-md-12">Message</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="col-sm-12">Select Country</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line">
                                            <option>London</option>
                                            <option>India</option>
                                            <option>Usa</option>
                                            <option>Canada</option>
                                            <option>Thailand</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">
                                            Update Profile
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Change Password --}}
                    <div class="tab-pane fade" id="change-password" role="tabpanel"
                        aria-labelledby="change-password-tab">
                        <div class="card-body">
                            <form class="form-horizontal form-material">
                                <div class="mb-3">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Johnathan Doe"
                                            class="form-control form-control-line" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="johnathan@admin.com"
                                            class="form-control form-control-line" name="example-email"
                                            id="example-email" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password" class="form-control form-control-line" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="123 456 7890"
                                            class="form-control form-control-line" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="col-md-12">Message</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="col-sm-12">Select Country</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line">
                                            <option>London</option>
                                            <option>India</option>
                                            <option>Usa</option>
                                            <option>Canada</option>
                                            <option>Thailand</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">
                                            Update Profile
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================= -->
    <!-- End PAge Content -->
    <!-- ============================================================= -->
@endsection
