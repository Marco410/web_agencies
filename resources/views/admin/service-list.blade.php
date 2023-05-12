
@extends('layout.mainlayout_admin')
@section('content')		
<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Services</h3>
						</div>
						<div class="col-auto text-right">
							<a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search">
								<i class="fas fa-filter"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<!-- Search Filter -->
				<form action="#" method="post" id="filter_inputs">
					<div class="card filter-card">
						<div class="card-body pb-0">
							<div class="row filter-row">
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Service</label>
										<input class="form-control" type="text">
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>From Date</label>
										<div class="cal-icon">
											<input class="form-control datetimepicker" type="text">
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>To Date</label>
										<div class="cal-icon">
											<input class="form-control datetimepicker" type="text">
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">Submit</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!-- /Search Filter -->
				
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center mb-0 datatable">
										<thead>
											<tr>
												<th>#</th>
												<th>Service</th>
												<th>Location</th>
												<th>Category</th>
												<th>Amount</th>
												<th>Date</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>
													<a href="service-details">
														<img class="rounded service-img mr-1" src="../assets_admin/img/services/service-01.jpg" alt=""> Toughened Glass Fitting Services
													</a>
												</td>
												<td>Wayne, New Jersey</td>
												<td>Cleaning</td>
												<td>$25</td>
												<td>13 Sep 2020</td>
												<td>
													<div class="status-toggle">
														<input id="service_1" class="check" type="checkbox">
														<label for="service_1" class="checktoggle">checkbox</label>
													</div>
												</td>
												<td>
													<a href="service-details" class="btn btn-sm bg-info-light">
														<i class="far fa-eye mr-1"></i> View
													</a>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>
													<a href="service-details">
														<img class="rounded service-img mr-1" src="../assets_admin/img/services/service-02.jpg" alt=""> Car Repair Services
													</a>
												</td>
												<td>Hanover, Maryland</td>
												<td>Automobile</td>
												<td>$50</td>
												<td>12 Sep 2020</td>
												<td>
													<div class="status-toggle">
														<input id="service_2" class="check" type="checkbox" checked>
														<label for="service_2" class="checktoggle">checkbox</label>
													</div>
												</td>
												<td>
													<a href="service-details" class="btn btn-sm bg-info-light">
														<i class="far fa-eye mr-1"></i> View
													</a>
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>
													<a href="service-details">
														<img class="rounded service-img mr-1" src="../assets_admin/img/services/service-03.jpg" alt=""> Electric Panel Repairing Service
													</a>
												</td>
												<td>Kalispell, Montana</td>
												<td>Electrical</td>
												<td>$45</td>
												<td>11 Sep 2020</td>
												<td>
													<div class="status-toggle">
														<input id="service_3" class="check" type="checkbox">
														<label for="service_3" class="checktoggle">checkbox</label>
													</div>
												</td>
												<td>
													<a href="service-details" class="btn btn-sm bg-info-light">
														<i class="far fa-eye mr-1"></i> View
													</a>
												</td>
											</tr>
											<tr>
												<td>4</td>
												<td>
													<a href="service-details">
														<img class="rounded service-img mr-1" src="../assets_admin/img/services/service-04.jpg" alt=""> Steam Car Wash
													</a>
												</td>
												<td>Electra, Texas</td>
												<td>Car Wash</td>
												<td>$14</td>
												<td>10 Sep 2020</td>
												<td>
													<div class="status-toggle">
														<input id="service_4" class="check" type="checkbox" checked>
														<label for="service_4" class="checktoggle">checkbox</label>
													</div>
												</td>
												<td>
													<a href="service-details" class="btn btn-sm bg-info-light">
														<i class="far fa-eye mr-1"></i> View
													</a>
												</td>
											</tr>
											<tr>
												<td>5</td>
												<td>
													<a href="service-details">
														<img class="rounded service-img mr-1" src="../assets_admin/img/services/service-05.jpg" alt=""> House Cleaning Service
													</a>
												</td>
												<td>Sylvester, Georgia</td>
												<td>Cleaning</td>
												<td>$100</td>
												<td>9 Sep 2020</td>
												<td>
													<div class="status-toggle">
														<input id="service_5" class="check" type="checkbox" checked>
														<label for="service_5" class="checktoggle">checkbox</label>
													</div>
												</td>
												<td>
													<a href="service-details" class="btn btn-sm bg-info-light">
														<i class="far fa-eye mr-1"></i> View
													</a>
												</td>
											</tr>
											<tr>
												<td>6</td>
												<td>
													<a href="service-details">
														<img class="rounded service-img mr-1" src="../assets_admin/img/services/service-06.jpg" alt=""> Computer & Server AMC Service
													</a>
												</td>
												<td>Los Angeles, California</td>
												<td>Computer</td>
												<td>$80</td>
												<td>8 Sep 2020</td>
												<td>
													<div class="status-toggle">
														<input id="service_6" class="check" type="checkbox">
														<label for="service_6" class="checktoggle">checkbox</label>
													</div>
												</td>
												<td>
													<a href="service-details" class="btn btn-sm bg-info-light">
														<i class="far fa-eye mr-1"></i> View
													</a>
												</td>
											</tr>
											<tr>
												<td>7</td>
												<td>
													<a href="service-details">
														<img class="rounded service-img mr-1" src="../assets_admin/img/services/service-07.jpg" alt=""> Interior Designing
													</a>
												</td>
												<td>Hanover, Maryland</td>
												<td>Interior</td>
												<td>$5</td>
												<td>7 Sep 2020</td>
												<td>
													<div class="status-toggle">
														<input id="service_7" class="check" type="checkbox" checked>
														<label for="service_7" class="checktoggle">checkbox</label>
													</div>
												</td>
												<td>
													<a href="service-details" class="btn btn-sm bg-info-light">
														<i class="far fa-eye mr-1"></i> View
													</a>
												</td>
											</tr>
											<tr>
												<td>8</td>
												<td>
													<a href="service-details">
														<img class="rounded service-img mr-1" src="../assets_admin/img/services/service-08.jpg" alt=""> Building Construction Services
													</a>
												</td>
												<td>Burr Ridge, Illinois</td>
												<td>Construction</td>
												<td>$75</td>
												<td>6 Sep 2020</td>
												<td>
													<div class="status-toggle">
														<input id="service_8" class="check" type="checkbox" checked>
														<label for="service_8" class="checktoggle">checkbox</label>
													</div>
												</td>
												<td>
													<a href="service-details" class="btn btn-sm bg-info-light">
														<i class="far fa-eye mr-1"></i> View
													</a>
												</td>
											</tr>
											<tr>
												<td>9</td>
												<td>
													<a href="service-details">
														<img class="rounded service-img mr-1" src="../assets_admin/img/services/service-09.jpg" alt=""> Commercial Painting Services
													</a>
												</td>
												<td>Huntsville, Alabama</td>
												<td>Painting</td>
												<td>$500</td>
												<td>5 Sep 2020</td>
												<td>
													<div class="status-toggle">
														<input id="service_9" class="check" type="checkbox" checked>
														<label for="service_9" class="checktoggle">checkbox</label>
													</div>
												</td>
												<td>
													<a href="service-details" class="btn btn-sm bg-info-light">
														<i class="far fa-eye mr-1"></i> View
													</a>
												</td>
											</tr>
											<tr>
												<td>10</td>
												<td>
													<a href="service-details">
														<img class="rounded service-img mr-1" src="../assets_admin/img/services/service-10.jpg" alt=""> Plumbing Services
													</a>
												</td>
												<td>Richmond, Virginia</td>
												<td>Plumbing</td>
												<td>$150</td>
												<td>4 Sep 2020</td>
												<td>
													<div class="status-toggle">
														<input id="service_10" class="check" type="checkbox" checked>
														<label for="service_10" class="checktoggle">checkbox</label>
													</div>
												</td>
												<td>
													<a href="service-details" class="btn btn-sm bg-info-light">
														<i class="far fa-eye mr-1"></i> View
													</a>
												</td>
											</tr>
											<tr>
												<td>11</td>
												<td>
													<a href="service-details">
														<img class="rounded service-img mr-1" src="../assets_admin/img/services/service-11.jpg" alt=""> Wooden Carpentry Work
													</a>
												</td>
												<td>Columbus, Alabama</td>
												<td>Carpentry</td>
												<td>$32</td>
												<td>3 Sep 2020</td>
												<td>
													<div class="status-toggle">
														<input id="service_11" class="check" type="checkbox" checked>
														<label for="service_11" class="checktoggle">checkbox</label>
													</div>
												</td>
												<td>
													<a href="service-details" class="btn btn-sm bg-info-light">
														<i class="far fa-eye mr-1"></i> View
													</a>
												</td>
											</tr>
											<tr>
												<td>12</td>
												<td>
													<a href="service-details">
														<img class="rounded service-img mr-1" src="../assets_admin/img/services/service-12.jpg" alt=""> Air Conditioner Service
													</a>
												</td>
												<td>Vancouver, Washington</td>
												<td>Appliance</td>
												<td>$54</td>
												<td>2 Sep 2020</td>
												<td>
													<div class="status-toggle">
														<input id="service_12" class="check" type="checkbox" checked>
														<label for="service_12" class="checktoggle">checkbox</label>
													</div>
												</td>
												<td>
													<a href="service-details" class="btn btn-sm bg-info-light">
														<i class="far fa-eye mr-1"></i> View
													</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<!-- /Main Wrapper -->
@endsection
	  