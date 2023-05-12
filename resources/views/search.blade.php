<?php $page="search";?>
@extends('layout.mainlayout')
@section('content')		
<!-- Breadcrumb -->
		<div class="breadcrumb-bar">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<div class="breadcrumb-title">
							<h2>Find a Professional</h2>
						</div>
					</div>
					<div class="col-auto float-right ml-auto breadcrumb-menu">
						<nav aria-label="breadcrumb" class="page-breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Find a Professional</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->
		
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3 theiaStickySidebar">
						<div class="card filter-card">
							<div class="card-body">
								<h4 class="card-title mb-4">Search Filter</h4>
								<form id="search_form">
									<div class="filter-widget">
										<div class="filter-list">
											<h4 class="filter-title">Keyword</h4>
											<input type="text" class="form-control" placeholder="What are you looking for?">
										</div>
										<div class="filter-list">
											<h4 class="filter-title">Sort By</h4>
											<select class="form-control selectbox select">
												<option>Sort By</option>
												<option>Price Low to High</option>
												<option>Price High to Low</option>
												<option>Newest</option>
											</select>
										</div>
										<div class="filter-list">
											<h4 class="filter-title">Categories</h4>
											<select class="form-control form-control selectbox select">
												<option>All Categories</option>
												<option>Computer</option>
												<option selected="">Automobile</option>
												<option>Car Wash</option>
												<option>Cleaning</option>
												<option>Electrical</option>
												<option>Construction</option>
											</select>
										</div>
										<div class="filter-list">
											<h4 class="filter-title">Location</h4>
											<input class="form-control" type="text" placeholder="Search Location">
										</div>
									</div>
									<button class="btn btn-primary pl-5 pr-5 btn-block get_services" type="button">Search</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="row align-items-center mb-4">
							<div class="col-md-6 col">
								<h4><span>118</span> Services</h4>
							</div>
							<div class="col-md-6 col-auto">
								<div class="view-icons">
									<a href="javascript:void(0);" class="grid-view active"><i class="fas fa-th-large"></i></a>
								</div>
							</div>
						</div>
						<div>
							<div class="row">
								<div class="col-lg-4 col-md-6">
									<div class="service-widget">
										<div class="service-img">
											<a href="service-details">
												<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-01.jpg">
											</a>
											<div class="fav-btn">
												<a href="javascript:void(0)" class="fav-icon">
													<i class="fas fa-heart"></i>
												</a>
											</div>
											<div class="item-info">
												<div class="service-user">
													<a href="#">
														<img src="assets/img/customer/user-01.jpg" alt="">
													</a>	
													<span class="service-price">$25</span>
												</div>
												<div class="cate-list">
													<a class="bg-yellow" href="service-details">Cleaning</a>
												</div>
											</div>
										</div>
										<div class="service-content">
											<h3 class="title">
												<a href="service-details">Toughened Glass Fitting Services</a>
											</h3>
											<div class="rating">	
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>		
												<span class="d-inline-block average-rating">(4.3)</span>
											</div>
											<div class="user-info">
												<div class="row">	
													<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> 
														<span>xxxxxxxx49</span>
													</span>
													<span class="col ser-location">
														<span>Wayne, New Jersey</span> <i class="fas fa-map-marker-alt ml-1"></i>
													</span>
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
											<div class="fav-btn">
												<a href="javascript:void(0)" class="fav-icon">
													<i class="fas fa-heart"></i>
												</a>
											</div>
											<div class="item-info">
												<div class="service-user">
													<a href="#">
														<img src="assets/img/customer/user-02.jpg" alt="">
													</a>
													<span class="service-price">$50</span>
												</div>
												<div class="cate-list">
													<a class="bg-yellow" href="service-details">Automobile</a>
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
												<div class="row">
													<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx85</span></span>
													<span class="col ser-location"><span>Hanover, Maryland</span>  <i class="fas fa-map-marker-alt ml-1"></i></span>
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
											<div class="fav-btn">
												<a href="javascript:void(0)" class="fav-icon">
													<i class="fas fa-heart"></i>
												</a>
											</div>
											<div class="item-info">
												<div class="service-user">
													<a href="#">
														<img src="assets/img/customer/user-03.jpg" alt="">
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
												<div class="row">
													<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx30</span></span>
													<span class="col ser-location"><span>Kalispell, Montana</span>  <i class="fas fa-map-marker-alt ml-1"></i></span>
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
											<div class="fav-btn">
												<a href="javascript:void(0)" class="fav-icon">
													<i class="fas fa-heart"></i>
												</a>
											</div>
											<div class="item-info">
												<div class="service-user">
													<a href="#">
														<img src="assets/img/customer/user-04.jpg" alt="">
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
												<div class="row">
													<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx74</span></span>
													<span class="col ser-location"><span>Electra, Texas</span>  <i class="fas fa-map-marker-alt ml-1"></i></span>
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
											<div class="fav-btn">
												<a href="javascript:void(0)" class="fav-icon">
													<i class="fas fa-heart"></i>
												</a>
											</div>
											<div class="item-info">
												<div class="service-user">
													<a href="#">
														<img src="assets/img/customer/user-05.jpg" alt="">
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
												<div class="row">
													<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx91</span></span>
													<span class="col ser-location"><span>Sylvester, Georgia</span>  <i class="fas fa-map-marker-alt ml-1"></i></span>
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
											<div class="fav-btn">
												<a href="javascript:void(0)" class="fav-icon">
													<i class="fas fa-heart"></i>
												</a>
											</div>
											<div class="item-info">
												<div class="service-user">
													<a href="#">
														<img src="assets/img/customer/user-06.jpg" alt="">
													</a>
													<span class="service-price">$80</span>
												</div>
												<div class="cate-list">
													<a class="bg-yellow" href="service-details">Computer</a>
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
												<div class="row">
													<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx92</span></span>
													<span class="col ser-location"><span>Los Angeles, California</span>  <i class="fas fa-map-marker-alt ml-1"></i></span>
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
											<div class="fav-btn">
												<a href="javascript:void(0)" class="fav-icon">
													<i class="fas fa-heart"></i>
												</a>
											</div>
											<div class="item-info">
												<div class="service-user">
													<a href="#">
														<img src="assets/img/customer/user-07.jpg" alt="">
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
												<div class="row">
													<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx28</span></span>
													<span class="col ser-location"><span>Hanover, Maryland</span>  <i class="fas fa-map-marker-alt ml-1"></i></span>
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
											<div class="fav-btn">
												<a href="javascript:void(0)" class="fav-icon">
													<i class="fas fa-heart"></i>
												</a>
											</div>
											<div class="item-info">
												<div class="service-user">
													<a href="#">
														<img src="assets/img/customer/user-08.jpg" alt="">
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
												<div class="row">
													<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx62</span></span>
													<span class="col ser-location"><span>Burr Ridge, Illinois</span>  <i class="fas fa-map-marker-alt ml-1"></i></span>
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
											<div class="fav-btn">
												<a href="javascript:void(0)" class="fav-icon">
													<i class="fas fa-heart"></i>
												</a>
											</div>
											<div class="item-info">
												<div class="service-user">
													<a href="#">
														<img src="assets/img/customer/user-09.jpg" alt="">
													</a>
													<span class="service-price">$500</span>
												</div>
												<div class="cate-list">
													<a class="bg-yellow" href="service-details">Painting</a>
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
												<div class="row">
													<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx75</span></span>	
													<span class="col ser-location"><span>Huntsville, Alabama</span>  <i class="fas fa-map-marker-alt ml-1"></i></span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6">
									<div class="service-widget">
										<div class="service-img">
											<a href="service-details">
												<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-10.jpg">
											</a>
											<div class="fav-btn">
												<a href="javascript:void(0)" class="fav-icon">
													<i class="fas fa-heart"></i>
												</a>
											</div>
											<div class="item-info">
												<div class="service-user">
													<a href="#">
														<img src="assets/img/customer/user-10.jpg" alt="">
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
												<div class="row">
													<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx13</span></span>
													<span class="col ser-location"><span>Richmond, Virginia</span> <i class="fas fa-map-marker-alt ml-1"></i></span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6">
									<div class="service-widget">
										<div class="service-img">
											<a href="service-details">
												<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-11.jpg">
											</a>
											<div class="fav-btn">
												<a href="javascript:void(0)" class="fav-icon">
													<i class="fas fa-heart"></i>
												</a>
											</div>
											<div class="item-info">
												<div class="service-user">
													<a href="#">
														<img src="assets/img/customer/user-01.jpg" alt="">
													</a>
													<span class="service-price">$32</span>
												</div>
												<div class="cate-list">
													<a class="bg-yellow" href="service-details">Carpentry</a>
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
												<div class="row">
													<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx68</span></span>
													<span class="col ser-location"><span>Columbus, Alabama</span> <i class="fas fa-map-marker-alt ml-1"></i></span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6">
									<div class="service-widget">
										<div class="service-img">
											<a href="service-details">
												<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/service-12.jpg">
											</a>
											<div class="fav-btn">
												<a href="javascript:void(0)" class="fav-icon">
													<i class="fas fa-heart"></i>
												</a>
											</div>
											<div class="item-info">
												<div class="service-user">
													<a href="#">
														<img src="assets/img/customer/user-02.jpg" alt="">
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
												<div class="row">
													<span class="col-auto ser-contact"><i class="fas fa-phone mr-1"></i> <span>xxxxxxxx71</span></span>
													<span class="col ser-location"><span>Vancouver, Washington</span> <i class="fas fa-map-marker-alt ml-1"></i></span>
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
		</div>﻿

			</div>
<!-- Provider Register Modal -->
<div class="modal account-modal fade multi-step" id="provider-register" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header p-0 border-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="login-header">
						<h3>Join as a Provider</h3>
					</div>
					
					<!-- Register Form -->
					<form action="index">
						<div class="form-group form-focus">
							<label class="focus-label">Name</label>
							<input type="text" class="form-control" placeholder="johndoe@exapmle.com">
						</div>
						<div class="form-group form-focus">
							<label class="focus-label">Mobile Number</label>
							<input type="text" class="form-control" placeholder="986 452 1236">
						</div>
						<div class="form-group form-focus">
							<label class="focus-label">Create Password</label>
							<input type="password" class="form-control" placeholder="********">
						</div>
						<div class="text-right">
							<a class="forgot-link" href="#">Already have an account?</a>
						</div>
						<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
						<div class="login-or">
							<span class="or-line"></span>
							<span class="span-or">or</span>
						</div>
						<div class="row form-row social-login">
							<div class="col-6">
								<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
							</div>
							<div class="col-6">
								<a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
							</div>
						</div>
					</form>
					<!-- /Register Form -->
					
				</div>
			</div>
		</div>
	</div>
	<!-- /Provider Register Modal -->
	
	<!-- User Register Modal -->
	<div class="modal account-modal fade multi-step" id="user-register" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header p-0 border-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="login-header">
						<h3>Join as a User</h3>
					</div>
					
					<!-- Register Form -->
					<form action="index">
						<div class="form-group form-focus">
							<label class="focus-label">Name</label>
							<input type="text" class="form-control" placeholder="johndoe@exapmle.com">
						</div>
						<div class="form-group form-focus">
							<label class="focus-label">Mobile Number</label>
							<input type="text" class="form-control" placeholder="986 452 1236">
						</div>
						<div class="form-group form-focus">
							<label class="focus-label">Create Password</label>
							<input type="password" class="form-control" placeholder="********">
						</div>
						<div class="text-right">
							<a class="forgot-link" href="#">Already have an account?</a>
						</div>
						<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
						<div class="login-or">
							<span class="or-line"></span>
							<span class="span-or">or</span>
						</div>
						<div class="row form-row social-login">
							<div class="col-6">
								<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
							</div>
							<div class="col-6">
								<a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
							</div>
						</div>
					</form>
					<!-- /Register Form -->
					
				</div>
			</div>
		</div>
	</div>
	<!-- /User Register Modal -->
	
	<!-- Login Modal -->
	<div class="modal account-modal fade" id="login_modal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header p-0 border-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="login-header">
						<h3>Login <span>Truelysell</span></h3>
					</div>
					<form action="index">
						<div class="form-group form-focus">
							<label class="focus-label">Email</label>
							<input type="email" class="form-control" placeholder="truelysell@example.com">
						</div>
						<div class="form-group form-focus">
							<label class="focus-label">Password</label>
							<input type="password" class="form-control" placeholder="********">
						</div>
						<div class="text-right">	
						</div>
						<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
						<div class="login-or">	<span class="or-line"></span>
							<span class="span-or">or</span>
						</div>
						<div class="row form-row social-login">
							<div class="col-6">	<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
							</div>
							<div class="col-6">	<a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
							</div>
						</div>
						<div class="text-center dont-have">Don’t have an account? <a href="#">Register</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Login Modal -->
	   @endsection
	  