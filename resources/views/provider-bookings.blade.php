<?php $page="provider-bookings";?>
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
									<a href="provider-bookings" class="nav-link active">
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
									<a href="provider-payment" class="nav-link">
										<i class="fas fa-hashtag"></i> <span>Payment</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-9 col-md-8">
						<div class="row align-items-center mb-4">
							<div class="col">
								<h4 class="widget-title mb-0">Booking List</h4>
							</div>
							<div class="col-auto">
								<div class="sort-by">
									<select class="form-control-sm custom-select searchFilter" id="status">
										<option>All</option>
										<option>Pending</option>
										<option>Inprogress</option>
										<option>Complete Request</option>
										<option>Rejected</option>
										<option>Cancelled</option>
										<option>Completed</option>
									</select>
								</div>
							</div>
						</div>
						<div id="dataList">
							<div class="bookings">
								<div class="booking-list">
									<div class="booking-widget">
										<a href="service-details" class="booking-img">
											<img src="assets/img/services/service-02.jpg" alt="User Image">
										</a>
										<div class="booking-det-info">
											<h3>
												<a href="service-details">Car Repair Services</a>
											</h3>
											<ul class="booking-details">
												<li>
													<span>Booking Date</span> 23 Jul 2020 <span class="badge badge-pill badge-prof bg-success">Complete Request sent to User</span>
												</li>
												<li><span>Booking time</span> 13:00:00 - 14:00:00</li>
												<li><span>Amount</span> $500</li>
												<li><span>Location</span> 223 Jehovah Drive Roanoke</li>
												<li><span>Phone</span> 410-242-3850</li>
												<li>
													<span>User</span>
													<div class="avatar avatar-xs mr-1">
														<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/customer/user-01.jpg">
													</div>
													Jeffrey Akridge
												</li>
											</ul>
										</div>
									</div>
									<div class="booking-action"></div>
								</div>
							</div>
							
							<div class="bookings">
								<div class="booking-list">
									<div class="booking-widget">
										<a href="service-details" class="booking-img">
											<img src="assets/img/services/service-03.jpg" alt="User Image">
										</a>
										<div class="booking-det-info">
											<h3>
												<a href="service-details">Electric Panel Repairing Service</a>
											</h3>
											<ul class="booking-details">
												<li>
													<span>Booking Date</span> 21 Jul 2020 <span class="badge badge-pill badge-prof bg-primary">Inprogress</span>
												</li>
												<li><span>Booking time</span> 17:00:00 - 18:00:00</li>
												<li><span>Amount</span> $500</li>
												<li><span>Location</span> 3281 West Fork Street Great Falls</li>
												<li><span>Phone</span> 410-242-3850</li>
												<li>
													<span>User</span>
													<div class="avatar avatar-xs mr-1">
														<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/customer/user-02.jpg">
													</div>
													Nancy Olson
												</li>
											</ul>
										</div>
									</div>
									<div class="booking-action">
										<a href="user-chat" class="btn btn-sm bg-info-light"><i class="far fa-eye"></i> Chat</a>
										<a href="javascript:;" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#myCancel"><i class="fas fa-times"></i> Cancel the Service</a>
										<a href="javascript:;" class="btn btn-sm bg-success-light"><i class="fas fa-check"></i> Complete Request to user</a>
									</div>
								</div>
							</div>
							
							<div class="bookings">
								<div class="booking-list">
									<div class="booking-widget">
										<a href="service-details" class="booking-img">
											<img src="assets/img/services/service-04.jpg" alt="User Image">
										</a>
										<div class="booking-det-info">
											<h3>
												<a href="service-details">Steam Car Wash</a>
											</h3>
											<ul class="booking-details">
												<li>
													<span>Booking Date</span> 21 Jul 2020 <span class="badge badge-pill badge-prof bg-warning">Pending</span>
												</li>
												<li><span>Booking time</span> 13:00:00 - 14:00:00</li>
												<li><span>Amount</span> $500</li>
												<li><span>Location</span> 596 Walton Street Ogden</li>
												<li><span>Phone</span> 410-242-3850</li>
												<li>
													<span>User</span>
													<div class="avatar avatar-xs mr-1">
														<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/customer/user-03.jpg">
													</div>
													Ramona Kingsley
												</li>
											</ul>
										</div>
									</div>
									<div class="booking-action">
										<a href="javascript:;" class="btn btn-sm bg-success-light"><i class="fas fa-check"></i> User Request Accept</a>
										<a href="javascript:;" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#myCancel">	<i class="fas fa-times"></i> Cancel the Service</a>
									</div>
								</div>
							</div>
							
							<div class="bookings">
								<div class="booking-list">
									<div class="booking-widget">
										<a href="service-details" class="booking-img">
											<img src="assets/img/services/service-05.jpg" alt="User Image">
										</a>
										<div class="booking-det-info">
											<h3>
												<a href="service-details">House Cleaning Services</a>
											</h3>
											<ul class="booking-details">
												<li>
													<span>Booking Date</span> 23 Jul 2020 <span class="badge badge-pill badge-prof bg-danger">Rejected by User</span>
												</li>
												<li><span>Booking time</span> 12:00:00 - 13:00:00</li>
												<li><span>Amount</span> $500</li>
												<li><span>Location</span> 4371 Maloy Court Rush Center</li>
												<li><span>Phone</span> 410-242-3850</li>
												<li>
													<span>User</span>
													<div class="avatar avatar-xs mr-1">
														<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/customer/user-04.jpg">
													</div>
													Ricardo Lung
												</li>
											</ul>
										</div>
									</div>
									<div class="booking-action">
										<button type="button" data-id="542" class="btn btn-sm bg-default-light"><i class="fas fa-info-circle"></i> Reason</button>
									</div>
								</div>
							</div>
							<div class="bookings">
								<div class="booking-list">
									<div class="booking-widget">
										<a href="service-details" class="booking-img">
											<img src="assets/img/services/service-06.jpg" alt="User Image">
										</a>
										<div class="booking-det-info">
											<h3>
												<a href="service-details">Computer & Server AMC Service</a>
											</h3>
											<ul class="booking-details">
												<li>
													<span>Booking Date</span> 22 Jul 2020 <span class="badge badge-pill badge-prof bg-warning">Pending</span>
												</li>
												<li><span>Booking time</span> 12:00:00 - 13:00:00</li>
												<li><span>Amount</span> $4</li>
												<li><span>Location</span> 1346 Simpson Street Davenport</li>
												<li><span>Phone</span> 410-242-3850</li>
												<li>
													<span>User</span>
													<div class="avatar avatar-xs mr-1">
														<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/customer/user-05.jpg">
													</div>
													Annette Silva
												</li>
											</ul>
										</div>
									</div>
									<div class="booking-action">
										<a href="javascript:;" class="btn btn-sm bg-success-light"><i class="fas fa-check"></i> User Request Accept</a>
										<a href="javascript:;" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#myCancel"><i class="fas fa-times"></i> Cancel the Service</a>
									</div>
								</div>
							</div>
							
							<div class="bookings">
								<div class="booking-list">
									<div class="booking-widget">
										<a href="service-details" class="booking-img">
											<img src="assets/img/services/service-07.jpg" alt="User Image">
										</a>
										<div class="booking-det-info">
											<h3>
												<a href="service-details">Interior Designing</a>
											</h3>
											<ul class="booking-details">
												<li>
													<span>Booking Date</span> 22 Jul 2020 <span class="badge badge-pill badge-prof bg-warning">Pending</span>
												</li>
												<li><span>Booking time</span> 11:00:00 - 12:00:00</li>
												<li><span>Amount</span> $100</li>
												<li><span>Location</span> 171 Jadewood Farms Newark</li>
												<li><span>Phone</span> 412-355-7471</li>
												<li>
													<span>User</span>
													<div class="avatar avatar-xs mr-1">
														<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/customer/user-06.jpg">
													</div>
													Stephen Wilson
												</li>
											</ul>
										</div>
									</div>
									<div class="booking-action">
										<a href="javascript:;" class="btn btn-sm bg-success-light"><i class="fas fa-check"></i> User Request Accept</a>
										<a href="javascript:;" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#myCancel"><i class="fas fa-times"></i> Cancel the Service</a>
									</div>
								</div>
							</div> 
							<div class="pagination">
								<ul>
									<li class="active">
										<a href="javascript:void(0);">1</a>
									</li>
									<li>
										<a href="javascript:void(0);">2</a>
									</li>
									<li>
										<a href="javascript:void(0);">3</a>
									</li>
									<li>
										<a href="javascript:void(0);">4</a>
									</li>
									<li class="arrow">
										<a href="javascript:void(0);"><i class="fas fa-angle-right"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>﻿
</div>
@endsection