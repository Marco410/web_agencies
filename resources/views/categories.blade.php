@extends('layout.mainlayout')
@section('content')		
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumb-title">
							<h2>Categories</h2>
						</div>
					</div>
					<div class="col-auto float-right ml-auto breadcrumb-menu">
						<nav aria-label="breadcrumb" class="page-breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Categories</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->
		
		<div class="content">
			<div class="container">
				<div class="catsec clearfix">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<a href="search">
								<div class="cate-widget">
									<img src="assets/img/category/category-01.jpg" alt="">
									<div class="cate-title">
										<h3><span><i class="fas fa-circle"></i> Computer</span></h3>
									</div>
									<div class="cate-count">
										<i class="fas fa-clone"></i> 21
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4 col-md-6">
							<a href="search">
								<div class="cate-widget">
									<img src="assets/img/category/category-02.jpg" alt="">
									<div class="cate-title">
										<h3><span><i class="fas fa-circle"></i> Interior</span></h3>
									</div>
									<div class="cate-count">
										<i class="fas fa-clone"></i> 15
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4 col-md-6">
							<a href="search">
								<div class="cate-widget">
									<img src="assets/img/category/category-03.jpg" alt="">
									<div class="cate-title">
										<h3><span><i class="fas fa-circle"></i> Car Wash</span></h3>
									</div>
									<div class="cate-count">
										<i class="fas fa-clone"></i> 15
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4 col-md-6">
							<a href="search">
								<div class="cate-widget">
									<img src="assets/img/category/category-04.jpg" alt="">
									<div class="cate-title">
										<h3><span><i class="fas fa-circle"></i> Cleaning</span></h3>
									</div>
									<div class="cate-count">
										<i class="fas fa-clone"></i> 14
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4 col-md-6">
							<a href="search">
								<div class="cate-widget">
									<img src="assets/img/category/category-05.jpg" alt="">
									<div class="cate-title">
										<h3><span><i class="fas fa-circle"></i> Electrical</span></h3>
									</div>
									<div class="cate-count">
										<i class="fas fa-clone"></i> 10
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4 col-md-6">
							<a href="search">
								<div class="cate-widget">
									<img src="assets/img/category/category-06.jpg" alt="">
									<div class="cate-title">
										<h3><span><i class="fas fa-circle"></i> Construction</span></h3>
									</div>
									<div class="cate-count">
										<i class="fas fa-clone"></i> 8
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4 col-md-6">
							<a href="search">
								<div class="cate-widget">
									<img src="assets/img/category/category-07.jpg" alt="">
									<div class="cate-title">
										<h3><span><i class="fas fa-circle"></i> Plumbing</span></h3>
									</div>
									<div class="cate-count">
										<i class="fas fa-clone"></i> 18
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4 col-md-6">
							<a href="search">
								<div class="cate-widget">
									<img src="assets/img/category/category-08.jpg" alt="">
									<div class="cate-title">
										<h3><span><i class="fas fa-circle"></i> Carpentry</span></h3>
									</div>
									<div class="cate-count">
										<i class="fas fa-clone"></i> 32
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4 col-md-6">
							<a href="search">
								<div class="cate-widget">
									<img src="assets/img/category/category-09.jpg" alt="">
									<div class="cate-title">
										<h3><span><i class="fas fa-circle"></i> Appliance</span></h3>
									</div>
									<div class="cate-count">
										<i class="fas fa-clone"></i> 19
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="pagination">
						<ul>
							<li class="active"><a href="javascript:void(0);">1</a></li>
							<li><a href="javascript:void(0);">2</a></li>
							<li><a href="javascript:void(0);">3</a></li>
							<li><a href="javascript:void(0);">4</a></li>
							<li class="arrow"><a href="javascript:void(0);"><i class="fas fa-angle-right"></i></a></li>
						</ul>
					</div>
				</div>
			</div>﻿ 
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
	  