<?php $page="categories";?>
@extends('layout.mainlayout_admin')
@section('content')		
<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Categories</h3>
						</div>
						<div class="col-auto text-right">
							<a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search">
								<i class="fas fa-filter"></i>
							</a>
							<a href="add-category" class="btn btn-primary add-button ml-3">
								<i class="fas fa-plus"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<!-- Search Filter -->
				<div class="card filter-card" id="filter_inputs">
					<div class="card-body pb-0">
						<form action="#" method="post">
							<div class="row filter-row">
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Category</label>
										<select class="form-control select">
											<option>Select category</option>
											<option>Automobile</option>
											<option>Construction</option>
											<option>Interior</option>
											<option>Cleaning</option>
											<option>Electrical</option>
											<option>Carpentry</option>
											<option>Computer</option>
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
												<th>Category</th>
												<th>Date</th>
												<th class="text-right">Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>
													<img class="rounded service-img mr-1" src="../assets_admin/img/category/category-01.jpg" alt="Category Image">Computer</td>
												<td>11 Sep 2020</td>
												<td class="text-right">
													<a href="edit-category" class="btn btn-sm bg-success-light mr-2">	<i class="far fa-edit mr-1"></i> Edit</a>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>
													<img class="rounded service-img mr-1" src="../assets_admin/img/category/category-02.jpg" alt="Category Image">Interior</td>
												<td>10 Sep 2020</td>
												<td class="text-right">
													<a href="edit-category" class="btn btn-sm bg-success-light mr-2">	<i class="far fa-edit mr-1"></i> Edit</a>
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>
													<img class="rounded service-img mr-1" src="../assets_admin/img/category/category-03.jpg" alt="Category Image">Car Wash</td>
												<td>9 Sep 2020</td>
												<td class="text-right">
													<a href="edit-category" class="btn btn-sm bg-success-light mr-2">	<i class="far fa-edit mr-1"></i> Edit</a>
												</td>
											</tr>
											<tr>
												<td>4</td>
												<td>
													<img class="rounded service-img mr-1" src="../assets_admin/img/category/category-04.jpg" alt="Category Image">Cleaning</td>
												<td>8 Sep 2020</td>
												<td class="text-right">
													<a href="edit-category" class="btn btn-sm bg-success-light mr-2">	<i class="far fa-edit mr-1"></i> Edit</a>
												</td>
											</tr>
											<tr>
												<td>5</td>
												<td>
													<img class="rounded service-img mr-1" src="../assets_admin/img/category/category-05.jpg" alt="Category Image">Electrical</td>
												<td>7 Sep 2020</td>
												<td class="text-right">
													<a href="edit-category" class="btn btn-sm bg-success-light mr-2">	<i class="far fa-edit mr-1"></i> Edit</a>
												</td>
											</tr>
											<tr>
												<td>6</td>
												<td>
													<img class="rounded service-img mr-1" src="../assets_admin/img/category/category-06.jpg" alt="Category Image">Construction</td>
												<td>6 Sep 2020</td>
												<td class="text-right">
													<a href="edit-category" class="btn btn-sm bg-success-light mr-2">	<i class="far fa-edit mr-1"></i> Edit</a>
												</td>
											</tr>
											<tr>
												<td>7</td>
												<td>
													<img class="rounded service-img mr-1" src="../assets_admin/img/category/category-07.jpg" alt="Category Image">Plumbing</td>
												<td>5 Sep 2020</td>
												<td class="text-right">
													<a href="edit-category" class="btn btn-sm bg-success-light mr-2">	<i class="far fa-edit mr-1"></i> Edit</a>
												</td>
											</tr>
											<tr>
												<td>8</td>
												<td>
													<img class="rounded service-img mr-1" src="../assets_admin/img/category/category-08.jpg" alt="Category Image">Carpentry</td>
												<td>4 Sep 2020</td>
												<td class="text-right">
													<a href="edit-category" class="btn btn-sm bg-success-light mr-2">	<i class="far fa-edit mr-1"></i> Edit</a>
												</td>
											</tr>
											<tr>
												<td>9</td>
												<td>
													<img class="rounded service-img mr-1" src="../assets_admin/img/category/category-09.jpg" alt="Category Image">Appliance</td>
												<td>3 Sep 2020</td>
												<td class="text-right">
													<a href="edit-category" class="btn btn-sm bg-success-light mr-2">	<i class="far fa-edit mr-1"></i> Edit</a>
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
	  