<?php $page="provider-settings";?>
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
									<a href="provider-settings" class="nav-link active">
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
						<form>
							<div class="widget">
								<h4 class="widget-title">Profile Settings</h4> 
								<div class="row">
									<div class="col-xl-12">
										<h5 class="form-title">Basic Information</h5>
									</div>
									<div class="form-group col-xl-12">
										<div class="media align-items-center mb-3">
											<img class="user-image" src="assets/img/provider/provider-01.jpg" alt="">
											<div class="media-body">
												<h5 class="mb-0">Thomas Herzberg</h5>
												<p>Max file size is 20mb</p>
												<div class="jstinput">
													<a href="javascript:void(0);" class="browsephoto">Browse</a>
												</div> 
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Name</label>
									<input class="form-control" type="text" value="Thomas Herzberg" readonly>
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Email</label>
									<input class="form-control" type="email" value="truelysell@example.com" readonly>
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Country Code</label>
									<input class="form-control" type="text" value="+1" readonly>
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Mobile Number</label>
									<input class="form-control no_only" type="text" value="412-355-7471" readonly required>
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Date of birth</label>
									<input type="text" class="form-control provider_datepicker" autocomplete="off" value="17-01-1996">
								</div>
								<div class="col-xl-12">
									<h5 class="form-title">Service Info</h5>
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">What Service do you Provide?</label>
									<select class="form-control select provider_category" title="Category">
										<option>Automobile</option>
										<option>Construction</option>
										<option>Interior</option>
										<option>Cleaning</option>
										<option>Electrical</option>
										<option>Carpentry</option>
										<option>Computer</option>
									</select>
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Sub Category</label>
									<select class="form-control select provider_subcategory" title="Sub Category">
										<option>House Cleaning</option>
										<option>Full Car Wash</option>
										<option>Roofing</option>
										<option>Indoor Glass</option>
										<option>Convertible Fridge</option>
										<option>Fridge</option>
										<option>Car Wash</option>
										<option>Others</option>
									</select>
								</div>
								<div class="col-xl-12">
									<h5 class="form-title">Address</h5>
								</div>
								<div class="form-group col-xl-12">
									<label class="mr-sm-2">Address</label>
									<input type="text" class="form-control">
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Country</label>
									<select class="form-control">
										<option>Select Country</option>
										<option>Australia (+61)</option>
										<option>France (+33)</option>
										<option>Germany (+49)</option>
										<option>Iceland (+354)</option>
										<option>India (+91)</option>
										<option>Romania (+40)</option>
										<option>Russia (+7)</option>
										<option>Spain (+34)</option>
										<option>UK (+44)</option>
										<option selected>USA (+1)</option>
									</select>
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">State</label>
									<select class="form-control"></select>
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">City</label>
									<select class="form-control"></select>
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Postal Code</label>
									<input type="text" class="form-control" value="654587">
								</div>
								<div class="form-group col-xl-12">
									<button class="btn btn-primary pl-5 pr-5" type="submit">Update</button>
								</div> 
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
			</div>
	   @endsection
	  