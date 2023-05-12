
@extends('layout.mainlayout_admin')
@section('content')		
<div class="page-wrapper">
			<div class="content container-fluid">
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Service Providers</h3>
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
						<form>
							<div class="row filter-row">
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Provider</label>
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
				
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center mb-0 datatable">
										<thead>
											<tr>
												<th>#</th>
												<th>Provider Name</th>
												<th>Contact No</th>
												<th>Email</th>
												<th>Reg Date</th>
												<th>Subscription</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-01.jpg">
														</a>
														<a href="#">Thomas Herzberg</a>
													</h2>
												</td>
												<td>832-212-0082</td>
												<td>thomasherzberg@example.com</td>
												<td>12 Sep 2020</td>
												<td>Enterprice</td>
											</tr>
											<tr>
												<td>2</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-02.jpg">
														</a>
														<a href="#">Matthew Garcia</a>
													</h2>
												</td>
												<td>918-454-4561</td>
												<td>matthewgarcia@example.com</td>
												<td>7 Sep 2020</td>
												<td>Standard</td>
											</tr>
											<tr>
												<td>3</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-03.jpg">
														</a>
														<a href="#">Yolanda Potter</a>
													</h2>
												</td>
												<td>360-281-3619</td>
												<td>yolandapotter@example.com</td>
												<td>20 Aug 2020</td>
												<td>Basic</td>
											</tr>
											<tr>
												<td>4</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-04.jpg">
														</a>
														<a href="#">Ricardo Flemings</a>
													</h2>
												</td>
												<td>631-374-3243</td>
												<td>ricardoflemings@example.com</td>
												<td>15 Aug 2020</td>
												<td>Standard</td>
											</tr>
											<tr>
												<td>5</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-05.jpg">
														</a>
														<a href="#">Maritza Wasson</a>
													</h2>
												</td>
												<td>979-844-9766</td>
												<td>maritzawasson@example.com</td>
												<td>1 Aug 2020</td>
												<td>Basic</td>
											</tr>
											<tr>
												<td>6</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-06.jpg">
														</a>
														<a href="#">Marya Ruiz</a>
													</h2>
												</td>
												<td>814-537-9709</td>
												<td>maryaruiz@example.com</td>
												<td>24 Jul 2020</td>
												<td>Enterprice</td>
											</tr>
											<tr>
												<td>7</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-07.jpg">
														</a>
														<a href="#">Richard Hughes</a>
													</h2>
												</td>
												<td>937-846-6789</td>
												<td>richardhughes@example.com</td>
												<td>21 Jul 2020</td>
												<td>Standard</td>
											</tr>
											<tr>
												<td>8</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-08.jpg">
														</a>
														<a href="#">Nina Wilson</a>
													</h2>
												</td>
												<td>419-523-6835</td>
												<td>ninawilson@example.com</td>
												<td>7 Jul 2020</td>
												<td>Basic</td>
											</tr>
											<tr>
												<td>9</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-09.jpg">
														</a>
														<a href="#">David Morrison</a>
													</h2>
												</td>
												<td>703-214-9351</td>
												<td>davidmorrison@example.com</td>
												<td>30 Jun 2020</td>
												<td>Enterprice</td>
											</tr>
											<tr>
												<td>10</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" alt="" src="../assets_admin/img/provider/provider-10.jpg">
														</a>
														<a href="#">Linda Brooks</a>
													</h2>
												</td>
												<td>512-243-2686</td>
												<td>lindabrooks@example.com</td>
												<td>28 Jun 2020</td>
												<td>Basic</td>
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
	  