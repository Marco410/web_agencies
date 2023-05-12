<?php $page="Comentarios";?>
@extends('layout.mainlayout')
@section('content')		
<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-4 theiaStickySidebar">
						@include('usuario.sidebar')
					</div>
					<div class="col-xl-9 col-md-8">
						<h4 class="widget-title">Cita 	@if ($cita->accept == 0 )
							<span class="badge badge-info" >Sin Revisar</span>
						@elseif ($cita->accept == 1)
							<span class="badge badge-success" >Aceptada</span>	
						@else
						<span class="badge badge-danger" >Rechazada</span>
						@endif</h4>
						<div class="card mb-0">
							<div class="row no-gutters">
									<div class="col-lg-12">
										<div class="card-body">
											<div class="row">
												<div class="col-sm-6 border-right border-bottom mt-3">
													<small class="text-secondary" >No Cita:</small>
													<p>{{ $cita->id }} </p>
												</div>
												<div class="col-sm-6 border-bottom mt-3">
													<small class="text-secondary " >Fecha y hora solicitada:</small>
													<p>{{ Date('d/M/Y h:i a', strtotime($cita->date_cita)) }} </p>
												</div>
												<div class="col-sm-6 border-right border-bottom mt-3">
													<small class="text-secondary" >Concesionaria:</small>
													<p>{{ $cita->agencia[0]->nombre }} </p>
												</div>
												<div class="col-sm-6 border-bottom mt-3">
													<small class="text-secondary " >Tipo de Cliente:</small>
													<p>{{ $cita->tipo_cliente}} </p>
												</div>
												<div class="col-sm-6 border-right border-bottom mt-3">
													<small class="text-secondary" >Nombre:</small>
													<p>{{ $cita->nombre }} </p>
												</div>
												<div class="col-sm-6 border-bottom mt-3">
													<small class="text-secondary " >Apellidos:</small>
													<p>{{ $cita->apellidos}} </p>
												</div>
												<div class="col-sm-6 border-right border-bottom mt-3">
													<small class="text-secondary" >Teléfono:</small>
													<p>{{ $cita->telefono }} </p>
												</div>
												<div class="col-sm-6 border-bottom mt-3">
													<small class="text-secondary " >Correo Electrónico:</small>
													<p>{{ $cita->email}} </p>
												</div>
												<div class="col-sm-6 border-right border-bottom mt-3">
													<small class="text-secondary" >Forma de Contacto:</small>
													<p>{{ $cita->contacto }} </p>
												</div>
												<div class="col-sm-6 border-bottom mt-3">
													<small class="text-secondary " >Motivo:</small>
													<p>{{ $cita->motivo_cita}} </p>
												</div>
												<div class="col-sm-12 border-bottom mt-3">
													<small class="text-secondary " >Descripción de la cita:</small>
													<p>{{ $cita->motivo_cita}} </p>
												</div>
												<div class="col-sm-6 mt-3 offset-6 ">
													<button class="btn btn-sm bg-danger-light float-right ml-4"  data-toggle="modal" data-target="#rechazar_cita"  >Rechazar</button>
													<button class="btn btn-sm bg-success-light float-right" data-toggle="modal" data-target="#aceptar_cita" >Aceptar</button>
													
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
</div>

<div class="modal fade" id="aceptar_cita" tabindex="-1" role="dialog" aria-labelledby="aceptar_citaLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="aceptar_citaLabel">Aceptar Cita</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form action="{{ route('user.citas.ask') }}" method="POST" >
			{{ csrf_field() }}
			<div class="modal-body">
				<p>¿Estás seguro de aceptar esta cita?</p>
				<label for="">Agrega una nota: (Opcional)</label>
				<textarea name="nota_dealer" class="form-control" >¡Te esperamos!</textarea>
			</div>
			<input type="hidden" name="cita_id"  value="{{ $cita->id }}"  >
			<input type="hidden" name="respond" value="1"   >
			<div class="modal-footer">
				<button type="button" class="btn btn-sm bg-secondary-light" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-sm bg-success-light">Si, Aceptar</button>
			</div>
		</form>
	  </div>
	</div>
  </div>

  <div class="modal fade" id="rechazar_cita" tabindex="-1" role="dialog" aria-labelledby="rechazar_citaLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="rechazar_citaLabel">Rechazar Cita</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form action="{{ route('user.citas.ask') }}" method="POST" >
			{{ csrf_field() }}

			<div class="modal-body">
				<p>¿Estás seguro de rechazar esta cita?</p>
				<label for="">Agrega una nota:</label>
				<textarea name="nota_dealer" class="form-control" >Tuvimos que rechazar tu cita...</textarea>

				<input type="hidden" name="cita_id"  value="{{ $cita->id }}"  >
			<input type="hidden" name="respond" value="2"   >
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm bg-secondary-light" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-sm bg-danger-light">Si, Rechazar</button>
			</div>
		</form>
	  </div>
	</div>
  </div>
@endsection