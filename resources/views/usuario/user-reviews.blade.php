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
						<h4 class="widget-title">Mi Comentarios</h4>
						<div class="card mb-0">
							<div class="row no-gutters">
								<div class="col-lg-12">
									<div class="card-body">
										<table class="table table-hover table-center mb-0 datatable">
											<thead>
												<tr>
													<th>#</th>
													<th>Agencia</th>
													<th>Comentario</th>
													<th>Atención</th>
													<th>Practicidad</th>
													<th>Velocidad</th>
													<th>Resultado Final</th>
													<th>Rating</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($reviews as $rev)	
												<tr>
													<td>{{ $rev->id }}</td>
													<td><a href="{{route('agencia.detalles',$rev->agencia[0]->id)}}" target="_blank" >
														{{ $rev->agencia[0]->nombre }}<a>
													</td>
													<td>{{ $rev->text }}</td>
													<td><i class="fas fa-star filled" ></i> {{ $rev->atencion }}</td>
													<td><i class="fas fa-star filled" ></i> {{ $rev->practicidad }}</td>
													<td><i class="fas fa-star filled" ></i> {{ $rev->velocidad }}</td>
													<td><i class="fas fa-star filled" ></i> {{ $rev->resultado }}</td>
													<td><i class="fas fa-star filled" ></i> {{ $rev->rating }}</td>
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