<?php $page="Actualizar Reclamo";?>

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
									<h3 class="page-title">Actualizar Petición de Agencia</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						<div class="row">
							<div class="col-sm-12">
								@if($errors->any())
								@foreach($errors->all() as $error)
								<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>{{ $error }}</div>
								@endforeach
								@endif
								
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<!-- Form -->
								<form method="post" action="{{ route('admin.agencies.claim.store')}}">
									{{ csrf_field() }}
									<input type="hidden" name="claim_id" value="{{ $claim->id }}" >
									<div class="form-group">
										<label>Agencia</label>
										<p>{{ $claim->agencia[0]->nombre }}</p>
									</div>
									<div class="form-group">
										<label>Usuario</label>
										<p>{{ $claim->user[0]->name }} {{ $claim->user[0]->apellido_p }}</p>
									</div>
									<input type="hidden" name="agencia_id" value="{{ $claim->agencia[0]->id }}" >
									<input type="hidden" name="user_id" value="{{ $claim->user[0]->id }}" >
									<div class="form-group">
										<label>Estatus</label>
										<select class="form-control" name="status" id="status">
											<option value="">Seleccione: </option>
											<option {{ ($claim->status == "Pendiente") ? 'selected' : '' }} value="Pendiente">Pendiente</option>
											<option {{ ($claim->status == "Aceptada") ? 'selected' : '' }} value="Aceptada">Aceptada</option>
											<option {{ ($claim->status == "No Aceptada") ?	 'selected' : '' }} value="No Aceptada">No Aceptada</option>
										</select>
									</div>
									<div class="mt-4">
										<button class="btn btn-primary" type="submit">Actualizar</button>
										<a href="#" class="btn btn-link">Cancel</a>
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
	  