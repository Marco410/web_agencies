<?php $page="Notificaciones";?>
@extends('layout.mainlayout_admin')
@section('content')		
<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Todas las notificaciones</h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<div class="row">
					<div class="col-sm-12">
						@if (session('status-noti'))
							<div class="alert alert-success">
								{{ session('status-noti') }}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						@endif
					</div>
				</div>
				<div class="row">
					
					<div class="col-sm-12">
						@foreach ($notifications as $noti)	
						<div class="card">
							<div class="card-body">
								<div class="row">

									<div class="col-sm-1 text-center">
										<div class="noti-avatar">
											<img src="{{ asset('assets/img/user.png') }}" width="50px" alt="">
										</div>
									</div>
									<div class="col-sm-11">
										<?php 
											if($noti->read_at == null){
												$notiAdd = "?noti=". $noti->id;
											}	else{
												$notiAdd = "";
											}
										?>
										@if ($noti->type == "App\Notifications\NewReview")
										<a class="text-primary" href="{{route('comentarios.see',$noti->data['data']['id'].$notiAdd )}}"><h5>{{ $noti->data['text'] }}</h5></a>
										@endif
										@if ($noti->type == "App\Notifications\ContactoNoti")
										<a class="text-primary" href="{{route('contacto.msj' )}}"><h5>{{ $noti->data['text'] }}</h5></a>
										@endif
										@if ($noti->type == "App\Notifications\SolicitudAgencyNoti")
										<a class="text-primary" href="{{route('solicitudes.agencies' )}}"><h5>{{ $noti->data['text'] }}</h5></a>
										@endif
										@if ($noti->type == "App\Notifications\SolicitudNoti")
										<a class="text-primary" href="{{route('solicitudes' )}}"><h5>{{ $noti->data['text'] }}</h5></a>
										@endif

										<span>{{ Date('d M Y h:m a', strtotime($noti->created_at )) }}</span>
										
										@if ($noti->type == "App\Notifications\NewReview")
										<label for=""> <a target="_black" href="{{route('agencia.detalles',$noti->data['data']['agencia_id'] )}}">Ver agencia</a> </label> |
										<label for=""> <a target="_black" href="{{route('comentarios.see',$noti->data['data']['id'] )}}">Ver comentario</a> </label>
										@endif

										@if ($noti->type == "App\Notifications\ContactoNoti")
										<label for=""> <a target="_black" href="{{route('contacto.msj')}}">Ver Mensaje</a> </label>
										@endif

										@if ($noti->type == "App\Notifications\SolicitudAgencyNoti")
										<label for=""> <a target="_black" href="{{route('solicitudes.agencies')}}">Ver Solicitud</a> </label>
										@endif
										@if ($noti->type == "App\Notifications\SolicitudNoti")
										<label for=""> <a target="_black" href="{{route('solicitudes')}}">Ver Solicitud</a> </label>
										@endif
										<div class="row">

											<div class="col-sm-2">
												<form  method="POST" action="{{ route('notifications.delete',$noti->id) }}">
													{{ method_field('DELETE') }}
													{{ csrf_field() }}
													<button type="submit" class="btn btn-sm bg-danger-light" > <i class="fas fa-trash-alt"></i> Eliminar</button>
												</form>
											</div>
											<div class="col-sm-3">
												
												@if ($noti->read_at == null)
												<form  method="POST" action="{{ route('notifications.read',$noti->id) }}">
													{{ method_field('PATCH') }}
													{{ csrf_field() }}
													<button type="submit" class="btn btn-sm bg-primary-light" > <i class="fab fa-readme"></i> Marcar como leída</button>
												</form>
												@endif
											</div>
										</div>
											
										
									</div>
								</div>
							</div>
						</div>	
						@endforeach
					</div>
					
				</div>
			</div>
		</div>
</div>
<!-- /Main Wrapper -->
@endsection
	  