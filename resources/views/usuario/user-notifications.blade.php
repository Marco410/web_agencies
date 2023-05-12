<?php $page="Notificaciones";?>
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
				<h4 class="widget-title">Notificaciones</h4>
                <div class="row">
                    <div class="col-sm-12">
						@foreach ($notifications as $noti)	
						<div class="card">
							<div class="card-body">
								<div class="row">

									<div class="col-sm-1 text-center">
										<div class="noti-avatar">
											<img src="https://truelysell.com/assets/img/user.jpg" width="50px" alt="">
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
										@if ($noti->type == "App\Notifications\AnswerReview")
										<a class="text-primary" href="{{route('comentarios.see',$noti->data['data']['review']['agencia_id'].$notiAdd )}}"><h5>{{ $noti->data['text'] }}</h5></a>
										<span>{{ Date('d M Y h:m a', strtotime($noti->created_at )) }}</span>

										@elseif($noti->type == "App\Notifications\NewCita")
										<a class="text-primary" ><h5>{{ $noti->data['text'] }}</h5></a>
										<span>{{ Date('d M Y h:m a', strtotime($noti->created_at )) }}</span>
										@elseif($noti->type == "App\Notifications\NewReview")
										<a class="text-primary" ><h5>{{ $noti->data['text'] }}</h5></a>
										<span>{{ Date('d M Y h:m a', strtotime($noti->created_at )) }}</span>
										@elseif($noti->type == "App\Notifications\NewReviewPersonal")
										<a class="text-primary" ><h5>{{ $noti->data['text'] }}</h5></a>
										<span>{{ Date('d M Y h:m a', strtotime($noti->created_at )) }}</span>
										@endif
										{{-- <label for=""> <a target="_black" href="{{route('agencia.detalles',$noti->data['data']['agencia_id'] )}}">Ver agencia</a> </label> --}} |
										@if ($noti->type == "App\Notifications\AnswerReview")
										<label for=""> <a target="_black" href="{{route('agencia.detalles',$noti->data['data']['review']['agencia_id'] )}}">Ver comentario</a> </label>
										@elseif($noti->type == "App\Notifications\NewCita")
										<label for=""> <a target="_black" href="{{route('user.citas.ver',$noti->data['data']['id'] )}}">Ver Cita</a> </label>
										@elseif($noti->type == "App\Notifications\NewReview")
										<label for=""> <a target="_black" href="{{route('user.citas.ver',$noti->data['data']['id'] )}}">Ver Comentario sobre mi agencia</a> </label>
										@elseif($noti->type == "App\Notifications\NewReviewPersonal")
										<label for=""> <a target="_black" href="{{route('user.personal.ver',$noti->data['data']['personal_id'] )}}">Ver Comentario sobre tu personal</a> </label>
										@endif
										<div class="row">

											<div class="col-sm-2">
												<form  method="POST" action="{{ route('notifications.delete',$noti->id) }}">
													{{ method_field('DELETE') }}
													{{ csrf_field() }}
													<button type="submit" class="btn btn-sm bg-danger-light" > <i class="fas fa-trash-alt"></i> Eliminar</button>
												</form>
											</div>
											<div class="col-sm-4">
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
</div>
@endsection
	  