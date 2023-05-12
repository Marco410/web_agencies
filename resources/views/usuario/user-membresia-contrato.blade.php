<?php $page="Contrato de Membresia";?>
@extends('layout.mainlayout')
@section('content')		

<style>
	.selected{
		background-color: var(--hintdark); 
		border: white;
		padding: 15px 25px 15px 25px;
		transition: 0.5s;
	}
</style>
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-md-4 theiaStickySidebar">
				@include('usuario.sidebar')
			</div>
			<div class="col-xl-9 col-md-8">
				<h4 class="widget-title">Contrato para <strong>{{ $agencia->nombre }}</strong></h4>
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
					</div>
					<div class="col-sm-12">
						<div class="alert alert-success">
							Selecciona la solicitud que concuerde con esta agencia para firmar el contrato.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						@if($errors->any())
							@foreach($errors->all() as $error)
							<div role="alert" class="alert alert-danger alert-dismissible fade show"  ><strong>Error: </strong>{{ $error }}</div>
							@endforeach
						@endif
						
					</div>
				</div>
				@if ($contrato == null )
				
					<div class="row">
						@if ($suscripcion)
						<div class="col-sm-7 mb-2">
							<h6>Mi Solicitud:</h6>
							@foreach (auth()->user()->solicitudes as $sol)
								@if ($sol->id == $suscripcion->contrato->solicitud_id)
								<button class="btn btn-primary btn-solicitud " data-type="solicitud" data-id="{{ $sol->solicitud->id }}" > {{ $sol->solicitud->razon_social }} </button>	
									
								@endif
							@endforeach
						</div>
						@else
						<div class="col-sm-7 mb-2">
							<h6>Mi Solicitud:</h6>
							@foreach (auth()->user()->solicitudes as $sol)
								@if ($sol->solicitud->in_contract == 0)
									<button class="btn btn-primary btn-solicitud " data-type="solicitud" data-id="{{ $sol->solicitud->id }}" > {{ $sol->solicitud->razon_social }} </button>	
								@endif
							@endforeach
						</div>
						@endif
						
						<div class="col-sm-5">
							@if ($membresia->id == 2)
							<div class="card-plan plan">
								<div class="card-heading" style="background-color: var(--primary)">
									BASIC <small style="font-size: 12px;" >{{ $plan }}</small>
								</div>
							</div>
							@elseif($membresia->id == 3)
							<div class="card-plan plan">
								<div class="card-heading" style="background-color: var(--hover)">
									PLUS <small style="font-size: 12px;" >{{ $plan }}</small>
								</div>
							</div>
							@endif
						</div>
						@if ($suscripcion)
						<div class="col-sm-12">
							<h6>Solicitudes Agencia:</h6>
							@foreach (auth()->user()->solicitudes_agencia as $sol)
								@if ($sol->id == $suscripcion->contrato->solicitud_id)
								<button class="btn btn-primary btn-solicitud" data-type="solicitud-agencia" data-id="{{ $sol->id }}" style="font-size: 12px;" > {{ $sol->razon_social }} </button>	
									
								@endif
							@endforeach
						</div>
						@else
						<div class="col-sm-12">
							<h6>Solicitudes Agencia:</h6>
							@foreach (auth()->user()->solicitudes_agencia as $sol)
								@if ($sol->in_contract == 0)
									<button class="btn btn-primary btn-solicitud" data-type="solicitud-agencia" data-id="{{ $sol->id }}" style="font-size: 12px;" > {{ $sol->razon_social }} </button>	
								@endif

							@endforeach
						</div>
						@endif
						

						<div class="col-sm-12">
							<small>Haz click en la solicitud previamente elaborada para llenar tu contrato con los datos que nos brindaste.</small>
						</div>
						<div class="col-sm-12">
							<h5>Contrato</h5>
							<div class="card mb-0">
								<div class="card-body">
									<form method="POST" action="{{ route('user.perfil.membresia.contrato.firmar') }}">
										{{ csrf_field() }}
										<input type="hidden" name="firma" id="firma" value="{{ auth()->user()->firma }}" >
										<input type="hidden" name="type_solicitud" id="type_solicitud" value="" >
										<input type="hidden" name="solicitud_id" id="solicitud_id" value="" >
										<input type="hidden" name="agencia_id" value="{{ $agencia->id }}" >
										<input type="hidden" name="membresia_id" value="{{ $membresia->id }}" >
										<input type="hidden" name="plan" value="{{ $plan }}" >
										<div class="row">
											<div class="col-sm-12">
												<label>Información</label>
											</div>
											<div class="col-sm-12 border-bottom">
												<small class="text-secondary" >Nombre del Cliente:</small>
												<p id="razon_social" ></p>
											</div>
											<div class="col-sm-12 mt-2">
												<label>Datos del acta constitutiva</label>
											</div>
											<div class="col-sm-6 border-right border-bottom">
												<small class="text-secondary " >Número de instrumento:</small>
												<p id="no_instrumento" ></p>
											</div>
											<div class="col-sm-6  border-bottom">
												<small class="text-secondary" >Volumen:</small>
												<p id="acta_volumen"></p>
											</div>
											<div class="col-sm-6 border-right border-bottom">
												<small class="text-secondary"> Fecha de Celebración:</small>
												<p id="acta_fecha"></p>
											</div>
											<div class="col-sm-6 border-bottom">
												<small class="text-secondary" >Localidad:</small>
												<p id="acta_localidad"></p>
											</div>
											<div class="col-sm-6 border-right border-bottom">
												<small class="text-secondary" >Número de Notario:</small>
												<p id="acta_numero"></p>
											</div>
											<div class="col-sm-6 border-bottom">
												<small class="text-secondary" >Datos de inscripción ante el R.P.C.:</small>
												<p id="acta_datos"></p>
											</div>
											<div class="col-sm-12 mt-2">
												<label>Nombre del Representante o Apoderado Legal</label>
											</div>
											<div class="col-sm-12 border-bottom">
												<small class="text-secondary" >Nombre Completo:</small>
												<p id="nombre" ></p>
											</div>
											<div class="col-sm-12 mt-2">
												<label>Datos del Poder Notarial</label>
											</div>
											<div class="col-sm-6 border-right border-bottom">
												<small class="text-secondary " >Número de instrumento:</small>
												<p id="datos_no_instrumento" ></p>
											</div>
											<div class="col-sm-6  border-bottom">
												<small class="text-secondary" >Volumen:</small>
												<p id="datos_volumen"></p>
											</div>
											<div class="col-sm-6 border-right border-bottom">
												<small class="text-secondary"> Fecha de Celebración:</small>
												<p id="datos_fecha" ></p>
											</div>
											<div class="col-sm-6 border-bottom">
												<small class="text-secondary" >Localidad:</small>
												<p id="datos_localidad" ></p>
											</div>
											<div class="col-sm-6 border-right border-bottom">
												<small class="text-secondary" >Número de Notario:</small>
												<p id="datos_notario" ></p>
											</div>
											<div class="col-sm-6 border-bottom">
												<small class="text-secondary" >Datos de inscripción</small>
												<p id="datos_datos" ></p>
											</div>
											<div class="col-sm-12 mt-2">
												<label>Datos</label>
											</div>
											<div class="col-sm-6 border-right border-bottom">
												<small class="text-secondary" >RFC:</small>
												<p id="rfc"></p>
											</div>
											<div class="col-sm-6 border-bottom">
												<small class="text-secondary" >Domicilio:</small>
												<p id="domicilio"></p>
											</div>
											<div class="col-sm-6 border-right border-bottom">
												<small class="text-secondary" >Teléfono:</small>
												<p id="telefono"></p>
											</div>
											<div class="col-sm-6 border-bottom">
												<small class="text-secondary" >Correo Electrónico:</small>
												<p id="correo"></p>
											</div>
											
										</div>
										
										<div class="row">
											<div class="col-sm-12 text-center mt-4">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" name="check_confirmo"  id="customCheck1">
													<label style="font-size: 15px" class="custom-control-label" for="customCheck1">Por medio de la presente, ratifico que los datos aquí contenidos son verdaderos y vigentes, contando con la facultad suficiente para suscribir el presente contrato; por lo cual, anexo la correspondiente documentación que así lo acredita y he leído el <a target="_blank" href="{{ asset('assets/contrato/contrato.pdf') }}">contrato</a>.</label>
													
												</div>
											</div>
											<div class="col-sm-12 mt-4 text-center">
												<p></p>
											</div>
											
											<div class="col-sm-6 offset-3">
												<label for="">Firma Digital <i class="fas fa-signature" ></i> 
													
												@if (auth()->user()->firma == null)
												| <button class="btn btn-delete text-primary" type="button" id="btn-limpiar" > <i class="fas fa-trash" ></i> Limpiar</button></label>
												<div class="signature" style="width: 100%; height: 150px;" >
													<canvas id="signature-canvas" style="border: 1px dashed var(--hover); width:100%; height: 150px;" ></canvas>
												</div>
												@else
												| <a class="btn btn-delete text-primary" href="{{ route('user.perfil.membresia.firma.delete') }}">Eliminar</a></label>
												<img style='display:block; width:100%;height:150px;' id='base64image' src='data:image/jpeg;base64,{{auth()->user()->firma}}' />
												@endif
											</div>
											<div class="col-sm-6 form-group mt-4 offset-3">
												<button class="btn btn-primary btn-block" >Firmar Contrato</button>
											</div>
										</div>
									</form>

								</div>
							</div>
						</div>
					</div>
				@else
					<div class="row">
						<div class="col-sm-12">
							<div class="alert alert-warning">
								Hay un contrato que esta pendiente para esta agencia. Terminalo o cancelalo <a href="{{ route('user.perfil.membresia.check',  'contrato_id='.$contrato->id) }}">aquí.</a>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
</div>

  
@endsection