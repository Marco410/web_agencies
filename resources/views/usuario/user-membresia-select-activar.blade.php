<?php $page="Cambiar Plan";?>
@extends('layout.mainlayout')
@section('content')		
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-md-4 theiaStickySidebar">
				@include('usuario.sidebar')
			</div>
			<div class="col-xl-9 col-md-8">
				<h4 class="widget-title">Activar Plan de {{ $agencia->nombre }}</h4>
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
					<div class="card">
						<div class="card-body row">
							<div class="col-sm-12 text-center">
								<p>Por favor procede a seleccionar y pagar la membresía deseada para cambiar.</p>
							</div>
					<div class="col-sm-6 mb-4">
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
								<a style="cursor: pointer" href="{{ route('user.perfil.membresia.activar') . '?membresia=Basic&agencia='.$agencia->id }}"  >
								<div class="card-subheading" style="background-color: var(--primary);display: flex; justify-content: center;align-items: center; text-align: center;">
									¡PAGAR AHORA!
								</div></a>
							</div>
						</div>
					</div>

					<div class="col-sm-6 mb-4">
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
								<a style="cursor: pointer" href="{{ route('user.perfil.membresia.activar') . '?membresia=Plus&agencia='.$agencia->id }}" >
								<div class="card-subheading" style="background-color: var(--hover);display: flex; justify-content: center;align-items: center; text-align: center;">
									¡PAGAR AHORA!
								</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-12 card-footer-plan">
						<p>*Cobros Mensuales (Sin Descuento), Semestrales (5% Descuento), Anuales (12% Descuento)</p>
						<p>Precios más IVA.</p>
					</div>
					</div>
					</div>

				</div>

				

			</div>
		</div>
	</div>
</div>
	
@endsection