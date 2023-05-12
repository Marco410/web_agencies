
@extends('layout.mainlayout_admin')
@section('content')		
<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="row">
					<div class="col-lg-8">
						<div class="card">
							<div class="card-body">
								<div class="service-header">
									<div class="service-inner">
										<h2>Car Repair Services</h2>
										<address class="service-location"><i class="fas fa-location-arrow"></i> Hanover, Maryland</address>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(4)</span>
										</div>
										<div class="service-cate">
											<a href="javascript:void(0);">Automobile</a>
										</div>
									</div>
									<div class="service-amount">
										<span>$150</span>
									</div>
								</div>
								<div class="service-description">
									<div class="service-images service-carousel">
										<div class="images-carousel owl-carousel owl-theme">
											<div class="item">
												<img src="../assets_admin/img/services/service-02.jpg" alt="" class="img-fluid">
											</div>
											<div class="item">
												<img src="../assets_admin/img/services/service-02.jpg" alt="" class="img-fluid">
											</div>
											<div class="item">
												<img src="../assets_admin/img/services/service-02.jpg" alt="" class="img-fluid">
											</div>
										</div>
									</div>
									<h5 class="card-title">Service Details</h5>
									<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card provider-widget clearfix">
							<div class="card-body">
								<h5 class="card-title">Service Provider</h5>
								<div class="about-author">
									<div class="about-provider-img">
										<div class="provider-img-wrap">
											<a href="javascript:void(0);">
												<img class="img-fluid rounded-circle" alt="" src="../assets_admin/img/provider/provider-01.jpg">
											</a>
										</div>
									</div>
									<div class="provider-details">
										<a href="javascript:void(0);" class="ser-provider-name">Thomas Herzberg</a>
										<p class="last-seen"><i class="fas fa-circle online"></i> Online</p>
										<p class="text-muted mb-1">Member Since Apr 2020</p>
									</div>
								</div>
								<hr>
								<div class="provider-info">
									<p class="mb-1"><i class="far fa-envelope"></i>  <a href="#">thomasherzberg@example.com</a>
									</p>
									<p class="mb-0"><i class="fas fa-phone-alt"></i> xxxxxxxx50</p>
								</div>
							</div>
						</div>
						<div class="card available-widget">
							<div class="card-body">
								<h5 class="card-title">Service Availability</h5>
								<ul>
									<li><span>Monday</span>09:00 AM - 06:00 PM</li>
									<li><span>Tuesday</span>09:00 AM - 06:00 PM</li>
									<li><span>Wednesday</span>09:00 AM - 06:00 PM</li>
									<li><span>Thursday</span>09:00 AM - 06:00 PM</li>
									<li><span>Friday</span>09:00 AM - 06:00 PM</li>
									<li><span>Saturday</span>09:00 AM - 06:00 PM</li>
									<li><span>Sunday</span>09:00 AM - 06:00 PM</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<!-- /Main Wrapper -->
@endsection
	  