<?php $page="Comentario";?>
@extends('layout.mainlayout')
@section('content')		
<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-4 theiaStickySidebar">
						@include('usuario.sidebar')
					</div>
					<div class="col-xl-9 col-md-8">
						<h4 class="widget-title">Comentario</h4>
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
												<div class="card">
													<div class="card-body text-center">
														<div class="review-list">
															<div class="review-img">
																@if ($rev->user_id)
																	<img class="rounded-circle" width="80px"
																		src="{{ asset('assets/img/user.png') }}" alt="">
																@else
																	<img class="rounded-circle" src="{{ $rev->foto_url }}"
																		alt="">
																@endif
															</div>
															<div class="review-info">
																@if ($rev->user_id)
																<h5>{{ $rev->user[0]->name }} {{ $rev->user[0]->apellido_p }}</h5>
																<div class="review-date">
																	{{ date('d M Y', strtotime($rev->created_at)) }}
																</div>
																<?php 
																$autor = $rev->user[0]->name ." ". $rev->user[0]->apellido_p;
																$autorid = $rev->user[0]->id;
																?>
																@else
																<h5>{{ $rev->autor }}</h5>
																	<div class="review-date">
																		{{ date('d M Y', $rev->time) }} </div>
																<?php 
																$autor = $rev->autor;
																$autorid = 0;
																 ?>
							
																@endif
																<p class="mb-0 text-primary">{{ $rev->text }}</p>
																@if ($rev->user_id)
																	<small>Atención ({{ $rev->atencion }}) <i
																			class="fas fa-star filled"></i></small>
																	<small>Practicidad ({{ $rev->practicidad }}) <i
																			class="fas fa-star filled"></i></small>
																	<small>Velocidad ({{ $rev->velocidad }}) <i
																			class="fas fa-star filled"></i></small>
																	<small>Resultado ({{ $rev->resultado }}) <i
																			class="fas fa-star filled"></i></small>
																@endif
															</div>
															<div class="review-count">
																<div class="rating">
																	<i
																		class="fas fa-star {{ $rev->rating >= 1 ? 'filled' : '' }}"></i>
																	<i
																		class="fas fa-star {{ $rev->rating >= 2 ? 'filled' : '' }}"></i>
																	<i
																		class="fas fa-star {{ $rev->rating >= 3 ? 'filled' : '' }}"></i>
																	<i
																		class="fas fa-star {{ $rev->rating >= 4 ? 'filled' : '' }}"></i>
																	<i
																		class="fas fa-star {{ $rev->rating >= 5 ? 'filled' : '' }}"></i>
																	<span
																		class="d-inline-block average-rating">({{ $rev->rating }})</span>
																</div>
															</div>
															<div class="row mt-4">
																<div class="col-sm-12 offset-2">
																	@if ($rev->agencia->membresia_id == 3)

																	<a class="btn btn-sm bg-primary-light" data-toggle="modal" data-target="#modalComentario" data-created="{{ $rev->created_at }}"  data-whatever="{{ $rev->text }}" data-rating="{{$rev->rating}}" data-autorid="0" data-autor="@if($rev->autor)
																		{{ $rev->autor }}
																		@else
																		{{ $rev->user[0]->name }} 
																		@endif" data-id="{{$rev->id}}" data-ate="{{ $rev->atencion }}" data-prac="{{ $rev->practicidad }}" data-vel="{{ $rev->velocidad }}" data-res="{{ $rev->resultado }}"  onclick="comment(this)"> <i class="fas fa-reply"></i> Responder</a>
																		@else
																			<small>Actualiza la agencia a <strong >PLUS</strong> para responder</small>
																	@endif
																		<a class="btn btn-sm bg-info-light" href="{{ route('agencia.detalles',$rev->agencia_id) }}" > <i class="fas fa-car" ></i> Ver comentario en agencia</a >
																</div>
															</div>
															
														
														</div>
														
													</div>
												</div>
											</div>
											@if ($rev->agencia->membresia_id == 3)

											<div class="col-sm-10 offset-1">
												<div class="card">
													<div class="card-body">
														<div class="col-sm-12 text-center">
															<h4 class="mb-4 " >Respuestas</h4>
														</div>
														<hr>
														@if (!$rev->answers->isEmpty())
															@foreach ($rev->answers as $answer)
															<div class="row ">
																<div class="col-sm-3 text-center">
																	<img class="rounded-circle" width="70px"
																	src="{{ asset('assets/img/user.png') }}" alt="">
																<h6>{{ $answer->user->name }} {{ $answer->user->apellido_p }}</h6>
																</div>
																<div class="col-sm-9">
																	<i class="fas fa-comment-dots" ></i>
																	<p>Respuesta: <strong>{{ $answer->answer }}</strong> </p>
																	<p>Fecha:  <strong>{{ Date('d M Y h:m a', strtotime($answer->created_at )) }}</strong></p>
																</div>
															</div>
															<hr>
															@endforeach
														@else
														<div class="col-sm-12 text-center">
															<h6>Aún no se le ha respondido</h6>
														</div>
														@endif
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
</div>

@include('usuario.modals.comment-add-answer-modal')	

@endsection