<?php $page="categories";?>
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
									<h3 class="page-title">Add Category</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->

						<div class="card">
							<div class="card-body">

								<!-- Form -->
								<form action="categories">
									<div class="form-group">
										<label>Category Name</label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>Category Image</label>
										<input class="form-control" type="file">
									</div>
									<div class="mt-4">
										<button class="btn btn-primary" type="submit">Add Category</button>
										<a href="{{route('agencia')}}" class="btn btn-link">Cancel</a>
									</div>
								</form>
								<!-- Form -->

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<!-- /Main Wrapper -->
@endsection
