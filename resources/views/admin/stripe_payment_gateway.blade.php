
@extends('layout.mainlayout_admin')
@section('content')		
<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Stripe Gateway</h3>
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
					<li class="nav-item active">
						<a class="nav-link" href="stripe_payment_gateway">Payment Gateway</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="sms-settings">SMS Gateway</a>
					</li>
				</ul>
				
				<div class="row">
					<div class="col-lg-8">
						<div class="card">
							<div class="card-body">
								<form>
									<h4 class="text-primary">Stripe</h4>
									<div class="form-group">
										<label>Stripe Option</label>
										<div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" id="sandbox" name="gateway_type" value="sandbox" type="radio" checked>
												<label class="custom-control-label" for="sandbox">Sandbox</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" id="livepaypal" name="gateway_type" value="live" type="radio">
												<label class="custom-control-label" for="livepaypal">Live</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Gateway Name</label>
										<input type="text" value="Stripe" class="form-control" placeholder="Gateway Name">
									</div>
									<div class="form-group">
										<label>API Key</label>
										<input type="text" value="pk_test_AealxxOygZz84AruCGadWvUV00mJQZdLvr" class="form-control">
									</div>
									<div class="form-group">
										<label>Rest Key</label>
										<input type="text" value="sk_test_8HwqAWwBd4C4E77bgAO1jUgk00hDlERgn3" class="form-control">
									</div>
									<div class="mt-4">
										<button class="btn btn-primary" type="submit">Submit</button>
										<a href="stripe_payment_gateway" class="btn btn-link ml-2">Cancel</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<!-- /Main Wrapper -->
@endsection
	  