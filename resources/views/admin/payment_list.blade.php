
<?php $page="payment_list";?>
@extends('layout.mainlayout_admin')
@section('content')		
<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Payments</h3>
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
				<div class="card filter-card" id="filter_inputs">
					<div class="card-body pb-0">
						<form action="#"> 
							<div class="row filter-row">
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Provider</label>
										<select class="form-control select">
											<option>Select Provider</option>
											<option>Thomas Herzberg</option>
											<option>Matthew Garcia</option>
											<option>Yolanda Potter</option>
											<option>Ricardo Flemings</option>
											<option>Maritza Wasson</option>
										</select>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Status</label>
										<select class="form-control select">
											<option>Select Status</option>
											<option>Pending</option>
											<option>Inprogress</option>
											<option>Completed (Provider)</option>
											<option>Accepted</option>
											<option>Rejected</option>
											<option>Cancelled (Provider)</option>
										</select>
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
						</form>
					</div>
				</div>
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
												<th>Date</th>
												<th>User</th>
												<th>Provider</th>
												<th>Service</th>
												<th>Amount</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>15 Sep 2020</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/customer/user-02.jpg">
														</a>
														<a href="javascript:void(0);">Nancy Olson</a>
													</span>
												</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-02.jpg">
														</a>
														<a href="javascript:void(0);">Matthew Garcia</a>
													</span>
												</td>
												<td>Car Repair Services</td>
												<td>$50</td>
												<td>
													<label class="badge badge-dark">Pending</label>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>14 Sep 2020</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/customer/user-03.jpg">
														</a>
														<a href="javascript:void(0);">Ramona Kingsley</a>
													</span>
												</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-03.jpg">
														</a>
														<a href="javascript:void(0);">Yolanda Potter</a>
													</span>
												</td>
												<td>Electric Panel Repairing Service</td>
												<td>$45</td>
												<td>
													<label class="badge badge-dark">Pending</label>
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>13 Sep 2020</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/customer/user-04.jpg">
														</a>
														<a href="javascript:void(0);">Ricardo Lung</a>
													</span>
												</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-04.jpg">
														</a>
														<a href="javascript:void(0);">Ricardo Flemings</a>
													</span>
												</td>
												<td>Steam Car Wash</td>
												<td>$14</td>
												<td>
													<label class="badge badge-dark">Pending</label>
												</td>
											</tr>
											<tr>
												<td>4</td>
												<td>12 Sep 2020</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/customer/user-05.jpg">
														</a>
														<a href="javascript:void(0);">Annette Silva</a>
													</span>
												</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-05.jpg">
														</a>
														<a href="javascript:void(0);">Maritza Wasson</a>
													</span>
												</td>
												<td>House Cleaning Services</td>
												<td>$100</td>
												<td>
													<label class="badge badge-dark">Pending</label>
												</td>
											</tr>
											<tr>
												<td>5</td>
												<td>11 Sep 2020</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/customer/user-06.jpg">
														</a>
														<a href="javascript:void(0);">Stephen Wilson</a>
													</span>
												</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-06.jpg">
														</a>
														<a href="javascript:void(0);">Marya Ruiz</a>
													</span>
												</td>
												<td>Computer & Server AMC Service</td>
												<td>$80</td>
												<td>
													<label class="badge badge-info">Inprogress</label>
												</td>
											</tr>
											<tr>
												<td>6</td>
												<td>10 Sep 2020</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/customer/user-07.jpg">
														</a>
														<a href="javascript:void(0);">Ryan Rodriguez</a>
													</span>
												</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-07.jpg">
														</a>
														<a href="javascript:void(0);">Richard Hughes</a>
													</span>
												</td>
												<td>Interior Designing</td>
												<td>$5</td>
												<td>
													<label class="badge badge-dark">Pending</label>
												</td>
											</tr>
											<tr>
												<td>7</td>
												<td>9 Sep 2020</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/customer/user-08.jpg">
														</a>
														<a href="javascript:void(0);">Lucile Devera</a>
													</span>
												</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-08.jpg">
														</a>
														<a href="javascript:void(0);">Nina Wilson</a>
													</span>
												</td>
												<td>Building Construction Services</td>
												<td>$75</td>
												<td>
													<label class="badge badge-dark">Pending</label>
												</td>
											</tr>
											<tr>
												<td>8</td>
												<td>8 Sep 2020</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/customer/user-09.jpg">
														</a>
														<a href="javascript:void(0);">Roland Storey</a>
													</span>
												</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-09.jpg">
														</a>
														<a href="javascript:void(0);">David Morrison</a>
													</span>
												</td>
												<td>Commercial Painting Services</td>
												<td>$500</td>
												<td>
													<label class="badge badge-danger">Rejected by User</label>
												</td>
											</tr>
											<tr>
												<td>9</td>
												<td>7 Sep 2020</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/customer/user-10.jpg">
														</a>
														<a href="javascript:void(0);">Lindsey Parmley</a>
													</span>
												</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-10.jpg">
														</a>
														<a href="javascript:void(0);">Linda Brooks</a>
													</span>
												</td>
												<td>Plumbing Services</td>
												<td>$150</td>
												<td>
													<label class="badge badge-dark">Pending</label>
												</td>
											</tr>
											<tr>
												<td>10</td>
												<td>6 Sep 2020</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/customer/user-01.jpg">
														</a>
														<a href="javascript:void(0);">Jeffrey Akridge</a>
													</span>
												</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-01.jpg">
														</a>
														<a href="javascript:void(0);">Thomas Herzberg</a>
													</span>
												</td>
												<td>Toughened Glass Fitting Services</td>
												<td>$25</td>
												<td>
													<label class="badge badge-success">Complete Request to User</label>
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
	  