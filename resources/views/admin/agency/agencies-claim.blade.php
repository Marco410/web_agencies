<?php $page="Agencias Reclamadas";?>

@extends('layout.mainlayout_admin')
@section('content')		
<div class="page-wrapper">
	<div class="content container-fluid">
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Agencias Reclamadas</h3>
				</div>
				<div class="col-auto text-right">
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
					</div>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover table-center mb-0 datatable">
								<thead>
									<tr>
										<th>#</th>
										<th>Agencia</th>
										<th>Usuario</th>
										<th>Estatus</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($claims as $claim)	
									<tr>
										<td>{{ $claim->id }}</td>
										<td><a href="{{route('agencia.detalles',$claim->agencia[0]->id)}}" target="_blank" >
											{{ $claim->agencia[0]->nombre }}<a>
										</td>
										<td><a href="{{route('agencia.detalles',$claim->user[0]->id)}}" target="_blank" >
											{{ $claim->user[0]->name }} {{ $claim->user[0]->apellido_p }}<a>
										</td>
										<td>
											<span class="text-white badge @if($claim->status == 'Aceptada') badge-success @elseif ($claim->status == 'Pendiente') badge-warning @else badge-danger @endif">
												{{ $claim->status }}
											</span>
										</td>
										<td>
											<a href="{{ route('admin.agencies.claim.update',$claim->id) }}" class="btn btn-sm btn-primary text-white" > <i class="fas fa-edit"></i> </a>
										</td>
									</tr>
										@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /Main Wrapper -->
@endsection
	  