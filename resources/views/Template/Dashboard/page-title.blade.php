<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-titles">
    <div class="row">
        <div class="col-lg-8 col-md-6 col-12 align-self-center">
            <h4 class="text-muted mb-0 fw-normal">Welcome
                {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h4>
            <h1 class="mb-0 fw-bold">Pagu Utama</h1>
        </div>
        <div
            class="
                col-lg-4 col-md-6
                d-none d-md-flex
                align-items-center
                justify-content-end
              ">
            <select class="form-select theme-select border-0" aria-label="Default select example">
                <option value="1">Today 23 March</option>
                <option value="2">Today 24 March</option>
                <option value="3">Today 25 March</option>
            </select>
            <a href="javascript:void(0)" class="btn btn-info d-flex align-items-center ms-2">
                <i class="ri-add-line me-1"></i>
                Add New
            </a>
        </div>

    </div>
    <div>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
