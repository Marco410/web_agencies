@extends('layout.mainlayout_admin')
@section('content')		
<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
					
						<!-- Page Header -->
						<div class="page-header">
							<div class="row">
								<div class="col">
									<h3 class="page-title">Add Sub Category</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						
						<div class="card">
							<div class="card-body">
							
								<!-- Form -->
								<form action="subcategories">
									<div class="form-group">
										<label>Category</label>
										<select class="form-control select">
											<option>Select Category</option>
											<option>Automobile</option>
											<option>Construction</option>
											<option>Interior</option>
											<option>Cleaning</option>
											<option>Electrical</option>
											<option>Carpentry</option>
											<option>Computer</option>
										</select>
									</div>
									<div class="form-group">
										<label>Sub Category Name</label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>Sub Category Image</label>
										<input class="form-control" type="file">
									</div>
									<div class="mt-4">
										<button class="btn btn-primary" type="submit">Add Subcategory</button>
										<a href="subcategories" class="btn btn-link">Cancel</a>
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
	  