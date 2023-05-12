<?php $page="provider-payment";?>
@extends('layout.mainlayout')
@section('content')		
<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-4 theiaStickySidebar">
						<div class="mb-4">
							<div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
								<img alt="profile image" src="assets/img/provider/provider-01.jpg" class="avatar-lg rounded-circle">
								<div class="ml-sm-3 ml-md-0 ml-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
									<h6 class="mb-0">Thomas Herzberg</h6>
									<p class="text-muted mb-0">Member Since Apr 2020</p>
								</div>
							</div>
						</div>
						<div class="widget settings-menu">
							<ul>
								<li class="nav-item">
									<a href="provider-dashboard" class="nav-link">
										<i class="fas fa-chart-line"></i> <span>Dashboard</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="my-services" class="nav-link">
										<i class="far fa-address-book"></i> <span>My Services</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="provider-bookings" class="nav-link">
										<i class="far fa-calendar-check"></i> <span>Booking List</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="provider-settings" class="nav-link">
										<i class="far fa-user"></i> <span>Profile Settings</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="provider-wallet" class="nav-link">
										<i class="far fa-money-bill-alt"></i> <span>Wallet</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="provider-subscription" class="nav-link">
										<i class="far fa-calendar-alt"></i> <span>Subscription</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="provider-availability" class="nav-link">
										<i class="far fa-clock"></i> <span>Availability</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="provider-reviews" class="nav-link">
										<i class="far fa-star"></i> <span>Reviews</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="provider-payment" class="nav-link active">
										<i class="fas fa-hashtag"></i> <span>Payment</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-9 col-md-8">
						<h4 class="widget-title">Payment History</h4>
						<div class="card transaction-table mb-0">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table mb-0">
										<thead>
											<tr>
												<th>Service</th>
												<th>Customer</th>
												<th>Date</th>
												<th>Amount</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<a href="javascript:void(0);">
														<img src="assets/img/services/service-01.jpg" class="pro-avatar" alt=""> Toughened Glass Fitting Services
													</a>
												</td>
												<td>
													<img class="avatar-xs rounded-circle" src="assets/img/customer/user-01.jpg" alt=""> Jeffrey Akridge
												</td>
												<td>23 Jul 2020 00:00</td>
												<td><strong>$25</strong></td>
												<td>
													<span class="badge bg-danger-light">User Rejected</span>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:void(0);">
														<img src="assets/img/services/service-02.jpg" class="pro-avatar" alt=""> Car Repair Services
													</a>
												</td>
												<td>
													<img class="avatar-xs rounded-circle" src="assets/img/customer/user-02.jpg" alt=""> Nancy Olson
												</td>
												<td>17 Jul 2020 00:00</td>
												<td><strong>$50</strong></td>
												<td>
													<span class="badge bg-success-light">Payment Completed</span>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:void(0);">
														<img src="assets/img/services/service-03.jpg" class="pro-avatar" alt=""> Electric Panel Repairing Service
													</a>
												</td>
												<td>
													<img class="avatar-xs rounded-circle" src="assets/img/customer/user-03.jpg" alt=""> Ramona Kingsley
												</td>
												<td>16 Jul 2020 00:00</td>
												<td><strong>$45</strong></td>
												<td>
													<span class="badge bg-danger-light">Provider Rejected</span>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:void(0);">
														<img src="assets/img/services/service-04.jpg" class="pro-avatar" alt=""> Steam Car Wash
													</a>
												</td>
												<td>
													<img class="avatar-xs rounded-circle" src="assets/img/customer/user-04.jpg" alt=""> Ricardo Lung
												</td>
												<td>15 Jul 2020 00:00</td>
												<td><strong>$14</strong></td>
												<td>
													<span class="badge bg-danger-light">User Rejected</span>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:void(0);">
														<img src="assets/img/services/service-05.jpg" class="pro-avatar" alt=""> House Cleaning Services
													</a>
												</td>
												<td>
													<img class="avatar-xs rounded-circle" src="assets/img/customer/user-05.jpg" alt=""> Annette Silva
												</td>
												<td>15 Jul 2020 00:00</td>
												<td><strong>$100</strong></td>
												<td>
													<span class="badge bg-danger-light">Provider Rejected</span>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:void(0);">
														<img src="assets/img/services/service-06.jpg" class="pro-avatar" alt=""> Computer & Server AMC Service
													</a>
												</td>
												<td>
													<img class="avatar-xs rounded-circle" src="assets/img/customer/user-06.jpg" alt=""> Stephen Wilson
												</td>
												<td>16 Jul 2020 00:00</td>
												<td><strong>$80</strong></td>
												<td>
													<span class="badge bg-danger-light">Provider Rejected</span>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:void(0);">
														<img src="assets/img/services/service-07.jpg" class="pro-avatar" alt=""> Interior Designing
													</a>
												</td>
												<td>
													<img class="avatar-xs rounded-circle" src="assets/img/customer/user-07.jpg" alt=""> Ryan Rodriguez
												</td>
												<td>16 Jul 2020 00:00</td>
												<td><strong>$5</strong></td>
												<td>
													<span class="badge bg-danger-light">Provider Rejected</span>
												</td>
											</tr>
											<tr>
												<td>
													<a href="javascript:void(0);">
														<img src="assets/img/services/service-08.jpg" class="pro-avatar" alt=""> Building Construction Services
													</a>
												</td>
												<td>
													<img class="avatar-xs rounded-circle" src="assets/img/customer/user-08.jpg" alt=""> Lucile Devera
												</td>
												<td>14 Jul 2020 00:00</td>
												<td><strong>$75</strong></td>
												<td>
													<span class="badge bg-danger-light">Provider Rejected</span>
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
@endsection 