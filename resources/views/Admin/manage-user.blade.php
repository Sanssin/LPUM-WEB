@extends('Template.Dashboard.layouts')

@push('vendorStyle')
    <link rel="stylesheet" href="{{ asset('dist/css/dataTables.bootstrap5.min.css') }}">
@endpush

@push('vendorScript')
    <script src="{{ asset('dist/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/buttons.flash.min.js') }}"></script>

    <script src="{{ asset('dist/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dist/js/datatable-advanced.init.js') }}"></script>
@endpush

@section('main')
    <!-- ============================================================= -->
    <!-- Start Page Content -->
    <!-- ============================================================= -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-xl-9 col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center mb-4">
                        <h4>All Contacts</h4>
                        <div class="ms-auto">
                            <div class="btn-group">
                                <button type="button"
                                    class="
                            btn btn-light-primary
                            text-primary
                            font-weight-medium
                            rounded-pill
                            px-4
                          "
                                    data-bs-toggle="modal" data-bs-target="#createmodel">
                                    Create New Contact
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="file_export" class="table table-bordered nowrap display">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Age</th>
                                    <th>Joining date</th>
                                    <th>Salery</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customControlValidation2"
                                                required />
                                            <label class="form-check-label" for="customControlValidation2"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Genelia Deshmukh</span>
                                    </td>
                                    <td>genelia@gmail.com</td>
                                    <td>+123 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-danger
                                text-danger
                                font-weight-medium
                              ">Designer</span>
                                    </td>
                                    <td>23</td>
                                    <td>12-10-2014</td>
                                    <td>$1200</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customControlValidation3"
                                                required />
                                            <label class="form-check-label" for="customControlValidation3"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/2.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Arijit Singh</span>
                                    </td>
                                    <td>arijit@gmail.com</td>
                                    <td>+234 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-info
                                text-info
                                font-weight-medium
                              ">Developer</span>
                                    </td>
                                    <td>26</td>
                                    <td>10-09-2014</td>
                                    <td>$1800</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customControlValidation4"
                                                required />
                                            <label class="form-check-label" for="customControlValidation4"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/3.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Govinda jalan</span>
                                    </td>
                                    <td>govinda@gmail.com</td>
                                    <td>+345 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-success
                                text-success
                                font-weight-medium
                              ">Accountant</span>
                                    </td>
                                    <td>28</td>
                                    <td>1-10-2013</td>
                                    <td>$2200</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customControlValidation5"
                                                required />
                                            <label class="form-check-label" for="customControlValidation5"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/4.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Hritik Roshan</span>
                                    </td>
                                    <td>hritik@gmail.com</td>
                                    <td>+456 456 789</td>
                                    <td><span class="badge bg-inverse">HR</span></td>
                                    <td>25</td>
                                    <td>2-10-2023</td>
                                    <td>$200</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customControlValidation6"
                                                required />
                                            <label class="form-check-label" for="customControlValidation6"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/5.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">John Abraham</span>
                                    </td>
                                    <td>john@gmail.com</td>
                                    <td>+567 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-danger
                                text-danger
                                font-weight-medium
                              ">Manager</span>
                                    </td>
                                    <td>23</td>
                                    <td>10-9-2015</td>
                                    <td>$1200</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customControlValidation7"
                                                required />
                                            <label class="form-check-label" for="customControlValidation7"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/6.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Pawandeep kumar</span>
                                    </td>
                                    <td>pawandeep@gmail.com</td>
                                    <td>+678 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-warning
                                text-warning
                                font-weight-medium
                              ">Chairman</span>
                                    </td>
                                    <td>29</td>
                                    <td>10-5-2013</td>
                                    <td>$1500</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customControlValidation8"
                                                required />
                                            <label class="form-check-label" for="customControlValidation8"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/7.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Ritesh Deshmukh</span>
                                    </td>
                                    <td>ritesh@gmail.com</td>
                                    <td>+123 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-danger
                                text-danger
                                font-weight-medium
                              ">Designer</span>
                                    </td>
                                    <td>35</td>
                                    <td>05-10-2012</td>
                                    <td>$3200</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customControlValidation9"
                                                required />
                                            <label class="form-check-label" for="customControlValidation9"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/8.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Salman Khan</span>
                                    </td>
                                    <td>salman@gmail.com</td>
                                    <td>+234 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-info
                                text-info
                                font-weight-medium
                              ">Developer</span>
                                    </td>
                                    <td>27</td>
                                    <td>11-10-2014</td>
                                    <td>$1800</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                id="customControlValidation10" required />
                                            <label class="form-check-label" for="customControlValidation10"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">John Smith</span>
                                    </td>
                                    <td>govinda@gmail.com</td>
                                    <td>+345 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-success
                                text-success
                                font-weight-medium
                              ">Accountant</span>
                                    </td>
                                    <td>18</td>
                                    <td>12-5-2023</td>
                                    <td>$100</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                id="customControlValidation11" required />
                                            <label class="form-check-label" for="customControlValidation11"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/2.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Denny Smith</span>
                                    </td>
                                    <td>sonu@gmail.com</td>
                                    <td>+456 456 789</td>
                                    <td><span class="badge bg-inverse">HR</span></td>
                                    <td>36</td>
                                    <td>18-5-2009</td>
                                    <td>$4200</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                id="customControlValidation12" required />
                                            <label class="form-check-label" for="customControlValidation12"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/3.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Denny Deo</span>
                                    </td>
                                    <td>varun@gmail.com</td>
                                    <td>+567 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-danger
                                text-danger
                                font-weight-medium
                              ">Manager</span>
                                    </td>
                                    <td>43</td>
                                    <td>12-10-2010</td>
                                    <td>$5200</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                id="customControlValidation13" required />
                                            <label class="form-check-label" for="customControlValidation13"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/4.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Johny Deo</span>
                                    </td>
                                    <td>genelia@gmail.com</td>
                                    <td>+123 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-danger
                                text-danger
                                font-weight-medium
                              ">Designer</span>
                                    </td>
                                    <td>23</td>
                                    <td>12-10-2014</td>
                                    <td>$1200</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                id="customControlValidation14" required />
                                            <label class="form-check-label" for="customControlValidation14"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/5.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Rozy Smith</span>
                                    </td>
                                    <td>arijit@gmail.com</td>
                                    <td>+234 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-info
                                text-info
                                font-weight-medium
                              ">Developer</span>
                                    </td>
                                    <td>26</td>
                                    <td>10-09-2014</td>
                                    <td>$1800</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                id="customControlValidation15" required />
                                            <label class="form-check-label" for="customControlValidation15"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/6.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Rozy Smith</span>
                                    </td>
                                    <td>govinda@gmail.com</td>
                                    <td>+345 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-success
                                text-success
                                font-weight-medium
                              ">Accountant</span>
                                    </td>
                                    <td>28</td>
                                    <td>1-10-2013</td>
                                    <td>$2200</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                id="customControlValidation16" required />
                                            <label class="form-check-label" for="customControlValidation16"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        Genelia Deshmukh
                                    </td>
                                    <td>genelia@gmail.com</td>
                                    <td>+123 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-danger
                                text-danger
                                font-weight-medium
                              ">Designer</span>
                                    </td>
                                    <td>23</td>
                                    <td>12-10-2014</td>
                                    <td>$1200</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                id="customControlValidation17" required />
                                            <label class="form-check-label" for="customControlValidation17"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/2.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Rozy Smith</span>
                                    </td>
                                    <td>arijit@gmail.com</td>
                                    <td>+234 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-info
                                text-info
                                font-weight-medium
                              ">Developer</span>
                                    </td>
                                    <td>26</td>
                                    <td>10-09-2014</td>
                                    <td>$1800</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                id="customControlValidation18" required />
                                            <label class="form-check-label" for="customControlValidation18"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/3.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Govinda jalan</span>
                                    </td>
                                    <td>govinda@gmail.com</td>
                                    <td>+345 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-success
                                text-success
                                font-weight-medium
                              ">Accountant</span>
                                    </td>
                                    <td>28</td>
                                    <td>1-10-2013</td>
                                    <td>$2200</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                id="customControlValidation19" required />
                                            <label class="form-check-label" for="customControlValidation19"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/4.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Hritik Roshan</span>
                                    </td>
                                    <td>hritik@gmail.com</td>
                                    <td>+456 456 789</td>
                                    <td><span class="badge bg-inverse">HR</span></td>
                                    <td>25</td>
                                    <td>2-10-2023</td>
                                    <td>$200</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                id="customControlValidation20" required />
                                            <label class="form-check-label" for="customControlValidation20"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/5.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">John Abraham</span>
                                    </td>
                                    <td>john@gmail.com</td>
                                    <td>+567 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-danger
                                text-danger
                                font-weight-medium
                              ">Manager</span>
                                    </td>
                                    <td>23</td>
                                    <td>10-9-2015</td>
                                    <td>$1200</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                id="customControlValidation21" required />
                                            <label class="form-check-label" for="customControlValidation21"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/6.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Pawandeep kumar</span>
                                    </td>
                                    <td>pawandeep@gmail.com</td>
                                    <td>+678 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-warning
                                text-warning
                                font-weight-medium
                              ">Chairman</span>
                                    </td>
                                    <td>29</td>
                                    <td>10-5-2013</td>
                                    <td>$1500</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                id="customControlValidation22" required />
                                            <label class="form-check-label" for="customControlValidation22"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/7.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Ritesh Deshmukh</span>
                                    </td>
                                    <td>ritesh@gmail.com</td>
                                    <td>+123 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-danger
                                text-danger
                                font-weight-medium
                              ">Designer</span>
                                    </td>
                                    <td>35</td>
                                    <td>05-10-2012</td>
                                    <td>$3200</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                id="customControlValidation23" required />
                                            <label class="form-check-label" for="customControlValidation23"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/8.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Salman Khan</span>
                                    </td>
                                    <td>salman@gmail.com</td>
                                    <td>+234 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-info
                                text-info
                                font-weight-medium
                              ">Developer</span>
                                    </td>
                                    <td>27</td>
                                    <td>11-10-2014</td>
                                    <td>$1800</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                id="customControlValidation24" required />
                                            <label class="form-check-label" for="customControlValidation24"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">John Smith</span>
                                    </td>
                                    <td>govinda@gmail.com</td>
                                    <td>+345 456 789</td>
                                    <td>
                                        <span
                                            class="
                                badge
                                bg-light-success
                                text-success
                                font-weight-medium
                              ">Accountant</span>
                                    </td>
                                    <td>18</td>
                                    <td>12-5-2023</td>
                                    <td>$100</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"
                                                id="customControlValidation25" required />
                                            <label class="form-check-label" for="customControlValidation25"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../assets/images/users/2.jpg" alt="user" class="rounded-circle"
                                            width="30" />
                                        <span class="fw-normal">Denny Smith</span>
                                    </td>
                                    <td>sonu@gmail.com</td>
                                    <td>+456 456 789</td>
                                    <td><span class="badge bg-inverse">HR</span></td>
                                    <td>36</td>
                                    <td>18-5-2009</td>
                                    <td>$4200</td>
                                    <td>
                                        <button type="button"
                                            class="
                                btn btn-sm btn-icon btn-pure btn-outline
                                delete-row-btn
                              "
                                            data-bs-toggle="tooltip" data-original-title="Delete">
                                            <i class="ri-close-line" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-4 col-xl-3 col-md-3">
            <div class="card">
                <div class="border-bottom p-3">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Sharemodel"
                        style="width: 100%">
                        <i data-feather="share-2" class="feather-sm fill-white me-2"></i>
                        Share With
                    </button>
                </div>
                <div class="card-body">
                    <form>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i data-feather="search"
                                    class="feather-sm fill-white"></i></span>
                            <input type="text" class="form-control" placeholder="Search Contacts Here..."
                                aria-label="Amount (to the nearest dollar)" />
                            <button class="btn btn-info">Ok</button>
                        </div>
                    </form>
                    <div class="list-group mt-4">
                        <a href="javascript:void(0)" class="list-group-item active"><i data-feather="list"
                                class="feather-sm fill-white me-2"></i>
                            All Contacts</a>
                        <a href="javascript:void(0)" class="list-group-item"><i data-feather="star"
                                class="feather-sm fill-white me-2"></i>
                            Favourite Contacts</a>
                        <a href="javascript:void(0)" class="list-group-item"><i data-feather="bookmark"
                                class="feather-sm fill-white me-2"></i>
                            Recently Created</a>
                    </div>
                    <h4 class="mt-4">Groups</h4>
                    <div class="list-group">
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center"><i
                                data-feather="flag" class="feather-sm fill-white me-2"></i>
                            Success Warriers
                            <span
                                class="
                          badge
                          bg-light-info
                          text-info
                          font-weight-medium
                          rounded-pill
                          ms-auto
                        ">20</span>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center"><i
                                data-feather="file" class="feather-sm fill-white me-2"></i>
                            Project
                            <span class="badge bg-success ms-auto">12</span>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center"><i
                                data-feather="users" class="feather-sm fill-white me-2"></i>
                            Envato Author
                            <span
                                class="
                          badge
                          bg-light-primary
                          rounded-pill
                          text-primary
                          font-weight-medium
                          ms-auto
                        ">22</span>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item d-flex align-items-center"><i
                                data-feather="user-plus" class="feather-sm fill-white me-2"></i>
                            IT Friends
                            <span
                                class="
                          badge
                          bg-light-danger
                          text-danger
                          font-weight-medium
                          rounded-pill
                          ms-auto
                        ">101</span>
                        </a>
                    </div>
                    <h4 class="mt-4">More</h4>
                    <div class="list-group">
                        <a href="javascript:void(0)" class="list-group-item">
                            <span class="badge bg-info me-2"><i data-feather="download"
                                    class="feather-sm fill-white"></i></span>
                            Import Contacts
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                            <span class="badge bg-warning text-white me-2"><i data-feather="upload"
                                    class="feather-sm fill-white"></i></span>
                            Export Contacts
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                            <span class="badge bg-success me-2"><i data-feather="refresh-cw"
                                    class="feather-sm fill-white"></i></span>
                            Restore Contacts
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                            <span class="badge bg-primary me-2"><i data-feather="layers"
                                    class="feather-sm fill-white"></i></span>
                            Duplicate Contacts
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                            <span class="badge bg-danger me-2"><i data-feather="trash-2"
                                    class="feather-sm fill-white"></i></span>
                            Delete All Contacts
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- ============================================================= -->
    <!-- End PAge Content -->
    <!-- ============================================================= -->
@endsection
