
@extends('layout.mainlayout_admin')
@section('content')		
<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Users</h3>
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
				
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center mb-0 datatable">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Email</th>
												<th>Contact No</th>
												<th>Signup Date</th>
												<th>Last Login</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" src="../assets_admin/img/customer/user-01.jpg" alt="User Image">
														</a>
														<a href="#">Jeffrey Akridge</a>
													</h2>
												</td>
												<td>jeffreyakridge@example.com</td>
												<td>850-847-0459</td>
												<td>10 Sep 2020</td>
												<td>12 Sep 2020</td>
											</tr>
											<tr>
												<td>2</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" src="../assets_admin/img/customer/user-02.jpg" alt="User Image">
														</a>
														<a href="#">Nancy Olson</a>
													</h2>
												</td>
												<td>nancyolson@example.com</td>
												<td>901-690-8272</td>
												<td>8 Sep 2020</td>
												<td>11 Sep 2020</td>
											</tr>
											<tr>
												<td>3</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" src="../assets_admin/img/customer/user-03.jpg" alt="User Image">
														</a>
														<a href="#">Ramona Kingsley</a>
													</h2>
												</td>
												<td>ramonakingsley@example.com</td>
												<td>608-712-2413</td>
												<td>7 Sep 2020</td>
												<td>7 Sep 2020</td>
											</tr>
											<tr>
												<td>4</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" src="../assets_admin/img/customer/user-04.jpg" alt="User Image">
														</a>
														<a href="#">Ricardo Lung</a>
													</h2>
												</td>
												<td>ricardolung@example.com</td>
												<td>714-564-6443</td>
												<td>3 Sep 2020</td>
												<td>5 Sep 2020</td>
											</tr>
											<tr>
												<td>5</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" src="../assets_admin/img/customer/user-05.jpg" alt="User Image">
														</a>
														<a href="#">Annette Silva</a>
													</h2>
												</td>
												<td>annettesilva@example.com</td>
												<td>517-697-4628</td>
												<td>31 Aug 2020</td>
												<td>4 Sep 2020</td>
											</tr>
											<tr>
												<td>6</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" src="../assets_admin/img/customer/user-06.jpg" alt="User Image">
														</a>
														<a href="#">Stephen Wilson</a>
													</h2>
												</td>
												<td>stephenwilson@example.com</td>
												<td>903-367-8263</td>
												<td>19 Aug 2020</td>
												<td>29 Aug 2020</td>
											</tr>
											<tr>
												<td>7</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" src="../assets_admin/img/customer/user-07.jpg" alt="User Image">
														</a>
														<a href="#">Ryan Rodriguez</a>
													</h2>
												</td>
												<td>ryanrodriguez@example.com</td>
												<td>912-748-9361</td>
												<td>15 Aug 2020</td>
												<td>13 Sep 2020</td>
											</tr>
											<tr>
												<td>8</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" src="../assets_admin/img/customer/user-08.jpg" alt="User Image">
														</a>
														<a href="#">Lucile Devera</a>
													</h2>
												</td>
												<td>luciledevera@example.com</td>
												<td>817-913-0462</td>
												<td>6 Aug 2020</td>
												<td>13 Aug 2020</td>
											</tr>
											<tr>
												<td>9</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" src="../assets_admin/img/customer/user-09.jpg" alt="User Image">
														</a>
														<a href="#">Roland Storey</a>
													</h2>
												</td>
												<td>rolandstorey@example.com</td>
												<td>201-929-0473</td>
												<td>27 Jun 2020</td>
												<td>9 Sep 2020</td>
											</tr>
											<tr>
												<td>10</td>
												<td>
													<h2 class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
															<img class="avatar-img rounded-circle" src="../assets_admin/img/customer/user-10.jpg" alt="User Image">
														</a>
														<a href="#">Lindsey Parmley</a>
													</h2>
												</td>
												<td>lindseyparmley@example.com</td>
												<td>740-485-5513</td>
												<td>9 Jun 2020</td>
												<td>5 Sep 2020</td>
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
	  