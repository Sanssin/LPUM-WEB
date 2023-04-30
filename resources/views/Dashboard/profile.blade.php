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
                        <h4 class="mt-2">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h4>
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
                        <a class="nav-link" id="pills-setting-tab" data-bs-toggle="pill" href="#previous-month"
                            role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                    </li>
                </ul>
                <!-- Tabs -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="last-month" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r">
                                    <strong>Full Name</strong>
                                    <br />
                                    <p class="text-muted">Johnathan Deo</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r">
                                    <strong>Mobile</strong>
                                    <br />
                                    <p class="text-muted">(123) 456 7890</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r">
                                    <strong>Email</strong>
                                    <br />
                                    <p class="text-muted">johnathan@admin.com</p>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <strong>Location</strong>
                                    <br />
                                    <p class="text-muted">London</p>
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
                            <h4 class="font-weight-medium mt-4">Skill Set</h4>
                            <hr />
                            <h5 class="mt-4">
                                Wordpress <span class="pull-right">80%</span>
                            </h5>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 80%; height: 6px">
                                    <span class="sr-only">50% Complete</span>
                                </div>
                            </div>
                            <h5 class="mt-4">
                                HTML 5 <span class="pull-right">90%</span>
                            </h5>
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 90%; height: 6px">
                                    <span class="sr-only">50% Complete</span>
                                </div>
                            </div>
                            <h5 class="mt-4">
                                jQuery <span class="pull-right">50%</span>
                            </h5>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 50%; height: 6px">
                                    <span class="sr-only">50% Complete</span>
                                </div>
                            </div>
                            <h5 class="mt-4">
                                Photoshop <span class="pull-right">70%</span>
                            </h5>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 70%; height: 6px">
                                    <span class="sr-only">50% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
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
