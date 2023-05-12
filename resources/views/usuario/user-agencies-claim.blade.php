<?php $page="Agencias Reclamadas";?>
@extends('layout.mainlayout')
@section('content')		
<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-4 theiaStickySidebar">
						@include('usuario.sidebar')
					</div>
					<div class="col-xl-9 col-md-8">
						<h4 class="widget-title">Agencias Reclamadas</h4>
						<div class="card mb-0">
							<div class="row no-gutters">
								<div class="col-lg-12">
									<div class="card-body">
										<table class="table table-hover table-center mb-0 datatable">
											<thead>
												<tr>
													<th>#</th>
													<th>Agencia</th>
													<th>Estatus</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($claims as $claim)	
												<tr>
													<td>{{ $claim->id }}</td>
													<td><a href="{{route('agencia.detalles',$claim->agencia[0]->id)}}" target="_blank" >
														{{ $claim->agencia[0]->nombre }}<a>
													</td>
													<td>
														<span class="text-white badge @if($claim->status == 'Aceptada') badge-success @elseif ($claim->status == 'Pendiente') badge-warning @else badge-danger @endif">
															{{ $claim->status }}
														</span>
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
		</div>﻿
</div>
@endsection