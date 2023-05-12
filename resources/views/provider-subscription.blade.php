<?php $page="provider-subscription";?>
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
									<a href="provider-subscription" class="nav-link active">
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
						<div class="row pricing-box">
							<div class="col-xl-4 col-md-6 ">
								<div class="card">
									<div class="card-body">
										<div class="pricing-header">
											<h2>Basic</h2>
											<p>Monthly Price</p>
										</div>
										<div class="pricing-card-price">
											<h3 class="heading2 price">$0.00</h3>
											<p>Duration: <span>3 Months</span></p>
										</div>
										<ul class="pricing-options">
											<li><i class="far fa-check-circle"></i> One listing submission</li>
											<li><i class="far fa-check-circle"></i> 90 days expiration</li>
										</ul>
										<a href="javascript:void(0);" class="btn btn-primary btn-block">Select Plan</a>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-md-6 ">
								<div class="card">
									<div class="card-body">
										<div class="pricing-header">
											<h2>Standard</h2>
											<p>Monthly Price</p>
										</div>
										<div class="pricing-card-price">
											<h3 class="heading2 price">$50.00</h3>
											<p>Duration: <span>6 Months</span></p>
										</div>
										<ul class="pricing-options">
											<li><i class="far fa-check-circle"></i> One listing submission</li>
											<li><i class="far fa-check-circle"></i> 180 days expiration</li>
										</ul>
										<a href="javascript:void(0);" class="btn btn-primary btn-block">Select Plan</a>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-md-6 pricing-selected">
								<div class="card">
									<div class="card-body">
										<div class="pricing-header">
											<h2>Enterprice</h2>
											<p>Monthly Price</p>
										</div>
										<div class="pricing-card-price">
											<h3 class="heading2 price">$1200.00</h3>
											<p>Duration: <span>12 Months</span></p>
										</div>
										<ul class="pricing-options">
											<li><i class="far fa-check-circle"></i> One listing submission</li>
											<li><i class="far fa-check-circle"></i> 360 days expiration</li>
										</ul>
										<a href="javascript:void(0);" class="btn btn-primary btn-block">Subscribed</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="plan-det">
									<h6 class="title">Plan Details</h6>
									<ul class="row">
										<li class="col-sm-4">
											<p><span class="text-muted">Started On</span> 15 Jul 2020</p>
										</li>
										<li class="col-sm-4">
											<p><span class="text-muted">Price</span> $1502.00</p>
										</li>
										<li class="col-sm-4">
											<p><span class="text-muted">Expired On</span> 15 Jul 2021</p>
										</li>
									</ul>
									<h6 class="title">Last Payment</h6>
									<ul class="row">
										<li class="col-sm-4">
											<p>Paid at 15 Jul 2020</p>
										</li>
										<li class="col-sm-4">
											<p><span class="amount">$1502.00 </span>  <span class="badge bg-success-light">Paid</span></p>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<h5 class="mb-4">Subscribed Details</h5>	
						<div class="card transaction-table mb-0">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-center mb-0 no-footer">
										<thead>
											<tr>
												<th>Plan</th>
												<th>Start Date</th>
												<th>End Date</th>
												<th>Amount</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Basic</td>
												<td>03-04-2020</td>
												<td>02-07-2020</td>
												<td>0.00</td>
												<td><span class="badge bg-success-light">Paid</span></td>
											</tr>
											<tr>
												<td>Standard</td>
												<td>04-04-2020</td>
												<td>01-10-2020</td>
												<td>50.00</td>
												<td><span class="badge bg-success-light">Paid</span></td>
											</tr>
											<tr>
												<td>Enterprice</td>
												<td>28-05-2020</td>
												<td>28-05-2021</td>
												<td>1200.00</td>
												<td><span class="badge bg-success-light">Paid</span></td>
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
	  