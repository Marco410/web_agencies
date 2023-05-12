<?php $page="my-services";?>
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
									<a href="my-services" class="nav-link active">
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
						<h4 class="widget-title">My Services</h4>
						<ul class="nav nav-tabs menu-tabs">
							<li class="nav-item">
								<a class="nav-link" href="my-services">Active Services</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="my-services-inactive">Inactive Services</a>
							</li>
						</ul>
						<div class="row">
							<div class="col-lg-4 col-md-6 inactive-service">
								<div class="service-widget">
									<div class="service-img">
										<a href="service-details">
											<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-10.jpg">
										</a>
										<div class="item-info">
											<div class="service-user">
												<a href="javascript:void(0);">
													<img src="assets/img/provider/provider-01.jpg" alt="">
												</a>
												<span class="service-price">$150</span>
											</div>
											<div class="cate-list">
												<a class="bg-yellow" href="service-details">Plumbing</a>
											</div>
										</div>
									</div>
									<div class="service-content">
										<h3 class="title">
											<a href="service-details">Plumbing Services</a>
										</h3>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(3)</span>
										</div>
										<div class="user-info">
											<div class="service-action">
												<div class="row">
													<div class="col">
														<a href="javascript:void(0)" class="si-delete-inactive-service text-danger" data-id="149"><i class="far fa-trash-alt"></i> Delete</a>
													</div>
													<div class="col text-right">
														<a href="javascript:void(0)" class="si-delete-active-service text-success" data-id="149"><i class="fas fa-info-circle"></i> Active</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 inactive-service">
								<div class="service-widget">
									<div class="service-img">
										<a href="service-details">
											<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-11.jpg">
										</a>
										<div class="item-info">
											<div class="service-user">
												<a href="javascript:void(0);">
													<img src="assets/img/provider/provider-01.jpg" alt="">
												</a>	<span class="service-price">$32</span>
											</div>
											<div class="cate-list">	<a class="bg-yellow" href="service-details">Carpentry</a>
											</div>
										</div>
									</div>
									<div class="service-content">
										<h3 class="title">
											<a href="service-details">Wooden Carpentry Work</a>
										</h3>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<span class="d-inline-block average-rating">(5)</span>
										</div>
										<div class="user-info">
											<div class="service-action">
												<div class="row">
													<div class="col">
														<a href="javascript:void(0)" class="si-delete-inactive-service text-danger" data-id="120"><i class="far fa-trash-alt"></i> Delete</a>
													</div>
													<div class="col text-right">
														<a href="javascript:void(0)" class="si-delete-active-service text-success" data-id="120"><i class="fas fa-info-circle"></i> Active</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 inactive-service">
								<div class="service-widget">
									<div class="service-img">
										<a href="service-details">
											<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-12.jpg">
										</a>
										<div class="item-info">
											<div class="service-user">
												<a href="javascript:void(0);">
													<img src="assets/img/provider/provider-01.jpg" alt="">
												</a>
												<span class="service-price">$54</span>
											</div>
											<div class="cate-list">
												<a class="bg-yellow" href="service-details">Appliance</a>
											</div>
										</div>
									</div>
									<div class="service-content">
										<h3 class="title">
											<a href="service-details">Air Conditioner Service</a>
										</h3>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(3)</span>
										</div>
										<div class="user-info">
											<div class="service-action">
												<div class="row">
													<div class="col">
														<a href="javascript:void(0)" class="si-delete-inactive-service text-danger" data-id="107"><i class="far fa-trash-alt"></i> Delete</a>
													</div>
													<div class="col text-right">
														<a href="javascript:void(0)" class="si-delete-active-service text-success" data-id="107"><i class="fas fa-info-circle"></i> Active</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header"> 
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
						</button>
					</div> 
					<div class="modal-footer">	<a href="javascript:;" class="btn btn-success si_accept_confirm">Yes</a>
						<button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="deleteNotConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="acc_title">Delete Service</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Service is Booked and Inprogress..</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">OK</button>
					</div>
				</div>
			</div>
		</div>﻿
			</div>
	   @endsection
	  