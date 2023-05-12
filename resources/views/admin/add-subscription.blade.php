@extends('layout.mainlayout_admin')
@section('content')		
<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
					
						<!-- Page Header -->
						<div class="page-header">
							<div class="row">
								<div class="col-sm-12">
									<h3 class="page-title">Add Subscription</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						
						<div class="card">
							<div class="card-body">
							
								<!-- Form -->
								<form action="subscriptions">
									<div class="form-group">
										<label>Subscription Name</label>
										<input class="form-control" type="text" placeholder="Free Trial">
									</div>
									<div class="form-group">
										<label>Subscription Amount</label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>Subscription Durations</label>
										<select class="form-control select">
											<option>Select Duration</option>
											<option>One Month</option>
											<option>3 Months</option>
											<option>6 Months</option>
											<option>One Year</option>
											<option>2 Years</option>
										</select>
									</div>
									<div class="form-group">
										<label class="d-block">Subscription Status</label>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" id="subscription_active" class="custom-control-input" checked="checked">
											<label class="custom-control-label" for="subscription_active">Active</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" id="subscription_inactive" class="custom-control-input">
											<label class="custom-control-label" for="subscription_inactive">Inactive</label>
										</div>
									</div>
									<div class="mt-4">
										<button class="btn btn-primary" type="submit">Submit</button>
										<a href="subscriptions" class="btn btn-link">Cancel</a>
									</div>
								</form>
								<!-- /Form -->
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<!-- /Main Wrapper -->
@endsection
	  