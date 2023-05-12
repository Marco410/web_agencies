<?php $page="provider-dashboard";?>
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
									<a href="provider-dashboard" class="nav-link active">
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
									<a href="provider-payment" class="nav-link">
										<i class="fas fa-hashtag"></i> <span>Payment</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-9 col-md-8">
						<h4 class="widget-title">Dashboard</h4>
						<div class="row">
							<div class="col-lg-4">
								<a href="provider-bookings" class="dash-widget dash-bg-1">
									<span class="dash-widget-icon">245</span>
									<div class="dash-widget-info">
										<span>Bookings</span>
									</div>
								</a>
							</div>
							<div class="col-lg-4">
								<a href="my-services" class="dash-widget dash-bg-2">
									<span class="dash-widget-icon">66</span>
									<div class="dash-widget-info">
										<span>Services</span>
									</div>
								</a>
							</div>
							<div class="col-lg-4">
								<a href="notifications" class="dash-widget dash-bg-3">
									<span class="dash-widget-icon">8</span>
									<div class="dash-widget-info">
										<span>Notification</span>
									</div>
								</a>
							</div>
						</div>
						<div class="card mb-0">
							<div class="row no-gutters">
								<div class="col-lg-8">
									<div class="card-body">
										<h6 class="title">Plan Details</h6>
										<div class="sp-plan-name">
											<h6 class="title">
												Gold <span class="badge badge-success badge-pill">Active</span>
											</h6>
											<p>Subscription ID: <span class="text-base">100394949</span></p>
										</div>
										<ul class="row">
											<li class="col-6 col-lg-6">
												<p>Started On 15 Jul, 2020</p>
											</li>
											<li class="col-6 col-lg-6">
												<p>Price $1502.00</p>
											</li>
										</ul>
										<h6 class="title">Last Payment</h6>
										<ul class="row">
											<li class="col-sm-6">
												<p>Paid at 15 Jul 2020</p>
											</li>
											<li class="col-sm-6">
												<p><span class="text-success">Paid</span>  <span class="amount">$1502.00</span>
												</p>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="sp-plan-action card-body">
										<div class="mb-2">
											<a href="provider-subscription" class="btn btn-primary"><span>Change Plan</span></a>
										</div>
										<div class="next-billing">
											<p>Next Billing on <span>15 Jul, 2021</span></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>﻿
</div>
@endsection