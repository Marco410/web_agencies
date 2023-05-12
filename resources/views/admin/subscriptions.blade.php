
@extends('layout.mainlayout_admin')
@section('content')		
<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Subscriptions</h3>
						</div>
						<div class="col-auto text-right">
							<a href="add-subscription" class="btn btn-primary add-button">
								<i class="fas fa-plus"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<div class="row pricing-box">
					<div class="col-md-6 col-lg-4 col-xl-3">
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
									<li><i class="far fa-check-circle"></i> 3 Months expiration</li>
								</ul>
								<a href="edit-subscription" class="btn btn-primary btn-block">Edit</a>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-4 col-xl-3">
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
									<li><i class="far fa-check-circle"></i> 6 Months expiration</li>
								</ul>
								<a href="edit-subscription" class="btn btn-primary btn-block">Edit</a>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-4 col-xl-3">
						<div class="card">
							<div class="card-body">
								<div class="pricing-header">
									<h2>Enterprice</h2>
									<p>Monthly Price</p>
								</div>
								<div class="pricing-card-price">
									<h3 class="heading2 price">$1200.00</h3>
									<p>Duration: <span>One Year</span></p>
								</div>
								<ul class="pricing-options">
									<li><i class="far fa-check-circle"></i> One listing submission</li>
									<li><i class="far fa-check-circle"></i> One Year expiration</li>
								</ul>
								<a href="edit-subscription" class="btn btn-primary btn-block">Edit</a>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-4 col-xl-3">
						<div class="card">
							<div class="card-body">
								<div class="pricing-header">
									<h2>Gold</h2>
									<p>Monthly Price</p>
								</div>
								<div class="pricing-card-price">
									<h3 class="heading2 price">$2000.00</h3>
									<p>Duration: <span>2 Years</span></p>
								</div>
								<ul class="pricing-options">
									<li><i class="far fa-check-circle"></i> One listing submission</li>
									<li><i class="far fa-check-circle"></i> Two Year expiration</li>
								</ul>
								<a href="edit-subscription" class="btn btn-primary btn-block">Edit</a>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
</div>
<!-- /Main Wrapper -->
@endsection
	  