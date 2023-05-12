<?php $page="Dashboard";?>
@extends('layout.mainlayout')
@section('content')		
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-md-4 theiaStickySidebar">
				@include('usuario.sidebar')
			</div>
			<div class="col-xl-9 col-md-8">
				<h4 class="widget-title">Mi Panel | {{ auth()->user()->name }} {{ auth()->user()->apellido_p }} {{ auth()->user()->apellido_m }}</h4>
				<div class="row">
					<div class="col-lg-4">
						<a href="{{route('user.agencies')}}" class="dash-widget dash-bg-1">
							<span class="dash-widget-icon">{{ auth()->user()->agencies->count() }}</span>
							<div class="dash-widget-info">
								<span>Mis Agencias</span>
							</div>
						</a>
					</div>
					<div class="col-lg-4">
						<a href="{{route('user.personal')}}" class="dash-widget dash-bg-1">
							<span class="dash-widget-icon">{{ $personalCount }}</span>
							<div class="dash-widget-info">
								<span>Mi Personal</span>
							</div>
						</a>
					</div>
					<div class="col-lg-4">
						<a href="{{route('user.personal')}}" class="dash-widget dash-bg-1">
							<span class="dash-widget-icon">{{ $comentarios }}</span>
							<div class="dash-widget-info">
								<span>Comentarios</span>
							</div>
						</a>
					</div>
					{{-- <div class="col-lg-8">
						<div class="card">
							<div class="card-body">
								<p>Email:  <a href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->email }}</a> </p>
								<p>Teléfono:  <a href="tel:{{ auth()->user()->telefono }}">{{ auth()->user()->telefono }}</a> </p>
							</div>
						</div>
						
					</div> --}}
					{{-- <div class="col-lg-4">
						<a href="{{route('user.reviews')}}" class="dash-widget dash-bg-3">
							<span class="dash-widget-icon">{{ auth()->user()->comments->count() }}</span>
							<div class="dash-widget-info">
								<span>Mis Comentarios</span>
							</div>
						</a>
					</div> --}}
				</div>
				{{-- <div class="card mb-0">
					<div class="row no-gutters">
						<div class="col-lg-8">
							<div class="card-body">
								<h5 class="title">Resumen del Plan</h5>
								<div class="sp-plan-name">
									<h6 class="title">
										Premium <span class="badge badge-success badge-pill">Activa</span>
									</h6>
									<p>Subscripción ID: <span class="text-base">100394949</span></p>
								</div>
								<ul class="row">
									<li class="col-6 col-lg-6">
										<p>Empezó en  <strong>{{ Date('d M Y h:m a', strtotime(auth()->user()->created_at)) }}</strong></p>
									</li>
									<li class="col-6 col-lg-6">
										<p>Precio $0000.00</p>
									</li>
								</ul>
								<h6 class="title">Último Pago</h6>
								<ul class="row">
									<li class="col-sm-6">
										<p>Pagado el  <strong>03 Ene 2022</strong></p>
									</li>
									<li class="col-sm-6">
										<p><span class="text-success">Pagado</span>  <span class="amount">$0000.00</span>
										</p>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="sp-plan-action card-body">
								<div class="mb-2">
									<a href="provider-subscription" class="btn btn-primary"><span>Cambiar Plan</span></a>
								</div>
								<div class="next-billing">
									<p>Siguiente cobro <span>03 Ene, 2023</span></p>
								</div>
							</div>
						</div>
					</div>
				</div> --}}

				{{-- <div class="card mb-0">
					<div class="row no-gutters">
						<div class="col-lg-12">
							<div class="card-body">
								<h5 class="title">Información de Facturación</h5>
								
							</div>
						</div>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
</div>
</div>
@endsection