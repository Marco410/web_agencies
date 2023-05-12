<?php $page="Éxito en tu Compra";?>
@extends('layout.mainlayout')
@section('content')		
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-md-4 theiaStickySidebar">
				@include('usuario.sidebar')
			</div>
			<div class="col-xl-9 col-md-8">
				<h4 class="widget-title">¡FELICIDADES!</h4>
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
					<div class="col-sm-8 offset-2">
						<h5>Detalle de tu Suscripción</h5>
						<div class="card mb-0">
							<div class="row no-gutters">
								<div class="col-sm-12 ">
									<div class="card-body">
										<div class="row text-center">
											<div class="col-sm-12 text-center">
												<img class="img-fluid" width="50px" src="{{ asset('assets/img/icons/checked.png') }}" alt="Plan"> <br>
											</div>
											<div class="col-sm-12">
												<span class="mt-4" >Disfruta ahora de los beneficios de tu plan</span>
											</div>
											<div class="col-sm-12">
												<span>Suscripcion No: <strong>AN-{{ $suscripcion->id }}</strong></span>
											</div>
											<div class="col-sm-12">
												<span>Tipo: <strong>{{ $suscripcion->plan }}</strong></span>
											</div>
											<div class="col-sm-12">
												<span>Membresia: <strong>{{ $membresia->membresia }}</strong></span>
											</div>
											<div class="col-sm-12">
												<span>Agencia: <strong>{{ $agencia->nombre }}</strong></span>
											</div>
											<div class="col-sm-12 mt-3">
												<a class="btn btn-sm btn-secondary btn-block" href="{{ route('user.agency.stats',$agencia->id) }}">Ir a mi agencia</a>
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