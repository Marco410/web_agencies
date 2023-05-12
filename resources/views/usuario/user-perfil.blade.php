<?php $page="Mi Perfil";?>
@extends('layout.mainlayout')
@section('content')		
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-md-4 theiaStickySidebar">
				@include('usuario.sidebar')
			</div>
			<div class="col-xl-9 col-md-8">
				<h4 class="widget-title">Mi Perfil</h4>
				<div class="row border-bottom mb-4">
					<div class="col-sm-12">
						@if (session('status_perfil'))
							<div class="alert alert-success">
								{{ session('status_perfil') }}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						@endif
						@if($errors->any())
							@foreach($errors->all() as $error)
							<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>{{ $error }}</div>
							@endforeach
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<a href="{{route('user.agencies')}}" class="dash-widget dash-bg-1">
							<span class="dash-widget-icon">{{ auth()->user()->agencies->count() }}</span>
							<div class="dash-widget-info">
								<span>Mis Agencias</span>
							</div>
						</a>
					</div>
					<div class="col-lg-4">
						<a href="{{route('user.personal')}}" class="dash-widget dash-bg-1">
							<span class="dash-widget-icon">{{ $personalCount }}</span>
							<div class="dash-widget-info">
								<span>Mi Personal</span>
							</div>
						</a>
					</div>
					<div class="col-lg-4">
						<a href="{{route('user.comments')}}" class="dash-widget dash-bg-1">
							<span class="dash-widget-icon">{{ $comentarios }}</span>
							<div class="dash-widget-info">
								<span>Comentarios</span>
							</div>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-8">
						<h5>Información</h5>
						<div class="card mb-0">
							<div class="row no-gutters">
								<div class="col-lg-12">
									<div class="card-body">
										<div class="row">
											<div class="col-sm-4 border-right text-center">
												<img style="border-radius: 100px;" class="img-fluid" src="{{ asset('assets/img/user-back.png') }}" alt="{{ auth()->user()->name }}">
												<h5 class="mt-2" >{{ auth()->user()->name }} {{ auth()->user()->apellido_p }}</h5>
												<p>{{ auth()->user()->roles[0]->name }}</p>
												<a class="text-info" style="cursor: pointer" data-toggle="modal" data-target="#modalNombre"  data-name="{{ auth()->user()->name }}" data-paterno="{{ auth()->user()->apellido_p }}" data-materno="{{ auth()->user()->apellido_m }}" ><i class="fas fa-edit" ></i></a>
											</div>
											<div class="col-sm-8 ">
												<div class="col-sm-12 mb-4">
													<div class="row">
														<div class="col-sm-4">
															<small class="text-secondary" >Email</small>
														</div>
														<div class="col-sm-8">
															<small>{{ auth()->user()->email }}</small>
															<a class="text-info" style="cursor: pointer" data-toggle="modal" data-target="#modalEmail"  data-email="{{ auth()->user()->email }}" ><i class="fas fa-edit" ></i></a>
														</div>
													</div>
												</div>
												<div class="border-bottom"></div>
												<div class="col-sm-12 mt-4">
													<div class="row ">
														<div class="col-sm-6 ">
															<small class="text-secondary" >Teléfono</small>
														</div>
														<div class="col-sm-6">
															<small>{{ auth()->user()->telefono }}</small>
															<a class="text-info" style="cursor: pointer" data-toggle="modal" data-target="#modalTelefono"  data-telefono="{{ auth()->user()->telefono }}" ><i class="fas fa-edit" ></i></a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				@if (auth()->user()->membresia_id == 1)
				<div class="row">
					<div class="card">
						<div class="card-body row">
							<div class="col-sm-12 text-center">
								<p>Por favor procede a seleccionar y pagar la membresía deseada</p>

							</div>
				
					<div class="col-sm-4 mb-4">
						<div class="card-plan plan">
							<div class="card-heading" style="background-color: var(--gray)" >
								ZERO
							</div>
							<div class="card-subheading" style="background-color: var(--gray);display: flex; justify-content: center;align-items: center; text-align: center;">
								¡GRATIS!
							</div>
							<div class="card-body-plan">
								<div class="card-row">
									<p class="text mt-3" >Perfil de Dealer en la Plataforma</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4 mb-4">
						<div class="card-plan plan">
							<div class="card-heading" style="background-color: var(--primary)">
								BASIC
							</div>
							<div class="card-subheading" style="background-color: var(--primary)">
								 <strong> *$2,800 MXN / MES </strong><br> <span> Ahorra $1,660.00 con pago anual</span>
							</div>
							<div class="card-body-plan">
								<div class="card-row">
									<p class="text mt-3">Perfil de Dealer en la Plataforma</p>
								</div>
								<div class="card-row">
									<p class="text mt-3">Personalización de Perfil</p>
								</div>
								<div class="card-row">
									<p class="text mt-3">Consulta de Comentarios</p>
								</div>
								<div class="card-row">
									<p class="text mt-3">Dealer Dashboard</p>
								</div>
								<a style="cursor: pointer" href="{{ route('user.perfil.membresia') . "?membresia=Basic" }}"  >
								<div class="card-subheading" style="background-color: var(--primary);display: flex; justify-content: center;align-items: center; text-align: center;">
									¡PAGAR AHORA!
								</div></a>
							</div>
						</div>
					</div>
					<div class="col-sm-4 mb-4">
						<div class="card-plan plan">
							<div class="card-heading" style="background-color: var(--hover)">
								PLUS
							</div>
							<div class="card-subheading" style="background-color: var(--hover)">
								<strong>*$3,300 MXN  / MES </strong> <br> <span>Ahorra $4,752.00 con pago anual</span>
							</div>
							<div class="card-body-plan">
								<div class="card-row">
									<p class="text mt-3" >Perfil de Dealer en la Plataforma</p>
								</div>
								<div class="card-row">
									<p class="text mt-3" >Personalización de Perfil</p>
								</div>
								<div class="card-row">
									<p class="text mt-3" >Consulta de Comentarios</p>
								</div>
								<div class="card-row">
									<p class="text mt-3" >Dealer Dashboard</p>
								</div>
								<div class="card-row">
									<p class="text mt-3" >Citas en Línea</p>
								</div>
								<div class="card-row">
									<p class="text mt-3" >Reporte Mensual de Acciones</p>
								</div>
								<div class="card-row">
									<p class="text mt-3" ><strong>QuickResponse</strong> by AutoNavega®</p>
								</div>
								<div class="card-row">
									<p class="text mt-3" >Calificación del Personal</p>
								</div>
								<div class="card-row">
									<p class="text mt-3">Inventario de autos en tiempo real</p>
								</div>
								<a style="cursor: pointer" href="{{ route('user.perfil.membresia') . "?membresia=Plus" }}" >
								<div class="card-subheading" style="background-color: var(--hover);display: flex; justify-content: center;align-items: center; text-align: center;">
									¡PAGAR AHORA!
								</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-12 card-footer-plan">
						<p>*Cobros Mensuales (Sin Descuento), Semestrales (5% Descuento), Anuales (12% Descuento)</p>
						<p>Precios más IVA.</p>
					</div>
					</div>
					</div>

				</div>
				@endif
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="cancelarPlanModal" tabindex="-1" role="dialog" aria-labelledby="cancelarPlanModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		
		<div class="modal-body">
		  <h4>Cancelar Plan</h4>
		  <p>¿Seguro que deseas cancelar tu plan?</p>
		  <p>Perderás el acceso a las funciones que obtuviste y se cancelará el cobro.</p>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		  <button type="button" id="btn-cancelar-plan-check" class="btn btn-primary">Si, cancelar</button>
		</div>
	  </div>
	</div>
  </div>

  <div class="modal fade" id="pausePlanModal" tabindex="-1" role="dialog" aria-labelledby="pausePlanModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		
		<div class="modal-body">
		  <h4>Pausar Plan</h4>
		  <p>¿Seguro que deseas pausar tu plan?</p>
		  <p>Perderás el acceso a las funciones que obtuviste y se cancelará el cobro.</p>
		  <p>Podrás despausarlo cuando desees.</p>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		  <button type="button" id="btn-pause-plan-check" class="btn btn-primary">Si, pausar</button>
		</div>
	  </div>
	</div>
  </div>

  <div class="modal fade" id="modalNombre" tabindex="-1" role="dialog" aria-labelledby="modalNombreLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
	  <div class="modal-content">
		  <form method="POST" action="{{ route('user.update.nombre') }}" >
			{{ csrf_field() }}
			<div class="modal-body">
				<h3>Actualizar Nombre</h3>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Nombre</label>
							<input type="text" class="form-control" name="name" id="name_update" value="" >
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Apellido Paterno</label>
							<input type="text" class="form-control" name="paterno" id="paterno_update" value="" >
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Apellido Materno</label>
							<input type="text" class="form-control" name="materno" id="materno_update" value="" >
						</div>
					</div>
				</div>
				
				<small>Recuerda que este nombre aparecerá en los comentarios que hagas y en tus contratos.</small>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Actualizar</button>
			</div>
		</form>
	  </div>
	</div>
  </div>

  <div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="modalEmailLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		  <form method="POST" action="{{ route('user.update.email') }}" >
			{{ csrf_field() }}
			<div class="modal-body">
				<h3>Actualizar Email</h3>
				<div class="form-group">
					<label for="recipient-name" class="col-form-label">Correo Electrónico</label>
					<input type="text" class="form-control" name="email" id="email_update" value="" >
					<small>Recuerda que a este correo es al que le llegan todas tus notificaciones.</small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Actualizar</button>
			</div>
		</form>
	  </div>
	</div>
  </div>

  <div class="modal fade" id="modalTelefono" tabindex="-1" role="dialog" aria-labelledby="modalTelefonoLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		  <form method="POST" action="{{ route('user.update.telefono') }}" >
			{{ csrf_field() }}
			<div class="modal-body">
				<h3>Actualizar Teléfono</h3>
				<div class="form-group">
					<label for="recipient-name" class="col-form-label">Teléfono</label>
					<input type="text" class="form-control" name="telefono" id="telefono_update" value="" >
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Actualizar</button>
			</div>
		</form>
	  </div>
	</div>
  </div>

  <script>

		$('#modalNombre').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget);
			var name = button.data('name');
			var paterno = button.data('paterno');
			var materno = button.data('materno');

			$("#name_update").val(name);
			$("#paterno_update").val(paterno);
			$("#materno_update").val(materno);
			
		});
	  $('#modalTelefono').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var telefono = button.data('telefono');

		$("#telefono_update").val(telefono);
		
	});

	$('#modalEmail').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var email = button.data('email');

		$("#email_update").val(email);
		
	});
  </script>
@endsection