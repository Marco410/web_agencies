<?php $page="Citas";?>
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
								<h4 class="widget-title">Citas en mis Agencias</h4>
							</div>
							<div class="col-sm-7">
								<h6 class="text-info" style="float: right;" >Solo podrás recibir y filtrar los de una agencia <strong>PLUS</strong></h6>
							</div>
						</div>
						
							<div class="row">
								<div class="col-sm-12">
									@foreach ($agencias as $agencia)
										@if ($agencia->agencia[0]->membresia_id != 3)
										<div class="alert alert-warning">
											Cambia la agencia <strong>{{ $agencia->agencia[0]->nombre }} </strong>a PLUS para poder recibir citas. </strong>Compralo <a href="{{ route('user.agency.stats',$agencia->agencia[0]->id) }}"> aquí.</a>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										@endif
									@endforeach
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-sm-8 mb-2">
									<label for=""> <i class="fas fa-filter" ></i>  Filtros: </label><a style="float: right" href="{{ route('user.comments') }}" >Eliminar Filtros</a>
									<select class="form-control" name="filter" id="filter">
										<option value="">Seleccione:</option>
										@foreach ($agencias as $agencia)
										@if ($agencia->agencia[0]->membresia_id == 3)
										<option value="{{ $agencia->agencia[0]->id }}"@if (isset($_GET['agencia'])) @if ($_GET['agencia'] == $agencia->agencia[0]->id) selected @endif  @endif>{{ $agencia->agencia[0]->nombre }}</option>
										@endif
										@endforeach
									</select>
								</div>
								<div class="col-sm-6 ">
									
								</div>
							</div>
						<div class="card mb-0">
							<div class="row no-gutters">
								
								<div class="col-lg-12">
									<div class="card-body">
										<div class="row">
											<div class="col-sm-12">
												@if (session('status_cita'))
													<div class="alert alert-success">
														{{ session('status_cita') }}
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
												@endif
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="table-responsive">
												<table id="tabla-citas" class="table table-hover table-center mb-0" style="width:100%">
													<thead>
														<tr>
															<th>#</th>
															<th>Agencia</th>
															<th>Autor</th>
															<th>Fecha Solicitada</th>
															<th>Tipo de Cliente</th>
															<th>Motivo</th>
															<th>Estatus</th>
															<th>Acciones</th>
														</tr>
													</thead>
													<tbody>
														@for ($i = 0; $i < count($citas) ; $i++)
															@foreach ($citas[$i] as $cita)
																@if ($cita->agencia[0]->membresia_id == 3)
																<tr>
																	<td>{{ $cita->id }}</td>
																	<td><a href="{{route('agencia.detalles',$cita->agencia[0]->id)}}" target="_blank" >
																		{{ $cita->agencia[0]->nombre }}<a>
																		</td>
																		<td>{{ $cita->nombre }} {{ $cita->apellidos }}</td>
																		
																		<td>{{ Date('d/M/Y h:i a', strtotime($cita->date_cita)) }}</td>
																		<td>{{ $cita->tipo_cliente }}</td>
																		<td>{{ $cita->motivo_cita }}</td>
																		<td>
																			@if ($cita->accept == 0 )
																				<span class="badge badge-info" >Sin Revisar</span>
																			@elseif ($cita->accept == 1)
																				<span class="badge badge-success" >Aceptada</span>	
																			@else
																			<span class="badge badge-danger" >Rechazada</span>
																			@endif
																		</td>
																		<td>
																			<a class="btn btn-sm bg-info-light " href="{{ route('user.citas.ver',$cita->id) }}"> <i class="fas fa-eye" ></i> </a>
																		</td>
																		
																	</tr>
																@endif	
															@endforeach
														@endfor
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
					</div>
				</div>
			</div>
		</div>
</div>
@endsection