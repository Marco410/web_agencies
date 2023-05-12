<?php $page="Configuración";?>

@extends('layout.mainlayout_admin')
@section('content')		
<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Configuración</h3>
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
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="card-header">Correo de Notificaciones</div>
						<form  method="POST"  action="{{ route('settings.update.correo') }}">
							{{ csrf_field()}}
							<div class="form-group">
								<input class="form-control" type="email" readonly name="correo" value="{{ $correo->value }}"  >
								<small>{{ $correo->descripcion }}</small>
							</div>
							<button type="submit" class="btn btn-block btn-sm btn-primary"  >Actualizar</button>
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
	  