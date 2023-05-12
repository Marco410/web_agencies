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
						<div class="row mb-4">
							<div class="col-sm-5">
								<h4 class="widget-title">Comentarios</h4>
							</div>
							<div class="col-sm-7">
								<h6 class="text-info" style="float: right;" >Solo podrás responder y filtrar los de una agencia <strong>PLUS</strong></h6>
							</div>
							{{-- @if (auth()->user()->membresia_id != 3)
								<div class="col-sm-4">
									<span class="float-right" >Nosotros contestamos por ti con:</span>
									<h4 class="float-right">QuickResponse®</h4>
								</div>
								<div class="col-sm-3">
									<a href="{{ route('user.cambiar.plan') }}" class="btn btn-md btn-primary float-right" >¡Hacerme Plus!</a>
								</div>
							@endif --}}
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
												@if (session('status_comment'))
													<div class="alert alert-success">
														{{ session('status_comment') }}
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
												<table id="tabla-comments" class="table table-hover table-center mb-0" style="width:100%">
													<thead>
														<tr>
															<th>#</th>
															<th>Agencia</th>
															<th>Autor</th>
															<th>Fecha</th>
															<th>Estado</th>
															<th>Comentario</th>
															<th>Acciones</th>
														</tr>
													</thead>
													<tbody>
														@for ($i = 0; $i < count($reviews) ; $i++)
															@foreach ($reviews[$i] as $review)	
																<tr>
																	<td>{{ $review->id }}</td>
																	<td><a href="{{route('agencia.detalles',$review->agencia->id)}}" target="_blank" >
																	{{ $review->agencia->nombre }}<a>
																	</td>
																	<td>
																		@if($review->autor)
																		{{ $review->autor }}
																		@else
																		{{ $review->user[0]->name }} 
																		@endif
																	</td>
																	<td>{{ Date('d/M/Y h:i a', strtotime($review->date_review)) }}</td>
																	<td>
																		@if ($review->agencia->membresia_id == 3)
																			@if ($review->answers_count == 0 )
																			<a class="btn btn-sm bg-primary-light" data-toggle="modal" data-target="#modalComentario" data-created="{{ $review->created_at }}"  data-whatever="{{ $review->text }}" data-rating="{{$review->rating}}" data-autorid="0" data-autor="@if($review->autor)
																				{{ $review->autor }}
																				@else
																				{{ $review->user[0]->name }} 
																				@endif" data-id="{{$review->id}}" data-ate="{{ $review->atencion }}" data-prac="{{ $review->practicidad }}" data-vel="{{ $review->velocidad }}" data-res="{{ $review->resultado }}"  onclick="comment(this)"> <i class="fas fa-reply"></i> Responder</a>
																			
																			@else
																			<span class="badge badge-success badge-pill mr-3 ml-1">Respondido</span>
																			@endif
																		@else
																				<small>Actualiza la agencia a <strong >PLUS</strong> para responder</small>
																		@endif
																	</td>
																	<td>
																		{{ $review->text }}
																	</td>
																	<td>
																		<a class="btn btn-sm bg-info-light " href="{{ route('user.comments.see',$review->id) }}"> <i class="fas fa-eye" ></i> </a>
																	</td>
																	
																</tr>
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

@include('usuario.modals.comment-add-answer-modal')	
@include('admin.comentarios.comment-delete-modal')	

@endsection