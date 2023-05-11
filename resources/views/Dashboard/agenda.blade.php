@extends('Template.Dashboard.layouts')

@section('main')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div>
                    <div class="row gx-0">
                        <div class="col-lg-12">
                            <div class="p-4 calender-sidebar app-calendar">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BEGIN MODAL -->
            <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eventModalLabel">
                                Detail agenda
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <label class="form-label">Pemilihan</label>
                                        <input id="election-title" type="text" class="form-control" disabled />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label class="form-label">Judul Kegiatan</label>
                                        <input id="event-title" type="text" class="form-control" disabled />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label class="form-label">Waktu Mulai</label>
                                        <input id="event-start" type="datetime" class="form-control" disabled />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label class="form-label">Waktu selesai</label>
                                        <input id="event-end" type="datetime" class="form-control" disabled />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="">
                                        <label class="form-label">Lokasi</label>
                                        <input id="location" type="text" class="form-control" disabled />
                                    </div>
                                </div>

                                <div class="col-md-12 d-none">
                                    <div class="">
                                        <label class="form-label">Enter Start Date</label>
                                        <input id="event-start-date" type="text" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-12 d-none">
                                    <div class="">
                                        <label class="form-label">Enter End Date</label>
                                        <input id="event-end-date" type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-success btn-update-event" data-fc-event-public-id="">
                                Update changes
                            </button>
                            <button type="button" class="btn btn-primary btn-add-event">
                                Add Event
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MODAL -->
        </div>
    </div>
@endsection

@push('vendorScript')
    <script src="{{ asset('dist/js/moment.min.js') }}"></script>
    <script src="{{ asset('dist/js/index.global.min.js') }}"></script>
    <script src="{{ asset('dist/js/cal-init.js') }}"></script>
@endpush
