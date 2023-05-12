<?php $page="categories";?>
@extends('layout.mainlayout_admin')
@section('content')		
<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Email Settings </h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<ul class="nav nav-tabs menu-tabs">
					<li class="nav-item">
						<a class="nav-link" href="settings">General Settings</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="emailsettings">Email Settings</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="stripe_payment_gateway">Payment Gateway</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="sms-settings">SMS Gateway</a>
					</li>
				</ul>
				
				<div class="row">
					<div class="col-xl-8 col-lg-12">
						<div class="card">
							<div class="card-body">
								
								<!-- Form -->
								<form> 
									<div class="form-group">
										<div class="custom-control custom-radio custom-control-inline">
											<input class="custom-control-input" id="php_mail" name="gateway_type" type="radio" checked>
											<label class="custom-control-label" for="php_mail">PHP Mail</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input class="custom-control-input" id="smtp_mail" name="gateway_type" type="radio">
											<label class="custom-control-label" for="smtp_mail">SMTP</label>
										</div>
									</div>
									
									<div class="phpmail mt-3">
										<div class="form-group">
											<label>Email From Address</label>
											<input type="email" class="form-control">
										</div>
										<div class="form-group">
											<label>Email Password</label>
											<input type="password" class="form-control">
										</div>
										<div class="form-group">
											<label>Emails From Name</label>
											<input type="text" class="form-control">
										</div>
									</div>
									
									<div class="smtpmail">
										<div class="form-group">
											<label>Email From Address</label>
											<input type="email" class="form-control">
										</div>
										<div class="form-group">
											<label>Email Password</label>
											<input type="password" class="form-control">
										</div>
										<div class="form-group">
											<label>Email Host</label>
											<input type="text" class="form-control">
										</div>
										<div class="form-group">
											<label>Email Port</label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="mt-4">
										<button type="submit" class="btn btn-primary">Save Changes</button>
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
	  