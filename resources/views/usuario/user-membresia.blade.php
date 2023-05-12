<?php $page="Seleccion de Membresia";?>
@extends('layout.mainlayout')
@section('content')		
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-md-4 theiaStickySidebar">
				@include('usuario.sidebar')
			</div>
			<div class="col-xl-9 col-md-8">
				<h4 class="widget-title">Membresía para <strong>{{ $agencia->nombre }}</strong></h4>
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
				</div>
				<div class="row">
					<div class="col-sm-7">
						<h5>Información</h5>
						<div class="card mb-0">
							<div class="row no-gutters">
								<div class="col-lg-12">
									<div class="card-body">
										<div class="row">
											<form method="GET" action="{{ /* route('user.perfil.membresia.check') */route('user.perfil.membresia.contrato') }}">
												<input type="hidden" name="membresia" value="{{ $membresia->id }}">
												<input type="hidden" name="agencia" value="{{ $agencia->id }}">
												<div class="col-sm-12  border-bottom">
													<div class="row mb-2">
														<div class="col-sm-7">
															<div class="form-check ">
																<input class="form-check-input" type="radio" name="plan" value="mensual" id="mensual">
																<label class="form-check-label" for="mensual">
																	Plan Mensual
																</label>
														</div>
													</div>
													<div class="col-sm-5">
														<small>Costo: <strong>${{ number_format($membresia->mensual,2,".",",")}} MXN</strong></small>
													</div>
												</div>
											</div>
											<div class="col-sm-12 border-bottom">
												<div class="row mb-2 mt-2">
													<div class="col-sm-7">
														<div class="form-check ">
															<input class="form-check-input" type="radio" name="plan" value="semestral" id="semestral" checked>
															<label class="form-check-label" for="semestral">
															  Plan Semestral
															</label> <br>
															<small class="text-secondary" >Obtén el 5% de descuento</small>
														  </div>
													</div>
													<div class="col-sm-5">
														<small>Costo: <strong>${{ number_format($membresia->semestral,2,".",",")}} MXN</strong></small>
													</div>
												</div>
											</div>
											<div class="col-sm-12 border-bottom">
												<div class="row">
													<div class="col-sm-7">
														<div class="form-check mt-2 mb-2">
															<input class="form-check-input" type="radio" name="plan" value="anual" id="anual" checked>
															<label class="form-check-label" for="anual">
															Plan Anual
															</label> <br>
															<small class="text-secondary" >Obtén el 12% de descuento</small>
														</div>
													</div>
													<div class="col-sm-5">
														<small>Costo: <strong>${{ number_format($membresia->anual,2,".",",")}} MXN</strong></small>
													</div>
												</div>
											</div>
											<div class="col-sm-12 text-right mt-3 cho-container">
												<button type="submit" class="btn btn-md btn-primary" >Continuar</button>
											</div>
										</form>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-5">
							<div class="row no-gutters">
								<div class="col-lg-12">
										<div class="row">
											<div class="col-sm-12">
													@if ($membresia->id == 2)
													
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
															
														</div>
													</div>
													@elseif($membresia->id == 3)
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
																<p class="text mt-3">Inventario de autos en tiempo real* <small>(En Desarrollo)</small></p>
															</div>
															
														</div>
													</div>
													@endif
												
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

  
@endsection