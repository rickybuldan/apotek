@extends('layout.default')
@push('after-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <style>
        /* HIDE RADIO */
        [type=radio] { 
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
        }

        /* IMAGE STYLES */
        [type=radio] + img {
        cursor: pointer;
        }

        /* CHECKED STYLES */
        [type=radio]:checked + img {
        outline: 2px solid #222B40;
        }
    </style>
@endpush
@section('content')
{{-- <div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card box-hover">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-box icon-box-lg bg-success-light rounded">
                        <i class="fa-solid fa-briefcase text-success"></i>
                    </div>
                    <div class="total-projects ms-3">
                        <h3 class="text-success count" id="form-tot-employees"></h3> 
                        <span>Total Employee</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card box-hover">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-box icon-box-lg bg-primary-light rounded">
                        <i class="fa-solid fa-cart-shopping text-primary"></i>

                    </div>
                    <div class="total-projects ms-3">
                        <h3 class="text-primary count" id="form-tot-bookings"></h3> 
                        <span>Total Booked</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card box-hover">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-box icon-box-lg bg-warning-light rounded">
                        <i class="fa-solid fa-users text-warning"></i>
                    </div>
                    <div class="total-projects ms-3">
                        <h3 class="text-warning count" id="form-tot-users"></h3> 
                        <span>Total User</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card box-hover">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-box icon-box-lg bg-danger-light rounded">
                        <i class="fa-solid fa-hand-holding-dollar text-danger"></i>
                    </div>
                    <div class="total-projects ms-3">
                        <h4 class="text-danger count" id="form-tot-revenue"></h4> 
                        <span>Total Revenue (Rp)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">		
        <div class="card">
            <div class="card-body p-0">
				<div class="mb-3">
                        
					<label class="col-sm-3 col-form-label">Choose Service</label>
					<select id="form-service">

					</select>
				   
				</div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive active-projects">
                    <div class="tbl-caption">
                        <h4 class="heading mb-0">Latest Booked</h4>
                    </div>
                    <div class="table-responsive px-4 pb-4">
                        <table id="table-latest-booked"  class="table dataTable no-footer" role="grid" aria-describedby="projects-tbl_info">
                            <thead>
                                <th>No</th>
                                <th>No Booking</th>
                                <th>Status Booking</th>
                                <th>Payment Status</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="row">
	<div class="col-xl-5">	
		<div class="card">
			<div class="card-header flex-wrap">
				<div>
					<h4 class="card-title">Booking Services</h4>
					<p class="m-0 subtitle">Default datatables. Add <code>datatables</code> class in root</p>
				</div>
			</div>
			<div class="card-body ">
				<div class="basic-form px-4">
					<div class="mb-3">
						<label class="col-sm-3 col-form-label">Customer By Phone</label>
						<select id="form-customer">

						</select>
					</div>
					<div class="mb-3">
					
						<label class="col-sm-3 col-form-label">Customer Name<span class="text-danger">*</span></label>
						<input type="text" class="form-control" placeholder="Name" id="form-name-customer">
					
					</div>
					<div class="row">
						{{-- <div class="col-xl-3 col-md-6 col-sm-6">
							<div class="mb-3">
								<label class="form-label">Person</label>
								<div class="dropdown bootstrap-select default-select form-control wide"><select class="default-select form-control wide">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select></div>
							</div>
						</div> --}}
						<div class="col-xl-6 col-md-6 col-sm-6">
							<div class="mb-3">
								<label class="form-label">Phone<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="form-phone-customer" placeholder="Phone">
							</div>
						</div>
						<div class="col-xl-6 col-md-6 col-sm-6">
							<div class="mb-3">
								<label class="form-label">Email</label>
								<input type="email"  class="form-control" id="form-email-customer" placeholder="Email">
							</div>
						</div>
					</div>
					
					<div class="mb-3">
						<label class="col-sm-3 col-form-label">Choose Service</label>
						<select id="form-service">

						</select>
					</div>
					<div class="row">
						{{-- <div class="col-xl-3 col-md-6 col-sm-6">
							<div class="mb-3">
								<label class="form-label">Person</label>
								<div class="dropdown bootstrap-select default-select form-control wide"><select class="default-select form-control wide">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select></div>
							</div>
						</div> --}}
						<div class="col-xl-6 col-md-6 col-sm-6">
							<div class="mb-3">
								<label class="form-label">Date</label>
								<input type="text" class="form-control" placeholder="choose a date" id="min-date">
							</div>
						</div>
						<div class="col-xl-6 col-md-6 col-sm-6">
							<div class="mb-3">
								<label class="form-label">Time</label>
								<select id="form-time">

								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-12 col-md-12 col-sm-12">
							<div class="mb-3">
								<label class="form-label" id="label_employee">Select Employee</label>
								<div id="list_employee" class="row">
									{{-- <div class="col-xl-2 col-md-6 col-sm-6 mx-0">
										<label>
											<input type="radio" name="test" value="small" checked>
											<img class="img-fluid" src="{{ asset('template/admin/images/product/1.jpg') }}" alt="">
											<p class="text-center">Jajang Nurjaman</p>
										</label>
									</div>
									<div class="col-xl-2 col-md-6 col-sm-6">
										<label>
											<input type="radio" name="test" value="big">
											<img class="img-fluid" src="{{ asset('template/admin/images/product/1.jpg') }}" alt="">
										</label>
									</div> --}}
									
									{{-- <div class="col-xl-2 col-md-6 col-sm-6">
										<div class="new-arrival-product">
											<div class="new-arrivals-img-contnent">
												<img class="img-fluid" src="{{ asset('template/admin/images/product/1.jpg') }}" alt="">
											</div>
										</div>
									</div>
									<div class="col-xl-2 col-md-6 col-sm-6">
										<div class="new-arrival-product">
											<div class="new-arrivals-img-contnent">
												<img class="img-fluid" src="{{ asset('template/admin/images/product/1.jpg') }}" alt="">
											</div>
										</div>
									</div> --}}
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-12 col-md-12 col-sm-12">
							<button type="button" id="add-service-btn" class="btn btn-primary">Add Service!</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-7">	
		<div class="card">
			<div class="card-header flex-wrap">
				<div>
					<h4 class="card-title">Booking Details</h4>
					<p class="m-0 subtitle">Default datatables. Add <code>datatables</code> class in root</p>
				</div>
			</div>
			<div class="card-body ">
				{{-- <div class="basic-form">
					<div class="row">
						<div class="col-xl-4 col-md-6 col-sm-6">
							<div class="mb-4">
								<label class="form-label">Service</label>
								<input type="text" class="form-control" placeholder="choose a date" id="date-book">
							</div>
						</div>
						<div class="col-xl-3 col-md-6 col-sm-6">
							<div class="mb-3">
								<label class="form-label">Date</label>
								<input type="text" class="form-control" placeholder="choose a date" id="date-book">
							</div>
						</div>
						<div class="col-xl-2 col-md-6 col-sm-6">
							<div class="mb-3">
								<label class="form-label">Time</label>
								<input type="text" class="form-control" placeholder="choose a date" id="time-book">
							</div>
						</div>
						<div class="col-xl-3 col-md-6 col-sm-6">
							<div class="mb-3">
								<label class="form-label">Employee</label>
								<input type="text" class="form-control" placeholder="choose a date" id="date-book">
							</div>
						</div>
					</div>
				</div> --}}
				<div class="table-responsive active-projects">
                    <div class="table-responsive px-4 pb-4">
                        <table id="table-latest-booked"  class="table dataTable no-footer" role="grid" aria-describedby="projects-tbl_info">
                            <thead>
								<th>Booking Date</th>
                                <th>Service Name</th>
                                <th>Employee Name</th>
								<th>Action</th>
                            </thead>
                            <tbody id="item-book">
								
							</tbody>
                        </table>
						<div class="text-center my-4" id="no-datapic">
							<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="200" height="100" viewBox="0 0 647.63626 632.17383" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M687.3279,276.08691H512.81813a15.01828,15.01828,0,0,0-15,15v387.85l-2,.61005-42.81006,13.11a8.00676,8.00676,0,0,1-9.98974-5.31L315.678,271.39691a8.00313,8.00313,0,0,1,5.31006-9.99l65.97022-20.2,191.25-58.54,65.96972-20.2a7.98927,7.98927,0,0,1,9.99024,5.3l32.5498,106.32Z" transform="translate(-276.18187 -133.91309)" fill="#f2f2f2"/><path d="M725.408,274.08691l-39.23-128.14a16.99368,16.99368,0,0,0-21.23-11.28l-92.75,28.39L380.95827,221.60693l-92.75,28.4a17.0152,17.0152,0,0,0-11.28028,21.23l134.08008,437.93a17.02661,17.02661,0,0,0,16.26026,12.03,16.78926,16.78926,0,0,0,4.96972-.75l63.58008-19.46,2-.62v-2.09l-2,.61-64.16992,19.65a15.01489,15.01489,0,0,1-18.73-9.95l-134.06983-437.94a14.97935,14.97935,0,0,1,9.94971-18.73l92.75-28.4,191.24024-58.54,92.75-28.4a15.15551,15.15551,0,0,1,4.40966-.66,15.01461,15.01461,0,0,1,14.32032,10.61l39.0498,127.56.62012,2h2.08008Z" transform="translate(-276.18187 -133.91309)" fill="#3f3d56"/><path d="M398.86279,261.73389a9.0157,9.0157,0,0,1-8.61133-6.3667l-12.88037-42.07178a8.99884,8.99884,0,0,1,5.9712-11.24023l175.939-53.86377a9.00867,9.00867,0,0,1,11.24072,5.9707l12.88037,42.07227a9.01029,9.01029,0,0,1-5.9707,11.24072L401.49219,261.33887A8.976,8.976,0,0,1,398.86279,261.73389Z" transform="translate(-276.18187 -133.91309)" fill="#222b40"/><circle cx="190.15351" cy="24.95465" r="20" fill="#222b40"/><circle cx="190.15351" cy="24.95465" r="12.66462" fill="#fff"/><path d="M878.81836,716.08691h-338a8.50981,8.50981,0,0,1-8.5-8.5v-405a8.50951,8.50951,0,0,1,8.5-8.5h338a8.50982,8.50982,0,0,1,8.5,8.5v405A8.51013,8.51013,0,0,1,878.81836,716.08691Z" transform="translate(-276.18187 -133.91309)" fill="#e6e6e6"/><path d="M723.31813,274.08691h-210.5a17.02411,17.02411,0,0,0-17,17v407.8l2-.61v-407.19a15.01828,15.01828,0,0,1,15-15H723.93825Zm183.5,0h-394a17.02411,17.02411,0,0,0-17,17v458a17.0241,17.0241,0,0,0,17,17h394a17.0241,17.0241,0,0,0,17-17v-458A17.02411,17.02411,0,0,0,906.81813,274.08691Zm15,475a15.01828,15.01828,0,0,1-15,15h-394a15.01828,15.01828,0,0,1-15-15v-458a15.01828,15.01828,0,0,1,15-15h394a15.01828,15.01828,0,0,1,15,15Z" transform="translate(-276.18187 -133.91309)" fill="#3f3d56"/><path d="M801.81836,318.08691h-184a9.01015,9.01015,0,0,1-9-9v-44a9.01016,9.01016,0,0,1,9-9h184a9.01016,9.01016,0,0,1,9,9v44A9.01015,9.01015,0,0,1,801.81836,318.08691Z" transform="translate(-276.18187 -133.91309)" fill="#222b40"/><circle cx="433.63626" cy="105.17383" r="20" fill="#222b40"/><circle cx="433.63626" cy="105.17383" r="12.18187" fill="#fff"/></svg>
						</div>
                    </div>
                </div>
				<div class="row px-4">
					<div class="col-xl-6 col-md-12 col-sm-12">
						<div class="mb-3">
							<label class="form-label">Add Product</label>
							<select id="form-product">

							</select>
						</div>
					</div>
					<div class="col-xl-4 col-md-12 col-sm-12">
						<div class="mb-3">
							<label class="form-label">Qty</label>
							<input type="number" class="form-control" placeholder="Qty" id="form-qty">
						</div>
					</div>
					<div class="col-xl-2 col-md-12 col-sm-12">
						<div class="mt-4">
							<button class="btn btn-success" id="add-product-btn">+</button>
						</div>
					</div>
				</div>
				<div class="table-responsive active-projects">
                    <div class="table-responsive px-4 pb-4">
                        <table id="table-latest-booked"  class="table dataTable no-footer" role="grid" aria-describedby="projects-tbl_info">
                            <thead>
                                <th>Product Name</th>
                                <th>Qty</th>
								<th>Action</th>
                            </thead>
                            <tbody id="item-product">
								
							</tbody>
                        </table>
						<div class="text-center my-4" id="no-datapic2">
							<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="200" height="100" viewBox="0 0 647.63626 632.17383" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M687.3279,276.08691H512.81813a15.01828,15.01828,0,0,0-15,15v387.85l-2,.61005-42.81006,13.11a8.00676,8.00676,0,0,1-9.98974-5.31L315.678,271.39691a8.00313,8.00313,0,0,1,5.31006-9.99l65.97022-20.2,191.25-58.54,65.96972-20.2a7.98927,7.98927,0,0,1,9.99024,5.3l32.5498,106.32Z" transform="translate(-276.18187 -133.91309)" fill="#f2f2f2"/><path d="M725.408,274.08691l-39.23-128.14a16.99368,16.99368,0,0,0-21.23-11.28l-92.75,28.39L380.95827,221.60693l-92.75,28.4a17.0152,17.0152,0,0,0-11.28028,21.23l134.08008,437.93a17.02661,17.02661,0,0,0,16.26026,12.03,16.78926,16.78926,0,0,0,4.96972-.75l63.58008-19.46,2-.62v-2.09l-2,.61-64.16992,19.65a15.01489,15.01489,0,0,1-18.73-9.95l-134.06983-437.94a14.97935,14.97935,0,0,1,9.94971-18.73l92.75-28.4,191.24024-58.54,92.75-28.4a15.15551,15.15551,0,0,1,4.40966-.66,15.01461,15.01461,0,0,1,14.32032,10.61l39.0498,127.56.62012,2h2.08008Z" transform="translate(-276.18187 -133.91309)" fill="#3f3d56"/><path d="M398.86279,261.73389a9.0157,9.0157,0,0,1-8.61133-6.3667l-12.88037-42.07178a8.99884,8.99884,0,0,1,5.9712-11.24023l175.939-53.86377a9.00867,9.00867,0,0,1,11.24072,5.9707l12.88037,42.07227a9.01029,9.01029,0,0,1-5.9707,11.24072L401.49219,261.33887A8.976,8.976,0,0,1,398.86279,261.73389Z" transform="translate(-276.18187 -133.91309)" fill="#222b40"/><circle cx="190.15351" cy="24.95465" r="20" fill="#222b40"/><circle cx="190.15351" cy="24.95465" r="12.66462" fill="#fff"/><path d="M878.81836,716.08691h-338a8.50981,8.50981,0,0,1-8.5-8.5v-405a8.50951,8.50951,0,0,1,8.5-8.5h338a8.50982,8.50982,0,0,1,8.5,8.5v405A8.51013,8.51013,0,0,1,878.81836,716.08691Z" transform="translate(-276.18187 -133.91309)" fill="#e6e6e6"/><path d="M723.31813,274.08691h-210.5a17.02411,17.02411,0,0,0-17,17v407.8l2-.61v-407.19a15.01828,15.01828,0,0,1,15-15H723.93825Zm183.5,0h-394a17.02411,17.02411,0,0,0-17,17v458a17.0241,17.0241,0,0,0,17,17h394a17.0241,17.0241,0,0,0,17-17v-458A17.02411,17.02411,0,0,0,906.81813,274.08691Zm15,475a15.01828,15.01828,0,0,1-15,15h-394a15.01828,15.01828,0,0,1-15-15v-458a15.01828,15.01828,0,0,1,15-15h394a15.01828,15.01828,0,0,1,15,15Z" transform="translate(-276.18187 -133.91309)" fill="#3f3d56"/><path d="M801.81836,318.08691h-184a9.01015,9.01015,0,0,1-9-9v-44a9.01016,9.01016,0,0,1,9-9h184a9.01016,9.01016,0,0,1,9,9v44A9.01015,9.01015,0,0,1,801.81836,318.08691Z" transform="translate(-276.18187 -133.91309)" fill="#222b40"/><circle cx="433.63626" cy="105.17383" r="20" fill="#222b40"/><circle cx="433.63626" cy="105.17383" r="12.18187" fill="#fff"/></svg>
						</div>
                    </div>
                </div>
				<div class="row px-4">
					<div class="col-xl-12  col-lg-6 col-sm-6">
						<div class="widget-stat card bg-success">
							<div class="card-body  p-4">
								<div class="media">
									<span class="me-3">
										<svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
											<line x1="12" y1="1" x2="12" y2="23"></line>
											<path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
										</svg>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">Total Price</p>
										<h4 class="text-white" >Rp</h4>
										<h4 class="text-white" id="total-price">0</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row text-center px-4">
					<div class="col-xl-12 col-md-12 col-sm-12">
						<button type="button" id="book-btn" class="btn btn-primary"><i class="fa-solid fa-phone-volume me-2"></i>Save Booking!</button>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection
@push('after-script')
    <script src="{{ $javascriptFile }}"></script>
@endpush
