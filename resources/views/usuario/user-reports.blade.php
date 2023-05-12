<?php $page="Reportes";?>
@extends('layout.mainlayout')
@section('content')		
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-md-4 theiaStickySidebar">
				@include('usuario.sidebar')
			</div>
			<div class="col-xl-9 col-md-8">
				<div class="row">
					<div class="col-sm-5">
						<h4 class="widget-title">Reportes</h4>
					</div>
					<div class="col-sm-7">
						<h6 class="text-info" style="float: right;" >Solo puedes obtener los reportes de una agencia <strong>PLUS</strong></h6>
					</div>
				</div>
				<div class="row border-bottom mb-4">
					<div class="col-sm-12">
						@if (session('status_reports'))
							<div class="alert alert-success">
								{{ session('status_reports') }}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 form-group">
						<select class="form-control" name="agencias" id="agencias">
							<option value="">Seleccione una agencia:</option>
							@foreach ($agencias as $agencia)
							@if ($agencia['agencia'][0]->membresia_id == 3)
								<option value="{{$agencia['agencia'][0]->id}}">{{$agencia['agencia'][0]->nombre}}</option>
							@endif
							@endforeach
						</select>
					</div>
				</div>
				<div class="row ">
					
					<div class="col-lg-12">
						<div class="row dash-widget dash-bg-1 p-4">
							<div class="col-sm-6">
								<h4 class="text-white" >Quick Response</h4>
							</div>
							<div class="col-sm-6">
								<h4 class="text-white" >{{ $answersCount}} mensajes contestados</h4>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-3" style="margin-bottom: 0px;margin-bottom: 0px; background-color: var(--primary); border-radius: 24px; justify-content: center; padding: 30px; align-items: center;">
										<i class="fas fa-comments fa-3x text-white" ></i>
									</div>
									<div class="col-sm-8" >
										<h5 class="" style="float: right; text-align: right;" >Comentarios</h5>
											<a id="enlace-comentarios" target="_blank" href="#" >
												<small class="text-secondary" style="float: right;" >Generar Reporte ></small>
											</a> 
											<small id="msj-enlace" class="text-secondary" style="float: right;" >Elige una agencia</small>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="card">
							<div class="row">
								<div class="col-sm-12">

									<div class="card-body">
										<div class="row">
											<div class="col-sm-3" style="margin-bottom: 0px;margin-bottom: 0px; background-color: var(--primary); border-radius: 24px; justify-content: center; padding: 30px; align-items: center;">
												<i class="fas fa-car fa-3x text-white" ></i>
											</div>
											<div class="col-sm-8 float-right" >
												<h5 class="float-right" style="text-align: right;" >Calificación de la agencia</h5>
												<a id="enlace-agencias" target="_blank" href="#" >
													<small class="text-secondary" style="float: right;" >Generar Reporte ></small>
												</a> 
												<small id="msj-enlace-agencia" class="text-secondary" style="float: right;" >Elige una agencia</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-lg-6">
						<div class="card">
							<div class="row">
								<div class="col-sm-12">

									<div class="card-body">
										<div class="row">
											<div class="col-sm-3"  style="margin-bottom: 0px; background-color: var(--primary); border-radius: 24px; justify-content: center; padding: 30px; align-items: center;">
												<i class="fas fa-calendar fa-3x text-white" ></i>
											</div>
											<div class="col-sm-8 float-right" >
												<h5 class="float-right" style="text-align: right;" >Calificación del mes</h5>
												<a id="enlace-mes" target="_blank" href="#" >
													<small class="text-secondary" style="float: right;" >Generar Reporte ></small>
												</a> 
												<small id="msj-enlace-mes" class="text-secondary" style="float: right;" >Elige una agencia</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-lg-6">
						<div class="card">
							<div class="row">
								<div class="col-sm-12">

									<div class="card-body">
										<div class="row">
											<div class="col-sm-3" style="margin-bottom: 0px; background-color: var(--primary); border-radius: 24px; justify-content: center; padding: 30px; align-items: center;">
												<i class="fas fa-users fa-3x text-white" ></i>
											</div>
											<div class="col-sm-8 float-right" >
												<h5 class="float-right" style="text-align: right;" >Calificación de mis empleados</h5>
												<a id="enlace-empleados" target="_blank" href="#" >
													<small class="text-secondary" style="float: right;" >Generar Reporte ></small>
												</a> 
												<small id="msj-enlace-empleados" class="text-secondary" style="float: right;" >Elige una agencia</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>

					<div class="col-lg-12">
						<div class="row dash-widget dash-bg-1 p-4">
							<div class="col-sm-6">
								<?php 
									$fecha_actual = date("d-m-Y");
								?>
								<h4 class="text-white" >Reporte del mes de {{ date("M/Y",strtotime($fecha_actual."- 1 month")) }}</h4>
							</div>
							<div class="col-sm-6">
								<a id="enlace-reporte-mensual" target="_blank" href=""><h4 class="text-white" > Descargar <i class="fas fa-download" ></i></h4></a> 
								<h4 id="msj-enlace-reporte-mensual" class="text-white" style="float: right;" >Elige una agencia</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection