<?php $page="Resumen";?>
@extends('layout.mainlayout')
@section('content')		
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-md-4 theiaStickySidebar">
				@include('usuario.sidebar')
			</div>
			<div class="col-xl-9 col-md-8">
				<h4 class="widget-title">Resumen de Compra</h4>
				<h3><strong>{{ $agencia->nombre }}</strong></h3>
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
				@php
				$producto = "";
				$precio = 0.0;
					if ($plan == "mensual") {
						$producto = "Plan Mensual";
						$precio = $membresia->mensual;
						$plan_id = $membresia->mp_mensual_id;
					}else if ($plan == "semestral"){
						$producto = "Plan Semestral";
						$precio = $membresia->semestral - ($membresia->semestral * 0.05);
						$plan_id = $membresia->mp_semestral_id;

					}else if ($plan == "anual"){
						$producto = "Plan Anual";
						$precio =  $membresia->anual - ($membresia->anual * 0.12);
						$plan_id = $membresia->mp_anual_id;
					}
					/* // SDK de Mercado Pago
					require base_path('/vendor/autoload.php');
					// Agrega credenciales
					MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
					// Crea un objeto de preferencia
					$preference = new MercadoPago\Preference();

					// Crea un ítem en la preferencia
					$item = new MercadoPago\Item();
					$item->title = $producto;
					$item->quantity = 1;
					$item->unit_price = $precio;
					$preference->items = array($item);
					$preference->save(); */
				@endphp	
				<div class="row">
					<div class="col-sm-12">
						<h5>Plan Seleccionado</h5>
						<div class="card mb-0">
							<div class="row no-gutters">
								<div class="col-lg-12">
									<div class="card-body">
										<div class="row">
											@if ($plan == "mensual")
											<div class="col-sm-12  border-bottom">
													{{-- <div class="row mb-2">
														<div class="col-sm-7">
															<div class="form-check ">
																<label class="form-check-label" for="mensual">
																	Plan Mensual
																</label>
														</div>
													</div>
													<div class="col-sm-5">
														<small>Costo: <strong>${{ number_format($membresia->mensual,2,".",",")}} MXN</strong></small>
													</div>
												</div> --}}
												<div class="col-sm-12 border-bottom">
													<div class="row">
														<div class="col-sm-6">
															<div class="form-check mt-2 mb-2">
																<label class="form-check-label" for="semestral">
																Plan Mensual
																</label>
															</div>
														</div>
														<div class="col-sm-3">
															<small>Precio: <strong  >${{ number_format($membresia->mensual,2,".",",")}} MXN</strong></small>
														</div>
														<div class="col-sm-3">
															<p>Total:  <strong  >${{ number_format($precio,2,".",",")}} MXN</strong></p>
														</div>
													</div>
												</div>
											</div>
											@endif
											@if ($plan == "semestral")

											<div class="col-sm-12 border-bottom">
												<div class="row">
													<div class="col-sm-6">
														<div class="form-check mt-2 mb-2">
															<label class="form-check-label" for="semestral">
															Plan Semestral
															</label> <br>
															<small class="text-secondary" >Obtuviste el 5% de descuento</small>
														</div>
													</div>
													<div class="col-sm-3">
														<small>Precio: <strong style="text-decoration:line-through;" >${{ number_format($membresia->semestral,2,".",",")}} MXN</strong></small>
													</div>
													<div class="col-sm-3">
														<p>Total:  <strong  >${{ number_format($precio,2,".",",")}} MXN</strong></p>
													</div>
												</div>
											</div>
											@endif
											@if ($plan == "anual")
											<div class="col-sm-12 border-bottom">
												<div class="row">
													<div class="col-sm-6">
														<div class="form-check mt-2 mb-2">
															<label class="form-check-label" for="anual">
															Plan Anual
															</label> <br>
															<small class="text-secondary" >Obtuviste el 12% de descuento</small>
														</div>
													</div>
													<div class="col-sm-3">
														<small>Precio: <strong style="text-decoration:line-through;" >${{ number_format($membresia->anual,2,".",",")}} MXN</strong></small>
													</div>
													<div class="col-sm-3">
														<p>Total:  <strong  >${{ number_format($precio,2,".",",")}} MXN</strong></p>
													</div>
												</div>
											</div>
											@endif

											<div class="col-sm-12 text-right mt-3 cho-container">
												<a href="{{ route('user.perfil.membresia.contrato.cancelar').'?contrato='.$contrato->id.'&agencia='.$agencia->id }}" class='btn btn-md'>Cancelar</a>
												<a href="https://www.mercadopago.com.mx/subscriptions/checkout?preapproval_plan_id={{$plan_id}}" class='btn btn-md btn-primary'>Suscribirme</a>
												
											</div>
											<div class="col-sm-12 mt-4" >
												<div class="alert alert-warning">
													<strong>¡IMPORTANTE!</strong> Cuando finalices tu compra, da clic en el botón "Volver al sitio".
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 mt-4 offset-3 text-center">
							<div class="row no-gutters">
								<div class="col-lg-12">
										<div class="row">
											<div class="col-sm-12">
													@if ($membresia->id == 2)
													
													<div class="card-plan plan">
														<div class="card-heading" style="background-color: var(--primary)">
															BASIC
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
															
														</div>
													</div>
													@elseif($membresia->id == 3)
													<div class="card-plan plan">
														<div class="card-heading" style="background-color: var(--hover)">
															PLUS
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
																<p class="text mt-3">Inventario de autos en tiempo real</p>
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
	

<script src="https://sdk.mercadopago.com/js/v2"></script>
{{-- <script>
	// Agrega credenciales de SDK
	const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
	  locale: "es-MX",
	});
  
	// Inicializa el checkout
	mp.checkout({
	  preference: {
		id: "{{$preference->id}}",
	  },
	  render: {
		container: ".cho-container", // Indica el nombre de la clase donde se mostrará el botón de pago
		label: "Pagar", // Cambia el texto del botón de pago (opcional)
	  },
	  theme: {
        elementsColor: '#D90023',
    }
	});
  </script> --}}
  
@endsection