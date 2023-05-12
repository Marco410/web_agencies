
@extends('layout.mainlayout_admin')
@section('content')		
<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Wallet</h3>
						</div>
						<div class="col-auto text-right">
							<a class="btn btn-white filter-btn" href="javascript: void(0);" id="filter_search">
								<i class="fas fa-filter"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<!-- Search Filter -->
				<div class="card filter-card" id="filter_inputs">
					<div class="card-body pb-0">
						<form>
							<div class="row filter-row"> 
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Name</label>
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
						</form>
					</div>
				</div>
				<!-- /Search Filter -->
				
				<ul class="nav nav-tabs menu-tabs">
					<li class="nav-item">
						<a class="nav-link" href="wallet">Wallet Report</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="wallet-history">Wallet History</a>
					</li>
				</ul>
				
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
												<th>Name</th>
												<th>Current Amt</th>
												<th>Credit Amt</th>
												<th>Debit Amt</th>
												<th>Fee Amt</th>
												<th>Available Amt</th>
												<th>Reason</th>
												<th>Pay Type</th>
												<th>Role</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>22 Jul 2020</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/customer/user-01.jpg">
														</a>
														<a href="javascript:void(0);">Jeffrey Akridge</a>
													</h2>
												</td>
												<td>$1061</td>
												<td>-</td>
												<td>$14</td>
												<td>-</td>
												<td>$1047</td>
												<td>Booked a Service</td>
												<td><span class="btn btn-sm btn-danger">Debit</span>
												</td>
												<td>
													<label class="badge badge-primary">User</label>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>22 Jul 2020</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/customer/user-02.jpg">
														</a>
														<a href="javascript:void(0);">Nancy Olson</a>
													</h2>
												</td>
												<td>$1111</td>
												<td>-</td>
												<td>$50</td>
												<td>-</td>
												<td>$1061</td>
												<td>Booked a Service</td>
												<td><span class="btn btn-sm btn-danger">Debit</span>
												</td>
												<td>
													<label class="badge badge-primary">User</label>
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>22 Jul 2020</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/customer/user-03.jpg">
														</a>
														<a href="javascript:void(0);">Ramona Kingsley</a>
													</h2>
												</td>
												<td>$1211</td>
												<td>-</td>
												<td>$100</td>
												<td>-</td>
												<td>$1111</td>
												<td>Booked a Service</td>
												<td><span class="btn btn-sm btn-danger">Debit</span>
												</td>
												<td>
													<label class="badge badge-primary">User</label>
												</td>
											</tr>
											<tr>
												<td>4</td>
												<td>22 Jul 2020</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/customer/user-04.jpg">
														</a>
														<a href="javascript:void(0);">Ricardo Lung</a>
													</h2>
												</td>
												<td>$1461</td>
												<td>-</td>
												<td>$250</td>
												<td>-</td>
												<td>$1211</td>
												<td>Booked a Service</td>
												<td><span class="btn btn-sm btn-danger">Debit</span>
												</td>
												<td>
													<label class="badge badge-primary">User</label>
												</td>
											</tr>
											<tr>
												<td>5</td>
												<td>22 Jul 2020</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/customer/user-05.jpg">
														</a>
														<a href="javascript:void(0);">Annette Silva</a>
													</h2>
												</td>
												<td>$1711</td>
												<td>-</td>
												<td>$250</td>
												<td>-</td>
												<td>$1461</td>
												<td>Booked a Service</td>
												<td><span class="btn btn-sm btn-danger">Debit</span>
												</td>
												<td>
													<label class="badge badge-primary">User</label>
												</td>
											</tr>
											<tr>
												<td>6</td>
												<td>22 Jul 2020</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/customer/user-06.jpg">
														</a>
														<a href="javascript:void(0);">Stephen Wilson</a>
													</h2>
												</td>
												<td>$2211</td>
												<td>-</td>
												<td>$500</td>
												<td>-</td>
												<td>$1711</td>
												<td>Booked a Service</td>
												<td><span class="btn btn-sm btn-danger">Debit</span>
												</td>
												<td>
													<label class="badge badge-primary">User</label>
												</td>
											</tr>
											<tr>
												<td>7</td>
												<td>22 Jul 2020</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/customer/user-07.jpg">
														</a>
														<a href="javascript:void(0);">Ryan Rodriguez</a>
													</h2>
												</td>
												<td>$2711</td>
												<td>-</td>
												<td>$500</td>
												<td>-</td>
												<td>2211</td>
												<td>Booked a Service</td>
												<td><span class="btn btn-sm btn-danger">Debit</span>
												</td>
												<td>
													<label class="badge badge-primary">User</label>
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
	  