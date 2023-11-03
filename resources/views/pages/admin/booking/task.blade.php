@extends('layout.default')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header mt-2 flex-wrap d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">List Task</h4>
                        <p class="m-0 subtitle">Add <code>Patient</code> class with <code>datatables</code></p>
                    </div>
                    {{-- <ul class="nav nav-tabs dzm-tabs" id="myTab-4" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button type="button" id="add-btn" class="nav-link active">Add</button>
                        </li>
                    </ul> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-list" class="datatables">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Booking Date</th>
                                    <th>No Booking</th>
                                    <th>Customers Name</th>
                                    {{-- <th>Category (Package)</th> --}}
                                    <th>Type Booking</th>
                                    <th>Status</th>
                                    <th>Payment Status</th>
                                    {{-- <th>Discount</th>
                                    <th>Total Price</th> --}}
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-data" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">
                        <form>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Payment Status</label>
                                <div class="col-sm-9" id="form-pay">
                                  
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Booking Date</label>
                                <div class="col-sm-9">
                                    <input id="form-booking-date" type="text" class="form-control" placeholder="Name" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">No Booking</label>
                                <div class="col-sm-9">
                                    <input id="form-no-booking" type="text" class="form-control" placeholder="Email" readonly>
                                </div>
                            </div>
                            {{-- <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Diskon</label>
                                <div class="col-sm-9">
                                    <input id="form-discount" type="number" class="form-control" placeholder="Phone" readonly>
                                </div>
                            </div> --}}
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Total Price</label>
                                <div class="col-sm-9">
                                    <input id="form-total-price" type="number" class="form-control" placeholder="Phone" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="table-responsive">
                                    <table id="table-list-det" class="datatables w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Service Name</th>
                                                <th>Employee Name</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mb-3 row" id="content-product-det">
                                <div class="table-responsive">
                                    <table id="table-det-product" class="datatables w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Product Name</th>
                                                <th>Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="content-paid">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label"> Pay Amount</label>
                                    <div class="col-sm-9">
                                        <input id="form-pay-amount" type="number" class="form-control" placeholder="Rp">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label"> Change</label>
                                    <div class="col-sm-9">
                                        <input id="form-change" type="number" class="form-control" placeholder="Rp" readonly>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="pay-btn" class="btn btn-primary">Paid</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-script')
    <script src="{{ $javascriptFile }}"></script>
@endpush
