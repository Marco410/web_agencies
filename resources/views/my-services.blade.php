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
							<li class="nav-item active">
								<a class="nav-link" href="my-services">Active Services</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="my-services-inactive">Inactive Services</a>
							</li>
						</ul>
						<div class="row">
						
							<div class="col-lg-4 col-md-6">
								<div class="service-widget">
									<div class="service-img">
										<a href="service-details">
											<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-01.jpg">
										</a>
										<div class="item-info">
											<div class="service-user">
												<a href="javascript:void(0);">
													<img src="assets/img/provider/provider-01.jpg" alt="">
												</a>
												<span class="service-price">$25</span>
											</div>
											<div class="cate-list">
												<a class="bg-yellow" href="service-details">Glass</a>
											</div>
										</div>
									</div>
									<div class="service-content">
										<h3 class="title text-truncate">
											<a href="service-details">Toughened Glass Fitting Services</a>
										</h3>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<span class="d-inline-block average-rating">(4.3)</span>
										</div>
										<div class="user-info">
											<div class="service-action">
												<div class="row">
													<div class="col">
														<a href="edit-service" class="text-success"><i class="far fa-edit"></i> Edit</a>
													</div>
													<div class="col text-right">
														<a href="javascript:void(0);" class="text-danger" data-toggle="modal" data-target="#deleteNotConfirmModal"><i class="far fa-trash-alt"></i> Inactive</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="service-widget">
									<div class="service-img">
										<a href="service-details">
											<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-02.jpg">
										</a>
										<div class="item-info">
											<div class="service-user">
												<a href="javascript:void(0);">
													<img src="assets/img/provider/provider-01.jpg" alt="">
												</a>	<span class="service-price">$50</span>
											</div>
											<div class="cate-list">	<a class="bg-yellow" href="service-details">Automobile</a>
											</div>
										</div>
									</div>
									<div class="service-content">
										<h3 class="title">
											<a href="service-details">Car Repair Services</a>
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
														<a href="edit-service" class="text-success"><i class="far fa-edit"></i> Edit</a>
													</div>
													<div class="col text-right">
														<a href="javascript:void(0);" class="si-delete-service text-danger" data-id="148"><i class="fas fa-info-circle"></i> Inactive</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="service-widget">
									<div class="service-img">
										<a href="service-details">
											<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-03.jpg">
										</a>
										<div class="item-info">
											<div class="service-user">
												<a href="javascript:void(0);">
													<img src="assets/img/provider/provider-01.jpg" alt="">
												</a>
												<span class="service-price">$45</span>
											</div>
											<div class="cate-list">
												<a class="bg-yellow" href="service-details">Electrical</a>
											</div>
										</div>
									</div>
									<div class="service-content">
										<h3 class="title">
											<a href="service-details">Electric Panel Repairing Service</a>
										</h3>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(4.5)</span>
										</div>
										<div class="user-info">
											<div class="service-action">
												<div class="row">
													<div class="col"><a href="edit-service" class="text-success"><i class="far fa-edit"></i> Edit</a>
													</div>
													<div class="col text-right"><a href="javascript:void(0);" class="si-delete-service text-danger" data-id="147"><i class="fas fa-info-circle"></i> Inactive</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="service-widget">
									<div class="service-img">
										<a href="service-details">
											<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-04.jpg">
										</a>
										<div class="item-info">
											<div class="service-user">
												<a href="javascript:void(0);">
													<img src="assets/img/provider/provider-01.jpg" alt="">
												</a>
												<span class="service-price">$14</span>
											</div>
											<div class="cate-list">
												<a class="bg-yellow" href="service-details">Car Wash</a>
											</div>
										</div>
									</div>
									<div class="service-content">
										<h3 class="title">
											<a href="service-details">Steam Car Wash</a>
										</h3>
										<div class="rating">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(0)</span>
										</div>
										<div class="user-info">
											<div class="service-action">
												<div class="row">
													<div class="col">
														<a href="edit-service" class="text-success"><i class="far fa-edit"></i> Edit</a>
													</div>
													<div class="col text-right">
														<a href="javascript:void(0);" class="text-danger" data-toggle="modal" data-target="#deleteNotConfirmModal"><i class="far fa-trash-alt"></i> Inactive</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-lg-4 col-md-6">
								<div class="service-widget">
									<div class="service-img">
										<a href="service-details">
											<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-05.jpg">
										</a>
										<div class="item-info">
											<div class="service-user">
												<a href="javascript:void(0);">
													<img src="assets/img/provider/provider-01.jpg" alt="">
												</a>
												<span class="service-price">$100</span>
											</div>
											<div class="cate-list">
												<a class="bg-yellow" href="service-details">Cleaning</a>
											</div>
										</div>
									</div>
									<div class="service-content">
										<h3 class="title">
											<a href="service-details">House Cleaning Services</a>
										</h3>
										<div class="rating">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(0)</span>
										</div>
										<div class="user-info">
											<div class="service-action">
												<div class="row">
													<div class="col">
														<a href="edit-service" class="text-success"><i class="far fa-edit"></i> Edit</a>
													</div>
													<div class="col text-right">
														<a href="javascript:void(0);" class="text-danger" data-toggle="modal" data-target="#deleteNotConfirmModal"><i class="far fa-trash-alt"></i> Inactive</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-lg-4 col-md-6">
								<div class="service-widget">
									<div class="service-img">
										<a href="service-details">
											<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-06.jpg">
										</a>
										<div class="item-info">
											<div class="service-user">
												<a href="javascript:void(0);">
													<img src="assets/img/provider/provider-01.jpg" alt="">
												</a>	<span class="service-price">$80</span>
											</div>
											<div class="cate-list">	<a class="bg-yellow" href="service-details">Computer</a>
											</div>
										</div>
									</div>
									<div class="service-content">
										<h3 class="title">
											<a href="service-details">Computer & Server AMC Service</a>
										</h3>
										<div class="rating">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(0)</span>
										</div>
										<div class="user-info">
											<div class="service-action">
												<div class="row">
													<div class="col">
														<a href="edit-service" class="text-success"><i class="far fa-edit"></i> Edit</a>
													</div>
													<div class="col text-right">
														<a href="javascript:void(0);" class="text-danger" data-toggle="modal" data-target="#deleteNotConfirmModal"><i class="far fa-trash-alt"></i> Inactive</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="service-widget">
									<div class="service-img">
										<a href="service-details">
											<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-07.jpg">
										</a>
										<div class="item-info">
											<div class="service-user">
												<a href="javascript:void(0);">
													<img src="assets/img/provider/provider-01.jpg" alt="">
												</a>
												<span class="service-price">$5</span>
											</div>
											<div class="cate-list">
												<a class="bg-yellow" href="service-details">Interior</a>
											</div>
										</div>
									</div>
									<div class="service-content">
										<h3 class="title">
											<a href="service-details">Interior Designing</a>
										</h3>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(4)</span>
										</div>
										<div class="user-info">
											<div class="service-action">
												<div class="row">
													<div class="col">
														<a href="edit-service" class="text-success"><i class="far fa-edit"></i> Edit</a>
													</div>
													<div class="col text-right">
														<a href="javascript:void(0);" class="si-delete-service text-danger" data-id="135"><i class="fas fa-info-circle"></i> Inactive</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-lg-4 col-md-6">
								<div class="service-widget">
									<div class="service-img">
										<a href="service-details">
											<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-08.jpg">
										</a>
										<div class="item-info">
											<div class="service-user">
												<a href="javascript:void(0);">
													<img src="assets/img/provider/provider-01.jpg" alt="">
												</a>
												<span class="service-price">$75</span>
											</div>
											<div class="cate-list">
												<a class="bg-yellow" href="service-details">Construction</a>
											</div>
										</div>
									</div>
									<div class="service-content">
										<h3 class="title">
											<a href="service-details">Building Construction Services</a>
										</h3>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(4)</span>
										</div>
										<div class="user-info">
											<div class="service-action">
												<div class="row">
													<div class="col">
														<a href="edit-service" class="text-success"><i class="far fa-edit"></i> Edit</a>
													</div>
													<div class="col text-right">
														<a href="javascript:void(0);" class="si-delete-service text-danger" data-id="134"><i class="fas fa-info-circle"></i> Inactive</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="service-widget">
									<div class="service-img">
										<a href="service-details">
											<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-09.jpg">
										</a>
										<div class="item-info">
											<div class="service-user">
												<a href="javascript:void(0);">
													<img src="assets/img/provider/provider-01.jpg" alt="">
												</a>	<span class="service-price">$500</span>
											</div>
											<div class="cate-list">	<a class="bg-yellow" href="service-details">Painting</a>
											</div>
										</div>
									</div>
									<div class="service-content">
										<h3 class="title">
											<a href="service-details">Commercial Painting Services</a>
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
														<a href="edit-service" class="text-success"><i class="far fa-edit"></i> Edit</a>
													</div>
													<div class="col text-right">
														<a href="javascript:void(0);" class="text-danger" data-toggle="modal" data-target="#deleteNotConfirmModal"><i class="far fa-trash-alt"></i> Inactive</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> 
							
							<!-- Pagination Links --> 
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
						<h5 class="modal-title" id="acc_title">Inactive Service?</h5>
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
	  