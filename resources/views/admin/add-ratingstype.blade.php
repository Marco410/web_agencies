<?php $page="ratingstype";?>
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
									<h3 class="page-title">Add Rating Type</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						
						<div class="card">
							<div class="card-body">
							
								<!-- Form -->
								<form action="ratingstype">
									<div class="form-group">
										<label>Ratings Type</label>
										<input class="form-control" type="text">
									</div>
									<div class="mt-4">
										<button class="btn btn-primary" type="submit">Submit</button>
										<a href="ratingstype" class="btn btn-link">Cancel</a>
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
	  