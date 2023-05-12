
@extends('layout.mainlayout_admin')
@section('content')		
<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">SMS Settings</h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<ul class="nav nav-tabs menu-tabs">
					<li class="nav-item">
						<a class="nav-link" href="settings">General Settings</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="emailsettings">Email Settings</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="stripe_payment_gateway">Payment Gateway</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="sms-settings">SMS Gateway</a>
					</li>
				</ul>
				
				<form>
					<div class="row">
						<div class="col-xl-8 col-lg-12">
							<div class="card">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col">
											<h5>Default OTP</h5>
											<p class="mb-0">You can use default otp <strong>1234</strong> for Tom Burns purpose</p>
										</div>
										<div class="col-auto">
											<div class="status-toggle">
												<input id="default_otp" class="check" type="checkbox" checked>
												<label for="default_otp" class="checktoggle">checkbox</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Nexmo</h4>
									<div class="form-group">
										<label>API Key</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<label>API Secret Key</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<label>Sender ID</label>
										<input type="text" class="form-control">
									</div>
									<div class="mt-4">
										<button type="submit" class="btn btn-primary center-block">Save Changes</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
</div>
<!-- /Main Wrapper -->
@endsection
	  